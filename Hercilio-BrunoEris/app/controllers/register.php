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
        $validation[] = $person->checkPass($person->_password, $_POST['password_confirm']);
        $validation[] = $person->checkPhone($person->_telephone);
        $validation[] = $person->checkEmail($person->_email);
        $validation[] = $person->checkName($person->_name);
        if (!in_array(0, $validation)) { //Check if some function returned 0
            $registerResult = $person->registerUser($person->_name, $person->_email, $person->_telephone, $person->_password);
            if($registerResult == true || $_FILES['image']['error'] == 4){
                $person->uploadFile($_FILES['image'], $_POST['MAX_FILE_SIZE']);
            }
        }
    }
    if(isset($_POST['compname'])){
        if($_POST['lat'] != "" && $_POST['lng'] != "" && $_POST['address'] != ""){
            $location = "".$_POST['lat']." ".$_POST['lng']."";
            $company = new Company($_POST['compname'], $location, $_POST['email'], $_POST['telephone'], $_POST['password'], $_POST['cnpj'], $_POST['address']);
            $company->checkPass($company->_password, $_POST['password_confirm']);
            $company->checkPhone($company->_telephone, $company->_validations);
            $company->checkEmail($company->_email, $company->_validations);
            $company->checkName($company->_name, $company->_validations);
            $company->checkCNPJ($company->_cnpj, $company->_validations);
            $company->checkAddress($company->_address, $company->_validations);
            $company->companyCheckValidations($company->_validations);
            $company->registerCompany($company->_name, $company->_location, $company->_email, $company->_telephone, $company->_password, $company->_cnpj, $company->_address, $company->_validations);
            $company->uploadFile($_FILES['image'], $_POST['MAX_FILE_SIZE']);
        }
        else{
            echo "Escolha o local de sua empresa no mapa.";
        }
    }
}
?>
