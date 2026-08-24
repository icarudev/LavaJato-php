<?php 

require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = $_POST["data"];
    $placa = $_POST["placa"];
    $modelo = $_POST["modelo"];
    $valor = $_POST["valor"];
    $km = $_POST["km"];
    $porte = $_POST["porte"];

    $sql = "INSERT INTO empresariais (data, placa, modelo, valor, km, porte) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssdis",
        $data,
        $placa,
        $modelo,
        $valor,
        $km,
        $porte
    );

    mysqli_stmt_execute($stmt);

    header("location: cadastrar.php");

    exit;
}

?>

<form method="post">
    <label>DATA: </label> <br>
    <input type="date" name="data" required> <br> <br>

    <label>PLACA: </label> <br> 
    <input type="text" name="placa" oninput="value = this.value.toUpperCase()" required> <br> <br>

    <label>MODELO: </label> <br>
    <input type="text" name="modelo" oninput="value = this.value.toUpperCase()" required> <br> <br>

    <label>VALOR: </label> <br>
    <input type="number" name="valor" required> <br> <br>

    <label>KM: </label> <br>
    <input type="number" name="km" required> <br> <br>

    <select name="porte" required>

        <option value="">Selecione o porte: </option>
        <option value="pequeno">Pequeno</option>
        <option value="grande">Grande</option>
        <option value="maquina">Maquina</option>
    </select>
    <br> <br>
    <button class="btn btn-primary btn-xl ">Enviar cadastro</button>
</form>
