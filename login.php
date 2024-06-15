<?php
session_start(); // Iniciar a sessão

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

// Função para verificar login e retornar o tipo de usuário e ID
function checkLogin($conn, $cpf_cnpj, $senha) {
    // Preparar a consulta SQL para verificar na tabela paciente
    $stmt = $conn->prepare("SELECT id_paciente FROM paciente WHERE cpf = ? AND senha = ?");
    $stmt->bind_param("ss", $cpf_cnpj, $senha);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_paciente);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        return ["tipo" => "paciente", "id" => $id_paciente];
    }

    // Preparar a consulta SQL para verificar na tabela parceiro
    $stmt = $conn->prepare("SELECT id_parceiro FROM parceiro WHERE cnpj = ? AND senha = ?");
    $stmt->bind_param("ss", $cpf_cnpj, $senha);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_parceiro);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        return ["tipo" => "parceiro", "id" => $id_parceiro];
    }

    // Preparar a consulta SQL para verificar na tabela admin
    $stmt = $conn->prepare("SELECT id_admin FROM admin WHERE cpf = ? AND senha = ?");
    $stmt->bind_param("ss", $cpf_cnpj, $senha);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_admin);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        return ["tipo" => "admin", "id" => $id_admin];
    }

    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf_cnpj = $_POST['cpf'];
    $senha = $_POST['password'];

    $user = checkLogin($conn, $cpf_cnpj, $senha);

    if ($user) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $user['tipo'];
        
        // Redirecionar para o dashboard apropriado
        if ($user['tipo'] == 'paciente') {
            header("Location: /paciente");
        } else if ($user['tipo'] == 'parceiro') {
            header("Location: /parceiro");
        } else if ($user['tipo'] == 'admin') {
            header("Location: /admin");
        }
        exit();
    } else {
        // Falha no login
        echo "CPF/CNPJ ou senha incorretos.";
    }
}

$conn->close();
?>
