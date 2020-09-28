<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplement.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Supplement object
$Supplement = new Supplement($db);

//cal vat
  
$cost = $_POST['cost_excl'];
$cost_incl =  $cost + ($cost*15/100);
// set Supplement property values
$Supplement->id = $_POST['id'];
$Supplement->supplier = $_POST['supplier'];
$Supplement->descript = $_POST['descript'];
$Supplement->cost_excl = $cost;
$Supplement->cost_incl= $cost_incl;
$Supplement->min_lvls = $_POST['min_lvls'];
$Supplement->cur_stock_lvls = $_POST['cur_stock_lvls'];
$Supplement->nappi = $_POST['nappi'];
 
// create the Supplement
if($Supplement->update()){
    $supplement_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $supplement_arr=array(
        "status" => false,
        "message" => "Supplement already exists!"
    );
}
print_r(json_encode($supplement_arr));
?>