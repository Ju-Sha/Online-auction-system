<?php
	$conn = new mysqli("localhost", "root", "", "trial");
	if($conn->connect_error)
	{
		die("Error conn db ".$conn->connect_error);
	}
	else
	{
		$sql = "SELECT * FROM item ORDER BY item_id DESC";
		$result = $conn->query($sql);
	}
	echo '
	<div id="mainBody">
		<div class="container">
		<div class="row">';

	include_once("sidebarPage.php");

		
	echo '
			<div class="span9">		
				<div class="well well-small">
				<h4>Featured Products <small class="pull-right">10+ featured products</small></h4>
				<div class="row-fluid">
				<div id="featured" class="carousel slide">
				<div class="carousel-inner">
				  <div class="item active">
				  <ul class="thumbnails">';
				  for($varno=1; $varno<=4; ++$varno)
				  {
					if( !($row = $result->fetch_assoc() ) )
					{
						break;
					}
					  echo '
					<li class="span3">
					  <div class="thumbnail">
					  <i class="tag"></i>
						<a href="product_details.php?idNo='.$row['item_id'].'"><img style="height: 10em" src="'.$row["img_src"].'" alt=""></a>
						<div class="caption">
						  <h5>'.$row["item_name"].'</h5>
						  <h4><a class="btn" href="product_details.php?idNo='.$row["item_id"].'">VIEW</a> <span class="pull-right">$ '.$row["Cur_price"].'</span></h4>
						</div>
					  </div>
					</li>';
				  }
				  
				  echo '

				  </ul>
				  </div>';
				$sqlFeaturedOld = "SELECT * FROM item ORDER BY item_id";
				$resultFeaturedOld = $conn->query($sqlFeaturedOld);
			
			for($varno=1; $varno<=3; $varno++)//MAKE SURE THAT THERE ARE AT LEAST 12 ITEMS IN THERE
			{
				  echo'
				   <div class="item">
				  <ul class="thumbnails">';
				  
				  
				  for($ivarno = 0; $ivarno<=3 and ($rowFeaturedOld=$resultFeaturedOld->fetch_assoc()); $ivarno++)
				  {
					  //$row = $result->fetch_assoc();
					  
					  /*
					  if(! ($row) )
					  {
							break;
					  }*/

					  echo '
					  				<li class="span3">
									  <div class="thumbnail">
										<a href="product_details.php?idNo='.$rowFeaturedOld['item_id'].'"><img style="height: 10em" src="'.$rowFeaturedOld['img_src'].'" alt=""></a>
										<div class="caption">
										  <h5>'.$rowFeaturedOld['item_name'].'</h5>
										   <h4><a class="btn" href="product_details.php?idNo='.$rowFeaturedOld['item_id'].'">VIEW</a> <span class="pull-right">$'.$rowFeaturedOld['begin_price'].'</span></h4>
										</div>
									  </div>
									</li> ';
				  }
				 
				echo '
				  </ul>
				  </div>';
			}
			
			echo '
				  </div>
				  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
				  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
				  </div>
				  </div>
			</div>
			
			
			<h4>Latest Products </h4>';
			
			include_once('productThumbListPage.php');

			echo '
			</div>
			</div>
		</div>
	</div>';
	
	$conn->close();
	
	unset($conn);
	unset($sql);
	unset($result);

?>