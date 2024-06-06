<?php

include 'RailConfigDB.php';

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//Read Data from Postman
$data = json_decode(file_get_contents("php://input"));
//echo('Name: ' . $data->uname .'<br />');
//echo('Password: ' . $data->pword);

//echo($name = $data->name);
//echo($email = $data->email);
//echo($mobile = $data->mobile);
//echo($message = $data->message);

$name = $data->name;
$email = $data->email;
$mobile = $data->mobile;
$message = $data->message;

	//echo($name);
	//echo($email);
	//echo($mobile);
	//echo($message);


//Coding For Signup
/*if(isset($_POST['RRegister']))
{
//Getting Psot Values
$fname=$_POST['fullname'];	
$email=$_POST['email'];	
$mobile=$_POST['mobilenumber'];	
$pass=$_POST['password'];*/

//Checking email id exist for not
$stmt = $conn->prepare("SELECT COUNT(*) FROM `RailUserReg` WHERE email=?;");
//$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$email);$stmt->execute();
$stmt->bind_result($count);
echo ($count);
$stmt->fetch();
$stmt->close();
//if email already exist
if($count>0)
{
echo "<script>alert('Email id already associated with another account. Please try with diffrent EmailId.');</script>";
} 
// If email not exist
else {
$CheckInsertStmt = 0;
$stmt = $conn->prepare("INSERT INTO `RailUserReg`(`name`, `email`, `mobile`, `message`) VALUES ('$name', '$email', '$mobile', '$message');");
//$stmt = $conn->prepare("INSERT INTO `RailUserReg`(`name`, `email`, `mobile`, `message`) VALUES (?, ?, ?, ?);");
//$stmt = $conn->prepare("INSERT INTO `RailUserReg`(`name`, `email`, `mobile`, `message`) VALUES ('tirtha','aacom','9870','looking forward');");
//$stmt = $conn->prepare("INSERT INTO `RailUserReg`(`id`, `name`, `email`, `mobile`, `message`) VALUES ('2','tirtha','a@a.com','9870589093','looking forward');");

//$stmti->bind_param('rail',$name,$email,$mobile,$message);
//executeing the query
$stmt->execute();
$CheckInsertStmt = 1;
//$stmti->close();
echo ($CheckInsertStmt);
echo "<script>alert('User registration successful');</script>";

//echo $count;
if($CheckInsertStmt > 0){
	//create array
	$user_arr=array();
	$user_arr['status']= true;
	$user_arr['message']= "Registration Successfully";
	//"id" => $row['id'],
	//$user_arr['id'] = $temp['id'];
	//$user_arr['name'] = $temp['name'];
} else{
	$user_arr=array(
	"status"=> false,
	"message"=> "Not able to Registration, Please try after some time and Enter Valid Input value",
	);
	
}

	echo json_encode($user_arr);
}


?>