<?php

include 'RailConfig.php';

//echo "Mangesh Step 1- Start connecting Database";

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//echo "Mangesh Step 2 - Database connected ";

$paperSetNo = rand(1,10);
//echo($paperSetNo);

//$stmt = $conn->prepare("SELECT `id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer` , `explain_answer` , `setNo` FROM `TenYears`");
//$stmt = $conn->prepare("SELECT `id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer` , `explain_answer` , `setNo` FROM `TenYears` WHERE setNo = $paperSetNo");
$stmt = $conn->prepare("SELECT `id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer` , `setNo` FROM `TenYears` WHERE setNo = $paperSetNo");

//executeing the query
$stmt->execute();

//echo "Mangesh Step 3 - Just Executed Query \n";

//binding result to the query
$stmt->bind_result($id, $question, $answer1, $answer2, $answer3, $answer4, $correct_answer, $setNo);

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
	$temp['explain_answer'] = $explain_answer;
	$temp['setNo'] = $setNo;
	array_push($products, $temp);
	
	//echo "Mangesh Step 4- Data is fetching \n";
		
}

	//displaying the result in json format
	echo json_encode($products);
	//echo "Mangesh Step 5- Json created \n";

?>