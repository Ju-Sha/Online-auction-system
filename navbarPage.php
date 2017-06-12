<?php
	echo '
<!-- Navbar ================================================== -->


<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" action="search.php?offset=0" >
		<input style="padding-left: 30px" id="srchFld" name="srchFld" class="srchTxt" type="search" title="Enter something to search" placeholder="       Search" required/> <!--comment:  pattern=".{6,}" value="     "  pattern attr added because of the 5 spaces to avoid the magnifying glass image in search box 
-->
		  <select name="srchCategory" class="srchTxt">
			<option value="All">All</option>
			<option value="Books">Books </option>
			<option value="Electronics">Electronics </option>
			<option value="Kitchen">Kitchen </option>
			<option value="Motors & accessories">Motors & accessories </option>
			<option value="Beauty & health">Beauty & health </option>
			<option value="Sports">Sports</option>
			<option value="Others">Others</option>
		</select> 
		<input type="hidden" name="offset" value=0>
		<input type="submit" value="Go" id="submitButton" class="btn btn-primary">
		';
		  /*<button type="submit" id="submitButton" class="btn btn-primary">Go</button>*/
		  echo '
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class="">';
	 
	 
	 if( isset($_SESSION['login']) )//Must be authenticated to post items on the site
	 {
		echo '
		
		<a href="profile.php">My Profile</a></li>
		<li class="">
		<a href="postitem.php">
			Post item
		</a>';
	 }
	 else
	 {	
		echo '
		<a href="products.php?offset=0">Products</a></li>
		<li class="">
		<a href="delivery.php">
			Delivery
		</a>';
	 }
	 
	 
	 
	 echo '
	 </a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	 
	
	<!-- <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success"> -->';
	
	
	if(isset($_SESSION['login'])) // MAKE IT IF if( isset($_SESSION['login']) )
	{

		echo '
		<a href="logout.php" method="post" role="button" style="padding-right:0"><span class="btn btn-large btn-success">
		Log out';
	}
	else
	{
		echo '
		<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">
		Login';
	}
	
	echo '
	</span></a>
<!--	<form action="register.php" method="post">
		
		<button type="submit" value="dfsdfsdf" style="padding-right:0"> <span class="btn btn-large btn-success">dsfsdf</span></button> 
			<a href="register.php" role="button"  style="padding-right:0"><span class="btn btn-large btn-success">
			fsf
			</span>
			</a>
		
	</form>
-->';

include_once('loginBlockPage.php');

echo '
	</li>
    </ul>
  </div>
</div>


<!-- End of navbar -->';

?>