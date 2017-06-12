<?php
	echo'
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<!--
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		-->
		<ul id="sideManu" class="nav nav-tabs nav-stacked">';
		
/*			<li class="subMenu open"><a href="search.php?offset=0&offset=0&srchCategory=Books"> BOOKS [';
*/
		echo '
			<li><a href="search.php?offset=0&srchCategory=Books">BOOKS [';
				$connCount = new mysqli("localhost", "root", "", "trial");
				if($connCount->connect_error)
				{
					die("Error connecting :".$connCount->connect_error);
				}
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Books'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']
			</a>
<!--
				<ul>
				<li><a class="active" href="products.php?offset=0"><i class="icon-chevron-right"></i>Cameras (100) </a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Mobile Phone (80)</a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li>
				</ul>
-->
			</li>';
			
/*			<li class="subMenu"><a href="search.php?offset=0&srchCategory=Electronics"> ELECTRONICS [';
*/
			echo '
			<li><a href="search.php?offset=0&srchCategory=Electronics"> ELECTRONICS [';
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Electronics'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']
			 </a>
			<ul style="display:none">
<!--
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Women&lsquo;s Clothing (45)</a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Women&lsquo;s Shoes (8)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Women&lsquo;s Hand Bags (5)</a></li>	
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Men&lsquo;s Clothings  (45)</a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Men&lsquo;s Shoes (6)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Kids Clothing (5)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>	
-->				
			</ul>
			</li>';
/*
			<li class="subMenu"><a href="search.php?offset=0&srchCategory=Kitchen">KITCHEN [';
*/			
			echo '
			<li><a href="search.php?offset=0&srchCategory=Kitchen"> KITCHEN [';
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Kitchen'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']
			</a>
				<ul style="display:none">
<!--
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Angoves  (35)</a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>	
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Louis Bernard  (45)</a></li>
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Garden (3)</a></li>												
				<li><a href="products.php?offset=0"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>		
-->				
			</ul>
			</li>
			
			<li><a href="search.php?offset=0&srchCategory='.urlencode("Motors & accessories").'">MOTORS & ACCESSORIES [';
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Motors & accessories'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']</a></li>
			<li><a href="search.php?offset=0&srchCategory='.urlencode("Beauty & health").'">BEAUTY & HEALTH [';
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Beauty & health'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']</a></li>
			<li><a href="search.php?offset=0&srchCategory=sports">SPORTS [';
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Sports'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']</a></li>
			<li><a href="search.php?offset=0&srchCategory=others">OTHERS [';
				$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='Others'";
				$resultCount = $connCount->query($sqlCount);
				$rowCount = $resultCount->fetch_assoc();
				$rowCount = $rowCount['COUNT(*)'];
				echo $rowCount;
			echo ']</a></li>
		</ul>
		<br/>
<!--
		  <div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>

			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
-->
			<!--
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
			-->
	</div>
<!-- Sidebar end=============================================== -->';
	unset($sqlCount);
	unset($rowCount);
	unset($resultCount);
	$connCount->close();

?>