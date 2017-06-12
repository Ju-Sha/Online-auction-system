<?php
	session_start();
	if( !isset($_SESSION['login']) or !isset($_POST['oldPassword'])) //can't change password without logging in or without going to changePassword.php
	{
		header('Location: index.php');
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$connUpdatePassword = new mysqli("localhost", "root", "", "trial");
		if($connUpdatePassword->connect_error)
		{
			die("Error".$connUpdatePassword->connect_error);
		}
		else
		{
			$_POST['inputPassword1'] = $connUpdatePassword->real_escape_string($_POST['inputPassword1']);
			$sqlUpdatePassword = "UPDATE user SET password='".$_POST['inputPassword1']."' WHERE email= '".$_SESSION['email']."'";
			
			if( $connUpdatePassword->query($sqlUpdatePassword) )
			{
				//echo "Password changed";
				$_SESSION['changePasswordSuccess'] = 1;
				unset($sqlUpdatePassword);
				unset($connUpdatePassword);
				header('Location: passwordChangeSuccess.php');
			}
			unset($sqlUpdatePassword);
		}
		unset($connUpdatePassword);
	}
?>