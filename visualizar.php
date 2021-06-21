<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Listem</title>
    </head>
    <body>
        <h1>Meus jogadores</h1>
        <a href="index.php">Voltar</a><br><br>
        <?php
        require_once 'conexao.php';
        session_start();

        $id_user = $_SESSION['id'];
        $id = $_GET["id"];
        $conn = new Conn();
        $result_user = "SELECT id_jogador, nome, numero, posicao, pe, selecao FROM jogadores WHERE id_user=:id"; 
        
        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->bindParam(':id', $id_user, PDO::PARAM_INT);
        $resultado_user->execute();

        $paises = "SELECT s.id, s.nome, j.selecao FROM selecao AS s INNER JOIN jogadores AS j ON j.selecao = s.id";

                $comando = $conn->getConn()->prepare($paises);
                $comando->execute();

                $selecao = $comando->fetch(PDO::FETCH_ASSOC);
        
        while ($dados = $resultado_user->fetch(PDO::FETCH_ASSOC)){
           
            echo "Nome: " . $dados['nome'] . "<br>";
            echo "Posição: " . $dados['posicao'] . "<br>";
            echo "Número da camisa: #" . $dados['numero'] . "<br>";
            echo "Perna boa: " . $dados['pe'] . "<br>";
            echo "Nacionalidade: " . $selecao['nome'] . "<br>";
            echo "<a href='temporadas.php?id=" . $dados['id_jogador'] . "'>Histórico da Carreira</a><br>";
            echo "<a href='adicionar.php?id=" . $dados['id_jogador'] . "'>+ Adicionar Temporada</a><br>";
            echo "<a href='editar.php?idj=" . $dados['id_jogador'] . "'>Editar</a><br>";
            echo "<a href='apagar.php?id=" . $dados['id_jogador'] . "'>Apagar</a><br>";
            echo "<hr>";
        }
       
        ?>
    </body>
</html>
