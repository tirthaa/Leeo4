<?php

// include Database and Object filesize
include_once 'RailConfigDB.php';
include_once 'RailUser.php';

// get Database connection
$database = new Database();
$db = $database->getConnection();

// Prepare User Objects
$user = new User($db);

//Set User Property Value
$user->uname = $_POST['user'];
$user->pword=base64_encode($_POST['pword']);
$user->name = $_POST['name'];

// Create the User and save in Database 
if($user->signup()){
	//create array
	$user_arr=array(
	"status"=> true,
	"message"=> "Successfully Sigh up",
	"id" => $user->id,
	"uname" => $user->uname
	);
} else{
	$user_arr=array(
	"status"=> false,
	"message"=> "User Already Exist - Please chec it",
	);
}

// Make it Json format
print_r(json_encode($user_arr));
echo (json_encode($user_arr));

?>