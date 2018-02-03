<?php
   include("config.php");
	  session_start();   
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      //echo $myusername . " ". $mypassword
      $sql = "SELECT UserId FROM users WHERE UserName = '$myusername' and Password = '$mypassword'";
	  $result = $conn->query($sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
		if ($result->num_rows > 0) {
         //session_register("isLogged");
         $_SESSION['isLogged'] = true;         
         header("location: ../index.html#/post");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
?>