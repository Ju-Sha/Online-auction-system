<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		//include_once(setconn.php);		
		$servername = "localhost";
		$username = "root";
		$password = "";	

		
		$dbname = "trial";
			
		$conn = new mysqli($servername, $username, $password, $dbname);	
		if($conn->connect_error)
		{
			die("Error connecting to db : ".$conn->connect_error);
		}
		
		
		$email = $_POST['inputEmail'];
		$pswd = $_POST['inputPassword'];

		$sql = "SELECT * FROM user WHERE email='$email' AND password='$pswd' ";

		$result = $conn->query($sql);
		
		if($result->num_rows === 1)
		{
			echo "Log in successful";
			//sleep(5);//Sleep for 5 seconds
			
			$_SESSION['login'] = 1; //Log in success
			
			$row = $result->fetch_assoc();
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['lname'] = $row['lname'];
			

		}
		else
		{
			echo "Log in failed. Wrong username or password.";
		}
		$conn->close();
		
	}

?>