<?php
class User extends Manipulator{
    public $_id;
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
                return 0;
            }
        }
	}

    public function recoverUser($email){
        global $conn;
        if ($stmt = $conn->prepare("SELECT user_id, user_name, user_mail FROM users WHERE user_mail=?")) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $name, $email);
            $stmt->store_result();
            $stmt->fetch();
            $result = $stmt->num_rows;
            $stmt->close();
            $conn->close();

            if($result == 1){
                $this->_id = $id;
                $this->_name = $name;
                $this->_email = $email;
                return 1;
            }
            else{
                return 0;
            }
        }
	}
}
?>
