<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once("controllers/UserLogin.php");
    UserLogin($_POST['email'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
<body>
<form class="form-signin" method="post" action="">
    <input type="email" name="email" placeholder="Usuário" required autofocus>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Entrar</button>
    <a href="recover.php" title="Esqueci a senha">Esqueci a senha</a>
</form>
</body>
</html>
