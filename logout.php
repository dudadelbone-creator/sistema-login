<?php
// logout.php - Encerra a sessão

session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sair</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>👋 Você saiu do sistema.</h2>
        <p>Sua sessão foi encerrada com segurança.</p>
        <a href="login.html">Fazer login novamente</a>
    </div>
</body>
</html>
