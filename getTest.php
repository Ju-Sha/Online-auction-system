<?php
	if($_SERVER['REQUEST_METHOD']==="GET")
	{
		echo $_GET['Name'];
	}
?>
<html>
	<head></head>
	<body>
		<a href="getTest.php?Name=1">Name 1</a>
		<br>
		<a href="getTest.php?Name=2">Name 2</a>
		<br>
		<a href="getTest.php?Name=2234">Name 4</a>

	
	</body>
</html>