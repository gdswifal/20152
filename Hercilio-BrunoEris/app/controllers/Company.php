<?php
class Company extends Manipulator{
    public $_name;
    public $_location;
    public $_email;
    public $_telephone;
    public $_password;
    public $_passConfirmation;
    public $_cnpj;
    public $_validations;

    public function __construct($name, $location, $email, $telephone, $password, $passConfirmation, $cnpj){
        $this->_name = $name;
        $this->_location = $location;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_password = $password;
        $this->_passConfirmation = $passConfirmation;
        $this->_cnpj = $cnpj;
    }
}
?>