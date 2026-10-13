<?php
session_start();

// Dados simulados (em produção: use banco de dados)
$usuarios = [
    'admin' => ['senha' => '12345', 'nivel_acesso' => 'admin'],
    'aluno' => ['senha' => '12345', 'nivel_acesso' => 'aluno'],
];

$usuario = $_POST['usuario'] ?? null;
$senha = $_POST['senha'] ?? null;

if (is_string($usuario) && is_string($senha)
    && isset($usuarios[$usuario])
    && $senha === $usuarios[$usuario]['senha']) {
    session_regenerate_id(true);
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nivel_acesso'] = $usuarios[$usuario]['nivel_acesso'];
    $_SESSION['data_login'] = date('d/m/Y H:i:s');

    header('Location: painel.php');
    exit;
} else {
    // Página de erro com estilo
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>❌ Login inválido!</h2>
            <p>Usuário ou senha incorretos.</p>
            <a href='login.html'>Tentar novamente</a>
        </div>
    </body>
    </html>";
}
?>