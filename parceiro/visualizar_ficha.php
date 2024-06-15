<?php
// Inicia a sessão
session_start();

// Conexão com o banco de dados
$conn = new mysqli("localhost", "seu_usuario", "sua_senha", "seu_banco_de_dados");

// Verifica se há erros na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o ID do paciente a partir da URL
$id_paciente = $_GET['id'];

// Consulta SQL para obter os detalhes do paciente
$sql = "SELECT * FROM paciente WHERE id_paciente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_paciente);
$stmt->execute();
$result = $stmt->get_result();

// Verificar se o paciente foi encontrado
if ($result->num_rows > 0) {
    $ficha = $result->fetch_assoc();
    echo "<h1>Ficha do Paciente: " . $ficha['nome'] . "</h1>";
    echo "<p>Idade: " . $ficha['idade'] . "</p>";
    echo "<p>Histórico: " . $ficha['historico'] . "</p>";
    // Adicione outros campos conforme necessário
} else {
    echo "Paciente não encontrado.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
