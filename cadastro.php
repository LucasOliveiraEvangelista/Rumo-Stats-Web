<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
    </head>
    <body>
		<?php
        require_once 'conexao.php';
        session_start();

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		
        if (isset($dados['enviar'])){
			
            $conexao = new Conn();

            $id = rand(time(), 1000000);

            $query = "INSERT INTO usuarios (id, nome, email, senha) 
			VALUES (:id, :nome, :email, :senha)";
            $cadastrar = $conexao->getConn()->prepare($query);

            $cadastrar->bindParam(':id', $id, PDO::PARAM_INT);
            $cadastrar->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cadastrar->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $cadastrar->bindParam(':senha', sha1($dados['senha']), PDO::PARAM_STR);

            $cadastrar->execute();

            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['id'] = $id;
			
            if ($cadastrar->rowCount()){
                echo "<script>alert('Dados inseridos com sucesso'); location.href='index.php'</script>";
			}else{
				echo "<script>alert('Erro ao cadastrar'); location.href='cadastro.php'</script>";
			}
        }
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['id'] = $id;
        ?>        
        <form action="" method="POST">
            <label>Nome: </label>   
            <input type="text" name="nome"><br><br>

            <label>E-mail: </label>   
            <input type="text" name="email"><br><br>

            <label>Senha: </label>   
            <input type="password" name="senha"><br><br>

            <input type="submit" value="Cadastrar" name="enviar">
        </form>
    </body>
</html>