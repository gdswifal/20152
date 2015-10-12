<?php
include_once("DBConnect.php");
function catchCompanies(){
    global $conn;
    if ($stmt = $conn->prepare("SELECT comp_id, comp_name, comp_location, comp_telephone FROM companies")) {
    /* execute statement */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($id, $name, $latlng, $telephone);
    /* fetch values */
    $i = 0;
    while ($stmt->fetch()) {
        $coord = explode(" ", $latlng);
        $lat = $coord[0];
        $lng = $coord[1];
        $result[$i]["id"] = $id;
        $result[$i]["nome"] = $name;
        $result[$i]["latitude"] = $lat;
        $result[$i]["longitude"] = $lng;
        $result[$i]["telefone"] = $telephone;
        $i++;
    }
    $json = json_encode($result);
    return $json;
    }
}
echo catchCompanies();
?>
