<?php 

session_start();

if (isset($_SESSION["logado"])){
    header("Location: cadastrados.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    if ($nome == "admin" && $senha == "11"){

        $_SESSION["logado"] = true;

        header("Location: cadastrados.php");
        
        exit;

    } else {
        echo "Nome ou senha incorretos !";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LavaRapido - Login </title>

    <style>
        body {
            background-color: #07152B;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
            }

        form {
            background-color: white;
            padding: 4rem;
            border-radius: 10px;
        }

    </style>

</head>
<body>
    
<main>
    <section>
        <form method="post">

        <h3>LavaRapido - Login</h3> <br> <br>

        <label>NOME: </label>
        <input type="text" name="nome" required> <br> <br>

        <label>SENHA: </label>
        <input type="password" name="senha" required> <br> <br>

        <button>Entrar</button>
        </form>
    </section>
</main>


</body>
</html>