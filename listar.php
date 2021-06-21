<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Listagem</title>
    </head>
    <body>
        <h1>Usuários</h1>
        <a href="index.php">Cadastrar</a><br><br>
        <?php
               
        require_once 'conexao.php';

        $conexao = new Conn();
        $query = "SELECT id, nome, continente FROM selecao ORDER BY nome ASC";
        

        $comando = $conexao->getConn()->prepare($query);
        $comando->execute();

        

        while ($selecao = $comando->fetch(PDO::FETCH_ASSOC)){
            $jogadores = "SELECT id_jogador FROM jogadores WHERE selecao = '$selecao[id]'";

        $busca = $conexao->getConn()->prepare($jogadores);
        $busca->execute();

        $qtd = $busca->rowCount();
           
            echo "País: " . $selecao['nome'] . "<br>";
            echo "continente: " . $selecao['continente'] . "<br>";
            echo "Jogadores: " . $qtd . "<br>";
            echo "<a href='visualizar.php?id=" . $selecao['id'] . "'>Visualizar</a><br>";
            echo "<hr>";
        }
        ?>
    </body>
</html>
