<?php

include 'BQSConfig.php';

//echo "Mangesh Step 1- Start connecting Database";

$conn = mysqli_connect($HosName,$HostUser,$HostPass,$DatabaseName);

//echo "Mangesh Step 2 - Database connected ";

//$paperSetNo = rand(1,10);
$paperSetNo = rand(1,4);
//echo($paperSetNo);
//$paperSetNo = 2;

$stmt = $conn->prepare("SELECT `id`, `question`, `questionImg`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `correct_answer`, `user_answer`, `design` FROM `Maths` WHERE setNo = $paperSetNo");


//executeing the query
$stmt->execute();

//echo "Mangesh Step 3 - Just Executed Query \n";

//binding result to the query
$stmt->bind_result($id, $question, $questionImg, $answer1, $answer2, $answer3, $answer4, $answer5, $correct_answer, $user_answer, $design);

$products = array();

//traversin through all the result
while($stmt->fetch()){
	$temp = array();
	$temp['id'] = $id;
	$temp['question'] = $question;
	$temp['questionImg'] = $questionImg;
	$temp['answer1'] = $answer1;
	$temp['answer2'] = $answer2;
	$temp['answer3'] = $answer3;
	$temp['answer4'] = $answer4;
	$temp['answer5'] = $answer5;
	$temp['correct_answer'] = $correct_answer;
	$temp['user_answer'] = $user_answer;
	$temp['design'] = $design;
	//$temp['explain_answer'] = $explain_answer;
	//$temp['setNo'] = $setNo;
	array_push($products, $temp);
	
	//echo "Mangesh Step 4- Data is fetching \n";
		
}

	//displaying the result in json format
	echo json_encode($products);
	//echo "Mangesh Step 5- Json created \n";

?>