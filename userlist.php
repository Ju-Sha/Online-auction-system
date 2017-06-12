<?php
	session_start();
	include_once('html2headPage.php');
	
	if($_SESSION['email']!='admin')
	{
		//header('Location: index.php');
	}
	$connUsrList = new mysqli("localhost", "root", "", "trial");
	if($connUsrList->connect_error)
	{
		die("Error connecting to db : ".$connUsrList->connect_error);
	}
	$resUsrList = $connUsrList->query("SELECT * FROM user");
	
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
	
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Email</th>
					<th>Name</th>
					<th>DOB</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while( ( $rowUsrList=$resUsrList->fetch_assoc() ) )
				{	
					echo '
					<tr>
						<td>'.$rowUsrList['email'].'</td>
						<td>'.$rowUsrList['fname'].' '.$rowUsrList['lname'].'</td>
						<td>'.$rowUsrList['dob'].'</td>
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
?>

</body>
</html>