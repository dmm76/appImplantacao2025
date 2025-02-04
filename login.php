<?php
session_start();
include "conecta.php";

if (isset($_POST['cpf'], $_POST['senha']) && !empty($_POST['cpf']) && !empty($_POST['senha'])) {
    $nome = strtolower(trim($_POST['cpf'])); // Converte para minúsculas
    $senha = trim($_POST['senha']);

    $sql = "SELECT nome, cpf, senha, tipo FROM usuario WHERE nome = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $cpf);
        if ($stmt->execute()) {
            $stmt->bind_result($dbnome, $dbcpf, $dbhash, $dbtipo);
            if ($stmt->fetch()) {
                if (password_verify($senha, $dbhash)) {
                    $_SESSION['user'] = $dbnome;
                    $_SESSION['cpf'] = $dbcpf;
                    $_SESSION['tipo'] = $dbtipo;
                    $stmt->close();
                    $mysqli->close();
                    header("Location: aula.php");
                    exit();
                } else {
                    $stmt->close();
                    $mysqli->close();
                    echo "<script>alert('Credenciais inválidas.'); window.location.replace('index.php');</script>";
                    exit();
                }
            } else {
                $stmt->close();
                $mysqli->close();
                echo "<script>alert('Credenciais inválidas.'); window.location.replace('index.php');</script>";
                exit();
            }
        } else {
            error_log("Erro na execução da query: " . $stmt->error);
            $stmt->close();
            $mysqli->close();
            echo "<script>alert('Ocorreu um erro interno.'); window.location.replace('index.php');</script>";
            exit();
        }
    } else {
        error_log("Erro na preparação da query: " . $mysqli->error);
        $mysqli->close();
        echo "<script>alert('Ocorreu um erro interno.'); window.location.replace('index.php');</script>";
        exit();
    }
} else {
    echo "<script>alert('Preencha todos os campos.'); window.location.replace('index.php');</script>";
    exit();
}
?>
