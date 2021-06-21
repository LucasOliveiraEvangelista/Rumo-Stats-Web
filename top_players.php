<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Top Players</title>
        <style>
            body{
                background: #bbb;
                color: #564a99;
            }
        </style>
    </head>
    <body>
        <h1>Melhores</h1>
        <a href="index.php">Cadastrar</a><br><br>
        <?php
               
        require_once 'conexao.php';

        $conn = new Conn();
        $result_user = "SELECT j.id_jogador, j.nome, j.numero, j.selecao, j.posicao, j.top, b.id, b.foto, b.selecao FROM jogadores AS j JOIN bandeiras AS b  ON b.selecao = j.selecao WHERE j.top = 1";
        
        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->execute();
        
        while ($dados = $resultado_user->fetch(PDO::FETCH_ASSOC)){
           
            echo "Nome: " . $dados['nome'] . "<br>";
            echo "Posição: " . $dados['posicao'] . "<br>";
            echo "Numero da camisa: #" . $dados['numero'] . "<br>";
            echo "<img src='selecao/$dados[foto]' width='80px' alt='Bandeira'>";
            echo "<hr>";
        }
        ?>
    </body>
</html>
