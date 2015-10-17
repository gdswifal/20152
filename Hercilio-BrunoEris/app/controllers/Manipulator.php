<?php
Class Manipulator{
    public function checkPass($password, $confirmation){
        if($password != $confirmation){
            $_GET['status'] = "70617373776f72647320646f6e2774206d61746368";
            return false;
        }elseif(strlen($password) > 46 || strlen($password) < 5){
            $_GET['status'] = "6d696e6c656e6774682070617373776f7264";
            return false;
        }else{
            return true;
        }
	}

    public function checkPhone($telephone){
        if(!is_numeric($telephone)){
            $_GET['status'] = "70686f6e65206d7573742068617665206f6e6c79206e756d62657273";
            return false;
        }
        elseif(strlen($telephone) < 10 || strlen($telephone) > 11){
            $_GET['status'] = "6572726f722070686f6e65206c656e677468";
            return false;
        }else{
            return true;
        }
	}

    public function checkEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            global $_email;
            $_email = $email;
            $_GET['status'] = "696e76616c696420656d61696c";
            return false;
        }else{
            return true;
        }
	}

    public function checkName($name){
        if (!preg_match("/^[0-9a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª ]+$/",$name)) {
            $_GET['status'] = "696e76616c6964206e616d65";
            return false;
        }else{
            return true;
        }
	}

    public function checkCNPJ($cnpj){
        if (strlen($cnpj) != 14) {
            $_GET['status'] = "696e76616c696420636e706a206c656e677468";
            return false;
        }elseif (!is_numeric($cnpj)) {
            $_GET['status'] = "696e76616c696420636e706a20666f726d6174";
            return false;
        }else{
            return true;
        }
	}

    public function checkAddress($address){
        if (strlen($address) < 5) {
            return false;
        }else{
            return true;
        }
	}
}
