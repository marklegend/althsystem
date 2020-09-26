<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplier.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Supplier object
$Supplier = new Supplier($db);

// set ID property of Supplier to be edited
$Supplier->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of Supplier to be edited
$stmt = $Supplier->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $supplier_arr = array(

        "id" => $row['id'],
        "supplier" => $row['supplier'],
        "sname" => $row['sname'],
        "stel" => $row['stel'],
        "semail" => $row['semail'],
        "sbank" => $row['sbank'],
        "scode" => $row['scode'],
        "sacc" => $row['sacc'],
        "stype" => $row['stype']
    );
}
// make it json format
print_r(json_encode($supplier_arr));
?>