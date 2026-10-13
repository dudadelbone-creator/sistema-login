<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

if (($_SESSION['nivel_acesso'] ?? '') !== 'admin') {
    header('Location: painel.php');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil administrativo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container full">
        <h2>👤 Perfil administrativo</h2>
        <p>Olá, <?php echo $usuario; ?>. Esta página é acessível somente a administradores.</p>
        <nav class="acoes">
            <a href="painel.php">Voltar ao painel</a>
            <a href="logout.php">Sair do sistema</a>
        </nav>
    </main>
</body>
</html>
