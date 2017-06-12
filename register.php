<?php
	session_start();
	if( isset($_SESSION['login']) )//if already logged in as another user, he must not be able create another account
	{
		header('Location: index.php');
	}
?>

<?php

	if($_SERVER['REQUEST_METHOD']==="POST")
	{
		/*
		if($_POST['inputPassword1'] !== $_POST['inputPassword1re'])
		{
			echo "Passwords don't match. Try again.";
		}
		else
		{*/
			$conn = new mysqli("localhost", "root", "", "trial");
			if($conn->connect_error)
			{
				die("Error connecting. ".$conn->connect_error);
			}
			$fname = $conn->real_escape_string( $_POST['inputFname1'] );
			$lname = $conn->real_escape_string( $_POST['inputLnam'] );
			$pswd = $conn->real_escape_string( $_POST['inputPassword1'] );
			$mail = $conn->real_escape_string( $_POST['input_email'] );
			$gender = $_POST['Gender'];
			$dob = $_POST['dob'];
			$addr = $conn->real_escape_string( $_POST['address'] );
			$city = $conn->real_escape_string( $_POST['city'] );
			$state = $conn->real_escape_string( $_POST['state'] );
			$country = $conn->real_escape_string( $_POST['country'] );
			$pincode = $_POST['pincode'];
			$phone = $_POST['mobile'];

			$sql = "SELECT * FROM user WHERE email='$mail'";
			$resReg = $conn->query($sql);
			if($resReg->num_rows > 0)
			{
				echo "That mail id is already registered. Try another.";
			}
			else
			{
				$sql = "INSERT INTO user (email, fname, lname, dob, password, gender, address, City, State, Country, PinCode, Phone) VALUES ('$mail', '$fname', '$lname', '$dob', '$pswd', '$gender', '$addr', '$city', '$state', '$country', '$pincode', '$phone')";
				
				
				if($conn->query($sql) === TRUE)
				{
					echo "Sign up success"; //Won't show up anyway
					$_SESSION['signUpSuccess'] = 1;
					header('Location: signUpSuccess.php');
				}
				else
				{
					echo "Sign up failed";
				}
				
				$conn->close();
				echo ' Done';
			}
		//}
	}
	
?>


<?php
	include_once('html2headPage.php');
?>
<script>

function validateForm()
{
		var x;//= document.forms["myForm"]["inputFname1"].value;
		var y;
	/*
		if(x == "")
		{
			alert("First name must be filled out");
			return false;
		}
		x = document.forms["myForm"]["inputLnam"].value;
		if(x == "")
		{
			alert("Last name must be filled out");
			return false;
		}
		x = document.forms["myForm"]["mobile"].value;
		if( isNaN(x) )
		{
			alert("Enter valid mobile number");
			return false;
		}
	*/
		x = document.forms["myForm"]["inputPassword1"].value;
		y = document.forms["myForm"]["inputPassword1re"].value;
		if(x != y)
		{
			alert("Passwords don't match");
			return false;
		}
		var birthDate = new Date( document.forms["myForm"]["dob"].value );
		var today = new Date();
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if(m<0 || (m==0 && today.getDate() < birthDate.getDate() ) )
		{
			age--;
		}
		
		if( age < 18)
		{
			alert("You must be at least 18 years old to register!");
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
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
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
	<form name="myForm" class="form-horizontal" method="post" action="register.php" onsubmit="return validateForm()">
		<h4>Your personal information</h4>
		<!--
		<div class="control-group">
		<label class="control-label">Title <sup>*</sup></label>

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
			<label class="control-label" for="inputFname1">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" pattern="[A-Za-z]*" id="inputFname1" name="inputFname1" placeholder="First Name" required>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" pattern="[A-Za-z]*" id="inputLnam" name="inputLnam" placeholder="Last Name" required>
			</div>
		 </div>
		 
		<div class="control-group">
			<label class="control-label">Gender <sup>*</sup></label>

			<div class="controls">
		
				<!--
				<select class="span1" name="days" >
					<option value="1">Male</option>
					<option value="2">Female</option>
				</select>
				-->
				
				Male <input type="radio" name="Gender" value="M" required>
				Female <input type="radio" name="Gender" value="F" required>
			</div>
		</div>
		 
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="email" id="input_email" name="input_email" placeholder="Email" required>
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" pattern=".{6,}" title="Six or more characters" id="inputPassword1" name="inputPassword1" placeholder="Password" required>
		</div>
	  </div>

	<div class="control-group">
		<label class="control-label" for="inputPassword1re">Re-type Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1re" name="inputPassword1re" placeholder="Re-type Password" required>
		</div>
	  </div>
	  
		<div class="control-group">
			<label class="control-label" for="date">Date of birth<sup>*</sup></label>
			<div class="controls">
			  <input type="date" id="dob" name="dob" min="" value="1990-04-15" required> 
			</div>
		</div>

	<div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Make sure</strong> that your personal details are correct before pressing submit.<strong> You cannot change it later </strong>
	 </div>	

		<h4>Your address</h4>
<!-- Redundant firstname and lastname fields removed. It's already there in personal info -->
		

		
		<div class="control-group">
			<label class="control-label" for="address">Address<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address" name="address" placeholder="Adress" required/> <span>Street address, P.O. box, c/o</span>
			</div>
		</div>
<!--		
		<div class="control-group">
			<label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address2" placeholder="Adress line 2"/> <span>Apartment, suite, unit, building, floor, etc.</span>
			</div>
		</div>
-->
		<div class="control-group">
			<label class="control-label" for="city">City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="city" name="city" placeholder="city" required/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="state">State<sup>*</sup></label>
			<div class="controls">
			<!--
				<select id="state" >
					<option value="">-</option>

					<option value="1">Alabama</option><option value="2">Alaska</option><option value="3">Arizona</option><option value="4">Arkansas</option><option value="5">California</option><option value="6">Colorado</option><option value="7">Connecticut</option><option value="8">Delaware</option><option value="53">District of Columbia</option><option value="9">Florida</option><option value="10">Georgia</option><option value="11">Hawaii</option><option value="12">Idaho</option><option value="13">Illinois</option><option value="14">Indiana</option><option value="15">Iowa</option><option value="16">Kansas</option><option value="17">Kentucky</option><option value="18">Louisiana</option><option value="19">Maine</option><option value="20">Maryland</option><option value="21">Massachusetts</option><option value="22">Michigan</option><option value="23">Minnesota</option><option value="24">Mississippi</option><option value="25">Missouri</option><option value="26">Montana</option><option value="27">Nebraska</option><option value="28">Nevada</option><option value="29">New Hampshire</option><option value="30">New Jersey</option><option value="31">New Mexico</option><option value="32">New York</option><option value="33">North Carolina</option><option value="34">North Dakota</option><option value="35">Ohio</option><option value="36">Oklahoma</option><option value="37">Oregon</option><option value="38">Pennsylvania</option><option value="51">Puerto Rico</option><option value="39">Rhode Island</option><option value="40">South Carolina</option><option value="41">South Dakota</option><option value="42">Tennessee</option><option value="43">Texas</option><option value="52">US Virgin Islands</option><option value="44">Utah</option><option value="45">Vermont</option><option value="46">Virginia</option><option value="47">Washington</option><option value="48">West Virginia</option><option value="49">Wisconsin</option><option value="50">Wyoming</option> 
					
				</select>
			-->
				<input type="text" placeholder="State" name="state" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="postcode">Postal / Zip Code<sup>*</sup></label>
			<div class="controls">
			  <input type="text" pattern="[0-9]{4,}" title="The proper pin-code" id="postcode" name="pincode" placeholder="Postal / Zip Code" required/> 
			</div>
		</div>
		

		
		<div class="control-group">
			<label class="control-label" for="country">Country<sup>*</sup></label>
			<div class="controls">
			<select id="country" name="country" required>
				<option value="">-</option>
				<option value="India">India</option>
			</select>
			</div>
		</div>	
		
<!-- Home phone, addnal info removed -->

		
		<div class="control-group">
			<label class="control-label" for="mobile">Mobile Phone<sup>*</sup></label>
			<div class="controls">
			  <input type="tel" pattern="[0-9]{8,}"  name="mobile" id="mobile" placeholder="Mobile Phone" required/> 
			</div>
		</div>

		
	<p><sup>*</sup>Required field	</p>
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Register" />
			</div>
		</div>		
		
	</form>
</div>

</div>
</div>
</div>

<!--
<?php
/*
	if($_SERVER['REQUEST_METHOD']==="POST")
	{
		if($_POST['inputPassword1'] !== $_POST['inputPassword1re'])
		{
			echo "Passwords don't match. Try again.";
		}
		else
		{
			$conn = new mysqli("localhost", "root", "", "trial");
			if($conn->connect_error)
			{
				die("Error connecting. ".$conn->connect_error);
			}
			$fname = $_POST['inputFname1'];
			$lname = $_POST['inputLnam'];
			$pswd = $_POST['inputPassword1'];
			$mail = $_POST['input_email'];
			
			$sql = "INSERT INTO user (email, fname, lname, password) VALUES ('$mail', '$fname', '$lname', '$pswd')";
			
			
			if($conn->query($sql) === TRUE)
			{
				echo "Sign up success";
			}
			else
			{
				echo "Sign up failed";
			}
			
			$conn->close();
			echo ' Done';
		}
	}
*/
?>

-->


</div>
<!-- MainBody End ============================= -->
<?php
	include_once('footerPage.php');
?>

</body>
</html>