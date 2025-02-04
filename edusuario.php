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
                    <h3>EDIÇÃO DE USUÁRIOS</h3>
                </div>
                <div class="card-body text-start">
                    <?php
                    include 'conecta.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM usuario WHERE id=$id";
                    $query = $mysqli->query($sql);
                    while ($dados = $query->fetch_assoc()) {
                        $id = $dados['id'];
                        $nome = $dados['nome'];
                        $genero = $dados['genero'];
                        $cpf = $dados['cpf'];
                        $tipo = "Colaborador";
                    }
                    ?>
                    <form action="editausuario.php?id=<?php echo $id; ?>&tipo=<?php echo $tipo; ?>" method="post">
                        <label class="form-label"><b>NOME</b></label>
                        <input class="form-control" type="text" name="nome" value="<?php echo $nome; ?>" required />
                        <br />
                        <label class="form-label"><b>GENERO</b></label>
                        <select class="form-select" aria-label="Seleção padrão..." name="genero">
                            <option selected><?php echo $genero; ?></option>
                            <option value="Masculino">MASCULINO</option>
                            <option value="Feminino">FEMININO</option>
                            <option value="Outro">OUTRO</option>
                        </select>
                        <br />
                        <label class="form-label"><b>CPF</b></label>
                        <input class="form-control" type="text" name="cpf" value="<?php echo $cpf; ?>" required />
                        <br />
                        <input type="submit" class="btn btn-outline-success" value="EDITAR USUÁRIO" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>