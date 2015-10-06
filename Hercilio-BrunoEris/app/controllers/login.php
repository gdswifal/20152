<?php
include_once("DBConnect.php");
session_start();

function Login($login, $password, $table){
    global $conn;
    switch ($table) {
        case 'users':
            $columns = "user_id, user_mail";
            $condition = "user_mail=? AND user_password=?";
            break;
        case 'companies':
            $columns = "comp_id, comp_email";
            $condition = "comp_email=? AND comp_password=?";
            break;
    }

    if ($stmt = $conn->prepare("SELECT $columns FROM $table WHERE $condition")) {
        $hash = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$');
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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(strpos($_SERVER['REQUEST_URI'],'user_login')) {
        Login($_POST['email'], $_POST['password'], "users");
    }
    elseif(strpos($_SERVER['REQUEST_URI'],'comp_login')) {
        Login($_POST['email'], $_POST['password'], "companies");
    }
}
