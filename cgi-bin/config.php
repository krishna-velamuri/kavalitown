<?php
$servername = "tcp:kavali.database.windows.net,1433";
$username = "anupama.krishna";
$password = "kavali@1db";
$dbname = "kavalinews";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
