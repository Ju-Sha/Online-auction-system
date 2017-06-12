<?php
	echo '
	<!-- ------------------------- header begins --------------------- -->
	<div id="header">
	<div class="container">
	<div id="welcomeLine" class="row">
		<div class="span6">Welcome
		
		
		
		<strong>';
		

		
		if(isset($_SESSION['login']))
		{
			echo $_SESSION['fname']." ".$_SESSION['lname']." !";
		}
		else
		{
			echo " Guest!";
		}
		

		echo '
		</strong>
		
		
		
		
		
		</div>
		<div class="span6">
		<div class="pull-right">
			<a href="product_summary.html"><span class="">Fr</span></a>
			<a href="product_summary.html"><span class="">Es</span></a>
			<span class="btn btn-mini">En</span>
			<a href="product_summary.html"><span>&pound;</span></a>
			<span class="btn btn-mini">$155.00</span>
			<a href="product_summary.html"><span class="">$</span></a>
			<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
		</div>
		</div>
	</div>';

		include_once('navbarPage.php');
	

	echo '
	</div>
	</div>



	<!-- Header End====================================================================== -->';

?>