<?php
	session_start();
	if( !isset($_SESSION['login']) )//Must be able to change password only if logged in
	{
		header('Location: index.php');
	}
	$connChangePassword = new mysqli("localhost", "root", "", "trial");
	if($connChangePassword->connect_error)
	{
		die("Conn error : ".$connect_error);
	}
	$sqlChangePassword = "SELECT password FROM user WHERE email='".$_SESSION['email']."'";
	$resultChangePassword = $connChangePassword->query($sqlChangePassword);
	$resultChangePassword = $resultChangePassword->fetch_assoc();
	$resultChangePassword = $resultChangePassword['password'];
	include_once('html2headPage.php');
?>
<script>
	function validateChangePassword()
	{
		var o = "<?php echo $resultChangePassword; ?>" ;
		var x = document["myForm"]["oldPassword"].value;
		if(o != x)
		{
			alert("Enter the correct current password!");
			return false;
		}
		var chPa1 = document["myForm"]["inputPassword1"].value;
		var chPa2 = document["myForm"]["inputPassword1re"].value;
		if(chPa1 != chPa2)
		{
			alert("New passwords don't match");
			return false;
		}

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
				<li><a href="profile.php">Profile</a> <span class="divider">/</span></li>
				<li class="active">Change password</li>
			</ul>
			<h3> Change password</h3>	
	<div class="well">
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
	<form name="myForm" class="form-horizontal" method="post" action="updatePassword.php" onsubmit="return validateChangePassword()">
<!--		<h4>Your personal information</h4> -->

	<div class="control-group">
		<label class="control-label" for="oldPassword">Enter current password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="oldPassword" name="oldPassword" placeholder="Current password" required>
		</div>
	  </div>

<!--	<h5 style="color: grey">New password</h5> -->
	<div class="alert alert-info alert-error fade in">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Password</strong> should be at least <strong>6 characters long</strong>
	 </div>	
	 	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Enter new password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" pattern=".{6,}" title="Six or more characters" id="inputPassword1" name="inputPassword1" placeholder="Password" required>
		</div>
	  </div>

	<div class="control-group">
		<label class="control-label" for="inputPassword1re">Re-enter new password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1re" name="inputPassword1re" placeholder="Re-type Password" required>
		</div>
	  </div>
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input  class="btn btn-large btn-success" type="submit" value="Change password" />
			</div>
		</div>		
		
	</form>
</div>

</div>
</div>
</div>

</div>
<!-- MainBody End ============================= -->
<?php
	include_once('footerPage.php');
?>

</body>
</html>