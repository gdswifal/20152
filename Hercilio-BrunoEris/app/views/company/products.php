<?php
include_once("../../controllers/DBConnect.php");

function getProducts($companyId){
    global $conn;
    if ($stmt = $conn->prepare("SELECT prod_id, prod_description, prod_production, prod_expiration, prod_price, prod_amount FROM products WHERE Companies_comp_id=?")) {
        $stmt->bind_param("i", $companyId);
        $stmt->execute();
        $stmt->bind_result($id, $description, $production, $expiration, $price, $amount);
        while ($stmt->fetch()) {
            $date = new DateTime($production);
            $date->add(new DateInterval('P'.$expiration.'D'));
            echo "<tr>\n<td>$description</td>\n<td>".date("d/m/Y",strtotime($production))."</td>\n<td>".$date->format('d/m/Y')."</td>\n<td>R$ $price</td>\n<td>$amount</td>\n</tr>";
        }
        $stmt->close();
        $conn->close();
    }
    else{
        echo "Falha na conexão: ".$conn->error;
    }
}
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <a class="linkAjax btn btn-default" href="newProduct.php" role="button">Novo Produto</a>
    <h1>Seus produtos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Data de Produção</th>
                <th>Data de Vencimento</th>
                <th>Preço</th>
                <th>Estoque</th>
            </tr>
        </thead>
        <tbody>
            <?php getProducts($_SESSION['id']); ?>
        </tbody>
    </table>
</div>
<div class="col-md-3"></div>
