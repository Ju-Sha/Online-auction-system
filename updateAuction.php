<?php
	session_start();
	$connUpdateAuction = new mysqli("localhost", "root", "", "trial");
	if($connUpdateAuction->connect_error)
	{
		die("Connection error : ".$connUpdateAuction->connect_error);
	}
	else
	{
		$sqlUpdateAuction = "INSERT INTO auction (Bidding_user_email, item_id, Cur_price) VALUES ('".$_SESSION['email']."', ".$_GET['idNo'].", ".$_GET['newBidAmt'].")";
		if(	$connUpdateAuction->query($sqlUpdateAuction) )
		{
			$sqlUpdateAuction = "UPDATE item SET Cur_price=".$_GET['newBidAmt']." WHERE item_id = ".$_GET['idNo'];
			if( $connUpdateAuction->query($sqlUpdateAuction) )
			{
				
			}
			else
			{
				//problem
			}
			
		}
		else
		{
			//problem
		}		
	}
?>