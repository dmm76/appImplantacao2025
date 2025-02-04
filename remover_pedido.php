<?php
session_start();
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    unset($_SESSION["pedidos"][$index]);
    $_SESSION["pedidos"] = array_values($_SESSION["pedidos"]); // Reorganiza os índices
}
header("Location: retirar.php");
exit();
?>