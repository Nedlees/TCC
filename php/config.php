<?php 

session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "PetFinder";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conecão falhou: ". $conn->connect_error);
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit();
}