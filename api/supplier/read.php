<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplier.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Supplier object
$Supplier = new Supplier($db);
 
// query Supplier
$stmt = $Supplier->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // suppliers array
    $suppliers_arr=array();
    $suppliers_arr["suppliers"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $supplier_item=array(
            "id" => $id,
            "supplier" => $supplier,
            "sname" => $sname,
            "stel" => $stel,
            "semail" => $semail,
            "sbank" => $sbank,
            "scode" => $scode,
            "sacc" => $sacc,
            "stype" => $stype
        );
        array_push($suppliers_arr["suppliers"], $supplier_item);
    }
 
    echo json_encode($suppliers_arr["suppliers"]);
}
else{
    echo json_encode(array());
}
?>