<?php
include_once("DBConnect.php");
session_start();

function UserLogin($name, $email, $telephone, $pass, $pass_confirm){
    if($pass != $pass_confirm){
        echo "Senhas não conferem, tente novamente.";
        return 0;
    }
    elseif(strlen($pass) < 6 || strlen($pass) > 45) {
        echo "A senha precisa ter entre 6 e 45 dígitos.";
        return 0;
    }
    elseif($pass = "") {
        echo "Uma senha precisa ser digitada.";
        return 0;
    }
    else{
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_mail, user_telephone, user_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $telephone, $hash);
        
        $name = ucfirst($name);
        $telephone = preg_replace('/[^\d]+/', '', $telephone);
        $salt = "GDSWHBpaonamao7psi2015";
        $cost = "08";
        $hash = crypt($pass, '$2a$' . $cost . '$' . $salt . '$');

        if(!$stmt->execute()){
            echo "Erro ao tentar cadastrar: (" . $stmt->errno . ") " . $stmt->error;
            return 0;
        }
        else{
            echo "Usuário cadastrado com sucesso.";
            return 1;
        }
        $stmt->close();
        $conn->close();
    }
}
