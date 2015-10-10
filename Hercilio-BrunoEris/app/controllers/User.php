<?php
class User extends Manipulator{
    public $_name;
    public $_email;
    public $_telephone;
    public $_password;
    public $_passConfirmation;
    public $_validations;

    public function __construct($name, $email, $telephone, $password, $passConfirmation){
        $this->_name = $name;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_password = $password;
        $this->_passConfirmation = $passConfirmation;
    }
}
?>
