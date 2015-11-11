function mostrarevento(){
	
    if(document.getElementById("mostrarevento").innerHTML == "Desativar Formulario"){
         esconder();
    } else {
       document.getElementById("eventos").style.display = "inline";
       document.getElementById("mostrarevento").innerHTML = "Desativar Formulario";
    
    
    }
}

function esconder(){
    document.getElementById("eventos").style.display = "none";
    document.getElementById("mostrarevento").innerHTML = "Cadastrar Eventos";    
}
