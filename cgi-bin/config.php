<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:kavali.database.windows.net,1433; Database = kavalinews", "anupama.krishna", "kavali@1db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
