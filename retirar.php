<?php
session_start();
include 'conecta.php';

// Inicializa a sessão para armazenar pedidos
if (!isset($_SESSION["pedidos"])) {
    $_SESSION["pedidos"] = [];
}

// Processar pedido ao clicar em "REALIZAR PEDIDO"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["descricao"]) && isset($_POST["quantidade"])) {
    $id_produto = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];

    // Buscar a descrição do produto no banco
    $query = mysqli_query($mysqli, "SELECT descricao FROM produto WHERE id = '$id_produto'");
    $produto = mysqli_fetch_assoc($query);

    // Adicionar pedido ao array na sessão
    $_SESSION["pedidos"][] = [
        "id" => $id_produto,
        "descricao" => $produto["descricao"],
        "quantidade" => $quantidade
    ];
}

// Finalizar pedido e gravar no banco
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalizar_pedido"])) {
    $colaborador = $_SESSION["user"];
    $data_hora = date("Y-m-d H:i:s");

    foreach ($_SESSION["pedidos"] as $pedido) {
        $id_produto = $pedido["id"];
        $descricao = $pedido["descricao"];
        $quantidade = $pedido["quantidade"];

        $sql = "INSERT INTO pedidos (id_produto, descricao, quantidade, colaborador, data_hora) 
                VALUES ('$id_produto', '$descricao', '$quantidade', '$colaborador', '$data_hora')";
        mysqli_query($mysqli, $sql);
        header("Location: retirar2.php");
    }

    // Limpar a sessão após salvar no banco
    $_SESSION["pedidos"] = [];
}

// Redirecionamento para evitar reenvio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: ".$_SERVER["PHP_SELF"]);
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Aula de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <center>
        <h2>AULA DE PHP</h2>
    </center>
    <hr />
    <nav>
        <?php include "menu.php"; ?>
    </nav>
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>RETIRADA</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label class="form-label"><b>DESCRIÇÃO</b></label>
                            <select class="form-select" name="descricao" required>
                                <option value="">Selecione...</option>
                                <?php
                                $pesquisa = mysqli_query($mysqli, "SELECT * FROM produto ORDER BY descricao");
                                $row = mysqli_num_rows($pesquisa);
                                if ($row > 0) {
                                    while ($registro = $pesquisa->fetch_array()) {
                                        $id = $registro['id'];
                                        echo "<option value='$id'>" . $registro['descricao'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <br />
                            <label class="form-label"><b>QUANTIDADE</b></label>
                            <input class="form-control" type="number" name="quantidade" required />
                            <br />
                            <button type="submit" class="btn btn-success">REALIZAR PEDIDO</button>
                        </form>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header text-center">
                        <h3>PEDIDOS REALIZADOS</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>CÓDIGO</th>
                                    <th>DESCRIÇÃO</th>
                                    <th>QUANTIDADE</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($_SESSION["pedidos"])) {
                                    foreach ($_SESSION["pedidos"] as $index => $pedido) {
                                        echo "<tr>";
                                        echo "<td>{$pedido['id']}</td>";
                                        echo "<td>{$pedido['descricao']}</td>";
                                        echo "<td>{$pedido['quantidade']}</td>";
                                        echo "<td><a href='remover_pedido.php?index=$index' class='btn btn-danger btn-sm'>Remover</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>Nenhum pedido realizado.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <form action="" method="post">
                            <button type="submit" name="finalizar_pedido" class="btn btn-primary">FINALIZAR PEDIDO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>