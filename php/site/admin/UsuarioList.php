<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <title>Formulario de Usuário</title>
    </head>

    <?php  
        if(!empty($_POST)){
           echo $_POST['nome'] . "<br>";
        }
    ?>

    <body>

        <div class="container">
            <div class="row">
                <h3>Listagem Usuário</h3>
                <!--http://localhost/php/site/admin/UsuarioList.php-->

                <form action="" method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <a href="./UsuarioForm.php" class="btn btn-secondary">Cadastrar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>@social</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </body>

</html>