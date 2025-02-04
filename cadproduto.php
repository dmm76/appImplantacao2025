<?php
    session_start();
    include 'conecta.php';
    $descricao = $_POST['descricao'];
    $unidade = $_POST['unidade'];
    $quantidade = intval($_POST['quantidade']);
    $query = $mysqli->query("SELECT * FROM produto WHERE descricao='$descricao'");
    if (mysqli_num_rows($query) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto já existe em nossa base de dados!');
        window.location.href='produto.php';
        </script>";
        exit();
    }
    else {
        $sql = "INSERT INTO produto(descricao,unidade,quantidade) VALUES ('$descricao','$unidade','$quantidade')";
        if (mysqli_query($mysqli, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Produto cadastrado com sucesso!');
            window.location.href='produto.php';
            </script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar este produto!');
            window.location.href='produto.php';
            </script>";
        }
    }
    mysqli_close($mysqli);
?>