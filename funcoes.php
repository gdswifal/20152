<?php
    
    include "conexaoBanco.php";
    
    @$remover = $_GET['remove'];
    
    if(empty($remover)){
    
    }else{
    echo $remover;
    
    remover($remover);
    
    }
    function remover($remover){
        $sql = mysql_query("delete from membros where id = '$remover'");
        header("Location: membros/listar.php");
    }
    
    @$eventoremover = $_GET['eventoremover'];
    
    if(empty($eventoremover)){
    
    }else{
    echo $eventoremover;
    
    remover($eventoremover);
    }
    function removerevento($eventoremover){
        $sql = mysql_query("delete from eventos where id = '$eventoremover'");
        header("Location: agenda/agenda.php");
    }

    function verificaUsuariosCadastrados($usuario){
        
        $query = mysql_query("select usuario from usuarios where usuario = '$usuario'");
        /*Se ele encontrar um usuario com o mesmo nome o valor de rows sera 1*/
        $rows = mysql_num_rows($query);
        
        if($rows == 1){
            return "Ja possui Usuario cadastrado com esse nome";
        }else{
            return false;
        }   
    }
    
    function verificaCamposVazios($usuario,$senha){
        
        $contador = 0;
        
        if(empty($usuario)){
            $contador++;
        }
        
        if(empty($senha)){
            $contador++;
        }
        
        if($contador == 0){
            return true;
        } else {
            return false;
        }   
    }

    function exibirUsuariosBanco(){
        
        $sql = mysql_query("select * from membros");
        $rows = mysql_num_rows($sql);
        
        echo "<table class='table table-striped'>";
        echo "<tr><th>Nome</th><th>Fone</th><th>Endereço</th><th>Idade</th><th>Extensao Vocal</th><th>Remover</th></tr>";
        for($i=0;$i<$rows;$i++){
            $registro = mysql_fetch_row($sql);
            echo "<tr><td>" . $registro[1]. "</td>";
            echo "<td>" . $registro[2]. "</td>";
            echo "<td>" . $registro[3]. "</td>";
            echo "<td>" . $registro[4]. "</td>";
            $tipo = mysql_query("select tipo from ext_vocal where id = '$registro[5]'");
            $result = mysql_result($tipo,0);
            echo "<td>" . $result. "</td>";
            echo "<td><a href=../funcoes.php?remove=$registro[0]>Remover</a></td></tr>";
        }
        echo "</table>";
    }

    function exibirUsuariosBancoAgenda(){
        
        $sql = mysql_query("select * from eventos");
        $rows = mysql_num_rows($sql);
        
        echo "<table class='table table-striped'>";
        echo "<tr><th>Descrição</th><th>Hora</th><th>Data</th><th>Local</th><th>Tipo do evento</th><th>Remover</th></tr>";
        for($i=0;$i<$rows;$i++){
            $registroevento = mysql_fetch_row($sql);
            echo "<tr><td>" . $registroevento[1]. "</td>";
            echo "<td>" . $registroevento[2]. "</td>";
            echo "<td>" . $registroevento[3]. "</td>";
            echo "<td>" . $registroevento[4]. "</td>";
            $tipoevento = mysql_query("select tipo from tipo_evento where id = '$registroevento[5]'");
            $resultevento = mysql_result($tipoevento,0);
            echo "<td>" . $resultevento. "</td>";
            echo "<td><a href=../funcoes.php?eventoremover=$registroevento[0]>Remover</a></td></tr>";
        }
        echo "</table>";
    }
?>