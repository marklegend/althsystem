<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplier.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Supplier object
$Supplier = new Supplier($db);
 
// set Supplier property values
$Supplier->id = $_POST['id'];
$Supplier->sname = $_POST['sname'];
$Supplier->stel = $_POST['stel'];
$Supplier->semail = $_POST['semail'];
$Supplier->sbank = $_POST['sbank'];
$Supplier->scode = $_POST['scode'];
$Supplier->sacc = $_POST['sacc'];
$Supplier->stype = $_POST['stype'];
 
// create the Supplier
if($Supplier->update()){
    $supplier_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $supplier_arr=array(
        "status" => false,
        "message" => "Supplier info already exists!"
    );
}
print_r(json_encode($supplier_arr));
?>