<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplement.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Supplement object
$Supplement = new Supplement($db);
 
// set Supplement property values
$Supplement->id = $_POST['id'];
 
// remove the Supplement
if($Supplement->delete()){
    $supplement_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $supplement_arr=array(
        "status" => false,
        "message" => "Supplement Cannot be deleted right now!"
    );
}
print_r(json_encode($supplement_arr));
?>