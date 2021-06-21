<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Jogadores</title>
    </head>
    <body>
        <h1>Cadastrar jogadores</h1>
        <a href="visualizar.php">Meus Jogadores</a><br><br>
		<?php
        require_once 'conexao.php';
        session_start();
        // print_r($_SESSION);

        $id = $_SESSION['id'];

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		
        //print_r($dados);//exit;
        if (isset($dados['enviar'])){
			
            $conexao = new Conn();

            $query = "INSERT INTO jogadores (nome, numero, posicao, selecao, pe, id_user) 
			VALUES (:nome, :numero, :posicao, :selecao, :pe, :id)";
            $cadastrar = $conexao->getConn()->prepare($query);

            $cadastrar->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cadastrar->bindParam(':numero', $dados['numero'], PDO::PARAM_INT);
            $cadastrar->bindParam(':posicao', $dados['posicao'], PDO::PARAM_STR);
            $cadastrar->bindParam(':pe', $dados['pe'], PDO::PARAM_STR);
            $cadastrar->bindParam(':selecao', $dados['selecao'], PDO::PARAM_INT);
            $cadastrar->bindParam(':id', $id, PDO::PARAM_INT);
            
            $cadastrar->execute();
			
            if ($cadastrar->rowCount()){
                echo "<script>alert('Dados inseridos com sucesso'); location.href='index.php'</script>";
			}else{
				echo "<script>alert('Erro ao cadatrar jogador'); location.href='index.php'</script>";
			}
        }
        ?>        
        <form action="" method="POST">
            <label>Nome: </label>   
            <input type="text" name="nome"><br><br>

            <label>Número: </label>   
            <input type="number" name="numero"><br><br>

            <label>Posição: </label>   
            <input type="text" name="posicao"><br><br>

            <label>Posição: </label>   
            <input type="radio" name="pe" value="Direita">Destro
            <input type="radio" name="pe" value="Esquerda">Canhoto<br><br>

            <label>Seleção: </label>   
            <select name="selecao" id="">
                <?php
                $conexao = new Conn();
                $paises = "SELECT id, nome FROM selecao ORDER BY nome ASC";

                $comando = $conexao->getConn()->prepare($paises);
                $comando->execute();

                while ($selecao = $comando->fetch(PDO::FETCH_ASSOC)){
           
                echo "<option value='$selecao[id]'>$selecao[nome]</option>";
                }

                ?>
            </select></br><br>

            <input type="submit" value="Cadastrar" name="enviar">
        </form>
    </body>
</html>












