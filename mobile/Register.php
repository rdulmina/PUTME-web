<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');

require_once "Database.php";

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json,true);

$output = array("status"=>"0", "inf"=>"");

$email = $_POST['email'];
$password = md5($_POST['password']);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$output["status"] = 2;
	$output["inf"]="Invalid email format!";
}
else{
	$query = sprintf("SELECT * FROM user WHERE email='%s'", $email);

	$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result)==0){
		$query_next = sprintf("INSERT INTO user(email, first_name, last_name, password) VALUES('%s', '%s', '%s', '%s')", $email, $firstName, $lastName, $password);
		$result_next = mysqli_query($conn,$query_next);
		if ($result_next){
			$output["status"]=1;
			$output["inf"]="Successfully Registered!";
		}
		else{
			$output["status"]=0;
			$output["inf"]="Registration Unsuccessful!";
		}

	}
	else{
		$output["status"] = 2;
		$output["inf"]="You are already registered!";
	}	
}



echo json_encode($output);

$conn->close();

?>