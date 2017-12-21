<?php require_once '../model/Database.php' ?>
<?php require_once '../model/FilledRequest.php' ?>


<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 27-Aug-17
 * Time: 10:30 PM
 */

$data = json_decode(stripslashes($_POST['data']));

$filled_request = new FilledRequest();
$filled_request -> searchFiledRequests($data[0],$data[1]);
?>