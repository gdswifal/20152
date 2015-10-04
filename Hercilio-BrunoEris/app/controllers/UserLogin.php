<?php
include_once("DBConnect.php");
session_start();

function UserLogin($login, $password){
    global $conn;
    if ($stmt = $conn->prepare("SELECT user_id, user_mail FROM users WHERE user_mail=? AND user_password=?")) {
        $salt = "GDSWHBpaonamao7psi2015";
        $cost = "08";
        $hash = crypt($password, '$2a$' . $cost . '$' . $salt . '$');
        $stmt->bind_param("ss", $login, $hash);
        $stmt->execute();
        $stmt->bind_result($id, $email);
        $stmt->store_result();
        $stmt->fetch();
        $result = $stmt->num_rows;
        $stmt->close();
        $conn->close();

        if($result == 1){
            printf("Acesso concedido.\n", $id, $email);
            return 1;
        }
        else{
            printf("Login não efetuado!");
            return 0;
        }
    }
}
