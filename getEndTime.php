<?php
	$conn = new mysqli("localhost", "root", "", "trial");
	if($conn->connect_error)
	{
		die("Error connecting to db: ".$conn->connect_error);
	}
	else
	{
		
	}