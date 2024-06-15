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
    $nome = $_POST['nome'];
    $datanasc = $_POST['datanasc'];
    $escola = $_POST['escola'];
    $serie = $_POST['serie'];
    $diagnostico = $_POST['diagnostico'];
    $responsavel = $_POST['responsavel'];
    $mensalidade = $_POST['mensalidade'];
    $pagamentos = $_POST['pagamentos'];
    $consultas = $_POST['consultas'];
    $relatorio = $_POST['relatorio'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];
    $pix = $_POST['pix'];

    // Preparar e executar a inserção no banco de dados
    $stmt = $conn->prepare("INSERT INTO paciente (nome, datanasc, escola, serie, diagnostico, responsavel, mensalidade, pagamentos, consultas, relatorio, cpf, senha, dia, horario, pix) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdssssssss", $nome, $datanasc, $escola, $serie, $diagnostico, $responsavel, $mensalidade, $pagamentos, $consultas, $relatorio, $cpf, $senha, $dia, $horario, $pix);

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
