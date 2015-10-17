<?php include_once("../../controllers/session.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/signup.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/style.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/plugins/font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand brand-main" href="#">
              <span>Pão na Mão <img class="brand-pao" src="../../assets/img/bread-ico.png" alt="" /></span>
            </a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar" src="../../assets/img/avatar_default.png" alt="avatar" />
                    &nbsp Olá, <?php echo $_SESSION['name'];?>! <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Meus Pedidos</a></li>
                  <li><a href="#">Atualizar Dados</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="active"><a href="../../controllers/session.php?logout=true">Sair</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form user-search navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Padaria..">
              </div>
              <button type="submit" class="btn btn-sm btn-default">Pesquisar</button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div id="map" style="height:600px;margin:auto;"></div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script async defe src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBPlkMMoM8tjnpx5CE_uq0LkWII8Poc0w&callback=initialize"></script>
    <script src="../../assets/js/map_user_main.js"></script>
  </body>
</html>
