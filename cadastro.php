<!DOCTYPE html> 
<html lang="pt-br"> 
<head>
<meta charset="UTF-8"> 
<title>Formulário de Cadastro</title>
<link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container"> 
<h2>Cadastro de Usuário</h2> 
<form action="salvar.php" method="POST"> 
<label for="nome">Nome:</label> 

<input type="text" id="nome" name="nome" required> 
<label for="cpf">CPF:</label>
<input type="text" id="cpf" name="cpf" maxlength="11" minlength="11" pattern="\d{11}" required placeholder="Digite seu CPF sem pontos ou traços">
<label for="email">E-mail:</label>
<input type="email" id="email" name="email" required> 
<label for="rua">Rua:</label>
<input type="text" id="rua" name="rua" required>

<label for="numero">Número:</label>
<input type="text" id="numero" name="numero" required>

<label for="cidade">Cidade:</label>
<input type="text" id="cidade" name="cidade" required>

<label for="estado">Estado:</label>
<input type="text" id="estado" name="estado" maxlength="2" required>
<label for="estado">Senha:</label>
<input type="text" id="senha" name="senha" required>
<input type="submit" value="Cadastrar">
</form>
</div>
</body>
</html>