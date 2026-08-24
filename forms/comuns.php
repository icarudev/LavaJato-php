<?php 

require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = $_POST["data"];
    $placa = $_POST["placa"];
    $modelo = $_POST["modelo"];
    $valor = $_POST["valor"];
    $pagamento = $_POST["pagamento"] ?? "N/A";
    
    $sql = "INSERT INTO comuns(data, placa, modelo, valor, pagamento) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssds",
        $data,
        $placa,
        $modelo,
        $valor,
        $pagamento
    );

    mysqli_stmt_execute($stmt);

    header("location: cadastrar.php");

    exit;
}
?>

<form method="post">
    <label>DATA: </label> <br>
    <input type="date" name="data" required > <br> <br>

    <label>PLACA: </label> <br> 
    <input type="text" name="placa" oninput="value = this.value.toUpperCase()" required> <br> <br>

    <label>MODELO: </label> <br>
    <input type="text" name="modelo" oninput="value = this.value.toUpperCase()" required> <br> <br>

    <label>VALOR: </label> <br>
    <input type="number" name="valor" required > <br> <br>

    
    <fieldset>
        <legend>Forma de pagamento: </legend>

        <label><input type="radio" name="pagamento" value="PIX"> PIX</label>
        <label><input type="radio" name="pagamento" value="Cartao"> Cartao</label>
        <label><input type="radio" name="pagamento" value="Dinheiro"> Dinheiro</label>
        <label><input type="radio" name="pagamento" value="Fiado"> Fiado</label>

    </fieldset>

    <button class="btn btn-primary btn-xl p-2">Enviar cadastro</button>
</form>
