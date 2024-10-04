<?php
require_once('inc/topo.php');
require_once('inc/conexao.php');
require_once('classes/cupom.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cupom = new Cupom($_POST["cupom"], $_POST["desconto"], $_POST["tipoDesconto"], $conn);
    $cupom->insert();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cupom</title>
</head>
<body>
    <main>
        <form action="" method="post" name="form" enctype="multipart/form-data">
            <h1>Nome do cupom</h1>
            <input type="text" required="" name="cupom" id="cupom" class="form-control" value="">
            <h1>Desconto (valor ou percentual)</h1>
            <input type="text" required="" name="desconto" id="desconto" class="form-control" value="">
            <h1>Tipo de desconto</h1> 
            <select name="tipoDesconto" id="tipoDesconto" class="form-control">
                <option value="v">Desconto de valor</option>
                <option value="p">Desconto de percentual</option>
            </select>
            <button type="submit" class="btn btn-fill-out btn-block" name="register">Cadastar cupom</button>
        </form>
    </main>
</body>
</html>