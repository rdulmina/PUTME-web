<?php require_once "Database.php"?>
<?php require_once "FilledRequest.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 04-Sep-17
 * Time: 5:06 PM
 */

class Driver
{

    protected static $db;
    protected static $connection;

    // default constructor
    function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    // fetch suitable Driver names for a particular location
    public function fetchDriverNames($location){
        // if all beauticians have to be loaded for all locations
        if($location=="*"){
            $query="SELECT * FROM driver d, driver_location l WHERE d.is_assigned='0' AND d.driver_id=l.driver_id";
        }
        else{
            $query="SELECT * FROM driver d, driver_location l WHERE l.area='$location' AND d.driver_id=l.driver_id AND d.is_assigned='0'";
        }
        $driver_names ='';

        $driver_names.="<select name=\"select_driver_name\" id=\"select_driver_name\" class=\"form-control paragraph-font\">";

        try{
            $drivers = self::$db->executeQuery($query);
            while($driver = mysqli_fetch_assoc($drivers)){
                $driver_names .= "<option value=\"{$driver['driver_id']}\">{$driver['name']}</option>";
            }
            $driver_names .="</select>";
            return $driver_names;

        }catch (Exception $e){
            echo $e;
        }
    }


    public function updateStatus($driver_id,$req_id){
        $query= "UPDATE driver SET is_assigned='1' WHERE driver_id='".$driver_id."'";
        try{
            $result = self::$db->executeQuery($query);

            $request = new FilledRequest();
            $result_request = $request->updateRequestStatus($req_id);
            return ($result AND $result_request);

        }catch (Exception $e){
            echo $e;
        }
    }

    public function getDriverNumber($driver_id)
    {
        $number = '';
        $query= "SELECT * FROM driver WHERE driver_id='".$driver_id."'";
        try{
            $result = self::$db->executeQuery($query);
            while($row = mysqli_fetch_assoc($result))
            {
                $number = $row["phoneno"];
            }
            return $number;

        }catch (Exception $e){
            echo $e;
        }
    }
}

?>