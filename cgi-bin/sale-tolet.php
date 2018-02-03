<?php
	include("config.php");
	$title = $_POST[title];
	$postedBy = $_POST[postedBy];
	$listedFor = $_POST[listedFor];
	$area = $_POST[area];
	$price = $_POST[price];
	$propertyAge = $_POST[propertyAge];
	$locality = $_POST[locality];
	$description = $_POST[description];
	$propertyType = $_POST[propertyType];
	$name = $_POST[name];
	$contact = $_POST[contact];
	if($locality =='Select...')
		$locality = NULL;
		
	$sql = "INSERT INTO Properties(Title,PostedBy,PropertyType,ListedFor,Area,Price,PropertyAge,Locality,Description,Name,Contact,PostedDate, Views) VALUES('$title','$postedBy','$propertyType','$listedFor','$area','$price','$propertyAge','$locality','$description','$name','$contact',NOW(),0)";

	if ($conn->query($sql) === TRUE) {
		echo "Posted Successfully";
	} else {
		echo "Error: " . $sql . "<br/>" . $conn->error;
	}
$conn->close();
?>		