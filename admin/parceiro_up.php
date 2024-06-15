<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ced";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $especialidade = $_POST['especialidade'];
    $assistidos = $_POST['assistidos'];
    $agenda = $_POST['agenda'];
    $folha_recebidos = $_POST['folha_recebidos'];

    // Preparar e executar a inserção no banco de dados
    $stmt = $conn->prepare("INSERT INTO parceiro (cnpj, nome, senha, especialidade, assistidos, agenda, folha_recebidos) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $cnpj, $nome, $senha, $especialidade, $assistidos, $agenda, $folha_recebidos);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
