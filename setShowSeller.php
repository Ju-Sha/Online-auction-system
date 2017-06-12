<?php
	session_start();
	if( !isset($_GET['uidNo']) or !isset($_GET['idNo']) or !isset($_GET['SOrB']) )
	{
		echo 'Error. Oh!!!';
		header('Location: index.php');
	}
	$_SESSION['showSeller'] = 1;
	header("Location: bidWonSeller.php?uidNo=".$_GET['uidNo']."&idNo=".$_GET['idNo']."&SorB=".$_GET['SorB']."&");
	//'bidWonSeller.php?uidNo='.$_GET['uidNo'].'&idNo='.$_GET['idNo'].'&SorB='.$_GET['SorB']'"
?>