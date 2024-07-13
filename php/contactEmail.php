<!--
===========================================================
   Western Sydney University

   Student Name:   Wai Chan
     Student ID:   2053 8079
        Contact:   20538079@student.westernsydney.edu.au  
        Subject:   300693 Web Technologies
     Assignment:   1 - Basic Website Construction
        Due Dte:   3rd Sept 2021

   © 2021 Wai Chan All Rights Reserved
=========================================================== 
-->

<?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$textArea = $_POST['textArea'];
		// echo $name . $email . $textArea;

         $to = "20538079@student.westernsydney.edu.au";
         $subject = "Message from: ";
         
         $message = "<b>This is HTML message.1</b>";
         $message .= "<h1>This is headline.1</h1>";
         
         $header = "From:abc@somedomain1.com \r\n";
         $header .= "Cc:nicwchan@icloud.com.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
		 $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         
         $retval = mail ($to,$subject,$message,$header);

         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
			echo "<br>";
			echo "Pleae click the go back button on your browser to previous page";
         }
?>
