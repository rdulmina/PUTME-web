<?php require_once '../model/FilledRequest.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether reg id is not empty
if (isset($_POST["reg_id"])){
    $filled_request = new FilledRequest();
    $row = $filled_request -> getFilledRequestData($_POST["reg_id"]);
    echo json_encode($row);
}
?>