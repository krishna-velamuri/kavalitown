<?php
	include("config.php");
	$title = $_POST[title];
	$postedBy = $_POST[iam];
	$listedFor = $_POST[listedFor];
	$area = $_POST[area];
	$price = $_POST[price];
	$propAge = $_POST[propertyAge];
	$locality = $_POST[locality];
	$description = $_POST[description];
	$propertyType = $_POST[propertyType];
	$name = $_POST[name];
	$contact = $_POST[contact];
	$req = $_POST[requirement];
	if($locality =='Select...')
		$locality = NULL;
	$req ="Sale";
	if($req == 'Buy')
	{
		$sql = "SELECT Title,PropertyType,Area,Price ,PropertyAge,Locality,Description, PostedDate, Views FROM Properties WHERE PropertyType='".$propType."'  
		AND Area >".$areaFrom." AND AreaTo <".$areaTo." AND PriceFrom >".$priceFrom." AND PriceTo <".$priceTo." AND PropertyAge =".$propAge." 
		AND Locality ='" .$locality. "'" ;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo json_encode("<div><h4><b>" . $row["Title"]. "</b></h4><hr/> 
				<span class='pull-left'>Prop:" . $row["PropertyType"] ."</span><span class='pull-right'> Locality:". $row["Locality"] . "</span>
				<br/><p>" . $row["$areaFrom"]. "Sqft<span class='pull-right'>".$row["$PriceFrom"]."</span></p></div>");
			}
		} else {
			echo json_encode("0 results");
		}
	}
	else if($req == 'Sale')
	{
		$sql = "INSERT INTO Properties(Title,PostedBy,PropertyType,ListedFor,Area,Price,PropertyAge,Locality,Description,Name,Contact,PostedDate, Views) VALUES('$title','$postedBy','$propertyType','$listedFor','$area','$price','$propAge','$locality','$description','$name','$contact',NOW(),0)";

		if ($conn->query($sql) === TRUE) {
			header("location: ../index.html#/realestate");
		echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br/>" . $conn->error;
		}
	}
	$conn->close();
?>