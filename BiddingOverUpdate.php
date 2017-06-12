<?php

	$connBidOver = new mysqli("localhost", "root", "", "trial");
	if($connBidOver->connect_error)
	{
		die("Error conn db ".$connBidOver->connect_error);
	}
	else
	{
		$sqlBidOver = "UPDATE item SET Item_status='1' WHERE item_id = ".$_GET['idNo'];
		if( $connBidOver->query($sqlBidOver) )
		{
			echo 'Done';
		}
		else
		{
			echo 'Nah';
		}
	}
	$connBidOver->close();
?>