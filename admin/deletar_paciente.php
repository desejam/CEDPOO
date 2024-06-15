<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ced";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o ID foi passado via URL
if (isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'paciente') {
    $id = $_GET['id'];

    // Prevenir SQL Injection
    $id = $conn->real_escape_string($id);

    // Deletar o paciente com o ID fornecido
    $sql = "DELETE FROM paciente WHERE id_paciente = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Paciente deletado com sucesso!";
    } else {
        echo "Erro ao deletar paciente: " . $conn->error;
    }
} else {
    echo "ID ou tipo inválido.";
}

// Fechar conexão
$conn->close();

// Redirecionar de volta para a página da lista de pacientes
header("Location: cadastro_total.php");
exit;
?>
