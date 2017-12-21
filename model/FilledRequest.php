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
        $query = "SELECT COUNT(*) FROM filled_request WHERE is_filled='Filled'";


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


    public function searchFiledRequests($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM filled_request f, bin b WHERE f.is_filled='Filled' AND b.bin_id=f.bin_id";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM filled_request f, bin b WHERE (f.req_id LIKE '%".$search_text
                ."%' OR f.bin_id LIKE '%".$search_text
                ."%' OR f.is_filled LIKE '%".$search_text."%' OR b.location LIKE '%".$search_text."%' OR b.description LIKE '%".$search_text."%') AND f.is_filled='Filled' AND b.bin_id=f.bin_id";
        }
        else{
            $query = "SELECT * FROM filled_request f, bin b WHERE (".$field." LIKE '%".$search_text."%') AND f.is_filled='Filled' AND b.bin_id=f.bin_id";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $request_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Bin ID</th>
                                    <th>Status</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Check</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($request = mysqli_fetch_assoc($result_set)){

                    $request_list.= "<tr>";
                    $request_list.= "<td>{$request['req_id']}</td>";
                    $request_list.= "<td>{$request['bin_id']}</td>";
                    $request_list.= "<td>{$request['is_filled']}</td>";
                    $request_list.= "<td>{$request['location']}</td>";
                    $request_list.= "<td>{$request['description']}</td>";
                    $request_list.= "<td><button class=\"btn btn-primary btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$request['req_id']}\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i> Check</button></td>";
                     $request_list.= "</tr>";
                }
                $request_list .= "</tbody>
                                    </table>";
                echo $request_list;
            }
            else{
                echo "<p><i>No Search Results Found</i></p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // get all filled request data for a particular reg id
    function getFilledRequestData($req_id){
        $query = "SELECT * FROM filled_request f,bin b WHERE f.req_id='".$req_id."' AND b.bin_id=f.bin_id";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }


    public function updateRequestStatus($req_id){
        $query= "UPDATE filled_request SET is_filled='Driver Sent' WHERE req_id='".$req_id."'";
        try{
            $result = self::$db->executeQuery($query);
            return $result;

        }catch (Exception $e){
            echo $e;
        }
    }

    public function sendFilledRequest($bin_id){
        $query= "INSERT INTO filled_request(bin_id,is_filled) VALUES('".$bin_id."','Filled')";
        try{
            $result = self::$db->executeQuery($query);
            return $result;

        }catch (Exception $e){
            echo $e;
        }
    }
}