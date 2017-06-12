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
    <a class="brand" href="index.html"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>CLOTHES </option>
			<option>FOOD AND BEVERAGES </option>
			<option>HEALTH & BEAUTY </option>
			<option>SPORTS & LEISURE </option>
			<option>BOOKS & ENTERTAINMENTS </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.html">Specials Offer</a></li>
	 <li class="">';
	 
	 
	 if( isset($_SESSION['login']) )//Must be authenticated to post items on the site
	 {
		echo '
		<a href="postitem.php">
			Post item
		</a>';
	 }
	 else
	 {	
		echo '
		<a href="normal.html">
			Delivery
		</a>';
	 }
	 
	 
	 
	 echo '
	 </a></li>
	 <li class=""><a href="contact.html">Contact</a></li>
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
		Login, bro';
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
-->
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="post" action="index.php">
			  <div class="control-group">								
				<input type="text" id="inputEmail" name="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
			  </div>
			  <!--
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			  -->
			 
			  

			  
			  
			  
			
			<button type="submit" class="btn btn-success">Sign in, bro</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<!-- <input type = "submit" class="btn btn-success" value="sbmt"/> -->
			</form>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>


<!-- End of navbar -->';

?>