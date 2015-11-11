<?php
    
    include "../conexaoBanco.php";

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $extvocal = $_POST['extvocal'];
    
    $sql = mysql_query("insert into membros(nome,fone,endereco,idade,ex_vocal)values('$nome','$telefone','$endereco','$idade','$extvocal')");

    if($sql){
        header("Location: listar.php");
    }else{
        echo "Não foi possível efetuar o cadastro";
    }





/*
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('gdsw_projeto');
$query_select = "SELECT nome FROM membros WHERE nome = '".$nome."'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['nome'];

$sql = mysql_query("INSERT INTO membros (nome,telefone,idade,ex_vocal,endereco) VALUES ('$nome','$telefone','$idade','$extvocal','$endereco')");

if($idade == "" || $idade == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo idade deve ser preenchido');window.location.href='cadastromembros.html';</script>";
}
if($extvocal == "" || $extvocal == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo extvocal deve ser preenchido');window.location.href='cadastromembros.html';</script>";
}
    if($nome == "" || $nome == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo nome deve ser preenchido');window.location.href='cadastromembros.html';</script>";
 
        }else{
            if($logarray == $nome){
 
                echo"<script language='javascript' type='text/javascript'>alert('Esse nome já existe');window.location.href='cadastromembros.html';</script>";
                die();
 
            }else{
				$sql = mysql_query("INSERT INTO membros (nome,telefone,idade,ex_vocal,endereco) VALUES ('$nome','$telefone','$idade','$extvocal','$endereco')");
                   
                if($sql){
                    echo"<script language='javascript' type='text/javascript'>alert('Membro cadastrado com sucesso!');window.location.href='login.php'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse membro');window.location.href='cadastromembros.html'</script>";
                }
            }
        }
        */
?>




