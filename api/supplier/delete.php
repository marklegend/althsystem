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
 
// remove the Supplier
if($Supplier->delete()){
    $supplier_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $supplier_arr=array(
        "status" => false,
        "message" => "Supplier Cannot be deleted right now!"
    );
}
print_r(json_encode($supplier_arr));
?>