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

$query = sprintf("SELECT * FROM user WHERE email='%s'", $email);

$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result)>0){
	$query_next = sprintf("SELECT * FROM user WHERE email='%s' AND password='%s'", $email,$password);
	$result_next = mysqli_query($conn,$query_next);
	if (mysqli_num_rows($result_next)>0){
		$output["status"]=1;
		$output["inf"]="<br>Login Successful!";
	}
	else{
		$output["status"]=0;
		$output["inf"]="Invalid Password!";
	}
}
else{
	$output["status"]=0;
	$output["inf"]="Invalid Email!";
}
echo json_encode($output);

$conn->close();

?>