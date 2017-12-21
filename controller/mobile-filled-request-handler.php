<?php require_once '../model/FilledRequest.php' ?>

<?php


// check whether reg id is not empty
if (isset($_POST["binNumber"])){
    $driver = new FilledRequest();
    $result =$driver -> sendFilledRequest($_POST["binNumber"]);
    if ($result){
        echo "Request Sent Successfully";
    }
    else{
        echo "Failed to send the Request!";
    }
}

?>