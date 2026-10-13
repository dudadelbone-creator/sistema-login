<?php
// painel.php - Página de boas-vindas

session_start();

// Protege a página
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$nivelAcesso = $_SESSION['nivel_acesso'] ?? 'aluno';
$dataLogin = htmlspecialchars($_SESSION['data_login'] ?? 'Indisponível', ENT_QUOTES, 'UTF-8');
$mensagem = $nivelAcesso === 'admin'
    ? 'Você tem acesso administrativo ao sistema.'
    : 'Acesse as atividades e os recursos disponíveis para alunos.';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>
        <p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="detalhe">Nível de acesso: <strong><?php echo htmlspecialchars($nivelAcesso, ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <p class="detalhe">Data do login: <strong><?php echo $dataLogin; ?></strong></p>

        <nav class="acoes">
            <?php if ($nivelAcesso === 'admin'): ?>
                <a href="perfil.php">Acessar perfil administrativo</a>
            <?php endif; ?>
            <a href="logout.php">Sair do sistema</a>
        </nav>
    </div>
</body>
</html>
