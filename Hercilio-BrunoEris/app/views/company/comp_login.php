<?php include_once("../../controllers/login.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/signin.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/plugins/font-awesome/css/font-awesome.min.css">
  </head>
  <body id="start">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
               <div class="row">
                  <div class="col-md-4 text-center"></div>
                  <div class="col-md-4 text-center">
                    <h1><i class="fa fa fa-bicycle fa-5x "></i></h1>
                  </div>
                 <div class="col-md-4 text-center"></div>
               </div>
                <h1 class="form-signin-heading text-center text-shadow">Pão na Mão <small>Business</small></h1>
                <form class="form-signin text-center" action="" role="form" method="post">
                  <input type="email" name="compemail" class="form-control" placeholder="E-mail" required autofocus>
                  <input type="password" name="password" class="form-control" placeholder="Senha" required>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                  <a class="btn btn-sm btn-link" href="comp_recover.php" title="Esqueci a senha">Esqueci a senha</a><br><br>
                  <a class="btn btn-sm btn-default" href="comp_register.php">Cadastre-se</a><br>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
  </body>
</html>
