<?php 

require "config/auth.php";

$categoria = strtoupper($_GET["categoria"]  ?? "NENHUMA");

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>LavaRapido - Cadastro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        * {
            margin: 0
        }
        
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  </head>

  <body>
    <?php require "templates/sidebar.php" ?>

    <main style="margin-left: 20px;">
        <!-- SECTION DE CATEGORIA-->
        <section>
            <br>
            <?php 
            echo "<h2> Categoria Selecionada: - $categoria - </h2>";
            ?>
            <form method="get">
                <select name="categoria" onchange="this.form.submit()">
                    <option value="">Selecione a categoria</option>
                    <option value="comuns">Veiculos comuns</option>
                    <option value="empresariais">Veiculos empresariais</option>
                </select>
            </form> <br> <br>

            <?php
            if ($categoria != "NENHUMA"){
             require "forms/$categoria.php";
            } 
            ?>

        </section>

    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>