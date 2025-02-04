<?php
// Credenciais do banco de dados remoto no Railway
$hostname = "viaduct.proxy.rlwy.net";
$username = "root";
$password = "ThOzfRpecLCSZZyaOHOFzorJXnEsuhlp";
$database = "railway";
$port = 37058; // Adicione a porta do Railway

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Habilita relatórios de erro

try {
    // Conecta ao banco remoto
    $mysqli = new mysqli($hostname, $username, $password, $database, $port);
    $mysqli->set_charset("utf8mb4"); // Define o charset para UTF-8 (utf8mb4 suporta emojis)
} catch (mysqli_sql_exception $e) {
    // Loga o erro para debug e mostra uma mensagem genérica para o usuário
    error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
    die("Ocorreu um erro interno no servidor."); // Mensagem genérica para o usuário
}
?>
