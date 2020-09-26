<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare Client object
$client = new Client($db);
 
// query Client
$stmt = $client->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // Clients array
    $clients_arr=array();
    $clients_arr["clients"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $client_item=array(
           
            "id" => $id,
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "address" => $address,
            "code" => $code,
            "cell" => $cell,
            "home" => $home,
            "work" => $work,
            "reference" => $reference,
        );
        array_push($clients_arr["clients"], $client_item);
    }
 
    echo json_encode($clients_arr["clients"]);
}
else{
    echo json_encode(array());
}
?>