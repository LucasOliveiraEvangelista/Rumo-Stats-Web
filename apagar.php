<?php
require_once 'conexao.php';
$id = $_GET['id'];

    $conexao = new Conn();
    $query = "DELETE FROM jogadores WHERE id_jogador=$id";/*Achem a merda*/

    $resultado = $conexao->getConn()->prepare($query);
    $resultado->bindParam(':id', $id);

    if ($resultado->execute()){
	   echo "<script>alert('Jogador excluidos com sucesso'); location.href='index.php'</script>";
	}else{
		echo "<script>alert('Erro ao excluir jogador'); location.href='index.php'</script>";
	}