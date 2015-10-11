<?php
class User extends Manipulator{
    public $_name;
    public $_email;
    public $_telephone;
    public $_password;
    public $_validations = array(false,false,false,false);

    public function __construct($name, $email, $telephone, $password){
        $this->_name = $name;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_password = $password;
    }
}
?>
