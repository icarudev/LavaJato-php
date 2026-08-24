<?php 

require "config/database.php";
require "config/auth.php";

$categoria = $_GET["categoria"] ?? "comuns";
$porte = $_GET["porte"] ?? "pequeno";

$total = 0;

if ($categoria == "empresariais"){
    $sql = "SELECT * FROM empresariais WHERE porte = '$porte'";
    
} else if ($categoria == "comuns"){
    $sql = "SELECT * FROM comuns";
};

$query = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>LavaRapido - Cadastrados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <style>

       body {
            width: 100%;
            overflow-x: auto;
        }  
         
        @media print {

            aside,
            form,
            button,
            .nao-imprimir {
                display: none;
            
            }

        }

    </style>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  </head>
  <body>
    
    <div  class="nao-imprimir">
        <?php require "templates/sidebar.php" ?>
    </div>


    <main>
        <section>

            <h2> - Categoria escolhida: <?php echo ucfirst($categoria); ?> </h1> 

            <?php if($categoria == "empresariais"): ?>
 
            <h5> - Porte atual: <?php echo ucfirst($porte); ?> </h5> 

            <?php endif; ?>
            
            <br>
            <form method="get">
                <select name="categoria" onchange="this.form.submit()">

                    <option value="">Selecione a categoria</option>
                    <option value="comuns">Comuns</option>
                    <option value="empresariais">Empresariais</option>

                </select>
            </form>

            <?php if ($categoria == "empresariais"): ?>
                <br>
                <form method="get">

                    <input type="hidden" name="categoria" value="empresariais">

                    <select name="porte" onchange="this.form.submit()">

                        <option value="">Selecione o porte</option>

                        <option value="pequeno">Pequeno</option>
                        <option value="grande">Grande</option>
                        <option value="maquina">Maquina</option>

                    </select>

                </form>

            <?php endif; ?>

            <br> <br>
        </section>

        <section>

                <button onclick="window.print()" style="width: 100%; padding:0.6rem; color:white; background-color:#176B3A">
                    📄 Gerar PDF
                </button>
                
                    <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DATA: </th>
                                <th>PLACA: </th>
                                <th>MODELO: </th>
                                <th>VALOR(R$): </th>
                                <th>
                                    <?php
                                    if ($categoria == "comuns") {
                                        echo "PAGAMENTO";
                                    }

                                    if ($categoria == "empresariais") {
                                        echo "KM";
                                    }
                                    ?>
                                </th>
                                <th class="nao-imprimir">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while($cadastrados = mysqli_fetch_assoc($query)):?>

                            <?php $total += $cadastrados["valor"]?>

                            <tr>
                                <!-- Semelhante (empresariais e comuns) -->
                                <td scope="row"> <?php echo date("d/m/Y", strtotime($cadastrados["data"])) ?> </td>
                                <td> <?php echo $cadastrados["placa"] ?> </td>
                                <td> <?php echo $cadastrados["modelo"] ?> </td>
                                <td> <?php echo $cadastrados["valor"] ?> </td>
                                
                            

                                <!-- Diferenca (empresariais e comuns) -->
                                <td> 
                                    <?php 
                                    if ($categoria == "comuns"){
                                        echo $cadastrados["pagamento"];
                                    }

                                    if ($categoria == "empresariais"){
                                        echo $cadastrados["km"];
                                    }
                                    ?> 
                                </td>
                                <td class="nao-imprimir">
                                <button
                                    class="btn btn-danger btn-xs"
                                    onclick="if (confirm('Tem certeza que deseja excluir este veiculo?')) {
                                        window.location.href='deletar.php?id=<?php echo $cadastrados["id"]; ?>&categoria=<?php echo $categoria; ?>';
                                    }">
                                    <i class="bi bi-trash"></i>
                                </button>
                                    <button class="btn btn-secondary btn-xs" onclick="window.location.href='editar.php?id=<?= $cadastrados["id"] ?>&categoria=<?= $categoria ?>'">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>

                            <?php endwhile ?>

                        </tbody>
                    </table>
                </div>
                <h3>Total: R$ <?= number_format($total, 2, ",", ".") ?></h3>
        </section>
    </main>
                        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
