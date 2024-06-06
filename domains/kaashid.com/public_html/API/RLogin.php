<?php

session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'RailConfigDB.php';

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//Read Data from Postman
$data = json_decode(file_get_contents("php://input"));
//echo('Name: ' . $data->uname .'<br />');
//echo('Password: ' . $data->pword);

//echo($name = $data->name);
//echo($email = $data->email);
//echo($mobile = $data->mobile);
//echo($pword = $data->pword);

$email = $data->uname;
$pword = $data->pword;
//$count = 0;

   //echo($email);
   // echo($pword);

$stmt = $conn->prepare("SELECT  `id`, `name`, `pword`, `email`, `mobile` FROM `RailRegister` WHERE email = '$email' AND pword = '$pword';");
//$stmt = $conn->prepare("SELECT `id`, `uname`, `pword`, `name` FROM `RailLogin` WHERE uname = \"mangesh\" AND pword = \"Pass@123\";");
//$stmt = $conn->prepare("SELECT COUNT(*) FROM `RailLogin` WHERE uname = \"mangesh\" AND pword = \"Pass@123\";");

//executeing the query
$stmt->execute();

$count = 0;
//binding result to the query
//$stmt->bind_result($email, $pword);
$stmt->bind_result($id,$name, $email, $pword, `mobile`);
//$stmt->bind_result($count);

$products = array();
//$count=1;
//traversin through all the result
while($stmt->fetch()){
	$temp = array();
	$temp['status']= true;
	$temp['message']= "Successfully Login Great";
	$temp['id'] = $id;
	$temp['uname'] = $email;
	$temp['pword'] = $pword;
	$temp['name'] = $name;
	$_SESSION["id"] = $id;
    $_SESSION["name"] = $name;
	array_push($products, $temp);
	$count++;
}

	//displaying the result in json format
	//echo json_encode($products);
	//json_encode($products);

//echo $count;
if($count > 0){
	//create array
	$user_arr=array();
	$user_arr['status']= true;
	$user_arr['message']= "Successfully Login Great";
	//"id" => $row['id'],
	$user_arr['id'] = $temp['id'];
	$user_arr['name'] = $temp['name'];
} else{
	$user_arr=array(
	"status"=> false,
	"message"=> "Invalid Username and Password",
	);
	
}

	echo json_encode($user_arr);

?>