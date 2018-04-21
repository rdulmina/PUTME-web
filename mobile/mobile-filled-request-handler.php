<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');

require_once '../model/FilledRequest.php';
require_once '../model/Database.php';

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json,true);

if (isset($rest_json)){
	$email = $_POST['email'];
	$binNumber = $_POST['binNumber'];

	$output = array("status"=>"0", "inf"=>"");

	// check whether reg id is not empty
	if ($binNumber!=''){
		
		$query = "SELECT * FROM filled_request WHERE (is_filled='Filled' OR is_filled='Driver Sent') AND bin_id='$binNumber'";
		
		$db = new Database();
        $connection = $db->connect();
		
		try {
            $result_set = $db->executeQuery($query);

            if ($db->getNumRows($result_set)) {
                $output["status"]=2;
                $output["inf"]="<br>A notification has already been sent, regarding this Bin. <br><br>Thank you!";
            } else {
                $request = new FilledRequest();
                $result =$request -> sendFilledRequest($binNumber,$email);
                if ($result){
                    $output["status"]=1;
                    $output["inf"]="<br>Request Sent Successfully!";
                }
                else{
                    $output["status"]=0;
                    $output["inf"]="Failed to send the Request!";
                }
            }
        } catch (mysqli_sql_exception $e) {
            $output["status"]=0;
            $output["inf"]=$e;
        }finally{
            echo json_encode($output);
        }
	}
}


?>