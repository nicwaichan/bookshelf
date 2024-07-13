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
    $host   = "localhost";
    $user   = "wchan2";
    $pw     = "w_C_036527";
    $db     = "db_wchan2";

    $conn   = new mysqli($host, $user, $pw, $db);
    
    if ($conn->connect_error) {
        die('Connection error: ' . $conn->connect_error);
    }
    echo "Connected. " . $conn->host_info;
   
    // $conn->close();
?>
