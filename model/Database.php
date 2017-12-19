<?php 
	
	class Database{
		protected static $connection;

		public function connect(){
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'putmedb';

			self::$connection = new mysqli($dbhost, $dbuser,$dbpass,$dbname);

			// checking the connection
			if(self::$connection === false) {
            	die('Database connection failed ' . mysqli_connect_error());
        	}
			
			return self::$connection;
		}

		// function to execute a SQL query
		public function executeQuery($query) {
		    try{
                // make the connection
                $connection = $this -> connect();

                // execute the query
                $result = $connection -> query($query);
                return $result;
            }catch (Exception $e) {
                echo $e;
            }
    	}

        // function to execute a SQL query
    	/*public function select($query) {
	        $rows = array();
	        $result = $this -> executeQuery($query);
	        if($result === false) {
	            return false;
	        }
	        while ($row = $result -> fetch_assoc()) {
	            $rows[] = $row;
	        }
	        return $rows;
	    }*/

    	// verify a result set
    	public function verifyQuery($result_set){
			if (!$result_set){
				die ("Database query failed. ".mysqli_error(self::$connection));
			}
		}

		/*public function removeSqlInjection($field){
			mysqli_real_escape_string(self::$connection,$field);
		}*/

		// get the number of rows in a particular result set
		public function getNumRows($result_set){
			return mysqli_num_rows($result_set);
		}
	}

 ?>