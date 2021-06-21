<?php
    
    require_once 'conexao.php';
    session_start();

    print_r($_POST);

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        $conn = new Conn();

        $query = "INSERT INTO temporada (idade, clube, temporada, jogos, gols, assistencias, id_jogador) 
        VALUES (:idade, :clube, :temporada, :jogos, :gols, :assistencias, :id)";
        $cadastrar = $conn->getConn()->prepare($query);

        $cadastrar->bindParam(':idade', $dados['idade'], PDO::PARAM_STR);
        $cadastrar->bindParam(':clube', $dados['clube'], PDO::PARAM_STR);
        $cadastrar->bindParam(':temporada', $dados['temporada'], PDO::PARAM_STR);
        $cadastrar->bindParam(':jogos', $dados['jogos'], PDO::PARAM_STR);
        $cadastrar->bindParam(':gols', $dados['gols'], PDO::PARAM_STR);
        $cadastrar->bindParam(':assistencias', $dados['assistencias'], PDO::PARAM_STR);
        $cadastrar->bindParam(':id', $dados['id'], PDO::PARAM_INT);
        $cadastrar->execute();

        if ($cadastrar->rowCount()){
            echo "<script>alert('Dados inseridos com sucesso'); location.href='visualizar.php'</script>";
        }else{
            echo "<script>alert('Erro ao adicionar temporada'); history.back();</script>";
        }
    

?>
