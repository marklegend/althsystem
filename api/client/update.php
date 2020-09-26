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
$Client->name = $_POST['name'];
$Client->surname = $_POST['surname'];
$Client->code = $_POST['code'];
$Client->email = $_POST['email'];
$Client->address = $_POST['address'];
$Client->cell = $_POST['cell'];
$Client->home = $_POST['home'];
$Client->work = $_POST['work'];
$Client->reference = $_POST['reference'];
 
// create the Client
if($Client->update()){
    $client_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $client_arr=array(
        "status" => false,
        "message" => "Check your input, it may contain errors!"
    );
}
print_r(json_encode($client_arr));
?>