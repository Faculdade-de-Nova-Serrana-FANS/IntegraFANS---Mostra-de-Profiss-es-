<?php
include("conexao.php");

$nome = $_POST['nome'];
$idade = $_POST['idade'];
//$telefone = $_POST['telefone'];
$telefone = $_POST['telefone'] ?? null;
$email = $_POST['email'];
$curso = $_POST['curso'];
$outro = $_POST['outro'];

// Verificar se o e-mail já existe
$sql_check = "SELECT * FROM inscricoes WHERE email = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h3 style='color:red;'>Este e-mail já foi cadastrado!</h3>";
} else {
    $sql = "INSERT INTO inscricoes (nome, idade, telefone, email, curso, outro)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissss", $nome, $idade, $telefone, $email, $curso, $outro);

    if ($stmt->execute()) {
        echo "<h3 style='color:green;'>Cadastro realizado com sucesso!</h3>";
    } else {
        echo "Erro: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
