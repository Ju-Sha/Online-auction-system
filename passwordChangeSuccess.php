<?php
	session_start();
	if( !isset($_SESSION['changePasswordSuccess']) or !isset($_SESSION['login']) )
	{
		header('Location: index.php');
	}
	include_once('html2headPage.php');
?>

<body>

<?php
	include_once('headerPage.php');
?>
<div id="mainBody">
	<div class="container">
	<div class="row">

<section id="typography" style="margin-top: 5%; margin-bottom: 5%; padding-top: 1.1%; padding-bottom: 2%">
<!--
  <div class="page-header">
    <h3>J. Typographic components </h3>
  </div>
-->

      <div class="hero-unit" style="text-align: center">
        <h1>Password successfully changed!</h1>
<!--
		<br>
        <p>Your item is now up for bidding.</p>
		<br>
-->
		<div style="float: middle">

		</div>
		
		<div style="float: right">
		<?php

		?>
		</div>
      </div>
	  
	  

	  
</section>

	
	
</div>

</div>


</div>


<?php
	include_once('loginBlockPage.php');
	include_once('FooterPage.php');
	unset($_SESSION['changePasswordSuccess']);
?>

</body>

