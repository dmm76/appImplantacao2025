<?php
    session_start();
    include 'conecta.php';
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $tipo = 'Colaborador';
    $hash = password_hash($senha, PASSWORD_ARGON2ID);
    $query = $mysqli->query("SELECT * FROM usuario WHERE cpf='$cpf'");
    if (mysqli_num_rows($query) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário já existe em nossa base de dados!');
        window.location.href='usuario.php';
        </script>";
        exit();
    }
    else {
        $sql = "INSERT INTO usuario(nome,genero,cpf,senha,tipo) VALUES ('$nome','$genero','$cpf','$hash','$tipo')";
        if (mysqli_query($mysqli, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');
            window.location.href='usuario.php';
            </script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar este usuário!');
            window.location.href='usuario.php';
            </script>";
        }
    }
    mysqli_close($mysqli);
?>