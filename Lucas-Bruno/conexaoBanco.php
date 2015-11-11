<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "gdswprojeto";
    
    $conexao = mysql_connect($host,$usuario,$senha);

    if(!$conexao){
        die('Nao foi possivel conectar ao Banco!'. mysql_error());    
    }

    $bancodedados = mysql_select_db('gdswprojeto',$conexao);
    
    if(!$bancodedados){
    die('Nao foi possivel Estabelecer Conexao com o banco de dados'. mysql_error());
    }

?>