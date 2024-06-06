<?php

include 'DBConfig.php';

//echo "Mangesh - Start connecting Database";

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//echo "Mangesh - Database connected";

$stmt = $conn->prepare("SELECT `id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer` FROM `qquiz`");

//executeing the query
$stmt->execute();

//binding result to the query
$stmt->bind_result($id, $question, $answer1,$answer2,$answer3,$answer4,$correct_answer);

$products = array();

//traversin through all the result
while($stmt->fetch()){
	$temp = array();
	$temp['id'] = $id;
	$temp['question'] = $question;
	$temp['answer1'] = $answer1;
	$temp['answer2'] = $answer2;
	$temp['answer3'] = $answer3;
	$temp['answer4'] = $answer4;
	$temp['correct_answer'] = $correct_answer;
	array_push($products, $temp);
	
//	echo "Mangesh - Data is fetching";
		
}

	//displaying the result in json format
	echo json_encode($products);
//	echo "Mangesh - Json created";

?>