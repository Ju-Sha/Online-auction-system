<?php
	session_start();
	include_once('html2headPage.php');
	
	if(!isset($_GET['offset']))
	{
		echo 'Uh oh! Error. No point in continuing';
		header('Location: index.php');
	}
	if(!isset($_GET['srchFld']) and !isset($_GET['srchCategory']) )
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
		if( isset($_GET['srchFld']) and isset($_GET['srchCategory']) )
		{
			if($_GET['srchCategory']=='All')
			{
				$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" LIMIT 9 OFFSET '.$_GET['offset'];
				$sqlCount = 'SELECT COUNT(*) FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%"';
			}
			else
			{
				$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" AND item_category="'.urldecode($_GET['srchCategory']).'" LIMIT 9 OFFSET '.$_GET['offset'];
				$sqlCount = 'SELECT COUNT(*) FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" AND item_category="'.urldecode($_GET['srchCategory']).'"';	
			}

			$resultCount = $conn->query($sqlCount);
			$countVal = $resultCount->fetch_assoc();
			$countVal = $countVal['COUNT(*)'];
		}
		elseif(isset($_GET['srchFld']))
		{
			//$sql = "SELECT * FROM item WHERE SOUNDEX('".$_GET['srchFld']."')=SOUNDEX(item_name)";
			//$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" UNION all SELECT * FROM item WHERE SOUNDEX("'.$_GET["srchFld"].'") LIKE SOUNDEX(item_name)';
			$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%"'; //UNION all SELECT * FROM item WHERE SOUNDEX("'.$_GET["srchFld"].'") LIKE SOUNDEX(item_name)';

			//$result = $conn->query($sql);
			
			$sqlCount = "SELECT COUNT(*) FROM ITEM WHERE SOUNDEX('".$_GET['srchFld']."')=SOUNDEX(item_name)";
			$resultCount = $conn->query($sqlCount);
			$countVal = $resultCount->fetch_assoc();
			$countVal = $countVal['COUNT(*)'];
			
		}
		elseif(isset($_GET['srchCategory']))
		{
			//echo $_GET['srchCategory']." hello";
			$sql = 'SELECT * FROM item WHERE item_category="'.$_GET['srchCategory'].'" LIMIT 9 OFFSET '.$_GET['offset'];
			//$result = $conn->query($sql);
			
			$sqlCount = "SELECT COUNT(*) FROM item WHERE item_category='".$_GET['srchCategory']."' ";
			$resultCount = $conn->query($sqlCount);
			$countVal = $resultCount->fetch_assoc();
			$countVal = $countVal['COUNT(*)'];
			
		}
		$result = $conn->query($sql);
		//$countVal = $result->num_rows;
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
		<li class="active">Search </li>
    </ul>
	<h3> Search results <small class="pull-right"> 
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

<?php
	if($countVal > 0)
	{
			echo '
<!--
		<form class="form-inline span6" action>
			<div style="float: left" class="control-group">
			  <label class="control-label alignL">Sort By </label>
				<select>
				  <option value=0>Item name</option>
				  <option value=1>Lowest price first</option>
				  <option value=2>Highest price first</option>
				</select>
			</div>
			<input style="float: middle" class="btn btn-primary" type="submit" value="Go">
		</form>
-->
		  
	<div id="myTab" class="pull-right">
	 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
	 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
	<br class="clr"/>
	<div class="tab-content">
		<div class="tab-pane" id="listView">';
		

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
				echo $row['begin_price'];
				echo '
				</h3>
				<br/>
				
				  <a href="product_details.php?idNo='.$row['item_id'].'" class="btn btn-large btn-primary"> View </a>
				  <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				
					</form>
				</div>
			</div>';
		}
		
		if( isset($_GET['srchFld']) and isset($_GET['srchCategory']) )
		{
			if($_GET['srchCategory']=='All')
			{
				$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" LIMIT 9 OFFSET '.$_GET['offset'];
			}
			else
			{
				$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" AND item_category="'.urldecode($_GET['srchCategory']).'" LIMIT 9 OFFSET '.$_GET['offset'];
			}
		}
		elseif(isset($_GET['srchFld']))
		{
			//$sql = "SELECT * FROM item LIMIT 9 OFFSET ".$_GET['offset']."";
			//$sql = "SELECT * FROM item WHERE SOUNDEX('".$_GET['srchFld']."')=SOUNDEX(item_name)";
			$sql = 'SELECT * FROM Item WHERE item_name like "%'.$_GET["srchFld"].'%" UNION all SELECT * FROM item WHERE SOUNDEX("'.$_GET["srchFld"].'") LIKE SOUNDEX(item_name)';

		}
		elseif(isset($_GET['srchCategory']))
		{
			//$sql = "SELECT * FROM item LIMIT 9";//DESC"; LIMIT = NO OF ITEMS PER PAGE
			$sql = "SELECT * FROM item WHERE item_category='".$_GET['srchCategory']."' LIMIT 9 OFFSET ".$_GET['offset'];
		}
		$result = $conn->query($sql);
		
		echo '
		
		</div>

		<div class="tab-pane  active" id="blockView">';
		if($result == false)
		{
			echo '<p style="float: center; color: red">No results</p>';
		}
		else
		{
			include_once('productThumbListPage.php');
		}
		
		echo '
		<hr class="soft"/>';
	}
	else
	{
		echo '<p style="float: center; color: red"> No results </p>';
	}
	?>
	</div>
</div>



	<div class="pagination">
			<ul>
	
<?php
	$strUrlOrig = basename($_SERVER['REQUEST_URI']);
	//$strUrl = $strUrlOrig;
	//str_replace("offset=".$_GET['offset'],$strUrl);
	//str_replace('&offset='.$_GET['offset'], '', $_SERVER['QUERY_STRING']);
	
	if($_GET['offset']-9 >= 0)
	{
		$strUrl = $strUrlOrig;
		$strUrl = str_replace("offset=".$_GET['offset'], "offset=".($_GET['offset']-9), $strUrl);
		//echo '<li><a href="search.php?offset='.(($_GET['offset'])-9).'">&lsaquo;</a></li>';
		echo '<li><a href="'.$strUrl.'">&lsaquo;</a></li>';
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
		$strUrl = $strUrlOrig;
		$strUrl = str_replace("offset=".$_GET['offset'], "offset=".(9*$pageNo), $strUrl);

		echo '
			<a href="'.$strUrl.'">'.($pageNo+1).'</a>
			
		<li>
		';
	}
	
	if($countVal>9+$_GET['offset'])
	{
		$strUrl = $strUrlOrig;
		$strUrl = str_replace("offset=".$_GET['offset'], "offset=".(9+($_GET['offset'])), $strUrl);
		echo '<li><a href="'.$strUrl.'">&rsaquo;</a></li>';
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
	unset($sqlCount);
	unset($resultCount);
	unset($countVal);
	$conn->close();
?>

</body>
</html>