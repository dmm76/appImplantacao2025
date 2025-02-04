<?php
include 'conecta.php';
$nome = $_SESSION["user"];
$cpf = $_SESSION["cpf"];
$sql = "SELECT tipo FROM usuario WHERE cpf=$cpf";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_assoc()) {
    $tipo = $dados['tipo'];
}
if ($tipo == "Admin") {
    echo "<b>" . $nome . "</b>";
    echo "<b> | </b>";
    echo "<a href='aula.php' style='color: black; text-decoration: none'>HOME</a>";
    echo "<b> | </b>";
    echo "<a href='usuario.php' style='color: black; text-decoration: none'>USUÁRIOS</a>";
    echo "<b> | </b>";
    echo "<a href='produto.php' style='color: black; text-decoration: none'>PRODUTOS</a>";
    echo "<b> | </b>";
    echo "<a href='retirar.php' style='color: black; text-decoration: none'>PEDIDOS</a>";
    echo "<b> | </b>";
    echo "<a href='sair.php' style='color: red; text-decoration: none'><b>SAIR</b></a>";
}
else {
    echo "<b>" . $nome . "</b>";
    echo "<b> | </b>";
    echo "<a href='aula.php' style='color: black; text-decoration: none'>HOME</a>";
    echo "<b> | </b>";
    echo "<a href='retirar.php' style='color: black; text-decoration: none'>PEDIDOS</a>";
    echo "<b> | </b>";
    echo "<a href='sair.php' style='color: red; text-decoration: none'><b>SAIR</b></a>";
}
?>