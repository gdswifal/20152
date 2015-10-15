<?php
include_once("../../controllers/DBConnect.php");

$pattern_cnpj = '/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/';
$cnpj = preg_replace($pattern_cnpj, '$1.$2.$3/$4-$5', $_SESSION['cnpj']);
echo "CNPJ:".$cnpj;
 ?>
