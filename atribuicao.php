<?php
session_start();

// Inicializa o saldo se não estiver definido
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 0.00; // Saldo inicial para visualização
}

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['acao']) && $_POST['acao'] == 'zerar') {
        $_SESSION['saldo'] = 0.00; // Reseta o saldo para o valor inicial
    } 
    else {
        $operacao = $_POST['operacao'];
        $valor = floatval($_POST['valor']);

        // Atualiza o saldo com base na operação
        if ($operacao == 'deposito') {
            $_SESSION['saldo'] += $valor; // Adiciona o valor ao saldo
        }
        if($operacao == 'saque') {
            $_SESSION['saldo'] -= $valor;
        }
        if($operacao == 'creditos_sociais') {
            if($valor<2 && $valor>=1){
                $valorCorrigido = $valor**2;
                $_SESSION['saldo'] *= $valorCorrigido;
            }
            if($valor<1 && $valor>=0){
                $valorCorrigido = $valor+1;
                $valorCorrigido = $valorCorrigido**0.5;
                $_SESSION['saldo'] *= $valorCorrigido;
            }
            else{
                $_SESSION['saldo'] *= $valor;
            }
        }
        if($operacao == 'debitos_sociais') {
            if($valor<2 && $valor>=1){
                $valorCorrigido = $valor**2;
                $_SESSION['saldo'] /= $valorCorrigido;
            }
            if($valor<1 && $valor>=0){
                $valorCorrigido = $valor+1;
                $valorCorrigido = $valorCorrigido**0.5;
                $_SESSION['saldo'] /= $valorCorrigido;
            }
            else{
                $_SESSION['saldo'] /= $valor;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Saldo Bancário</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and dependencies -->
    <script async defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script async defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script async defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Calculadora de Saldo Bancário</h2>

    <div class="alert alert-info mt-4">
        Saldo atual: R$ <?= number_format($_SESSION['saldo'], 2, ',', '.') ?>
    </div>

    <form method="post" action="" class="mt-4">
        <div class="form-group">
            <label for="operacao">Operação:</label>
            <select class="form-control" id="operacao" name="operacao" required>
                <option value="deposito">Depósito</option>
                <option value="saque">Saque</option>
                <option value="creditos_sociais">Depósito de créditos socias</option>
                <option value="debitos_sociais">Pagar débitos sociais</option>
            </select>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Executar Operação</button>
    </form>

    <form method="post" action="" class="mt-4">
        <input type="hidden" name="acao" value="zerar">
        <button type="submit" class="btn btn-danger">Zerar Conta</button>
    </form>
</div>
</body>
</html>
