<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        echo "<script>window.location.replace('index.php');</script>";
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
        <center><h2>AULA DE PHP</h2></center>
        <hr/>
        <nav>
            <?php
                include "menu.php";
            ?>
        </nav>
        <br/>
        <br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <h3>AULA PHP</h3>
                    </div>
                    <div class="card-body text-start">
                        <?php
                            $nome = $_SESSION["user"];
                        ?>
                        <h3>Você está logado na página, <b><?php echo $nome; ?></b></h3>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>