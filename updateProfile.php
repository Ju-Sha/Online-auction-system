<?php
	session_start();
	if(!isset($_SESSION['login']) or !isset($_POST['address'])) //can't change password without logging in or without going to profile.php 's update profile button
	{
		header('Location: index.php');
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$connUpdateProfile = new mysqli("localhost", "root", "", "trial");
		if($connUpdateProfile->connect_error)
		{
			die("Error".$connUpdateProfile->connect_error);
		}
		else
		{
			$_POST['address'] = $connUpdateProfile->real_escape_string($_POST['address']);
			$_POST['city'] = $connUpdateProfile->real_escape_string($_POST['city']);
			$_POST['state'] = $connUpdateProfile->real_escape_string($_POST['state']);
			$_POST['country'] = $connUpdateProfile->real_escape_string($_POST['country']);
			$_POST['pincode'] = $connUpdateProfile->real_escape_string($_POST['pincode']); //There shouldn't be non-digits here in the first place. Just checking. :-)
			$_POST['mobile'] = $connUpdateProfile->real_escape_string($_POST['mobile']);
			$sqlUpdateProfile = "UPDATE user SET Address='".$_POST['address']."', City='".$_POST['city']."', State='".$_POST['state']."', Country='".$_POST['country']."', PinCode='".$_POST['pincode']."', Phone='".$_POST['mobile']."' WHERE email= '".$_SESSION['email']."'";
			$_SESSION['changeProfileSuccess'] = 1;
			if( $connUpdateProfile->query($sqlUpdateProfile) )
			{
				//echo "Password changed";
				unset($sqlUpdateProfile);
				unset($connUpdateProfile);
				header('Location: profileChangeSuccess.php');
			}
			unset($sqlUpdateProfile);
		}
		unset($connUpdateProfile);
	}
?>