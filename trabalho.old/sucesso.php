<?php
require_once('inc/topo.php');
session_start();
if(!isset($_SESSION['logged'])){
    header("Location: ./login.php");
 }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso</title>
    <style>
        main{
            display: grid;
            place-items: center;
            & h1{
                text-align: center;
                color: green;
            }
            & button{
                width: 10rem;
            }
        }
    </style>
    <script>
        function voltar(){
            window.location.href="/ifc/trabalho/index.php";
        }
    </script>
</head>
<body>
    <main>
        <h1>SUCESSO!</h1>
        <button onclick="voltar();">Página inicial</button>
    </main>
</body>
</html>