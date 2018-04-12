<?php 
	
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'putmedb';

			$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

			// checking the connection
			if($conn == false) {
            	die('Database connection failed ' . mysqli_connect_error());
        	}
	

 ?>