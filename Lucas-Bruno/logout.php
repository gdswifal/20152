<?php


session_start(); //iniciamos a sessão que foi aberta

session_destroy(); //pei!!! destruimos a sessão ;)

session_unset(); //limpamos as variaveis globais das sessões

echo "<script>alert('Você saiu!');top.location.href='login.php';</script>";





?>