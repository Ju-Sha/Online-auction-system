<?php
	session_start();
	if( !isset($_SESSION['login']) or !isset($_SESSION['postItemSuccess']))//Must be logged in to post an item
	{
		header('Location: index.php');
	}
	if( !isset($_GET['idNo']) )
	{
		header('Location: index.php');
	}
	$conn = new mysqli("localhost", "root", "", "trial");
	if($conn->connect_error)
	{
		die("Error connecting to db ".$conn->connect_error);
	}
	else
	{
		$sql = "SELECT * FROM item WHERE item_id=".$_GET['idNo'];
		$result = $conn->query($sql);
		if($result->num_rows != 1)
		{
			echo "Uh oh. Some error has occurred. item_id may have multiple records or none.";
		}
		else
		{
			$row = $result->fetch_assoc();
		}
	}
?>

<?php
	include_once('html2headPage.php');
?>

<body>

<?php
	include_once('headerPage.php');
?>
<div id="mainBody">
	<div class="container">
	<div class="row">

<section id="typography">
<!--
  <div class="page-header">
    <h3>J. Typographic components </h3>
  </div>
-->

      <div class="hero-unit" style="text-align: center">
        <h1>Item successfully posted!</h1>
		<br>
        <p>Your item is now up for bidding.</p>
		<br>
		<div style="float: middle">
		<?php
			echo '
				<a href="product_details.php?idNo='.$row['item_id'].'">
					<img src="'.$row['img_src'].'" style="height: 5em">
				</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&emsp;';
			echo '
			<b>
			Item name: 
			</b>
			<a href="product_details.php?idNo='.$row['item_id'].'">'.$row['item_name'].'</a>';
			/*echo $row['item_name'].;
			echo '</a>';*/
		?>
		</div>
		
		<div style="float: right">
		<?php

		?>
		</div>
      </div>
	  
	  

	  
</section>

	
	
</div>
<!--
	  <?php
		echo '
	  <img style="float: left" src="'.$row['img_src'].'">
	  <p sytle="float: right">
			<b>
			Item name: 
			</b>';
			echo $row['item_name'];
			echo '
			<br>
			<br>
			<b>
			Item category: 
			</b>';
			echo $row['item_category'];
			echo '
			<br>
			<br>
			<b>
			Begin price: $ 
			</b>';
			echo $row['begin_price'];
			echo '
			<br>
			<br>
			<b>
			Bidding end by: 
			</b>';
			echo $row['Bid_end_date']." ".$row['Bid_end_time'];
			echo '
			<br>
			<br>
			<b>
			Item tag-line: 
			</b>';
			echo $row['Item_tag'];
			echo '
			<br>
			<br>
			<b>
			Item description: 
			</b>';
			echo $row['Item_descr'];
			echo '
	  </p>';
	  
	  ?>
-->
</div>


</div>


<?php
	include_once('loginBlockPage.php');
	include_once('FooterPage.php');
	unset($_SESSION['postItemSuccess']);
?>

</body>

