<?php
    include "./db.class.php";
?>

<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <title>Formulario de Usuário</title>
    </head>

    <?php  

    $db = new db('usuario');
    $data = null;
    $errors = [];
    $success = '';

        if(!empty($_POST)){

            $data = (object) $_POST;

            if(empty(trim($_POST['nome']))){
                $errors[] = "<li>O nome é Obrigatório.</li>";
            }
            if(empty(trim($_POST['email']))){
                $errors[] = "<li>O email é Obrigatório.</li>";
            }
            if(empty(trim($_POST['cpf']))){
                $errors[] = "<li>O cpf é Obrigatório.</li>";
            }
            if(empty(trim($_POST['telefone']))){
                $errors[] = "<li>O telefone é Obrigatório.</li>";
            }


            if (empty(($errors))){
                try {
                    if(empty($_POST['id'])){
                        $db->store($_POST);
                        $success = "Registro criado com sucesso!";
                    } else {
                        $db->update($_POST);
                        $success = "Registro atualizado com sucesso!";
                    }
                    echo "<script>
                        setTimeout(
                            ()=> window.location.href = 'UsuarioList.php', 1000
                        )
                    </script>";
                } catch(Exception $e){
                    $errors[] = "Erro ao salvar: " . $e->getMessage();
                }
            }
        }

        if(!empty($_GET['id'])){
            $data = $db->find($_GET['id']);
        }

        /*
        function getValue($field, $data = null){
            if($data && isset($data->$field)){
                return
            }
        }
        */
        //var_dump($data);

    ?>

    <body>

        <div class="container mt-5">
            <div class="row">
                
                <!--Sucesso-->
                <?php if(!empty($success)) {?>
                    <div class="alert alert-success">
                        <strong>
                            <?= $success?>
                        </strong>
                    </div>
                <?php } ?>

                <!--Erro-->
                <?php if(!empty($errors)) {?>
                    <div class="alert alert-danger">
                        <strong>Erro ao salvar:</strong>
                        <ul class="mb-0">
                            <?php foreach($errors as $error) {?>
                                <?= $error?>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <h3>Formulário Usuário</h3>
                <!--http://localhost/php/site/admin/UsuarioForm.php-->
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" value="<?php echo $data->nome ?? '' ?>" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Telefone</label>
                            <input type="text" name="telefone" value="<?= $data->telefone ?? '' ?>" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" value="<?= $data->email ?? '' ?>" class="form-control">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="" class="form-label">CPF</label>
                            <input type="text" name="cpf" value="<?= $data->cpf ?? '' ?>" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-primary">
                                <?= !empty($_GET['id']) ? "Editar" : "Salvar"?>
                            </button>
                            <a href="./UsuarioList.php" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </body>

</html>