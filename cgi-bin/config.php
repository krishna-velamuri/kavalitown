<?php
$servername = "kavali.database.windows.net";
$username = "anupama.krishna";
$password = "kavali@1db";
$dbname = "kavalinews";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
