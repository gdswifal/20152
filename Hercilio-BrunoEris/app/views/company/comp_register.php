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
          <h1 class="text-center">Cadastro Empresa</h1><br>
          <form method="post" action="">
            <div class="form-group">
              <label for="exampleInputEmail1">Nome da Empresa</label>
              <input type="text" class="form-control" maxlength="255" name="compname" placeholder="Nome da empresa" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">CNPJ</label>
              <input type="text" class="form-control" maxlength="14" name="cnpj" placeholder="CNPJ" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço</label>
              <input id="endInput" type="text" class="form-control" maxlength="255" name="address" placeholder="Endereço completo" value="" required>
            </div>
            <div class="form-group">
              <input id="latInput" type="hidden" name="lat" value="">
              <input id="lngInput" type="hidden" name="lng" value="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" maxlength="255" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Telefone</label>
              <input type="text" class="form-control" maxlength="11" name="telephone" placeholder="Telefone" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" class="form-control" maxlength="45" name="password" placeholder="Senha" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Insira novamente sua senha</label>
              <input type="password" class="form-control" maxlength="45" name="password_confirm" placeholder="Confirme a Senha" required>
            </div>
            <div class="form-group">
              <div id="map" style="max-width:500px;height:300px;margin:auto;"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Escolha um arquivo</label>
              <input type="file" id="exampleInputFile">
            </div><br>
            <button type="submit" class="btn btn-default">Cadastrar</button>
          </form>
          <a type="submit" href="comp_login.php" class="btn btn-link">Voltar</a>
          <br>
        </div>
      </div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBPlkMMoM8tjnpx5CE_uq0LkWII8Poc0w&callback=initMap"async defer></script>
    <script src="../../assets/js/map_signup.js"></script>
  </body>
</html>
