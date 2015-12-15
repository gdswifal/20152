function mostrar(){
	
    if(document.getElementById("demo").innerHTML == "Desativar Formulario"){
         esconder();
    } else {
       document.getElementById("teste").style.display = "inline";
       document.getElementById("demo").innerHTML = "Desativar Formulario";
    
    
    }
}

function esconder(){
    document.getElementById("teste").style.display = "none";
    document.getElementById("demo").innerHTML = "Cadastrar Membro";    
}