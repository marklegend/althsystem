<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Client object
$Client = new Client($db);
 
// set Client property values
$Client->id = $_POST['id'];
 
// remove the Client
if($Client->delete()){
    $client_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $client_arr=array(
        "status" => false,
        "message" => "Client Cannot be deleted right now. be patient!"
    );
}
print_r(json_encode($client_arr));
?>