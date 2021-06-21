<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Listagem</title>
    </head>
    <body>
        <h1>Visualizar usuário</h1>
        <a href="listar.php">Listar</a><br><br>
        <?php
        require_once 'conexao.php';
        
        $id = $_GET["id"];
        $conn = new Conn();
        $result_user = "SELECT id_jogador, nome, numero, posicao FROM jogadores WHERE selecao=:id"; /*Analisem bem essa linha moçada e achem a merda*/
        
        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado_user->execute();
        
        while ($dados = $resultado_user->fetch(PDO::FETCH_ASSOC)){
           
            echo "Nome: " . $dados['nome'] . "<br>";
            echo "Posição: " . $dados['posicao'] . "<br>";
            echo "Numero da camisa: #" . $dados['numero'] . "<br>";
            echo "<a href='visualizar.php?id=" . $dados['id_jogador'] . "'>Visualizar</a><br>";
            echo "<a href='editar.php?idj=" . $dados['id_jogador'] . "'>Editar</a><br>";
            echo "<a href='apagar.php?id=" . $dados['id_jogador'] . "'>Apagar</a><br>";
            echo "<hr>";
        }
       
        ?>
    </body>
</html>
