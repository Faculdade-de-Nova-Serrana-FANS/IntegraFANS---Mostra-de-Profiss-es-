<?php
$host = 'localhost';
$user = 'root';   // usuário do MySQL
$pass = '';       // senha do MySQL
$dbname = "fansdb";

// Criar conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
