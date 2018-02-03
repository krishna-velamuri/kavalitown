<?php
  $from = "test@mail.com"; 
  $to = "kittu.sra@gmail.com";
  //$name = $_POST['name'];
  //$mobile = $_POST['mobile'];
  $subject = $_POST['subject'];  
  $message = $_POST['comments'];

  $headers = 'From: test@mail.com' . "\r\n" .
             'Reply-To: kittu.sra@gmail.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion(); 
  $retval = mail($to, $subject, $message, $header);
  if( $retval == true ) {
	echo "Message sent successfully...";
	 }
	 else {
		echo "Message could not be sent...";
	 }
?>