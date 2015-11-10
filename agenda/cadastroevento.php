<?php
    
    include "../conexaoBanco.php";

    $descricao = $_POST['descricao'];
    $hora = $_POST['hora'];
    $data = $_POST['data'];
    $local = $_POST['local'];
    $tipoevento = $_POST['tipoevento'];
    
    $sql = mysql_query("insert into eventos(descricao,hora,data,local,tipo)values('$descricao','$hora','$data','$local','$tipoevento')");

    if($sql){
        header("Location: agenda.php");
    }else{
        echo "Não foi possível efetuar o cadastro";
    }