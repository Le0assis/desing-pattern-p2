<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\UserService;
use App\Domain\UserValidator;
use App\Infra\FileUserRepository;

$file = __DIR__ . '/../storage/users.txt';

$service = new UserService(new FileUserRepository($file), new UserValidator);

$response = $service->register($_POST);
$httpCode = $response ? 201 : 422;

http_response_code($httpCode);
$mensagem = $response ? 'Usuário cadastrado com sucesso' : 'Falha no cadastro';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de usuários</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .card-msg {
            max-width: 400px;
            margin: 80px auto 0 auto;
            background: #fff;
            padding: 34px 28px 36px 28px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.10);
            text-align: center;
        }
        .card-msg .ok {
            color: #207e3a;
            font-size: 1.35em;
            font-weight: bold;
        }
        .card-msg .fail {
            color: #b71c1c;
            font-size: 1.25em;
            font-weight: bold;
        }
        .botoes-acao {
            margin-top: 24px;
            display: flex;
            gap: 14px;
            justify-content: center;
        }
        .btn-acesso {
            padding: 12px 24px;
            border-radius: 7px;
            background: #007bff;
            color: #fff;
            font-weight: 700;
            font-size: 1.03em;
            border: none;
            text-decoration: none;
            transition: background .2s;
            box-shadow: 0 1px 6px rgba(0,0,0,.04);
            cursor: pointer;
            display: inline-block;
        }
        .btn-acesso.voltar {
            background: #28a745;
        }
        .btn-acesso:hover {
            background: #0056b3;
        }
        .btn-acesso.voltar:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="card-msg">
        <div class="<?= $response ? 'ok' : 'fail' ?>">
            <?= htmlspecialchars($mensagem) ?>
        </div>
        <div class="botoes-acao">
            <a href="index.php" class="btn-acesso voltar">Voltar</a>
            <a href="users.php" class="btn-acesso">Listar usuários</a>
        </div>
    </div>
</body>
</html>
