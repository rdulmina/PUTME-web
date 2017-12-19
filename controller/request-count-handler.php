<?php require_once '../model/Database.php' ?>
<?php require_once '../model/FilledRequest.php' ?>

<?php
    $filled_request = new FilledRequest();
    $count = $filled_request ->countRequest();
    echo $count;
?>
