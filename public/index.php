<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de usuários</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Centraliza título */
        h1 {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin-top: 30px;
            color: #007bff;
            font-size: 2em;
            margin-bottom: 30px;
        }

        /* Formulário centralizado */
        .form-cadastro {
            font-family: 'Arial', sans-serif;
            max-width: 500px;
            margin: 0 auto 20px auto;
            padding: 24px 20px 16px 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.11);
            display: flex;
            flex-direction: column;
        }
        .form-cadastro label {
            font-family: 'Arial', sans-serif;
            margin-bottom: 15px;
            font-weight: 500;
            color: #111;
        }
        .form-cadastro input {
            font-family: 'Arial', sans-serif;
            margin-top: 8px;
            margin-bottom: 4px;
            padding: 8px 10px;
            border: 1px solid #dde1e4;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            font-size: 1em;
        }
        .form-cadastro button[type="submit"] {
            font-family: 'Arial', sans-serif;
            padding: 12px 16px;
            background-color: #007bff;
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 8px;
            transition: background .2s;
        }
        .form-cadastro button[type="submit"]:hover {
            background-color: #0056b3;
        }
        /* Botão de listar centralizado */
        .botao-listar {
            display: flex;
            justify-content: center;
            margin-top: 12px;
        }
        .botao-listar a {
            font-family: 'Arial', sans-serif;
            padding: 12px 32px;
            background: #28a745;
            color: white;
            border-radius: 6px;
            font-weight: 700;
            font-size: 1.1em;
            text-decoration: none;
            transition: background 0.2s;
        }
        .botao-listar a:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1>Cadastro de usuários</h1>
    <form action="register.php" method="POST" class="form-cadastro">
        <label>Nome<input name="name" required></label>
        <label>E-mail<input name="email" type="email" required></label>
        <label> Senha<input name="password" type="password" required></label>
        <button type="submit">Cadastrar</button>
    </form>

    <div class="botao-listar">
        <a href="users.php">Listar usuários</a>
    </div>
</body>
</html>
