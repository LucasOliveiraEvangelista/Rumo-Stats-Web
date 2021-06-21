<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Seleções</title>
    </head>
    <body>
        <h1>Cadastrar Seleção</h1>
        <a href="listar.php">Listar</a><br><br>
		<?php
        require_once 'conexao.php';

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		
        //print_r($dados);//exit;
        if (isset($dados['enviar'])){
			
            $conexao = new Conn();

            $query = "INSERT INTO selecao (nome, continente) 
			VALUES (:nome, :continente)";
            $cadastrar = $conexao->getConn()->prepare($query);

            $cadastrar->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cadastrar->bindParam(':continente', $dados['continente'], PDO::PARAM_INT);
            

            $cadastrar->execute();
			
            if ($cadastrar->rowCount()){
                echo "<script>alert('Dados inseridos com sucesso'); location.href='listar.php'</script>";
			}else{
				echo "<script>alert('Deu merda com sucesso'); location.href='selecao.php'</script>";
			}
        }
        ?>        
        <form action="" method="POST">
            <label>Nome: </label>   
            <input type="text" name="nome"><br><br>

            <label>continente: </label>   
            <select name="continente">
                <option value="1">América</option>
                <option value="2">Europa</option>
                <option value="3">África</option>
                <option value="4">Ásia</option>
                <option value="5">Oceânia</option>
            </select><br><br>

            <input type="submit" value="Cadastrar" name="enviar">
        </form>
    </body>
</html>