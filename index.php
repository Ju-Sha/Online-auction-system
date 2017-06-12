<?php 
	

	///////////////////////////////////////////////////////////////////////////
	session_start();

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
			$_SESSION['email'] = $email;
			

		}
		else
		{
			echo "Log in failed. Wrong username or password.";
		}
		$conn->close();
		
	}
	include_once('html2headPage.php');

?>


<body>




<?php
	include_once('headerPage.php');
	if(!isset($_SESSION['login']))
	{
		include_once('carousalPage.php');
	}
	include_once('mainbodyPage.php');
	include_once('footerPage.php');
?>


<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
</body>
</html>