<?php
$senha = '2121';
$hash = '$2y$10$.IvawGgX6sP3G3Kb2FZ7WeQvF0FVMEUIUNsLVjpwTCkfUNyae7BXa'; // Seu hash do banco
var_dump(password_verify($senha, $hash)); // Deve retornar true
?>
