<?php
	require '../model/Connection.php';
	session_start();

	if(!empty($_POST))
	{
		$output = '';
		$message = '';

		if(isset($_POST['deletedata']))
		{
			$query = "DELETE FROM bin WHERE bin_id = '".$_POST['deletedata']."'";
			$message = "Data Deleted";
		}
		else
		{
			if($_POST['binID'] == '' )
		{
			$location = mysqli_real_escape_string($connection,$_POST['location']);
			$description = mysqli_real_escape_string($connection,$_POST['description']);
			$query = "INSERT INTO bin (location,description) VALUES('$location','$description')";
			$message = "Data Inserted";	
		}
		}

		

		if(mysqli_query($connection,$query))
		{
			$output .= '<label class="text-success">'.$message.'</label>';
			$select_query = "SELECT * FROM bin";
			$result = mysqli_query($connection,$select_query);
			$output .= '
				<table class="table table-hover">
						<tr>
							<th width="20%">Bin ID</th>
                    		<th width="30%">Location</th>
                    		<th width="30%">Description</th>
                    		<th width="20%"></th>
						</tr>
			';
			while($row = mysqli_fetch_row($result))
			{
				$output .= '
					<tr>
					  	<td width="20%">'.$row[0].'</td>
						<td width="30%">'.$row[1].'</td>
						<td width="30%">'.$row[2].'</td>
						<td width="20%"><input type="button" name="delete" value="Delete" id="'.$row[0].'" class="btn btn-info btn-xs delete_data" ></td>
					</tr>
				';
			}
			$output .= '</table>';
		}
		echo $output;
	}
?>