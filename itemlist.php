<?php
	session_start();
	include_once('html2headPage.php');
	
	if($_SESSION['email']!='admin')
	{
		//header('Location: index.php');
	}
	$connItemList = new mysqli("localhost", "root", "", "trial");
	if($connItemList->connect_error)
	{
		die("Error connecting to db : ".$connItemList->connect_error);
	}
	$resItemList = $connItemList->query("SELECT * FROM item");
	
	include_once('headerPage.php');
?>
<body>

<div id="mainBody">
	<div class="container">
	<div class="row">
<?php
	include_once('sidebarPage.php');
?>


	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Admin</a> <span class="divider">/</span></li>
    <li class="active">User list </li>
    </ul>	
	<div class="row">
		<p style="float: right"> <b> <?php echo $resItemList->num_rows; ?> </b> items available </p>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Item id</th>
					<th>Item name</th>
					<th>Seller</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while( ( $rowItemList=$resItemList->fetch_assoc() ) )
				{	
					echo '
					<tr>
						<td>'.$rowItemList['item_id'].'</td>
						<td>'.$rowItemList['item_name'].'</td>
						<td>'.$rowItemList['Seller_user_email'].'</td>
					</tr>';
				}
			?>
			</tbody>
		</table>
	
	
	</div>
</div>
</div> </div>
</div>

<?php
	include_once('footerPage.php');
	unset($rowItemList);
	unset($resItemList);
	unset($connItemList);
?>

</body>
</html>