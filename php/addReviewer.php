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
	require_once("connectDbLoc.php");

	$reviewerName 	= trim($_GET['rName']);
	$reviewerDate 	= $_GET['rDate'];
	$bookId			= $_GET['rBookId'];
	$star			= $_GET['star'];
	
	$addReviewer =	"INSERT INTO Reviewer (reviewerName) VALUES ('" . $reviewerName . "')";

	$result = $conn->query($addReviewer);

	$getMaxReviewId = "SELECT MAX(reviewerId) FROM Reviewer";

	$result = $conn->query($getMaxReviewId);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$lastId =  $row["MAX(reviewerId)"];
		}
	}
	
	$addReport = "INSERT INTO Report (bookId, reviewerId, rating, reviewDate) VALUES ('" . $bookId . "','" . $lastId . "','" . $star . "','" . $reviewerDate . "')";

	$result = $conn->query($addReport);

	// echo $addReport;
	echo "<H1>Your rating for this book has been added successfully!</H1>";
	echo "<H1>Click your browser's go back button return to your previous page.</H1>"
?>
