<?php
	session_start();
	
	if(!isset($_GET['idNo']))
	{
		header('Location: index.php');
	}
	
	$idNo = $_GET['idNo'];
	$conn = new mysqli("localhost", "root", "", "trial");
	if($conn->connect_error)
	{
		die("Error conn db ".$conn->connect_error);
	}
	else
	{
		$sql = "SELECT * FROM item WHERE item_id=$idNo limit 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	
	
	include_once('html2headPage.php');

	/*include_once('carousalPage.php');
	include_once('mainbodyPage.php');
	include_once('footerPage.php');*/
?>
<script>

		// Set the date we're counting down to
		
		var countDownDate = new Date("<?php echo $row['Bid_end_date']." ".$row['Bid_end_time']; ?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get todays date and time
		  var now = new Date().getTime();

		  // Find the distance between now an the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="timer"
		  document.getElementById("timer").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";

		  // If the count down is finished, write some text
		  if (distance < 0) {
		  
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "BiddingOverUpdate.php?idNo="+"<?php echo $idNo ?>", true);
			xmlhttp.send();
		  
			clearInterval(x);
			document.getElementById("timer").innerHTML = "BIDDING OVER";
			document.getElementById("BidButton").innerHTML = ""; //Remove the 'Bid' button
		  }
		}, 1000);
</script>
<script>
	var currentPricejs;
	var xmlhttpCurrentPrice = new XMLHttpRequest();
	xmlhttpCurrentPrice.onreadystatechange = function() {
		if( this.readyState == 4 && this.status == 200 ) {
			currentPricejs = parseInt(this.responseText);
			document.getElementById('currentPrice').innerHTML = "$ " + this.responseText;
			document.getElementById('bidAmount').value = parseInt(this.responseText)+1;
		}
	};
	xmlhttpCurrentPrice.open("GET", "getCurrentPrice.php?idNo="+"<?php echo $idNo; ?>", true);
	xmlhttpCurrentPrice.send();
	
	


function validateBid()
{
	var newBidAmt = document.forms["bidForm"]["bidAmount"].value;
	if(newBidAmt <= currentPricejs)
	{
		alert("Bid a higher amount");
		return false;
	}
	
	var xmlhttpUpdateAuction = new XMLHttpRequest();
	xmlhttpUpdateAuction.open("GET", "updateAuction.php?idNo="+"<?php echo $idNo; ?>"+"&newBidAmt="+newBidAmt, true);
	xmlhttpUpdateAuction.send();
	
	return true;
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
    <li><a href="products.php?offset=0">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="<?php echo $row['img_src']; ?>" title="<?php echo $row['item_name']; ?>">
				<img style="height: 20em" src="<?php echo $row['img_src']; ?>" style="width:100%" alt="<?php echo $row['item_name']; ?>"/>
				<br><br>
				<p style="padding-left: 1em">Click on image to enlarge</p>
            </a>
		
		<!--	<div id="differentview" class="moreOptopm carousel slide">
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
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
       ,<!--       </div>
			  
		<!--	 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
		-->
			</div>
			<div class="span6">
				<h3><?php  echo $row['item_name']?></h3>
				<small>- <?php echo $row['Item_tag'] ?></small>
				<p style="float: right">Bidding started at <b>$ <?php echo $row['begin_price'] ?></b></p>
				<hr class="soft"/>
				
				<form name="bidForm" onsubmit="return validateBid()" class="form-horizontal qtyFrm">
				  <div class="control-group">
<!--				<label class="control-label"><span>$ <?php echo $row['Cur_price'] ?></span></label> -->
					<label class="control-label"><span>
						<p id="currentPrice" value="" name="currentPrice">
						
						</p>
					</span></label>

					<div class="controls">
	<p id="timer" style="font-size:200%; font-family: Verdana; color: gray"></p>
						<p id="BidButton">
					<!--
						<input type="number" class="span1" placeholder="Qty."/>
					-->
<!--				<form name="bidForm" onsubmit="return validateBid()" method="get" action="product_details.php"> -->
					<?php
					
						if( isset($_SESSION['login']) and $_SESSION['email']!=$row['Seller_user_email'])
						{
							/*
							echo '
							<button type="submit" class="btn btn-large btn-primary pull-right"> Bid <i class=" icon-shopping-cart"></i></button>
							';
							*/

							
							echo '
							<input type="submit" class="btn btn-large btn-primary pull-right" value="Bid">
							';
							
							
							echo '
							<br>
							<input id="bidAmount" type="number" name="bidAmount" id="bidAmount" placeholder="Bid amount" required>';
							
							echo '
							<br>
							<input type="hidden" name="idNo" value="'.$_GET['idNo'].'">';
							
						}
					?>

						</p>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>

				<!-- <hr class="soft clr"/> -->
				<p>
				<?php
					echo $row['Item_descr'];
				?>
				
				</p>
				
				
				
<!--
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
-->
			<hr class="soft"/>
			</div>
			

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->

<?php
	include_once('footerPage.php');
	unset($sqlBidOver);
	unset($result);
	unset($row);
?>

</body>
</html>