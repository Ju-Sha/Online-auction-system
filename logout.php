<?php
	session_start();

	//if(isset($_SESSION['login'])//if currently logged in
	//{

	//$_SESSION['login']=0;
	session_unset();
	session_destroy();
	header('Location: index.php');

	//}
?>