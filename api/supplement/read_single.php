<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplement.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare supplement object
$Supplement = new Supplement($db);

// set ID property of supplement to be edited
$Supplement->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of supplement to be edited
$stmt = $Supplement->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $supplement_arr=array(
        
        "id" => $row['id'],
        "supple" => $row['supple'],
        "supplier" => $row['supplier'],
        "descript" => $row['descript'],
        "cost_excl" => $row['cost_excl'],
        "cost_incl" => $row['cost_incl'],
        "min_lvls" => $row['min_lvls'],
        "cur_stock_lvls" => $row['cur_stock_lvls'],
        "nappi" => $row['nappi']
    );
}
// make it json format
print_r(json_encode($supplement_arr));
?>