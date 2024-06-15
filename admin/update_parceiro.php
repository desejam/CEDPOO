<?php
include('config.php'); // Inclua a conexão com o banco de dados

// Verificar se o formulário foi enviado
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $id_parceiro = $_POST['id_parceiro'];
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $especialidade = $_POST['especialidade'];
    $assistidos = $_POST['assistidos'];
    $agenda = $_POST['agenda'];
    $folha_recebidos = $_POST['folha_recebidos'];

    // Atualizar os dados do paciente no banco de dados
    $sql = "UPDATE parceiro SET cnpj = '$cnpj', nome = '$nome', senha = '$senha', especialidade = '$especialidade', assistidos = '$assistidos', agenda = '$agenda', folha_recebidos = '$folha_recebidos' WHERE id_parceiro = $id_parceiro";

    if($conn->query($sql) === TRUE) {
        echo "Dados do parceiro atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }
} else {
    echo "Método de solicitação inválido.";
}

$conn->close();
?>
