<?php

session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'satiConfi.php';

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//Read Data from Postman or Application and assign to Variable
//$data = json_decode(file_get_contents("php://input"));
//$email = $data->uname;
//$pword = $data->pword; 

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$pword = trim($_POST['pword']);
$mobile = trim($_POST['mobile']);

$qry = "INSERT INTO sati(name, email, pword, mobile) VALUES ('$name','$email','$pword','$mobile');";
$raw = mysqli_query($conn,$qry);
$count = mysqli_num_rows($raw);

if($count > 0)
{
$response['message'] = "Successful";
}
else
{
$response['message'] = "failed";
}

	echo json_encode($response);

?>