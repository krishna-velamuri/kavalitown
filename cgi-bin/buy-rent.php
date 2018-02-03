<?php
	include("config.php");
	$listedFor = $_POST[listedFor];
	$areaFrom = $_POST[areaFrom];
	$areaTo = $_POST[areaTo];
	$priceFrom = $_POST[priceFrom];
	$priceTo = $_POST[priceTo];
	$locality = $_POST[locality];
	$propertyType = $_POST[propertyType];
	$broker = $_POST[broker];
	if($listedFor == "Buy")
		$listedFor ="Sale";
	if($propertyType == "")
		$propertyType ="FLATS";
	$a ="";
	if($areaFrom !="Select...")
		$a .= " AND Area > '{$areaFrom}'";
	if($areaTo !="Select...")
		$a .= " AND Area < '{$areaTo}'";
	if($priceFrom !="Select...")
		$a .= " AND Price > '{$priceFrom}'";
	if($priceTo !="Select...")
		$a .= " AND Price < '{$priceTo}'";
	if($locality !="Select..." AND $locality != "All")
		$a .= " AND Locality = '{$locality}'";
	if($broker == 'true')
		$a .= " AND PostedBy = 'Owner'";
	$sql = "SELECT Title,PropertyType,Area,Price ,PropertyAge,Locality,Description, PostedDate,Name, Contact, Views FROM Properties WHERE PropertyType='".$propertyType."' AND ListedFor='".$listedFor."'".$a;
	$result = $conn->query($sql);
		$output = "";
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$output .= "<div><h4><b>" . $row["Title"]. "</b></h4>
				<span class='pull-left'><h>Property Type:</h> " . $row["PropertyType"] ."</span><span class='pull-right'> <h>Locality:</h> ". $row["Locality"] . "</span><br/><p> <h>Area:</h> " . $row["Area"]. "Sqft<span class='pull-right'><h>Price:</h> ".$row["Price"]."</span></p><p>".$row["Description"]."</p></div><div><h4>Contact:</h4><p><h>Person:</h> ".$row["Name"]."<span class='pull-right'> <h>Contact:</h> ". $row["Contact"] . "</span></p></div><br/>";
			}
			echo json_encode($output);
		} else {
			echo json_encode("No Results Found");
		}
$conn->close();
?>