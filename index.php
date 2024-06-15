<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>CED - Centro Multidisciplinar</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/ced.svg" alt="Ilustração de compras">
        </div>
        <div class="form">
            <img class="logo" src="assets/img/ced.png" alt="Ilustração de compras">
            <form action="login.php" method="POST" id="login-form">
                <div class="form-header">
                    <div class="title">
                        <h1>Centro Multidisciplinar</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="cpf">CPF / CNPJ</label>
                        <input id="cpf" type="text" name="cpf" maxlength="18" placeholder="Digite seu CPF ou CNPJ" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Função para formatar o CPF/CNPJ e permitir apenas números
        function formatCPF_CNPJ(input) {
            // Remove todos os caracteres não numéricos
            var value = input.value.replace(/\D/g, '');

            // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
            if (value.length <= 11) {
                // Formata CPF (###.###.###-##)
                input.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            } else {
                // Formata CNPJ (##.###.###/####-##)
                input.value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            }
        }

        // Adiciona um listener para chamar a função de formatação quando o input muda
        var cpfInput = document.getElementById('cpf');
        cpfInput.addEventListener('input', function () {
            formatCPF_CNPJ(this);
        });
    </script>
</body>

</html>
