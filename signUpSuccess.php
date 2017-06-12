<?php
	session_start();
	if( isset($_SESSION['login']) or !isset($_SESSION['signUpSuccess']))//if already logged in as another user, he must not be able create another account
	{
		header('Location: index.php');
	}
?>

<?php
	include_once('html2headPage.php');
?>

<body>

<?php
	include_once('headerPage.php');
?>
<div id="mainBody">
	<div class="container">
	<div class="row">

<section id="typography">
<!--
  <div class="page-header">
    <h3>J. Typographic components </h3>
  </div>
-->

      <div class="hero-unit" style="text-align: center">
        <h1>Sign up success!</h1>
		<br>
        <p>You've successfully signed up at Bootshop. You can now login.</p>
		<br>
        <p>
<!--			<a href="#login" class="btn btn-primary btn-large">Log in</a> -->
				<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">
		Login</a>
		</p>
      </div>
</section>

	
	
</div>
</div>
</div>


<?php
	include_once('loginBlockPage.php');
	include_once('FooterPage.php');
	unset($_SESSION['signUpSuccess']);
?>

</body>

