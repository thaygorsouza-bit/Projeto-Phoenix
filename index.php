<?php
session_start(); // 🔹 Essencial para usar sessões
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cpf'], $_POST['senha'])) {
    $cpf = $_POST['cpf'];
    $senha_digitada = $_POST['senha'];

    try {
        // Buscar usuário pelo CPF
        $sql = "SELECT senha FROM usuarios WHERE cpf = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cpf]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verifica senha
            if (password_verify($senha_digitada, $usuario['senha'])) {
                $_SESSION['cpf'] = $cpf; // 🔹 Salva CPF na sessão
                header("Location: pedido.php");
                exit;
            } else {
                $erro = 'CPF ou Senha incorretos.';
            }
        } else {
            $erro = 'CPF ou Senha incorretos.';
        }
    } catch (PDOException $e) {
        $erro = "Erro na consulta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>LOGIN</h2> 

<?php if (!empty($erro)) : ?>
    <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form action="index.php" method="POST"> 
    <label for="cpf">CPF</label>
    <input type="text" id="cpf" name="cpf" maxlength="11" minlength="11" pattern="\d{11}" required placeholder="Digite seu CPF sem pontos ou traços">

    <label for="senha">Senha:</label> 
    <input type="password" id="senha" name="senha" required> 

    <input type="submit" value="Login">
</form>

<form action="cadastro.php" method="get" class="button-form">
    <input type="submit" value="Cadastrar">
</form>
</div>
</body>
</html>