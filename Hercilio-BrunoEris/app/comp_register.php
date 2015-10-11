<?php include_once("controllers/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="assets/css/signin.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Registre-se</h1>
      <form class="form-signin" method="post" action="">
          <input type="text" maxlength="255" name="compname" placeholder="Nome da empresa" required autofocus>
          <input type="text" maxlength="14" name="cnpj" placeholder="CNPJ" required>
          <input id="latInput" type="hidden" name="lat" value="">
          <input id="lngInput" type="hidden" name="lng" value="">
          <input type="email" maxlength="255" name="email" placeholder="E-mail" required>
          <input type="text" maxlength="11" name="telephone" placeholder="Telefone" required>
          <input type="password" maxlength="45" name="password" placeholder="Senha" required>
          <input type="password" maxlength="45" name="password_confirm" placeholder="Confirme a Senha" required>
          <button type="submit">Cadastrar</button>
      </form>
    </div>
    <div id="map" style="max-width:500px;height:300px;margin:auto;"></div> <!-- CSS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBPlkMMoM8tjnpx5CE_uq0LkWII8Poc0w&callback=initMap"async defer></script>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/map_signup.js"></script>
  </body>
</html>
