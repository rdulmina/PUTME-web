<?php require_once '../model/Driver.php' ?>

<?php


// check whether reg id is not empty
if (isset($_POST["driver_id"]) AND isset($_POST["req_id"])){
    $driver = new Driver();
    $result =$driver -> updateStatus($_POST["driver_id"],$_POST["req_id"]);
    if ($result){
        echo json_encode("<h4>Successfully Assigned</h4>");
    }
    else{
        echo json_encode("<h4>Failed to Assign</h4>");
    }
}
?>