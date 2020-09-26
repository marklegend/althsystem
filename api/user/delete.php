<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare User object
$User = new User($db);
 
// set User property values
$User->id = $_POST['id'];
 
// remove the User
if($User->delete()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "User Cannot be deleted. may be he's assigned to a patient!"
    );
}
print_r(json_encode($user_arr));
?>