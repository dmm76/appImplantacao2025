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
        <br/>
        <br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <h3>LOGIN</h3>
                    </div>
                    <div class="card-body text-start">
                        <form action="login.php" method="post">
                            <label class="form-label"><b>Nome</b></label>
                            <input class="form-control" type="text" name="nome" required/>
                            <br/>
                            <label class="form-label"><b>SENHA</b></label>
                            <input class="form-control" type="password" name="senha" required/>
                            <br/>
                            <input type="submit" class="btn btn-outline-success" value="LOGIN"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
