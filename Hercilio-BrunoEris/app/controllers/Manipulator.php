<?php
Class Manipulator{
    public function checkPass($password, $confirmation){
        if($password != $confirmation){
            echo "A confirmação de senha não confere com a senha digitada.";
        }elseif(strlen($password) > 46 || strlen($password) < 5){
            echo "A senha precisa ter entre 6 e 45 dígitos. Sua senha possui ".strlen($password)." dígitos.";
        }else{
            $this->_validations[0] = true;
            return true;
        }
	}

    public function checkPhone($telephone){
        $info = "Telefone digitado: $telephone (".strlen($telephone)." dígitos).";
        if(!is_numeric($telephone)){
            echo "Telefone inválido. Digite apenas números. $info";
        }
        elseif(strlen($telephone) < 10 || strlen($telephone) > 11){
            echo "O número do telefone precisa ter entre 10 e 11 dígitos (com DDD). $info";
        }else{
            $this->_validations[1] = true;
            return true;
        }
	}

    public function checkEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "O e-mail digitado ($email) foi considerado inválido.";
        }else{
            $this->_validations[2] = true;
            return true;
        }
	}

    public function checkName($name){
        if (!preg_match("/^[A-z ]*$/",$name)) {
            echo "O nome deve conter apenas letras e espaços.";
        }else{
            $this->_validations[3] = true;
            return true;
        }
	}

    public function checkCNPJ($cnpj){
        if (strlen($cnpj) != 14) {
            echo "O CNPJ deve conter 14 caracteres. (".strlen($cnpj)." digitados).";
        }elseif (!is_numeric($cnpj)) {
            echo "O CNPJ deve conter apenas números, sem caracteres especiais.";
        }else{
            $this->_validations[4] = true;
            return true;
        }
	}

    public function userCheckValidations($autorization){
        $info = "Pendência de validação de ";
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
        $info = "Pendência de validação de ";
        if($autorization[0] == false){
            echo "$info senha.";
        }elseif($autorization[1] == false){
            echo "$info telefone.";
        }elseif($autorization[2] == false){
            echo "$info e-mail.";
        }elseif($autorization[3] == false){
            echo "$info nome.";
        }elseif($autorization[4] == false){
            echo "$info CPNJ.";
        }
        else{
            $this->_validations = true;
        }
    }

    public function registerUser($name, $email, $telephone, $password, $autorization){
        if($autorization != true){
            echo "Existem pendências de validação.";
        }
        else{
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
        if($autorization != true){
            echo "Existem pendências de validação.";
        }
        else{
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
}
