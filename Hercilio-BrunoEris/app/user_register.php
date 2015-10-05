<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once("controllers/UserRegister.php");
    UserLogin($_POST['name'], $_POST['email'], $_POST['telephone'], $_POST['password'], $_POST['password_confirm']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
<body>
<form class="form-signin" method="post" action="">
    <input type="text" maxlength="255" name="name" placeholder="Nome" required autofocus>
    <input type="email" maxlength="255" name="email" placeholder="E-mail" required autofocus>
    <input type="text" maxlength="11" name="telephone" placeholder="Telefone" required autofocus>
    <input type="password" name="password" placeholder="Senha" required>
    <input type="password" name="password_confirm" placeholder="Confirme a Senha" required>
    <button type="submit">Cadastrar</button>
</form>
</body>
</html>
