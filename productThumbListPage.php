<?php
				echo '
				  <ul class="thumbnails">';
				  
				  
				$rider = 0;
				while($row = $result->fetch_assoc() and $rider++<9 ) // 9 IS THE MAX NUM OF ITEMS PER PAGE
				{
					  echo '
					<li class="span3">
					  <div class="thumbnail">
						<a  href="product_details.php?idNo='.$row['item_id'].'"><img style="height: 10em" src="'.$row['img_src'].'" alt=""/></a>
						<div class="caption">
						  <h5>';
						  
						  echo $row['item_name'];
						  
						  echo
						  '</h5>
						  <p> ';
						  
						  echo $row['Item_tag'];
						  
						  echo '
						  </p>
						 
						  <h4 style="text-align:center"><a class="btn" href="product_details.php?idNo='.$row['item_id'].'"> <i class="icon-zoom-in"></i></a> <a class="btn" href="product_details.php?idNo='.$row['item_id'].'">View <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="product_details.php?idNo='.$row['item_id'].'"> $';
						  
						  
						  echo $row['Cur_price'];
						  
						  echo '
						  </a></h4>
						</div>
					  </div>
					</li>';
				}
				  
				  
				  echo '
				  </ul>	';
?>