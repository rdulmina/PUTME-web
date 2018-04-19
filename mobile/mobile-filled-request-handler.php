<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');

require_once '../model/FilledRequest.php';

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json,true);

if (isset($rest_json)){
	$email = $_POST['email'];
	$binNumber = $_POST['binNumber'];

	$output = array("status"=>"0", "inf"=>"");

	// check whether reg id is not empty
	if ($binNumber!=''){
		$request = new FilledRequest();
		$result =$request -> sendFilledRequest($binNumber);
		if ($result){
			$output["status"]=1;
			$output["inf"]="Request Sent Successfully!";
		}
		else{
			$output["status"]=0;
			$output["inf"]="Failed to send the Request!";
		}
		echo json_encode($output);
	}
}


?>