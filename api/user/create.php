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
$User->name = $_POST['name'];
$User->email = $_POST['email'];
$User->password = base64_encode($_POST['password']);
$User->phone = $_POST['phone'];
$User->gender = $_POST['gender'];
$User->position = $_POST['position'];
$User->created = date('Y-m-d H:i:s');

// create the User
if($User->create()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $User->id,
        "name" => $User->name,
        "email" => $User->email,
        "phone" => $User->phone,
        "gender" => $User->gender,
        "position" => $User->position
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($user_arr));
?>