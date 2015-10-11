<?php
define("host", "127.0.0.1");
define("user", "root");
define("senha", "");
define("banco", "paonamao");

// Create connection
$conn = new mysqli(host, user, senha, banco);

// Check connection
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    $conn->close(); //Close connection
}
