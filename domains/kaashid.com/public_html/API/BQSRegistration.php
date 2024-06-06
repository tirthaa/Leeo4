<?php

session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'BQSConfig.php';

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//Read Data In Production
$name = trim($_POST['uname']);
$email = trim($_POST['email']);
$pword = trim($_POST['pword']);
$mobile = trim($_POST['mobile']);

//Read Data from Postman
//$data = json_decode(file_get_contents("php://input"));

//$name = $data->uname;
//$email = $data->email;
//$pword = $data->pword;
//$mobile = $data->mobile;

$count = 0;
$counter = 0;

//Checking email id exist for not
$stmt = $conn->prepare("SELECT COUNT(*) FROM `BQS_user` WHERE `email` =?;");
$stmt->bind_param('s',$email);$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
//if email already exist
if($count>0)
{
    $response['message'] = "failed: Email id already associated with another account. Please try with diffrent EmailId.";
}
// If email not exist
else {
    
        $qry = "INSERT INTO `BQS_user`(`uname`, `email`, `pword`, `mobile`, `enroll`) VALUES ('$name','$email','$pword','$mobile','0');";

        $raw = mysqli_query($conn,$qry);

        if($raw == true)
        {
            $response['message'] = "Success";
        }
        else
        {
            $response['message'] = "failed";

        }
}

	echo json_encode($response);

?>
