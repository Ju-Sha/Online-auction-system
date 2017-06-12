<?php
//$v = pathinfo(__FILE__, PATHINFO_FILENAME);
//echo $v;

$conn = mysqli_connect("localhost", "root", "", "trial") or die("Couldn't connect.");
$sql = "SELECT item_id FROM item ORDER BY item_id desc";
// $result = $conn->query($sql);
$run = mysqli_query($conn, $sql);
echo mysqli_error($conn);
echo mysqli_fetch_assoc($run)['item_id'];

?>