<?php

session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'BQSConfig.php';

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//Read Data In Production
$email = trim($_POST['email']);
$pword = trim($_POST['pword']);

//Read Data from Postman
//$data = json_decode(file_get_contents("php://input"));

//$email = $data->email;
//$pword = $data->pword;

$count = 0;

//echo("$email");
//echo("$pword");

//Checking email id exist for not
$stmt = $conn->prepare("SELECT COUNT(*) FROM `BQS_user` WHERE `email` =? AND `pword` =?;");
$stmt->bind_param('ss', $email, $pword);$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
//echo("counter = $count");
//if email already exist
	if($count>0)
		{
            $response['message'] = "Success";
		}
    else
        {
            $response['message'] = "failed";

        }

	echo json_encode($response);

?>
