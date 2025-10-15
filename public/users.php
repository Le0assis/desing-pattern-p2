<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileUserRepository;
use App\Application\UserService;
use App\Domain\UserValidator;

$repo = new FileUserRepository(__DIR__ . '/../storage/users.txt');
$validator = new UserValidator();
$service = new UserService($repo, $validator);
$users = $service->listAllUsers();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Usuários</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .tabela-usuarios-wrapper {
            max-width: 600px;
            margin: 40px auto 0 auto;
            padding: 30px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.10);
        }
        .tabela-usuarios-caption {
            font-size: 2em;
            color: #007bff;
            text-align: center;
            font-weight: bold;
            margin-bottom: 24px;
        }
        .tabela-usuarios {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
            font-size: 1em;
            background: #fafbff;
        }
        .tabela-usuarios th, .tabela-usuarios td {
            padding: 14px 12px;
            border: 1px solid #e3e8ee;
            text-align: left;
        }
        .tabela-usuarios th {
            background: #007bff;
            color: #fff;
            font-size: 1.08em;
            font-weight: bold;
        }
        .tabela-usuarios tbody tr:nth-child(odd) {
            background: #f1f5fb;
        }
        .tabela-usuarios tbody tr:hover {
            background: #e3eefe;
        }
        .btn-voltar {
            display: inline-block;
            background: #28a745;
            color: #fff;
            text-align: center;
            font-weight: bold;
            border-radius: 6px;
            padding: 12px 28px;
            text-decoration: none;
            margin: 30px auto 0 auto;
            font-size: 1.08em;
            transition: background .2s;
        }
        .btn-voltar:hover {
            background: #218838;
        }
        .msg-vazia {
            padding: 12px; 
            background:#ffeeba; 
            color:#7c6308; 
            text-align:center; 
            border-radius:6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="tabela-usuarios-wrapper">
        <div class="tabela-usuarios-caption">Usuários cadastrados</div>
        <?php if (!empty($users)): ?>
            <table class="tabela-usuarios">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="msg-vazia">Nenhum usuário cadastrado.</div>
        <?php endif; ?>
        <div style="text-align: center;">
            <a class="btn-voltar" href="index.php">Voltar Menu</a>
        </div>
    </div>
</body>
</html>
