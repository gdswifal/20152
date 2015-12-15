<?php
include("seguranca.php");
protegePagina();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistema Redenção</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Coral Jovem Redenção</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Início</a></li>
            <li><a href="membros/listar.php">Membros</a></li>
            <li><a href="agenda/agenda.php">Agenda</a></li>
            <li><a href="galeriafotos/galeriafotos.php">Galeria de Fotos</a></li>
            <li><a href="logout.php">Sair</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      <div class="container tema">
      
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bem Vindo!</h1>
        <p>Você está usando o Sistema Redenção, esperamos que tenha uma ótima opinião sobre ele!</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Acesse nosso blog!</h2>
          <p>Para acompanhar ainda mais de perto e ainda poder ser edificado pelas maravilhosas postagens que compartilhamos no nosso blog, não deixe de acessá-lo! </p>
          <p><a class="btn btn-default" href="https://coraljovemredencao.wordpress.com" role="button">Clique aqui! &raquo;</a></p>
        </div>
        <div class="col-md-6">
          <h2>Acompanhe-nos no Facebook!</h2>
          <p>Curta nossa página no facebook para continuar nos ajudando a crescer e a honrar cada vez mais o nome do Senhor. </p>
          <p><a class="btn btn-default" href="https://www.facebook.com/Coral-Jovem-Reden%C3%A7%C3%A3o-395881690584817/?fref=ts" role="button">Clique aqui! &raquo;</a></p>
       </div>
        </div>
      <hr>
      
      <footer>
        <p>&copy; Projetado por LUCAS GABRIEL - BRUNO ANTONELLY</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>