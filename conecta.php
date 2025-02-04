<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "aulaphp";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Habilita relatórios de erro

try {
    $mysqli = new mysqli($hostname, $username, $password, $database);
    $mysqli->set_charset("utf8mb4"); // Define o charset para UTF-8 (utf8mb4 suporta emojis)
} catch (mysqli_sql_exception $e) {
    error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
    die("Ocorreu um erro interno no servidor."); // Mensagem genérica para o usuário
}
?>