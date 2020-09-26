<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/cart.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare cart object
$cart = new cart($db);
 
// query cart
$stmt = $cart->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // carts array
    $carts_arr=array();
    $carts_arr["carts"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $cart_item=array(
            "id" => $id,
            "invnum" => $invnum,
            "client" => $client,
            "invdate" => $invdate,
            "paid" => $paid,
            "paid_date" => $paid_date,
            "comments" => $comments
            
        );
        array_push($carts_arr["carts"], $cart_item);
    }
 
    echo json_encode($carts_arr["carts"]);
}
else{
    echo json_encode(array());
}
?>