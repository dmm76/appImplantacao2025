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
        <center><h2>AULA DE PHP</h2></center>
        <hr/>
        <nav>
            <?php
                include "menu.php";
            ?>
        </nav>
        <br/>
        <br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-2 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                        </svg>&nbsp;PRODUTOS</h3>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            CADASTRAR PRODUTO
                        </button>
                    </div>
                    <div class="card-body text-start">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">CÓDIGO</th>
                                    <th scope="col">DESCRIÇÃO</th>
                                    <th scope="col">UNIDADE</th>
                                    <th scope="col">QUANTIDADE</th>
                                    <th scope="col">AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'conecta.php';
                                    $pesquisa = mysqli_query($mysqli, "SELECT * FROM produto ORDER BY descricao");
                                    $row = mysqli_num_rows($pesquisa);
                                    if ($row > 0) {
                                        while ($registro = $pesquisa->fetch_array()) {
                                            $id = $registro['id'];
                                            echo "<tr>";
                                            echo "<td>".$id."</td>";
                                            echo "<td>".$registro['descricao']."</td>";
                                            echo "<td>".$registro['unidade']."</td>";
                                            echo "<td>".$registro['quantidade']."</td>";
                                            echo "<td><a href='edproduto.php?id=$id'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#006400' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                            </svg></a> | <a href='excproduto.php?id=$id'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='25' fill='#FF0000' class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                            </svg></a></td>";
                                        }
                                    }
                                    else {
                                        echo "Não existem produtos cadastrados!";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CADASTRO DE PRODUTOS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form action="cadproduto.php" method="post">
                        <label class="form-label"><b>DESCRICAO</b></label>
                        <input class="form-control" type="text" name="descricao" required/>
                        <br/>
                        <label class="form-label"><b>UNIDADE</b></label>
                        <select class="form-select" aria-label="Seleção padrão..." name="unidade">
                            <option selected>Selecione...</option>
                            <option value="Cento">CENTO</option>
                            <option value="Peça">PEÇA</option>
                            <option value="Caixa">CAIXA</option>
                            <option value="Resma">RESMA</option>
                            <option value="Quilo">QUILO</option>
                            <option value="Metro">METRO</option>
                        </select>
                        <br/>
                        <label class="form-label"><b>QUANTIDADE</b></label>
                        <input class="form-control" type="number" name="quantidade" required/>
                        <br/>
                        <input type="submit" class="btn btn-outline-success" value="CADASTRAR PRODUTO"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>