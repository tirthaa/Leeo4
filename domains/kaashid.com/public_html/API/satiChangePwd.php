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

$oldPword = trim($_POST['oldPword']);
$newPword = trim($_POST['newPword']);
$confirmPword = trim($_POST['confirmPword']);
$email = trim($_POST['email']);


$qry = "UPDATE sati SET pword ='$newPword' WHERE email = '$email';";
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