<?php
session_start();
if(session_status() != 2){
    echo "Erro ao iniciar sessão.";
    exit;
}
if(@$_SESSION['logged'] != true){
    echo "Acesso não autorizado";
    exit;
}
if(@$_GET['logout_user'] == true){
    session_destroy();
    header('location: ../views/user/user_login.php?status=6c6f676f7574');
}
if(@$_GET['logout_comp'] == true){
    session_destroy();
    header('location: ../views/company/login.php?status=6c6f676f7574');
}
