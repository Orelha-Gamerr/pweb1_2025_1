<?php
    include "../db.class.php";
    include_once "../header.php"; 

        $db = new db('usuario');

        if(!empty($_GET['id'])){
            $db->destroy($_GET['id']);
        };
        
        if(!empty($_POST)){
            $dados = $db->search($_POST);
        }else{
            $dados = $db->all();
        }

    ?>

    <body>

        <div class="container mt-5">
            <div class="row">
                <h3>Listagem Usuário</h3>
                <!--http://localhost/php/site/admin/UsuarioList.php-->

                <form action="./UsuarioList.php" method="post">

                    <div class="row">
                        <div class="col-md-2">
                            <select name="tipo" class="form-select">
                                <option value="nome">Nome</option>
                                <option value="nome">CPF</option>
                                <option value="nome">Telefone</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="valor" placeholder="pesquisar..." class="form-control">
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
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($dados as $item) {
                            echo"
                            <tr>
                                <th scope='row'>$item->id</th>
                                <td>$item->nome</td>
                                <td>$item->cpf</td>
                                <td>$item->telefone</td>
                                <td>$item->email</td>
                                <td>
                                    <a href='./UsuarioForm.php?id=$item->id'>Editar</a>
                                </td>
                                <td>
                                    <a 
                                        onclick='return confirm(\"Deseja Excluir?\")'
                                        href='./UsuarioList.php?id=$item->id'>Exluir
                                    </a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
                </table>
            </div>

            
    <?php
    
    include_once "../footer.php";
    
    ?>