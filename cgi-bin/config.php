<?php
$connectionInfo = array("UID" => "anupama.krishna@kavali", "pwd" => "kavali@1db", "Database" => "kavalinews", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:kavali.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
