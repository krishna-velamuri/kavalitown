<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="kavali,town, municipality, nellore, kanakaptnam, kaavali,kalugolamma, krishna velamuri,oldtown, ramayapatnam, port, thummalapenta, beach,prathapa reddy, rajanala, cinema, potti sri ramulu" />
    <meat name="description" content="kavali town is a big municipality in nellore district. Kavali municipality is formed in 1967." />
    <title>Kavali News</title>
</head>
<body>
    <div class="jumbotron-text">
		<div class="row">
			<div id="news" class="col-md-8">
			
			</div>
			<div class="col-md-4">
				<?php 
					require_once("cgi-bin/config.php");
					$sql = "SELECT NewsId,Title, Description FROM posts";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<div class='divide' id='".$row['NewsId']."'><h4><b><a ng-click='GetNews(".$row['NewsId'].");' style='cursor:pointer;text-decoration:none;'>" . $row["Title"]. "</a></b></h4><p>" . $row["Description"]. "</p></div>";
						}
					} else {
						echo "0 results";
					}
					$conn->close();
				?>
			</div>
		</div>		
    </div>
</body>
</html>