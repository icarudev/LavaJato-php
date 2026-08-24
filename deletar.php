<?php 

require "config/database.php";
require "config/auth.php";

$id = $_GET["id"];
$categoria = $_GET["categoria"];

if ($categoria == "comuns"){
    $sql = "DELETE FROM comuns WHERE id = ?";
} else if ($categoria == "empresariais"){
    $sql = "DELETE FROM empresariais WHERE id = ?";
}

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
     "i",
     $id
     );

     mysqli_stmt_execute($stmt);

    header("location: cadastrados.php");

    exit;
?>