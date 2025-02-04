<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo "<script>window.location.replace('index.php');</script>";
    exit();
}
$tipo = $_SESSION['tipo'];
    if ($tipo != "Admin") {
        echo "<script>window.location.replace('aula.php');</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Aula de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <center>
        <h2>AULA DE PHP</h2>
    </center>
    <hr />
    <nav>
        <?php
        include "menu.php";
        ?>
    </nav>
    <br />
    <br />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-2 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h3>EDIÇÃO DE PRODUTOS</h3>
                </div>
                <div class="card-body text-start">
                    <?php
                    include 'conecta.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM produto WHERE id=$id";
                    $query = $mysqli->query($sql);
                    while ($dados = $query->fetch_assoc()) {
                        $id = $dados['id'];
                        $descricao = $dados['descricao'];
                        $unidade = $dados['unidade'];
                        $quantidade = $dados['quantidade'];
                    }
                    ?>
                    <form action="editaproduto.php?id=<?php echo $id; ?>" method="post">
                        <label class="form-label"><b>DESCRICAO</b></label>
                        <input class="form-control" type="text" name="descricao" value="<?php echo $descricao; ?>" required />
                        <br />
                        <label class="form-label"><b>UNIDADE</b></label>
                        <select class="form-select" aria-label="Seleção padrão..." name="unidade">
                            <option selected><?php echo $unidade; ?></option>
                            <option value="Cento">CENTO</option>
                            <option value="Peça">PEÇA</option>
                            <option value="Caixa">CAIXA</option>
                            <option value="Resma">RESMA</option>
                            <option value="Quilo">QUILO</option>
                            <option value="Metro">METRO</option>
                        </select>
                        <br />
                        <label class="form-label"><b>QUANTIDADE</b></label>
                        <input class="form-control" type="number" name="quantidade" value="<?php echo $quantidade; ?>" required />
                        <br />
                        <input type="submit" class="btn btn-outline-success" value="EDITAR PRODUTO" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>