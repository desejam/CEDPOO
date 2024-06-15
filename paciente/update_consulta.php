<?php
session_start();

// Verifica se o usuário está logado e é um paciente
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'paciente') {
    // Redirecionar para a página de login se não estiver logado ou não for um paciente
    header("Location: index.html");
    exit();
}

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ced";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Atualizar dados do paciente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];
    $psicologo = $_POST['psicologo'];

    $stmt = $conn->prepare("UPDATE paciente SET dia = ?, horario = ?, psicologo = ? WHERE id_paciente = ?");
    $stmt->bind_param("sssi", $dia, $horario, $psicologo, $user_id);

    if ($stmt->execute()) {
        // Redireciona de volta para a página de marcação de consulta com mensagem de sucesso
        header("Location: marcar_consulta.php?sucesso=true");
        exit();
    } else {
        echo "Erro ao atualizar os dados: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>