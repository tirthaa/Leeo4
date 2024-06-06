<?php

// include Database and Object filesize
include_once 'RailConfigDB.php';
include_once 'RailUser.php';

// get Database connection
$database = new Database();
$db = $database->getConnection();

// Prepare User Objects
$user = new User($db);

//Set ID properties of user to be edited
$user->uname=isset($_GET['user'])?$_GET['user']:die();
$user->pword=base64_encode(isset($_GET['pword'])?$_GET['pword']:die());

// Read the Deataul of User to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	//create array
	$user_arr=array(
	"status"=> true,
	"message"=> "Successfully Login Great",
	"id" => $row['id'],
	"uname" => $row['uname']
	);
} else{
	$user_arr=array(
	"status"=> false,
	"message"=> "Invalid Username and Password",
	);
}

// Make it Json format
print_r(json_encode($user_arr));

?>