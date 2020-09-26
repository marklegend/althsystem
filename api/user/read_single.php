<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare User object
$User = new User($db);

// set ID property of User to be edited
$User->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of User to be edited
$stmt = $User->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "id" => $row['id'],
        "name" => $row['name'],
        "email" => $row['email'],
        "password" => $row['password'],
        "phone" => $row['phone'],
        "gender" => $row['gender'],
        "position" => $row['position'],
        "created" => $row['created']
    );
}
// make it json format
print_r(json_encode($user_arr));
?>