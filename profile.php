<?php
	session_start();
	include_once('html2headPage.php');
	
?>


<?php
	if( !isset($_SESSION['login']) )//only if already logged in .
	{
		header('Location: index.php');
	}

	$connProf = new mysqli("localhost", "root", "", "trial");
	if($connProf->connect_error)
	{
		die("Error connecting. ".$connProf->connect_error);
	}
	else
	{
		$sqlProf = "SELECT * FROM user WHERE email='".$_SESSION['email']."' ";
		 
		
		$resProf = $connProf->query($sqlProf);
		$rowProf = $resProf->fetch_assoc();
		
		$connProf->close();
	}

	
?>



<script>

	function changeContent()
	{

		document.getElementById("well").innerHTML = `<form name="myForm" id="myForm" class="form-horizontal" method="post" action="updateProfile.php">\
		<h4>Your address</h4>\
		\
		<div class="control-group">\
			<label class="control-label" for="address">Address<sup>*</sup></label>\
			<div class="controls">\
			  <input type="text" id="address" name="address" placeholder="Adress" value="<?php echo $rowProf['Address']; ?>" required/> <span>Street address, P.O. box, c/o</span>\
			</div>\
		</div>\
\
		<div class="control-group">\
			<label class="control-label" for="city">City<sup>*</sup></label>\
			<div class="controls">\
			  <input type="text" id="city" name="city" placeholder="city" value="<?php echo $rowProf['City']; ?>" required/> \
			</div>\
		</div>\
		<div class="control-group">\
			<label class="control-label" for="state">State<sup>*</sup></label>\
			<div class="controls">\
				<input type="text" placeholder="State" name="state" value="<?php echo $rowProf['State']; ?>" required>\
			</div>\
		</div>\
		<div class="control-group">\
			<label class="control-label" for="postcode">Postal / Zip Code<sup>*</sup></label>\
			<div class="controls">\
			  <input type="text" pattern="[0-9]{4,}" title="The proper pin-code" id="postcode" name="pincode" placeholder="Postal / Zip Code" value="<?php echo $rowProf['PinCode']; ?>" required/> \
			</div>\
		</div>\
		\
		\
		<div class="control-group">\
			<label class="control-label" for="country">Country<sup>*</sup></label>\
			<div class="controls">\
			<select id="country" name="country" required>\
				<option value="">-</option>\
				<option value="India" selected>India</option>\
			</select>\
			</div>\
		</div>	\
		\
		<div class="control-group">\
			<label class="control-label" for="mobile">Mobile Phone<sup>*</sup></label>\
			<div class="controls">\
			  <input type="tel" pattern="[0-9]{8,}"  name="mobile" id="mobile" placeholder="Mobile Phone" value="<?php echo $rowProf['Phone'] ?>" required/> \
			</div>\
		</div>\
\
		\
		<input type="submit" style="margin-left: 25%" class="btn btn-primary" value="Save changes">\
		</form>`;
	}

</script>



<body>


<?php
	include_once('headerPage.php');
?>


<div id="mainBody">
	<div class="container">
	<div class="row">
<?php
	include_once('sidebarPage.php');
?>
	

	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Profile </li>
    </ul>	
	<div class="row">	

<!--	
			<div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="themes/images/products/large/3.jpg" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
                  </div>
                  <div class="item">
                   <a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
                  </div>
                </div>
              
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			 
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>

			<div class="span6">
				<h3>Fujifilm FinePix S2950 Digital Camera  </h3>
				<small>- (14MP, 18x Optical Zoom) 3-inch LCD</small>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>$222.00</span></label>
					<div class="controls">
					<input type="number" class="span1" placeholder="Qty."/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4>100 items in stock</h4>
				<form class="form-horizontal qtyFrm pull-right">
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2">
						  <option>Black</option>
						  <option>Red</option>
						  <option>Blue</option>
						  <option>Brown</option>
						</select>
					</div>
				  </div>
				</form>
				<hr class="soft clr"/>
				<p>
				14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. 
				Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. 
				Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).
				
				</p>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
-->
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li><a href="#sellingHistory" data-toggle="tab">Selling history</a></li>
              <li><a href="#biddingHistory" data-toggle="tab">Bidding history</a></li>
              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
			
			
			
              <div style="margin-top: 7.5%; margin-bottom: 7.5%" class="tab-pane fade" id="sellingHistory">
				<h3 style="text-align: center">Selling history</h3>					
<?php
							$connSellHistory = new mysqli("localhost", "root", "", "trial");
							if($connSellHistory->connect_error)
							{
								die("Cannot connect to db to find selling history : ".$connSellHistory->connect_error );
							}
							$sqlSellHistory = "SELECT * FROM item WHERE Seller_user_email = '".$_SESSION['email']."'";
							$resSellHistory = $connSellHistory->query($sqlSellHistory);

							if( $resSellHistory->num_rows > 0 )
							{
								echo '
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Item id</th>
											<th>Item</th>
											<th>Starting price</th>
											<th>Current price</th>
											<th>Status</th>
										
										</tr>
									</thead>
									<tbody>
										';
						
								while( ($rowSellHistory = $resSellHistory->fetch_assoc() ))
								{
									
									//$resItemName = $connSellHistory->query("SELECT item_name FROM item WHERE item_id=".$rowSellHistory['Item_id']);
									//$resItemName = $resItemName->fetch_assoc();
									
									echo '
										<tr>
											<td>'.$rowSellHistory['item_id'].'</td>
											<td><a href="product_details.php?idNo='.$rowSellHistory['item_id'].'">'.$rowSellHistory['item_name'].' </a></td>
											<td>'.$rowSellHistory['begin_price'].'</td>
											<td>'.$rowSellHistory['Cur_price'].'</td>';
											//$resSellOverNQ = $connSellHistory->query("SELECT Item_status FROM item WHERE //item_id=".$rowBidHistory['Item_id']);
											//$resSellOverNQ = $resSellOverNQ->fetch_assoc();
					
											if( $rowSellHistory['Item_status'] == '0' )
											{
												echo '
													<td> In progress </td>
												';
											}
											else //Bidding over surely because Item_status can have values 0 or 1 only
											{
												$resSoldNQ = $connSellHistory->query("SELECT * FROM auction WHERE item_id=".$rowSellHistory['item_id']." ORDER BY Auc_id DESC");
												//$resSoldNQ = $resSoldNQ->fetch_assoc();
												if($resSoldNQ->num_rows > 0)
												{
													//$resWinner=$connBidHistory->query("SELECT * FROM auction WHERE Item_id=".$rowSellHistory['item_id']." ORDER BY Auc_id DESC");
													//$resWinner=$resWinner->fetch_assoc();
													$resSoldNQ = $resSoldNQ->fetch_assoc();
													echo '
														<td> 
															<p style="color: green"> <b>
																<a href="setShowSeller.php?uidNo='.$resSoldNQ['Bidding_user_email'].'&idNo='.$rowSellHistory['item_id'].'&SorB=1">
																Sold 
																</a>
															</b> </p> 
														</td>';									
												}
												else
												{
													echo '
														<td> <p style="color: red"> <b> No bids </b> </p> </td>';
												}
												
											}
					
										echo '
										</tr>
										';
								}
								
									echo '
									</tbody>
								</table>';
								unset($rowBidHistory);
								unset($resItemName);
							}
							else
							{
								echo '
								<p style="text-align: center"> 
									You never posted an item to sell !
									<br><br>
									<a href="postitem.php" role="button" style="margin-top: 2%; padding-right:0"><span class="btn btn-large btn-success">Post item</a>
								</p>
								';
							}
							
							$connSellHistory->close();
							unset($resSellHistory);
							unset($sqlSellHistory);
							unset($connSellHistory);
						?>
									
					
					
              </div>
			  
			  
		<div style="margin-top: 7.5%; margin-bottom: 7.5%" class="tab-pane fade" id="biddingHistory">
			<h3 style="text-align: center">Bidding history</h3>
			
						<?php
							$connBidHistory = new mysqli("localhost", "root", "", "trial");
							if($connBidHistory->connect_error)
							{
								die("Cannot connect to db to find bidding history : ".$connBidHistory->connect_error );
							}
							$sqlBidHistory = "SELECT * FROM auction WHERE Bidding_user_email = '".$_SESSION['email']."'";
							$resBidHistory = $connBidHistory->query($sqlBidHistory);

							if( $resBidHistory->num_rows > 0 )
							{
								echo '
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Item id</th>
											<th>Item</th>
											<th>Bid amount</th>
											<th>Status</th>
										
										</tr>
									</thead>
									<tbody>
										';
						
								while( ($rowBidHistory = $resBidHistory->fetch_assoc() ))
								{
									$resItemName = $connBidHistory->query("SELECT item_name FROM item WHERE item_id=".$rowBidHistory['Item_id']);
									$resItemName = $resItemName->fetch_assoc();
									
									echo '
										<tr>
											<td>'.$rowBidHistory['Item_id'].'</td>
											<td><a href="product_details.php?idNo='.$rowBidHistory['Item_id'].'">'.$resItemName['item_name'].' </a></td>
											<td>'.$rowBidHistory['Cur_price'].'</td>';
											$resBidOverNQ = $connBidHistory->query("SELECT item_id,Item_status FROM item WHERE item_id=".$rowBidHistory['Item_id']);
											$resBidOverNQ = $resBidOverNQ->fetch_assoc();
											if( $resBidOverNQ['Item_status'] == '0' )
											{
												echo '
													<td> In progress </td>
												';
											}
											else
											{
												$resBidWonNQ = $connBidHistory->query("SELECT * FROM auction WHERE item_id=".$rowBidHistory['Item_id']." ORDER BY Auc_id DESC");
												$resBidWonNQ = $resBidWonNQ->fetch_assoc();
												if($_SESSION['email'] == $resBidWonNQ['Bidding_user_email'])
												{
													$resSellerUserEmail = $connBidHistory->query("SELECT Seller_user_email FROM item WHERE item_id=".$resBidOverNQ['item_id']);
													$resSellerUserEmail=$resSellerUserEmail->fetch_assoc();
													echo '
														<td> 
															<p> <b>
																<a style="color: green" href="setShowSeller.php?uidNo='.$resSellerUserEmail['Seller_user_email'].'&idNo='.$resBidOverNQ['item_id'].'&SorB=0">
																Won 
																</a>
															</b> </p> 
														</td>';	
													unset($resSellerUserEmail);
												}
												else
												{
													echo '
														<td> <p style="color: red"> <b> Lost </b> </p> </td>';
												}
												
											}
										echo '
										</tr>
										';
								}			
									echo '
									</tbody>
								</table>';
								unset($rowBidHistory);
								unset($resItemName);
							}
							else
							{
								echo '
								<p style="text-align: center"> 
									You never placed a bid on an item !
									<br><br>
									<a href="products.php?offset=0" role="button" style="margin-top: 2%; padding-right:0"><span class="btn btn-large btn-success">View all products</a>
								</p>
								';
							}
							
							$connBidHistory->close();
							unset($resBidHistory);
							unset($sqlBidHistory);
							unset($connBidHistory);
						?>
				
			
	
			
		</div>
					 
					 
		<div class="tab-pane fade active in" id="profile">
			<form action="changePassword.php" method="post">
				<input style="float: right" type="submit" class="btn btn-primary" value="Change password">
			</form>
		<!--	<button style="float: right" class="btn btn-primary" onsubmit="changePassword.php">Change password</button> -->
			<h3> Profile</h3>	
			<div id="well" class="well">
			<!--
			<div class="alert alert-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
			 </div>
			<div class="alert fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
			 </div>
			 <div class="alert alert-block alert-error fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
			 </div> -->
			<form name="myForm" id="myForm" class="form-horizontal" method="post" onsubmit="return validateForm()">
				<h4>Your personal information</h4>
				<!--
				<div class="control-group">
				<label class="control-label">Title </label>

				<div class="controls">
				
					<select class="span1" name="days">
					<option value="">-</option>
					<option value="1">Mr.</option>
					<option value="2">Ms.</option>
		Miss option removed Mrs. option modded to Ms.
					</select>
				</div>
				</div>
				-->
				
				<div class="control-group">
					<label class="control-label" for="inputFname1">First name</label>

					
					<div class="controls">
					  <!-- <input type="text" id="inputFname1" name="inputFname1" placeholder="First Name" required> -->
					<?php
						echo '<b> <p style="color: #1f8093" >'.$rowProf['fname'].'</p> </b>';
					?>
					</div>
					
				 </div>
				 <div class="control-group">
					<label class="control-label" for="inputLnam">Last name </label>
					<div class="controls">
					  <!-- <input type="text" id="inputLnam" name="inputLnam" placeholder="Last Name" required> -->
					<?php
						echo '<b> <p style="color: #1f8093" >'.$rowProf['lname'].'</p> </b>';
					?>
					</div>
				 </div>
				 
				<div class="control-group">
					<label class="control-label">Gender </label>

					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >';
							if($rowProf['Gender']=='M')
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
				 
				<div class="control-group">
				<label class="control-label" for="input_email">Email </label>
				<div class="controls">
				  <?php
					echo '<b> <p style="color: #1f8093" >'.$rowProf['email'].'</p> </b>';
				  ?>
				</div>
			  </div>
			  
				<div class="control-group">
					<label class="control-label" for="date">Date of birth</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['dob'].'</p> </b>';
						?>
					</div>
				</div>

			<div class="alert alert-block alert-error fade in">
				<button type="button" class="close" data-dismiss="alert"></button>
				<strong>Your personal information cannot be changed</strong> 
			 </div>	

				<h4>Your address</h4>
				
				<div class="control-group">
					<label class="control-label" for="address">Address</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['Address'].'</p> </b>';
						?>
					</div>
				</div>
		<!--
				<div class="control-group">
					<label class="control-label" for="address2">Address (Line 2)</label>
					<div class="controls">
					  <input type="text" id="address2" placeholder="Adress line 2"/>
					</div>
				</div>
		-->
				<div class="control-group">
					<label class="control-label" for="city">City</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['City'].'</p> </b>';
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="state">State</label>
					<div class="controls">
					<!--
						<select id="state" >
							<option value="">-</option>

							<option value="1">Alabama</option><option value="2">Alaska</option><option value="3">Arizona</option><option value="4">Arkansas</option><option value="5">California</option><option value="6">Colorado</option><option value="7">Connecticut</option><option value="8">Delaware</option><option value="53">District of Columbia</option><option value="9">Florida</option><option value="10">Georgia</option><option value="11">Hawaii</option><option value="12">Idaho</option><option value="13">Illinois</option><option value="14">Indiana</option><option value="15">Iowa</option><option value="16">Kansas</option><option value="17">Kentucky</option><option value="18">Louisiana</option><option value="19">Maine</option><option value="20">Maryland</option><option value="21">Massachusetts</option><option value="22">Michigan</option><option value="23">Minnesota</option><option value="24">Mississippi</option><option value="25">Missouri</option><option value="26">Montana</option><option value="27">Nebraska</option><option value="28">Nevada</option><option value="29">New Hampshire</option><option value="30">New Jersey</option><option value="31">New Mexico</option><option value="32">New York</option><option value="33">North Carolina</option><option value="34">North Dakota</option><option value="35">Ohio</option><option value="36">Oklahoma</option><option value="37">Oregon</option><option value="38">Pennsylvania</option><option value="51">Puerto Rico</option><option value="39">Rhode Island</option><option value="40">South Carolina</option><option value="41">South Dakota</option><option value="42">Tennessee</option><option value="43">Texas</option><option value="52">US Virgin Islands</option><option value="44">Utah</option><option value="45">Vermont</option><option value="46">Virginia</option><option value="47">Washington</option><option value="48">West Virginia</option><option value="49">Wisconsin</option><option value="50">Wyoming</option> 
							
						</select>
					-->
						<?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['State'].'</p> </b>';
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="postcode">Postal / Zip Code</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['PinCode'].'</p> </b>';
						?>
					</div>
				</div>
				

				
				<div class="control-group">
					<label class="control-label" for="country">Country</label>
					<div class="controls">
						<?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['Country'].'</p> </b>';
						?>
					</div>
				</div>	
				
		<!-- Home phone, addnal info removed -->

				
				<div class="control-group">
					<label class="control-label" for="mobile">Mobile Phone </label>
					<div class="controls">
					   <?php
							echo '<b> <p style="color: #1f8093" >'.$rowProf['Phone'].'</p> </b>';
					   ?>
					</div>
				</div>

				<input style="margin-left: 15%" type="button" class="btn btn-primary" onclick="changeContent()" value="Update profile">
				

		<!--	
			<div class="control-group">
					<div class="controls">
						<input type="hidden" name="email_create" value="1">
						<input type="hidden" name="is_new_customer" value="1">
						<input class="btn btn-large btn-success" type="submit" value="Register" />
					</div>
				</div>	
		-->		
				
				</form>
			</div>
		</div>
		
		

					 
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->

<?php
	include_once('footerPage.php');
?>

</body>
</html>

