<?php

session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'BQSConfig.php';

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//Read Data In Production
$name = trim($_POST['uname']);
$pword = trim($_POST['pword']);

//Read Data from Postman
//$data = json_decode(file_get_contents("php://input"));

//$name = $data->uname;
//$pword = $data->pword;

$count = 0;

//echo ("$name");
//echo ("$pword");

//Checking User id exist for not
$stmt = $conn->prepare("SELECT COUNT(*) FROM `BQS_user` WHERE `uname` =? AND `pword` =?;");
$stmt->bind_param('ss',$name,$pword);$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
//echo ("counter = $count");
//if User already exist
	if($count>0)
		{
            $response['message'] = "Success";
		}
	// If email not exist

    else
        {
            $response['message'] = "failed";

        }

	echo json_encode($response);

?>
