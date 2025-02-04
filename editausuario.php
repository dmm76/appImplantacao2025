<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $sql = "UPDATE usuario SET nome=?,genero=?,cpf=?,tipo=? WHERE id=?";
    $stmt = $mysqli->prepare($sql) or die ($mysqli->error);
    if (!$stmt) {
        echo "Erro na atualização: ".$mysqli->errno." - ".$mysqli->error;
    }
    $stmt->bind_param('ssssi', $nome,$genero,$cpf,$tipo,$id);
    $stmt->execute();
    $mysqli->close();
    header("Location: usuario.php");
?>