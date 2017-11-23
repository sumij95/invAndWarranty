<?php include_once('load.php'); ?>

<?php

$sql  ="SELECT name, category, brand from product";
global $conn;

$result = mysqli_query($conn,$sql);

$results = array();
echo mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
	$results[] = $row;
}
return results;
?>