<?php
	session_start();
	include_once('html2headPage.php');
	
	if(!isset($_GET['offset']))
	{
		echo 'Uh oh! Some error has occurred!';
		header('Location: index.php');
	}
	
	$conn = new mysqli("localhost", "root", "", "trial");
	if($conn->connect_error)
	{
		die("Error conn db ".$conn->connect_error);
	}
	else
	{
		/*if(isset($_GET['offset']))
		{
			$sql = "SELECT * FROM item LIMIT 9 OFFSET ".$_GET['offset']."";
		}
		else
		*/
		//{
			$sql = "SELECT * FROM item LIMIT 9 OFFSET ".$_GET['offset'];//";//DESC"; LIMIT = NO OF ITEMS PER PAGE
		//}
		$result = $conn->query($sql);
		
		
		//$result_bckup = $result;
		/*
		if($result->num_rows > 0)
		{
			
		}
		*/

		$sqlCount = "SELECT COUNT(*) FROM ITEM";
		$resultCount = $conn->query($sqlCount);
		$countVal = $resultCount->fetch_assoc();
		$countVal = $countVal['COUNT(*)'];

	}
	
	
?>
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
		<li class="active">Products </li>
    </ul>
	<h3> Products <small class="pull-right"> 
	<?php
		echo $countVal;
	?>
	products are available </small></h3>	
	<hr class="soft"/>
<!--
	<p>
		Nowadays the selling of used products is one of the most successful business spheres.We provide you an opportunity to get products at steals while allowing the sellers to benefit as well. With our business model, everyone goes home happy - that is why our goods are so popular and we have a great number of faithful customers all over the country.
	</p>
	<hr class="soft"/>
-->

<!--
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
-->
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
	

<?php
	$rider=0;
	while( ($row=$result->fetch_assoc()) and $rider++<9 )//No of items per page = $rider = 9 (at the mo')
	{
		echo '
		<div class="row">	  
			<div class="span2">
				<img style="height: 10em" src="'.$row["img_src"].'" alt=""/>
			</div>
			<div class="span4">
				<h3>';
				echo $row["item_name"];
				echo '
				</h3>				
				<hr class="soft"/>
				<h5>';
				echo $row["Item_tag"];
				echo '
				</h5>
				<p>';

				echo $row["Item_descr"];
				
				echo '
				</p>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $';
			echo $row['Cur_price'];
			echo '
			</h3>
			<br/>
			
			  <a href="product_details.php?idNo='.$row['item_id'].'" class="btn btn-large btn-primary"> View </a>
			  <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>';
	}
	
	if(isset($_GET['offset']))
	{
		$sql = "SELECT * FROM item LIMIT 9 OFFSET ".$_GET['offset']."";
	}
	else
	{
		$sql = "SELECT * FROM item LIMIT 9";//DESC"; LIMIT = NO OF ITEMS PER PAGE
	}
	$result = $conn->query($sql);
	
?>
	
	</div>

	<div class="tab-pane  active" id="blockView">
	<?php
		include_once('productThumbListPage.php');
	?>
	
	<hr class="soft"/>
	</div>
</div>

	
	<div class="pagination">
			<ul>
<?php

	if($_GET['offset']-9 >= 0)
	{
		echo '<li><a href="products.php?offset='.(($_GET['offset'])-9).'">&lsaquo;</a></li>';
	}
	
	for($pageNo=0;  $pageNo<$countVal/9;$pageNo++)
	{
		if($pageNo == $_GET['offset']/9)
		{
			echo '<li class="active">';
		}	
		else
		{
			echo '<li>';
		}
		echo '
			<a href="products.php?offset='.(9*$pageNo).'">'.($pageNo+1).'</a>
		<li>
		';
	}
	
	if($countVal>9+$_GET['offset'])
	{
		echo '<li><a href="products.php?offset='.(9+($_GET['offset'])).'">&rsaquo;</a></li>';
	}
?>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<?php
	include_once('footerPage.php');
	$conn->close();
?>

</body>
</html>