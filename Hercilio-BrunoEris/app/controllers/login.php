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
        $result = $person->loginUser($person->_email, $person->_password);
        if($result == true){
            session_start();
        	$_SESSION['name'] = $person->_name;
        	$_SESSION['email'] = $person->_email;
        	$_SESSION['telephone'] = $person->_telephone;
        	$_SESSION['hora'] = date("H:i");
        	$_SESSION['logged'] = true;
            header('location: user_main.php');
        }
        else{
            $_GET['status'] = "77726f6e6720757365726e616d65206f722070617373776f7264";
        }
    }
    if(isset($_POST['compemail'])){
        $company = new Company("", "", $_POST['compemail'], "", $_POST['password'], "", "");
        $result = $company->loginCompany($company->_email, $company->_password);
        if($result == 1){
        	$_SESSION['name'] = $company->_name;
        	$_SESSION['location'] = $company->_location;
        	$_SESSION['email'] = $company->_email;
        	$_SESSION['telephone'] = $company->_telephone;
        	$_SESSION['cnpj'] = $company->_cnpj;
        	$_SESSION['address'] = $company->_address;
        	$_SESSION['hora'] = date("H:i");
        	$_SESSION['logged'] = true;
            header('location: TODO.php');
        }
    }
}
?>
