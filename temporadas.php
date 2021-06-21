<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Temporadas</title>
    </head>
    <body>
        <?php
        require_once 'conexao.php';
        session_start();
        $conn = new Conn();
        $id = $_GET["id"];
        $result_user = "SELECT t.jogos, t.idade, t.clube, t.gols, t.temporada, t.assistencias, t.id_jogador, j.id_jogador, j.nome FROM temporada AS t INNER JOIN jogadores AS j ON t.id_jogador = j.id_jogador WHERE t.id_jogador = :id"; 
        
        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado_user->execute();

        $jogos = "SELECT SUM(jogos) AS num FROM temporada WHERE id_jogador = '$id'"; 
        
        $qtdjogos = $conn->getConn()->prepare($jogos);
        $qtdjogos->execute();

        echo "<p>Total na Carreira: $qtdjogos Jogos  |  289 Gols  |  89 Assistências</p>";
        
        while ($dados = $resultado_user->fetch(PDO::FETCH_ASSOC)){
           
            echo "Nome: " . $dados['nome'] . "<br>";
            echo "Time: " . $dados['clube'] . "<br>";
            echo "Temporada: " . $dados['temporada'] . "<br>";
            echo "Idade: " . $dados['idade'] . " Anos<br>";
            echo "Jogos: " . $dados['jogos'] . "<br>";
            echo "Gols: " . $dados['gols'] . "<br>";
            echo "Assistências: " . $dados['assistencias'] . "<br>";
            echo "<hr>";
        }
       
        ?>