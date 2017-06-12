<?php
	$conn = new mysqli('localhost', 'root', '', 'trial');
	if($conn->connect_error)
	{
		die("Connect error: ".$conn->connect_error);
	}
	else
	{
		$na = 'ds';
		$sql = "SELECT * FROM USER WHERE LNAME='Doe'";// WHERE LNAME='Doe'";// INTO '$na' FROM USER WHERE LNAME='Doe'";
		$na=$conn->query($sql);
		if( $na->num_rows>0)
		{
			$na = $na->fetch_field();
			//$na = $na['fname'];
			//$naw = $na['fname'];
			echo $na;
		}
		else
		{
			echo "That didn't work";
		}
	}	
?>