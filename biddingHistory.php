<?php
	session_start();
	if( !isset($_SESSION['login']) or !isset($_GET['idNo'])) //Not already logged in	or	  if no idNo of product whose bid history is to be shown
	{
		//header('Location: index.php');
	}
	$connBidHist = new mysqli("localhost", "root", "", "trial");
	if($connBidHist->connect_error)
	{
		die("Connect error while bid hist of product : ".$connBidHist->connect_error);
	}
	$connBidHist->query("SELECT * FROM item WHERE item_id = ".$_GET['idNo']);
	include_once('html2headPage.php');

?>

<body>

<?php
	include_once('headerPage.php');
?>


<div id="mainBody">
	<div class="container">
<?php
	include_once('sidebarPage.php');
?>
	


</div>
</div>

	


<?php
	include_once('footerPage.php');
?>

</body>
</html>