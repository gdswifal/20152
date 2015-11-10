<?php
include("../seguranca.php");
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
    <title>Sistema Redenção - Agenda</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../bootstrap/css/estilos.css">
<link rel="stylesheet" href="../bootstratp/css.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
            <li><a href="../index.php">Início</a></li>
            <li><a href="../membros/listar.php">Membros</a></li>
            <li class="active"><a href="agenda.php">Agenda</a></li>
            <li><a href="../galeriafotos/galeriafotos.php">Galeria de Fotos</a></li>
            <li><a href="logout.php">Sair</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      
	  <div class="container tema">
       
		<?php
			include "../funcoes.php";
			
			exibirUsuariosBancoAgenda();
			
		?>
		
		<div class="btn btn-default" id="butao" onclick="mostrarevento()">
				<h5>Cadastrar Evento</h5>
			</div>		
		<br><br>
      <div class="exibe" id="testeevento">
		
		<form method="POST" action="cadastroevento.php">
		
		<label>Descricao do evento:</label>
		<input type="text" name="descricao"><br>
		<label>Hora de início do evento:</label>
		<input type="text" name="hora"><br>
		<label>Data do evento (AAAA-MM-DD):</label>
		<input type="text" name="data"><br>
		<label>Local do evento:</label>
		<input type="text" name="local"><br>
		<label>Tipo do evento:</label>
		<select name="tipoevento"><br>
			<option value="1">Ensaio</option>
			<option value="2">Reunião</option>
			<option value="3">Evento Local</option>
			<option value="4">Evento Fora</option>
		</select><br>
		<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
		
		</form>
		
      </div>
	  
	  
	  
	  
	  </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>