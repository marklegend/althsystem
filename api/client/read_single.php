<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Client object
$Client = new Client($db);

// set ID property of Client to be edited
$Client->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of Client to be edited
$stmt = $Client->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $client_arr=array(
        "id" => $row['id'],
        "name" => $row['name'],
        "surname" => $row['surname'],
        "email" => $row['email'],
        "address" => $row['address'],
        "code" => $row['code'],
        "cell" => $row['cell'],
        "home" => $row['home'],
        "work" => $row['work'],
        "reference" => $row['reference']
    );
}
// make it json format
print_r(json_encode($client_arr));
?>