<?php
Class Manipulator{
    public function checkPass($password, $confirmation){
        if($password != $confirmation){
            return $_GET['status'] = "70617373776f72647320646f6e2774206d61746368";
        }elseif(strlen($password) > 46 || strlen($password) < 5){
            return $_GET['status'] = "6d696e6c656e6774682070617373776f7264";
        }else{
            $this->_validations[0] = true;
            return true;
        }
	}

    public function checkPhone($telephone, $autorization){
        if($autorization[0] === false){
            return false;
        }
        else{
            if(!is_numeric($telephone)){
                return $_GET['status'] = "70686f6e65206d7573742068617665206f6e6c79206e756d62657273";
            }
            elseif(strlen($telephone) < 10 || strlen($telephone) > 11){
                return $_GET['status'] = "6572726f722070686f6e65206c656e677468";
            }else{
                $this->_validations[1] = true;
                return true;
            }
        }
	}

    public function checkEmail($email, $autorization){
        if($autorization[0] === false || $autorization[1] === false){
            return false;
        }
        else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                global $_email;
                $_email = $email;
                return $_GET['status'] = "696e76616c696420656d61696c";
            }else{
                $this->_validations[2] = true;
                return true;
            }
        }
	}

    public function checkName($name, $autorization){
        if($autorization[0] === false || $autorization[1] === false || $autorization[2] === false){
            return false;
        }
        else{
            if (!preg_match("/^[0-9a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª ]+$/",$name)) {
                echo "O nome deve conter apenas letras, números e espaços.";
                $this->_validations[3] = false;
            }else{
                $this->_validations[3] = true;
                return true;
            }
        }
	}

    public function checkCNPJ($cnpj, $autorization){
        if($autorization[0] === false || $autorization[1] === false || $autorization[2] === false || $autorization[3] === false){
            return false;
        }
        else{
            if (strlen($cnpj) != 14) {
                return $_GET['status'] = "696e76616c696420636e706a206c656e677468";
            }elseif (!is_numeric($cnpj)) {
                return $_GET['status'] = "696e76616c696420636e706a20666f726d6174";
            }else{
                $this->_validations[4] = true;
                return true;
            }
        }
	}

    public function checkAddress($address, $autorization){
        if($autorization[0] === false || $autorization[1] === false || $autorization[2] === false || $autorization[3] === false || $autorization[4] === false){
            return false;
        }
        else{
            if (strlen($address) < 5) {
                echo "O endereço deve conter no mínimo 5 dígitos.";
            }else{
                $this->_validations[5] = true;
                return true;
            }
        }
	}

}
