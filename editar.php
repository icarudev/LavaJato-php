<?php

require "config/database.php";
require "config/auth.php";

$id = $_GET["id"];
$categoria = $_GET["categoria"];


/* BUSCAR O VEICULO */

if ($categoria == "comuns") {

    $sql = "SELECT * FROM comuns WHERE id = ?";

} elseif ($categoria == "empresariais") {

    $sql = "SELECT * FROM empresariais WHERE id = ?";
}

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$query = mysqli_stmt_get_result($stmt);

$veiculo = mysqli_fetch_assoc($query);


/* ATUALIZAR O VEICULO */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = $_POST["data"];
    $placa = $_POST["placa"];
    $modelo = $_POST["modelo"];
    $valor = $_POST["valor"];


    if ($categoria == "comuns") {

        $pagamento = $_POST["pagamento"];

        $sql = "UPDATE comuns
                SET data = ?, placa = ?, modelo = ?, valor = ?, pagamento = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sssdsi",
            $data,
            $placa,
            $modelo,
            $valor,
            $pagamento,
            $id
        );

    } elseif ($categoria == "empresariais") {

        $km = $_POST["km"];
        $porte = $_POST["porte"];

        $sql = "UPDATE empresariais
                SET data = ?, placa = ?, modelo = ?, valor = ?, km = ?, porte = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sssdisi",
            $data,
            $placa,
            $modelo,
            $valor,
            $km,
            $porte,
            $id
        );
    }


    mysqli_stmt_execute($stmt);

    header("Location: cadastrados.php?categoria=" . $categoria);

    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LavaRapido - Editar</title>

</head>

<body>

    <main>

        <h1>Editar veiculo</h1>

        <form method="post">

            <label>DATA:</label>

            <input
                type="date"
                name="data"
                value="<?php echo $veiculo["data"]; ?>"
                required
            >

            <br><br>


            <label>PLACA:</label>

            <input
                type="text"
                name="placa"
                value="<?php echo $veiculo["placa"]; ?>"
                oninput="value = this.value.toUpperCase()"
                required
            >

            <br><br>


            <label>MODELO:</label>

            <input
                type="text"
                name="modelo"
                value="<?php echo $veiculo["modelo"]; ?>"
                oninput="value = this.value.toUpperCase()"
                required
            >

            <br><br>


            <label>VALOR:</label>

            <input
                type="number"
                name="valor"
                value="<?php echo $veiculo["valor"]; ?>"
                required
            >

            <br><br>


            <?php if ($categoria == "comuns") { ?>

                <label>PAGAMENTO:</label>

                <input
                    type="text"
                    name="pagamento"
                    value="<?php echo $veiculo["pagamento"]; ?>"
                    required
                >

                <br><br>

            <?php } ?>


            <?php if ($categoria == "empresariais") { ?>

                <label>KM:</label>

                <input
                    type="number"
                    name="km"
                    value="<?php echo $veiculo["km"]; ?>"
                    required
                >

                <br><br>


                <label>PORTE:</label>

                <select name="porte" required>

                    <option value="pequeno"
                        <?php
                        if ($veiculo["porte"] == "pequeno") {
                            echo "selected";
                        }
                        ?>>
                        Pequeno
                    </option>

                    <option value="grande"
                        <?php
                        if ($veiculo["porte"] == "grande") {
                            echo "selected";
                        }
                        ?>>
                        Grande
                    </option>

                    <option value="maquina"
                        <?php
                        if ($veiculo["porte"] == "maquina") {
                            echo "selected";
                        }
                        ?>>
                        Maquina
                    </option>

                </select>

                <br><br>

            <?php } ?>


            <button type="submit">
                Salvar 
            </button>

        </form>

    </main>

</body>

</html>