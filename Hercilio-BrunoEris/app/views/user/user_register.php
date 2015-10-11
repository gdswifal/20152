<?php include_once("../../controllers/register.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/signup.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/plugins/font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 container-signup-user">
          <h1 class="text-center">Registre-se</h1><br>
          <form method="post" action="">
            <div class="form-group">
              <label for="exampleInputEmail1">Nome Completo</label>
              <input type="text" class="form-control" maxlength="255" name="username" placeholder="Nome" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço de Email</label>
              <input type="email" class="form-control" maxlength="255" name="email" placeholder="E-mail" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Telefone</label>
              <input type="text" class="form-control" maxlength="11" name="telephone" placeholder="Telefone" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" class="form-control" name="password" placeholder="Senha" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Insira novamente sua senha</label>
              <input type="password" class="form-control" name="password_confirm" placeholder="Confirme a Senha" required>
            </div>
            <button type="submit" class="btn btn-default">Cadastrar</button>
          </form>
          <a type="submit" href="user_login.php" class="btn btn-link">Voltar</a>
          <br>
        </div>
      </div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
  </body>
</html>
