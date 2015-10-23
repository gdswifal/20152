<?php
include_once("../../controllers/DBConnect.php");
include_once("../../controllers/session_user.php");
?>
<div class="col-md-8 col-md-offset-2">
    <h1>Pedidos de <?php echo $_SESSION['name']; ?></h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Pedido</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Avaliação</th>
                <th>Endereço de entrega</th>
            </tr>
        </thead>
        <tbody>
            <?php getOrders($_SESSION['id']); ?>
        </tbody>
    </table>
</div>
<?php
function getOrders($userID){
    global $conn;
    if ($stmtOrders = $conn->prepare("SELECT orde_id, Companies_comp_id, orde_price, orde_status, orde_stars, orde_address FROM orders WHERE Users_user_id=? ORDER BY orde_id DESC")) {
        $stmtOrders->bind_param("i", $userID);
        $stmtOrders->execute();
        $stmtOrders->bind_result($orderID, $companyID, $price, $status, $stars, $address);
        $stmtOrders->store_result();
        while ($stmtOrders->fetch()){
            if ($stmtFK = $conn->prepare("SELECT Orders_Companies_comp_id, Products_prod_id FROM orders_has_products WHERE Orders_orde_id=?")) {
                $stmtFK->bind_param("i", $orderID);
                $stmtFK->execute();
                $stmtFK->bind_result($companyID, $productID);
                $stmtFK->store_result();
                $stmtFK->fetch();
                $resultFK = $stmtFK->num_rows;
                //echo "Resultado orders: $resultFK";
                if($resultFK == 1){
                    if ($stmtProduct = $conn->prepare("SELECT prod_description, prod_price FROM products WHERE prod_id=?")) {
                        $stmtProduct->bind_param("i", $productID);
                        $stmtProduct->execute();
                        $stmtProduct->bind_result($productDescription,$productPrice);
                        $stmtProduct->store_result();
                        $stmtProduct->fetch();
                        $resultProduct = $stmtProduct->num_rows;
                        //echo "<br>Resultado products: $resultProduct";
                        if($resultProduct == 1){
                            $details['description'] = $productDescription;
                            $details['price_unit'] = $productPrice; //Preço do pedido dividido pelo preço do produto vai dar a quantidade
                        }
                        else{
                            echo "Falha ao obter descrição do produto.";
                            return false;
                        }
                    }
                    if ($stmtCompany = $conn->prepare("SELECT comp_name FROM companies WHERE comp_id=?")) {
                        $stmtCompany->bind_param("i", $companyID);
                        $stmtCompany->execute();
                        $stmtCompany->bind_result($companyName);
                        $stmtCompany->store_result();
                        $stmtCompany->fetch();
                        $resultCompany = $stmtCompany->num_rows;
                        //echo "<br>Resultado companies: $resultCompany";
                        if($resultCompany == 1){
                            $details['company_name'] = $companyName;
                        }
                        else{
                            echo "Falha ao obter nome da empresa.";
                            return false;
                        }
                    }
                }
                else{
                    echo "Falha ao obter detalhes do pedido.";
                    return false;
                }
            }
            else{
                echo "Falha na conexão: ".$conn->error;
            }
            echo "<tr>\n
            <td>".$details['company_name']."</td>\n
            <td>$orderID</td>\n
            <td>".$details['description']."</td>\n
            <td>".($price/$details['price_unit'])."</td>\n
            <td>$price</td>\n
            <td>$status</td>\n
            <td>$stars ou AVALIAR (operador ternário)</td>\n
            <td>$address</td>\n
            </tr>";
            //<a class=\"btn btn-primary btn-xs link_ajax\" href=\"../../controllers/newOrder.php?user=".$_SESSION['id']."&product=$id&company=".$_GET['company']."\" role=\"button\">Pedir</a>
        }
    }
    else{
        echo "Falha na conexão: ".$conn->error;
    }
}

?>
