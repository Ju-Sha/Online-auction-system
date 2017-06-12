<?php
	session_start();
	//if( !isset($_SESSION['login']) or !isset($_GET['uidNo']) or !isset($_GET['idNo']) or !isset($_SESSION['showSeller']) or !isset($_GET['SOrB'])) //Not already logged in	or	  if no idNo of product whose bid history is to be shown SOrB=>Selling or Buying
	if(  !isset($_SESSION['login'])  or  !isset($_GET['uidNo'])  or  !isset($_GET['idNo'])  or   !isset($_SESSION['showSeller']) )//  or   !isset($_GET['SOrB']) )
	{
		header('Location: index.php');
	}
	$connSeller = new mysqli("localhost", "root", "", "trial");
	if($connSeller->connect_error)
	{
		die("Connect error : ".$connSeller->connect_error);
	}
	
	$resSeller = $connSeller->query("SELECT * FROM user WHERE email='".$_GET['uidNo']."'");
	$resSeller = $resSeller->fetch_assoc();
	include_once('html2headPage.php');

?>

<body>

<?php
	include_once('headerPage.php');
?>


<div id="mainBody">
	<div class="container">
<?php
	//include_once('sidebarPage.php');
?>

	<br>
	
	
	
	
			<h3> Seller Profile</h3>	
				
			
			<div id="well" class="well" style="width: 50%; float: left/*margin-left: 30%*/">
	<p>The item was <?php if($_GET['SorB']==1){echo 'won';}else{echo 'sold';} ?> by:</p>
	<h1 style="text-align: center">
		<?php
			echo $resSeller['fname'].' '.$resSeller['lname'];
		?>
	</h1>
			<form name="myForm" id="myForm" class="form-horizontal" method="post" onsubmit="return validateForm()">
<!--				<h4>Your personal information</h4>

				<div class="control-group">
					<label class="control-label" for="inputFname1">First name</label>
					<div class="controls">
					<?php
						echo '<b> <p style="color: #1f8093" >'.$resSeller['fname'].'</p> </b>';
					?>
					</div>
					
				 </div>
				 <div class="control-group">
					<label class="control-label" for="inputLnam">Last name </label>
					<div class="controls">
					<?php
						echo '<b> <p style="color: #1f8093" >'.$resSeller['lname'].'</p> </b>';
					?>
					</div>
				 </div>

				 
				<div class="control-group">
					<label class="control-label">Gender </label>

					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >';
							if($resSeller['Gender']=='M')
							{
								echo 'Male';
							}
							else
							{
								echo 'Female';
							}
							echo ' </b> </p>';
						?>
					</div>
				</div>
				 


			<div class="alert alert-block alert-error fade in">
				<button type="button" class="close" data-dismiss="alert"></button>
				<strong>Your personal information cannot be changed</strong> 
			 </div>	


				<h4>Your address</h4>
-->			

				<div class="control-group">
				<label class="control-label" for="input_email">Email </label>
				<div class="controls">
				  <?php
					echo '<b> <p style="color: #1f8093" >'.$resSeller['email'].'</p> </b>';
				  ?>
				</div>
			  </div>
				
				<div class="control-group">
					<label class="control-label" for="mobile">Mobile Phone </label>
					<div class="controls">
					   <?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Phone'].'</p> </b>';
					   ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="address">Address</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Address'].'</p> </b>';
						?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="city">City</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['City'].'</p> </b>';
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="state">State</label>
					<div class="controls">

						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['State'].'</p> </b>';
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="postcode">Postal / Zip Code</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['PinCode'].'</p> </b>';
						?>
					</div>
				</div>
				

				
				<div class="control-group">
					<label class="control-label" for="country">Country</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Country'].'</p> </b>';
						?>
					</div>
				</div>	
				
		<!-- Home phone, addnal info removed -->

				
				
				</form>

</div>


<?php
	$resSeller = $connSeller->query("SELECT * FROM item WHERE item_id=".$_GET['idNo']);
	$resSeller = $resSeller->fetch_assoc();


?>


<div id="well2" class="well" style="width: 40%; float: right/*margin-left: 30%*/">
	<p>The item <?php if($_GET['SorB']==1){ echo 'sold';} else{ echo 'won';} ?> is:</p>
	<h1 style="text-align: center">
		<?php
			echo $resSeller['item_name'];
		?>
	</h1>
			<form name="myForm" id="myForm" class="form-horizontal" method="post" onsubmit="return validateForm()">


				<div class="control-group">
				<label class="control-label" for="beginPrice">Bidding begun at: </label>
				<div class="controls">
				  <?php
					echo '<b> <p style="color: #1f8093" >$ '.$resSeller['begin_price'].'</p> </b>';
				  ?>
				</div>
			  </div>
			  
				<div class="control-group">
				<label class="control-label" for="finalPrice">Final price: </label>
				<div class="controls">
				  <?php
					echo '<b> <p style="color: #1f8093" >$ '.$resSeller['Cur_price'].'</p> </b>';
				  ?>
				</div>
			  </div>
			  
				<div class="control-group">
				<!-- <label class="control-label" for="input_email">Bidding begun at: </label> -->
				<div class="controls">
				  <?php
					echo '<img style="float: left; height: 10em" src="'.$resSeller['img_src'].'">';
				  ?>
				</div>
			  </div>
<!--				
				<div class="control-group">
					<label class="control-label" for="mobile">Mobile Phone </label>
					<div class="controls">
					   <?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Phone'].'</p> </b>';
					   ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="address">Address</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Address'].'</p> </b>';
						?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="city">City</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['City'].'</p> </b>';
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="state">State</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['State'].'</p> </b>';
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="postcode">Postal / Zip Code</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['PinCode'].'</p> </b>';
						?>
					</div>
				</div>
				

				
				<div class="control-group">
					<label class="control-label" for="country">Country</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Country'].'</p> </b>';
						?>
					</div>
				</div>	
			
-->

				
				
				</form>

</div>






<!--
<?php
	$resSeller = $connSeller->query("SELECT * FROM item WHERE item_id=".$_GET['idNo']);
	$resSeller = $resSeller->fetch_assoc();


?>

			<div id="wellItem" class="well" style="width: 40%; float: right">
				Item
				<form>
				<div class="control-group">
					<label class="control-label" for="itemName">Item name </label>
					<div class="controls">
					   <?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['item_name'].'</p> </b>';
					   ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="mobile">Mobile Phone </label>
					<div class="controls">
					   <?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Item_tag'].'</p> </b>';
					   ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="address">Address</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$resSeller['Item_descr'].'</p> </b>';
						?>
					</div>
				</div>
				</form>
			
			</div>
-->




</div>

	


<?php
	include_once('footerPage.php');
	unset($_SESSION['showSeller']);
?>

</body>
</html>