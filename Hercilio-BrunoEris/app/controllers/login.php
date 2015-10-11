<?php
include_once("DBConnect.php");
/* Requests classes on demand */
function autoload ($Class) {
    include(__DIR__ . "/" . $Class . ".php");
}
spl_autoload_register("autoload");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['useremail'])){
        $person = new User("", $_POST['useremail'], "", $_POST['password'], "", "");
        $person->loginUser($person->_email, $person->_password);
        //Enviar usuário para seu painel de controle
    }
    if(isset($_POST['compemail'])){
        $company = new Company("", "", $_POST['compemail'], "", $_POST['password'], "", "");
        $company->loginCompany($company->_email, $company->_password);
        //Enviar empresa para seu painel de controle
    }
}
?>
