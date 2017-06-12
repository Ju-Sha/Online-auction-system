	<?php	
		$connCurrentPrice = new mysqli("localhost", "root", "", "trial");
		if($connCurrentPrice->connect_error)
		{
			die("Connect error".$connCurrentPrice->connect_error);
		}
		else
		{
			$sqlCurrentPrice = "SELECT Cur_price FROM auction WHERE item_id = ".$_GET['idNo']." ORDER BY Auc_id DESC"; 
			$resultCurrentPrice = $connCurrentPrice->query($sqlCurrentPrice);
			$currentPrice = $resultCurrentPrice->fetch_assoc();
			$currentPrice = $currentPrice['Cur_price'];
			if($resultCurrentPrice->num_rows < 1)
			{
				//echo 'alert("Not in auction table yet");';
				$sqlCurrentPrice = "SELECT begin_price FROM item WHERE item_id = ".$_GET['idNo']." ";
				$resultCurrentPrice = $connCurrentPrice->query($sqlCurrentPrice);
				$currentPrice = $resultCurrentPrice->fetch_assoc();
				$currentPrice = $currentPrice['begin_price'];
			}
			
			echo $currentPrice;
			
			unset($sqlCurrentPrice);
			unset($resultCurrentPrice);
			unset($currentPrice);
		}
		unset($connCurrentPrice);
	?>