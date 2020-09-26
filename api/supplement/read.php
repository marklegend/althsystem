<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/supplement.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare supplement object
$Supplement = new Supplement($db);
 
// query supplement
$stmt = $Supplement->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // supplements array
    $supplements_arr=array();
    $supplements_arr["supplements"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $supplement_item=array(
            "id" => $id,
            "supple" => $supple,
            "supplier" => $supplier,
            "descript" => $descript,
            "cost_excl" => $cost_excl,
            "cost_incl" => $cost_incl,
            "min_lvls" => $min_lvls,
            "cur_stock_lvls" => $cur_stock_lvls,
            "nappi" => $nappi
        );
        array_push($supplements_arr["supplements"], $supplement_item);
    }
 
    echo json_encode($supplements_arr["supplements"]);
}
else{
    echo json_encode(array());
}
?>