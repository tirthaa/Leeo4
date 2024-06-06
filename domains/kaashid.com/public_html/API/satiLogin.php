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

$email = trim($_POST['Uname']);
$pword = trim($_POST['Pword']);


        $qry = "SELECT * FROM sati WHERE email = '$email' AND pword = '$pword'";
        $raw = mysqli_query($conn,$qry);
        $count = mysqli_num_rows($raw);
        
        if($count > 0)
        {
            $response['message'] = "exist";
        }
        else
        {
            $response['message'] = "failed";
            
        }

	echo json_encode($response);

?>
