<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Texto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Digite um comando</h1>
        <form method="post">
            <input type="command" name="input_text" placeholder="Digite aqui" required>
            <button type="submit">Enviar</button>
            <select name="terminal">
                <option value="cmd">
                        CMD
                </option>
                <option value="pws">
                    PowerShell
                </option>
            </select>
        </form>
        <div class="result">
            <?php
                // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //     if($_POST['terminal'] == "cmd"){
                //         $command = htmlspecialchars($_POST['input_text']);
                //         shell_exec($command);
                //     }
                //     if($_POST['terminal'] == "powershell") {
                //         $command = htmlspecialchars($_POST['input_text']);
                //         shell_exec("powershell.exe" + $command);
                //     }
                // }
            ?>
        </div>
    </div>
</body>
</html>
