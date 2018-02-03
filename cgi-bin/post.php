<?php
	include("config.php");
	$title = $_POST[title];
	$desc = $_POST[description];
	$news = $_POST[news];
	$sql = "INSERT INTO Posts(Title,Description,Post,PostedDate) VALUES('$title','$desc','$news',NOW())";

	if ($conn->query($sql) === TRUE) {
		header("location: ../index.html#/post");
    echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br/>" . $conn->error;
	}
	$conn->close();
?>