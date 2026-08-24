<?php 

require "config/database.php";

// Criar banco
$sql = "CREATE DATABASE IF NOT EXISTS lavarapido";
mysqli_query($conn, $sql);

// Selecionar banco
mysqli_select_db($conn, "lavarapido");

// Criar tabela veiculos comuns
$sql = "CREATE TABLE IF NOT EXISTS comuns(
	id int AUTO_INCREMENT PRIMARY KEY,
    data date,
    placa varchar(10),
    modelo varchar(100),
    valor double,
    pagamento varchar(30)
    
)";

mysqli_query($conn, $sql);

// Criar tabela veiculos empresarias
$sql = "CREATE TABLE IF NOT EXISTS empresariais(
	id int AUTO_INCREMENT PRIMARY KEY,
    data date,
    placa varchar(10),
    modelo varchar(100),
    valor double,
    km int,
    porte varchar(30)
)";

mysqli_query($conn, $sql);

// Criar tabela usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id int AUTO_INCREMENTE PRIMARY KEY,
    nome varchar(30),
    senha varchar(30)
)";

mysqli_query($conn, $sql);

header("location: login")

?>