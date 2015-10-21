<?php
include_once("DBConnect.php");
/* Requests classes on demand */
function autoload ($Class) {
    include(__DIR__ . "/" . $Class . ".php");
}
spl_autoload_register("autoload");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['useremail'])){
        $person = new User("", $_POST['useremail'], "", "", "", "");
        $result = $person->recoverUser($person->_email);
        if($result == true){
            echo "Encontrado: ".$person->_email;
            $message = "Foi solicitada a recuperação de sua conta no Pão na Mão.<br>";
            $message .= "Para recuperar a sua senha, acesse o link: (trollface)";
            mail("$person->_email", "Recuperação de Senha", $message);
        }
        else{
            $_GET['status'] = "6e6f7420666f756e64";
        }
    }
    if(isset($_POST['compemail'])){
        $company = new Company("", "", $_POST['compemail'], "", $_POST['password'], "", "");
        $result = $company->loginCompany($company->_email, $company->_password);
        if($result == 1){
        }
    }
}
?>
