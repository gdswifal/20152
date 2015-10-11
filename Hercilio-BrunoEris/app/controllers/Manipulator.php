<?php
Class Manipulator{
    public function checkPass($password, $confirmation){
        if($password != $confirmation){
            echo "Confirmação de senha não confere com a senha digitada.";
        }elseif(strlen($password) > 46 || strlen($password) < 5){
            echo "A senha deve ter no mínimo seis dígitos. Sua senha possui ".strlen($password)." dígitos.";
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
                echo "Telefone deve conter apenas números.";
            }
            elseif(strlen($telephone) < 10 || strlen($telephone) > 11){
                echo "Telefone precisa ter entre 10 e 11 dígitos (com DDD).";
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
                echo "O e-mail digitado ($email) foi considerado inválido.";
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
            if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª ]+$/",$name)) {
                echo "O nome deve conter apenas letras e espaços.";
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
                echo "O CNPJ deve conter 14 caracteres. (".strlen($cnpj)." digitados).";
            }elseif (!is_numeric($cnpj)) {
                echo "O CNPJ deve conter apenas números, sem caracteres especiais.";
            }else{
                $this->_validations[4] = true;
                return true;
            }
        }
	}

    public function userCheckValidations($autorization){
        $info = "Falha na validação de";
        if($autorization[0] == false){
            echo "$info senha.";
        }elseif($autorization[1] == false){
            echo "$info telefone.";
        }elseif($autorization[2] == false){
            echo "$info e-mail.";
        }elseif($autorization[3] == false){
            echo "$info nome.";
        }
        else{
            $this->_validations = true;
        }
    }

    public function companyCheckValidations($autorization){
        $info = "Falha na validação de";
        if($autorization[0] == false){
            echo "$info senha.";
        }elseif($autorization[1] == false){
            echo "$info telefone.";
        }elseif($autorization[2] == false){
            echo "$info e-mail.";
        }elseif($autorization[3] == false){
            echo "$info nome.";
        }elseif($autorization[4] == false){
            echo "$info CNPJ.";
        }
        else{
            $this->_validations = true;
        }
    }

    public function registerUser($name, $email, $telephone, $password, $autorization){
        if(is_array($autorization)){
            if (in_array(0, $autorization)) {
                return false;
            }
        }
        elseif($autorization === true){
            global $conn;
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_mail, user_telephone, user_password) VALUES (?, ?, ?, ?)");
    		$hashPassword = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$'); //results 60-digit hash.
            $stmt->bind_param("ssss", ucfirst($name), $email, preg_replace('/[^\d]+/', '', $telephone), $hashPassword);
    		$stmt->execute();
            $conn->close();
            if($stmt->affected_rows != 1){
                echo "Erro: ".$stmt->error." (".$stmt->errno.")";
            }
            else{
                echo "Usuário ($email) cadastrado com sucesso!";
                return true;
            }
        }
	}

    public function registerCompany($name, $location, $email, $telephone, $password, $cnpj, $autorization){
        if(is_array($autorization)){
            if (in_array(0, $autorization)) {
                return false;
            }
        }
        elseif($autorization === true){
            global $conn;
            $stmt = $conn->prepare("INSERT INTO companies (comp_name, comp_location, comp_email, comp_telephone, comp_password, comp_cnpj) VALUES (?, ?, ?, ?, ?, ?)");
    		$hashPassword = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$'); //results 60-digit hash.
            $stmt->bind_param("ssssss", ucfirst($name), $location, $email, preg_replace('/[^\d]+/', '', $telephone), $hashPassword, $cnpj);
    		$stmt->execute();
            $conn->close();
            if($stmt->affected_rows != 1){
                echo "Erro: ".$stmt->error." (".$stmt->errno.")";
            }
            else{
                echo "Empresa ($email) cadastrada com sucesso!";
                return true;
            }
        }
	}

    public function loginUser($email, $password){
        global $conn;
        if ($stmt = $conn->prepare("SELECT user_id, user_name, user_mail, user_telephone FROM users WHERE user_mail=? AND user_password=?")) {
            $hash = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$');
            $stmt->bind_param("ss", $email, $hash);
            $stmt->execute();
            $stmt->bind_result($id, $name, $email, $telephone);
            $stmt->store_result();
            $stmt->fetch();
            $result = $stmt->num_rows;
            $stmt->close();
            $conn->close();

            if($result == 1){
                echo "Acesso concedido.";
                $this->_name = $name;
                $this->_telephone = $telephone;
                return 1;
            }
            else{
                echo "Dados de acesso incorretos.";
                return 0;
            }
        }
	}

    public function loginCompany($email, $password){
        global $conn;
        if ($stmt = $conn->prepare("SELECT comp_id, comp_name, comp_location, comp_email, comp_telephone, comp_cnpj FROM companies WHERE comp_email=? AND comp_password=?")) {
            $hash = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$');
            $stmt->bind_param("ss", $email, $hash);
            $stmt->execute();
            $stmt->bind_result($id, $name, $location, $email, $telephone, $cnpj);
            $stmt->store_result();
            $stmt->fetch();
            $result = $stmt->num_rows;
            $stmt->close();
            $conn->close();

            if($result == 1){
                echo "Acesso concedido.";
                $this->_name = $name;
                $this->_location = $location;
                $this->_telephone = $telephone;
                $this->_cnpj = $cnpj;
                return 1;
            }
            else{
                echo "Dados de acesso incorretos.";
                return 0;
            }
        }
	}
}
