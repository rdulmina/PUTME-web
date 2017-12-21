<?php require_once '../model/Driver.php' ?>

<?php


// check whether reg id is not empty
if (isset($_POST["location"])){
    $driver = new Driver();
    $result =$driver -> fetchDriverNames($_POST["location"]);
    echo json_encode($result);
}
?>