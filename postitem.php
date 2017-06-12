<?php
	session_start();
	if( !isset($_SESSION['login']) )//if not already logged in, he must not be able to post items
	{
		header('Location: index.php');
	}
?>

<?php

	if($_SERVER['REQUEST_METHOD'] === 'POST')// && isset($_FILES["fileToUpload"]["name"]) )
	{
		//echo "YOOOOOOOOOOOOOOO";
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$upload_ok = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); //I think this works
		
		$conn = new mysqli("localhost", "root", "", "trial");
		if($conn->connect_error)
		{
			die("Error accessing db : ".$conn->connect_error);
		}
		else
		{
			$sqlCount = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'trial' AND TABLE_NAME='item'" ;
			$resCount = $conn->query($sqlCount);
			$row = $resCount->fetch_assoc();
			$row = $row['AUTO_INCREMENT'];
			
			
			$fileName = $row.".".$imageFileType;
			$target_file = $target_dir.$fileName;
			
					
			
		
			//Check if image is an actual image
			if(isset($_POST['submit']))
			{
			
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== False)
				{
					echo "File is an image - ".$check["mime"].".";
					$upload_ok = 1;
				}
				else
				{
					echo "File image nicht";
					//sleep(5);
					//header('Location: uploadhtml.php');
					$upload_ok = 0;
				}
				
				
				if($upload_ok === 1)
				{

					//Check if file already exits in the 'uploads' folder
					if(file_exists($target_file))
					{
						echo "File already exists";
						$upload_ok = 0;
					}
					else if($_FILES["fileToUpload"]["size"] > 2*500000)//Check if file size greater than 500kB
					{
						echo "File size > 1000kB";
						$upload_ok = 0;
					}
					else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
					{
						echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$upload_ok = 0;
					}
				
					if($upload_ok === 1)//If still alright
					{
						if( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) )
						{
							
							$img_path = $target_dir.$fileName;
							
							echo "The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded";
							$item_name = $conn->real_escape_string( $_POST["itemName1"] );
							$begin_price = $_POST["startingPrice"];
							$end_Date = $_POST["bidEndDate"];
							$end_Time = $_POST["bidEndTime"];
							$item_tag = $conn->real_escape_string( $_POST["itemTagline"] );
							$item_descr = $conn->real_escape_string( $_POST["itemDescription"] );
							$category = $_POST["category"];
							

						
							$sql = "INSERT INTO item (item_name, Seller_user_email, item_category, Item_status, Cur_price, begin_price, Bid_end_date, Bid_end_time, img_src, Item_tag, Item_descr) VALUES ('$item_name', '".$_SESSION['email']."', '$category', '0', $begin_price, $begin_price, '$end_Date', '$end_Time', '$img_path', '$item_tag', '$item_descr')";
							if( ($conn->query($sql) ) === TRUE)
							{
								echo 'Image uploaded and db updated';
								$_SESSION['postItemSuccess']=1;
								header('Location: postitemSuccess.php?idNo='.$row);
							}
							else
							{
								echo 'Image uploaded but db not updated';
							}
						
							
							
						}
						else
						{
							echo "Error uploading";
						}
					}
					else
					{
						echo "File not uploaded";
					}
				}
				
				
			}
		}
	}
?>


<?php
	include_once('html2headPage.php');
?>

<script>
	//take and give current date to min attr of input type date of bid end date
	//same for bid end time
	
	var today = new Date();
	//document.getElementById('bidEndDate').min='"'+today+'"';

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
		<li class="active">Post item</li>
    </ul>
	<h3> Post item</h3>	
	<div class="well">
	
	 
	<form class="form-horizontal" method="post" action="postitem.php" enctype="multipart/form-data">
		<h4>Item information</h4>
		
		<div class="control-group">
			<label class="control-label" for="itemName1">Item name </label>
			<div class="controls">
			  <input type="text" pattern=".{1,32}" title="Maximum 32 charactes" id="itemName1" name="itemName1" placeholder="Item Name" required>
			</div>
		 </div>
		 
		<div class="control-group">
		<label class="control-label" for="startingPrice">Starting Price </label>
		<div class="controls">
		  <input type="number" min="0" id="startingPrice" name="startingPrice" placeholder="Starting Price" required>
		</div>
	  </div>	  
	  

	  <div class="control-group">
		<label class="control-label" for="bidEndDate">Date to end bidding </label>
		<div class="controls">
		  <input type="date" id="bidEndDate" name="bidEndDate" placeholder="Starting date" value="2017-05-03" required>
		</div>
	  </div>	
	  
		<div class="control-group">
		<label class="control-label" for="bidEndTime">Time to end bidding </label>
		<div class="controls">
		  <input type="time" id="bidEndTime" name="bidEndTime" placeholder="Starting time" value="08:56" required>
		</div>
	  </div>	 	  


	<div class="control-group">
		<label class="control-label" for="fileToUpload">Image </label>
		<div class="controls">
		  <input type="file" id="fileToUpload" name="fileToUpload" required>
		</div>
	  </div>


	  

	
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert"></button>
		Give a <strong>tag-line </strong>which arrests viewer's attention and a <strong>description</strong> that further encourages to buy the item
	 </div>	

		<h4>Item description</h4>
		
		 <div class="control-group">
			<label class="control-label" for="itemTagline">Item tag-line</label>
			<div class="controls">
			  <input type="text" pattern=".{1,32}" title="Maximum 32 characters" id="itemTagline" name="itemTagline" placeholder="Item tagline" required>
			</div>
		 </div>		
	
		 <div class="control-group">
			<label class="control-label" for="category">Item category</label>
			<div class="controls">
				<select id="category" name="category" required>
					<option value="">-</option>
					<option value="Books">Books</option>
					<option value="Electronics">Electronics</option>
					<option value="Kitchen">Kitchen</option>
					<option value="Motors & accessories">Motors & accessories</option>
					<option value="Beauty & health">Beauty & health</option>
					<option value="Sports">Sports</option>
					<option value="Others">Others</option>
					
				</select>
			</div>
		 </div>		
		 
		 <div class="control-group">
			<label class="control-label" for="itemDescription">Item description</label>
			<div class="controls">
			  <textarea id="itemDescription" name="itemDescription" style="overflow:auto;resize:none" placeholder="Item description" rows="8" cols="12" required></textarea>
			</div>
		 </div>
		

		
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" name="submit" value="Post item" />
			</div>
		</div>		
	</form>
</div>

</div>

</div>
</div>
</div>

<?php
	include_once('footerPage.php');
?>

</body>
</html>