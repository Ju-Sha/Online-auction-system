<?php
	$strUrlOrig = basename($_SERVER['REQUEST_URI']);
	$strUrl = $strUrlOrig;
	echo str_replace("offset=9", "offset=0", $strUrl);
	echo $strUrl;
?>