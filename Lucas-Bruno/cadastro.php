<?php

    include "conexaoBanco.php";
    include "funcoes.php";

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $campos = verificaCamposVazios($usuario,$senha);

    $mensagem = verificaUsuariosCadastrados($usuario);

    if($campos){
        if(!$mensagem){  
    $sql = mysql_query("insert into usuarios(usuario,senha,tipo)values('$usuario','$senha',1)");
        
    if($sql){
             echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.php'</script>";
    }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
    }     
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('$mensagem');window.location.href='cadastro.html'</script>";
        }
    }else{
        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
    }

?>




