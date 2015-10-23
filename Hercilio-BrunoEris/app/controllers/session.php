<?php
@session_start();
/* Session Management */
function checkSessionTimeout(){
    $timelimit = 600; // 10 minutes = 600
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timelimit)) {
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
        echo "Sua sessão expirou por inatividade maior que ".gmdate("i", $timelimit)." minutos, favor efetuar novo login.";
        echo "<a href=\"login.php\" class=\"btn btn-default btn-lg\">Acessar novamente</a>";
        header('Location: login.php?expired=1');
        exit;
    }
    else{
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    }
}
if(isset($_SESSION['logged'])){
    checkSessionTimeout();
}


if(session_status() != 2){
    echo "Erro ao iniciar sessão.";
    exit;
}

if(@$_SESSION['logged'] != true){
    header('location: login.php');
}

/* Logouts */
if(@$_GET['logout_user'] == true){
    session_destroy();
    header('location: ../views/user/login.php?status=6c6f676f7574');
}
if(@$_GET['logout_comp'] == true){
    session_destroy();
    header('location: ../views/company/login.php?status=6c6f676f7574');
}
