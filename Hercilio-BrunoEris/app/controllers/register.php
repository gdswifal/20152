<?php
include_once("DBConnect.php");
/* Requests classes on demand */
function autoload ($Class) {
    include(__DIR__ . "/" . $Class . ".php");
}
spl_autoload_register("autoload");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username'])){
        $person = new User($_POST['username'], $_POST['email'], $_POST['telephone'], $_POST['password']);
        $person->checkPass($person->_password, $_POST['password_confirm']);
        $person->checkPhone($person->_telephone, $person->_validations);
        $person->checkEmail($person->_email, $person->_validations);
        $person->checkName($person->_name, $person->_validations);
        $person->userCheckValidations($person->_validations);
        $person->registerUser($person->_name, $person->_email, $person->_telephone, $person->_password, $person->_validations);
    }
    if(isset($_POST['compname'])){
        if($_POST['lat'] != "" && $_POST['lng'] != ""){
            $location = "".$_POST['lat']." ".$_POST['lng'].""; //Pattern GeomFromText('POINT(% %)',0)
            $company = new Company($_POST['compname'], $location, $_POST['email'], $_POST['telephone'], $_POST['password'], $_POST['cnpj']);
            $company->checkPass($company->_password, $_POST['password_confirm']);
            $company->checkPhone($company->_telephone, $company->_validations);
            $company->checkEmail($company->_email, $company->_validations);
            $company->checkName($company->_name, $company->_validations);
            $company->checkCNPJ($company->_cnpj, $company->_validations);
            $company->companyCheckValidations($company->_validations);
            $company->registerCompany($company->_name, $company->_location, $company->_email, $company->_telephone, $company->_password, $company->_cnpj, $company->_validations);
        }
        else{
            echo "Escolha o local de sua empresa no mapa.";
        }
    }
}
?>
