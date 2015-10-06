<?php
    include_once("controllers/login.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen" charset="utf-8">
  </head>
  <body>
    <div class="container">
      <h1>Olá!</h1>
      <form class="form-signin" method="post" action="">
          <input type="email" name="email" placeholder="Usuário" required autofocus>
          <input type="password" name="password" placeholder="Senha" required>
          <button type="submit">Entrar</button>
          <a href="user_recover.php" title="Esqueci a senha">Esqueci a senha</a>
      </form>
    </div>

    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
