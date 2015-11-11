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
    <title>Sistema Redenção</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../bootstrap/css/estilos.css">
<link rel="stylesheet" href="css.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="js.js" type="text/javascript"></script>

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
            <li class="active"><a href="listar.php">Membros</a></li>
            <li><a href="../agenda/agenda.php">Agenda</a></li>
            <li><a href="galeriafotos/galeriafotos.php">Galeria de Fotos</a></li>
            <li><a href="../logout.php">Sair</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      
	  <div class="container tema">
       
		<?php
			include "../funcoes.php";
			
			exibirUsuariosBanco();
			
		?>
		
		<div class="btn btn-default" id="butao" onclick="mostrar()">
				<h5 id="demo">Cadastrar Membro</h5>
			</div>		
		
          <br><br>
          
      <div class="exibe" id="teste" >

		<form class="form-horizontal" method="POST" action="cadastromembros.php">
		<div class="form-group">
            <label for="Nome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="nome" id="Nome" placeholder="Nome">
        </div>
        </div>
        
        <div class="form-group">
            <label for="Telefone" class="col-sm-2 control-label">Telefone</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="telefone" id="Telefone" placeholder="9 Dígitos">
        </div>
        </div>    
        
        <div class="form-group">
            <label for="Endereço" class="col-sm-2 control-label">Endereço</label>
        <div class="col-sm-2">
        <input type="text" class="form-control" name="endereco" id="Endereço" placeholder="Endereço">
        </div>
        </div>    
            
        <div class="form-group">
            <label for="Idade" class="col-sm-2 control-label">Idade</label>
        <div class="col-sm-1">
            <input type="text" class="form-control" name="idade" id="idade" placeholder="Idade">
        </div>
        </div>
            
            
        <div class="form-group">
            <label for="Extensao vocal" class="col-sm-2 control-label">Extensão vocal</label>
        <div class="col-sm-2">
            <select  class="form-control" name="extvocal"><br>
			<option class="form-control" value="1">Soprano</option>
			<option class="form-control" value="2">Contralto</option>
			<option class="form-control" value="3">Baixo</option>
			<option class="form-control" value="4">Tenor</option>
		</select>
        </div>
        </div>
            
		<input class="btn btn-default" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
		
		</form>
		
      </div>
	  
	  
	  
	  
	  </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>