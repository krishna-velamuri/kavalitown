<?php
	$newsId = $_GET['newsId'];
	require_once("config.php");		
		$sql = "UPDATE Posts SET Views = Views +1 WHERE NewsId=".$newsId;
		$conn->query($sql);
		$sql = "SELECT Title,Post,Image, PostedDate, Views FROM Posts WHERE NewsId=".$newsId;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo json_encode("<div><h4><b>" . $row["Title"]. "</b></h4><hr/> 
				<span class='pull-left newsdate'>Date:" . $row["PostedDate"] ."</span><span class='pull-right newsdate'> Views:". $row["Views"] . "</span>
				<br/><div><img src='../kavali.com/News/". $row["Image"] ."'><p>" . $row["Post"]. "</p></div></div>");
			}
		} else {
			echo json_encode("0 results");
		}
		$conn->close();
?>