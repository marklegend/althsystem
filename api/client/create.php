<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Client object
$Client = new Client($db);
 
//creating clientid

$birth =  $_POST['birth'];
$gender = $_POST['gender'];

if ($gender == 1){
    $ram = strval(rand(0, 4999));
    $last = strval(rand(50,100));
} else{
    $ram = strval(rand(5000, 9999));
    $last = strval(rand(00,49));
}

$Sbirth = date('ymd',strtotime($birth));

$id = $Sbirth . $ram . $last ;



// set Client property values
$Client->name = $_POST['name'];
$Client->surname = $_POST['surname'];
$Client->code = $_POST['code'];
$Client->email = $_POST['email'];
$Client->address= $_POST['address'];
$Client->cell = $_POST['cell'];
$Client->home = $_POST['home'];
$Client->work = $_POST['work'];
$Client->reference = $_POST['reference'];
$Client->gender = $gender;
$Client->id = $id;


// create the Client
if($Client->create()){
    $client_arr=array(
        "status" => true,
        "message" => "Just added a new client!",
        "id" => $Client->id,
        "name" => $Client->name,
        "surname" => $Client->surname,
        "email" => $Client->email,
        "address" => $Client->address,
        "cell" => $Client->cell,
        "home" => $Client->home,
        "work" => $Client->work,
        "reference" => $Client->reference
       
    );
}
else{
    $client_arr=array(
        "status" => false,
        "message" => "Client already exists!"
    );
}
print_r(json_encode($client_arr));
?>