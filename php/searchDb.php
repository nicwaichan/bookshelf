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

	$word 			= trim($_GET['q']);
	$type			= trim($_GET['type']);

	$title 			= "SELECT title FROM Book ORDER BY BookId DESC;";
	$author			= "SELECT authorName FROM Author;";
	$reviewer 		= "SELECT reviewerName FROM Reviewer;";

	$typeTitle		= "SELECT * FROM Book WHERE title LIKE '%$word%';";
	$typeAuthor		= "SELECT * FROM Author WHERE authorName LIKE '%$word%';";
	$typeReviewer 	= "SELECT * FROM Reviewer WHERE reviewerName LIKE '%$word%';";


	if ($type == "") {						// i.e. click far left box!
		// activateMiddleDroupDown($tword);
		if ($word == "title") {
			$sql = $title;
		} elseif ($word == "author") {
			$sql = $author;
		} elseif ($word == "reviewer") {
			$sql = $reviewer;
		};

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo '<option value="xxx" disabled selected>Select ' .  $word  . ' below</option>';
			while($row = $result->fetch_assoc()) {
				if 	($word == "title") {
					echo '<option value="' . $row["title"] . '">' .  $row["title"] . '</option>';
				} elseif ($word == "author") {
					echo '<option value="' . $row["authorName"] . '">' .  $row["authorName"] . '</option>';
				} elseif ($word == "reviewer") {
					echo '<option value="' . $row["reviewerName"] . '">' .  $row["reviewerName"] . '</option>';
				}
			}
		}
	} else {								// i.e. type on search box
		if ($type == "title") {
			$sql = $typeTitle;
		} elseif ($type == "author") {
			$sql = $typeAuthor;
		} elseif ($type == "reviewer") {
			$sql = $typeReviewer;
		};

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if 	($type == "title") {
					echo '<label>' . $row["title"] . '<input type="radio" class="searchList" name="searchList" value="' . 
					$row["title"] . '"></label><br>';
				} elseif ($type == "author") {
					echo '<label>' . $row["authorName"] . '<input type="radio" class="searchList" name="searchList" value="' . 
					$row["authorName"] . '"></label><br>';
				} elseif ($type == "reviewer") {
					echo '<label>' . $row["reviewerName"] . '<input type="radio" class="searchList" name="searchList" value="' . 
					$row["reviewerName"] . '"></label><br>';
				}
			}
			echo '<hr>';
		}
	}
?>
