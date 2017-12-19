<?php require_once('../model/Database.php') ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 19-Dec-17
 * Time: 8:28 PM
 */

class FilledRequest
{


    protected static $db;
    protected static $connection;

    // default constructor
    function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }


    // count number of new register requests
    public function countRequest(){
        $query = "SELECT COUNT(*) FROM filled_request";


        try {
            $result = self::$db->executeQuery($query);

            if ($result) {
                $req = mysqli_fetch_assoc($result);
                echo $req['COUNT(*)'];
            } else {
                echo 0;
            }
        } catch (mysqli_sql_exception $e) {
            echo $e;
        }
    }

}