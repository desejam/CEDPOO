<?php
include('config.php'); // Inclua a conexão com o banco de dados

// Verificar se o formulário foi enviado
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $id_paciente = $_POST['id_paciente'];
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
    $psicologo = $_POST['psicologo'];
    $pix = $_POST['pix'];

    // Atualizar os dados do paciente no banco de dados
    $sql = "UPDATE paciente SET nome = '$nome', datanasc = '$datanasc', escola = '$escola', serie = '$serie', diagnostico = '$diagnostico', responsavel = '$responsavel', mensalidade = '$mensalidade', pagamentos = '$pagamentos', consultas = '$consultas', relatorio = '$relatorio', cpf = '$cpf', senha = '$senha', dia = '$dia', horario = '$horario', psicologo = '$psicologo', pix = '$pix' WHERE id_paciente = $id_paciente";

    if($conn->query($sql) === TRUE) {
        echo "Dados do paciente atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }
} else {
    echo "Método de solicitação inválido.";
}

$conn->close();
?>
