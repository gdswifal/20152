<?php
include_once("../../controllers/DBConnect.php");

function getProducts($companyId){
    global $conn;
    if ($stmt = $conn->prepare("SELECT prod_id, prod_description, prod_production, prod_expiration, prod_price FROM products WHERE Companies_comp_id=?")) {
        $stmt->bind_param("i", $companyId);
        $stmt->execute();
        $stmt->bind_result($id, $description, $production, $expiration, $price);
        while ($stmt->fetch()) {
            echo "Produto: $description ($id) [R$ $price]";
        }
        $stmt->close();
        $conn->close();
    }
    else{
        echo "Falha na conexão: ".$conn->error;
    }
}
getProducts($_SESSION['id']);
 ?>
