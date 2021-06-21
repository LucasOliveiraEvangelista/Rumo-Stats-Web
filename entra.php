<?php
    
    require_once 'conexao.php';
    session_start();
    print_r($_POST);
    print_r($senha);

    $conn = new Conn();

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $senha = sha1($dados['senha']);
    $email = $dados['email'];

    $login = "SELECT email, senha, id FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $comando = $conn->getConn()->prepare($login);
    $comando->execute();

    $log = $comando->fetch(PDO::FETCH_ASSOC);

    if($log['email'] == $dados['email'] && $log['senha'] == $senha){
        $_SESSION['id'] = $log['id'];
        echo "<script>alert(' com sucesso'); location.href='index.php'</script>";
    }else{
        echo "<script>alert('sem sucesso'); location.href='login.php'</script>";
    }



    ?>