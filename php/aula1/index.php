<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <style type="text/css">
            @import url("style.css") all;
        </style>
    </head>
    <body>
       <?php
        $nome = "Angelo";
        echo "Bem vindo, $nome";

        $idade = 18;
        if($idade < 18){
            echo " <br>Menor de Idade";
        } else {
            echo " <br>Maior de Idade";
        }
        echo "<br>";
        $notas = [7, 6, 5, 8, 9];
        for($i = 0; $i < count(value:$notas); $i++){
            echo $notas[$i];
        }
       ?>
    </body>
</html>