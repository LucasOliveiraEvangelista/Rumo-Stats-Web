<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Editar Jogador</h1>
        <a href="index.php">Listar</a><br><br>
        <?php
        require 'conexao.php';
        $conn = new Conn();
		
        if (isset($_POST['editar'])){
            $query = "UPDATE jogadores SET nome=:nome, posicao=:posicao, selecao=:selecao, numero=:numero WHERE id_jogador=:id";
            $resultado = $conn->getConn()->prepare($query);
            $resultado->bindParam(':nome', $_POST['nome']);
            $resultado->bindParam(':posicao', $_POST['posicao']);
            $resultado->bindParam(':selecao', $_POST['selecao']);
            $resultado->bindParam(':numero', $_POST['numero']);
            $resultado->bindParam(':id', $_POST['id']);

         
             if ($resultado->execute()){
			   echo "<script>alert('Dados do jogador editados com sucesso'); location.href='index.php'</script>";
			}else{
				echo "<script>alert('Erro ao editar!'); location.href='index.php'</script>";
			}
        }

        //Pesquisado os dados do usuario
        $id = $_GET["idj"];
        
		$query = "SELECT nome, posicao, numero, selecao, id_jogador FROM jogadores WHERE id_jogador=$id";
        $resultado_user = $conn->getConn()->prepare($query);
        $resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
        // $resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);
        $resultado_user->execute();
        $row_user = $resultado_user->fetch(PDO::FETCH_ASSOC);

        ?>

        <form name="EditUsuario" action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row_user['id_jogador']; ?>">

            <label>Nome: </label>   
            <input type="text" name="nome" placeholder="Nome" value="<?php echo $row_user['nome']; ?>"><br><br>

            <label>Número: </label>   
            <input type="number" name="numero" placeholder="Número da camisa" value="<?php echo $row_user['numero']; ?>"><br><br>

            <label>Posição: </label>   
            <input type="text" name="posicao" placeholder="Posição" value="<?php echo $row_user['posicao']; ?>"><br><br>

            <label>Seleção: </label>   
            <select name="selecao" id="">
            
                <?php
                $conexao = new Conn();
                $paises = "SELECT id, nome FROM selecao ORDER BY nome ASC";

                $comando = $conexao->getConn()->prepare($paises);
                $comando->execute();

                $nac = "SELECT j.selecao, j.id_jogador, s.id, s.nome FROM jogadores AS j INNER JOIN selecao AS s ON j.selecao = s.id WHERE j.id_jogador = '$id' ORDER BY nome ASC";

                $nacionalidade = $conexao->getConn()->prepare($nac);
                $nacionalidade->execute();
                $selesa = $nacionalidade->fetch(PDO::FETCH_ASSOC);
               
                echo "<option value='$selesa[id]'>$selesa[nome]</option>";
                while ($selecao = $comando->fetch(PDO::FETCH_ASSOC)){
           
                echo "<option value='$selecao[id]'>$selecao[nome]</option>";
                }

                ?>
            </select></br><br>

            <input type="submit" value="Editar" name="editar">
        </form>
    </body>
</html>
