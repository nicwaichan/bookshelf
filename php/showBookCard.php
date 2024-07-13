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

<svg style="display:none;">    <!--copy from https://codepen.io/ianmcodes/full/VwvXYYG -->
  <defs>
    <symbol id="fivestars">
      <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="rgb(211, 202, 211)" fill-rule="evenodd"/>
      <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="rgb(211, 202, 211)" fill-rule="evenodd" transform="translate(24)"/>
      <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="rgb(211, 202, 211)" fill-rule="evenodd" transform="translate(48)"/>
      <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="rgb(211, 202, 211)" fill-rule="evenodd" transform="translate(72)"/>
      <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="rgb(211, 202, 211)" fill-rule="evenodd"  transform="translate(96)"/>
    </symbol>
  </defs>
</svg>

<?php
	require_once("connectDbLoc.php");

	$word 			= trim($_GET['radio']);
	$type			= trim($_GET['type']);

	$word 			= "'" . $word . "'";

	if ($type=="title") {
		$sql =  "SELECT
					title, Book.bookId, authorName, ROUND(AVG(rating),1), imgPath, amazonLink
						FROM Authorship
							JOIN Book
								ON Authorship.bookId = Book.bookId
							JOIN Author
								ON Authorship.authorId = Author.authorId
							LEFT JOIN Report
								ON Authorship.bookId = Report.bookId
									WHERE title = $word";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo '<div id="displayRecord">';
					echo '<div id="bookImg">';
						echo '<img src="' . $row["imgPath"] . '" alt="Book Cover Img">';
					echo "</div>";
					echo '<div id="bookInfo">';
						echo '<h1>' . $row["title"] . '</h1><hr>';
						echo '<h2>- by ' . $row["authorName"] . '</h2>';
					echo "</div>";
					echo '<div id="rightBox">';
						echo '<p>Our Ratings</p>';
						echo '<span>' . $row["ROUND(AVG(rating),1)"] . '</span> / 5<br>';
						echo '<div class="rating">';
							echo '<progress class="rating-bg" value="' . $row["ROUND(AVG(rating),1)"] . '" max="5"></progress>';
							echo '<svg><use xlink:href="#fivestars"/></svg>';
						echo "</div>";
						echo '<a href="' . $row["amazonLink"] . '" target="_blank"><button>View on Amazon</button></a>';
					echo "</div>";
				echo "</div>";

				echo	'<form action="/~wchan2/php/addReviewer.php" method="get">';

					echo	'<label for="rName">Your Name: </label>';
					echo	'<input type="text" id="rName" name="rName" required="required"
							 placeholder="Please type your name...">';
					echo	'<label for="rDate">Review Date: </label>';
					echo	'<input type="date" id="rDate" name="rDate" required="required">';
					echo	'<span> Please select your rating: </span>';
					echo	'<input class="submitBtn" type="submit" value="Submit">';
					
					echo '<div class="reviewerRating">';
						echo '<input id="star5" name="star" type="radio" value="5" class="radioBtn hide" required />';
						echo '<label for="star5" >☆</label>';
						echo '<input id="star4" name="star" type="radio" value="4" class="radioBtn hide" />';
						echo '<label for="star4" >☆</label>';
						echo '<input id="star3" name="star" type="radio" value="3" class="radioBtn hide" />';
						echo '<label for="star3" >☆</label>';
						echo '<input id="star2" name="star" type="radio" value="2" class="radioBtn hide" />';
						echo '<label for="star2" >☆</label>';
						echo '<input id="star1" name="star" type="radio" value="1" class="radioBtn hide" />';
						echo '<label for="star1" >☆</label>';
						echo '<div class="clear"></div>';
					echo '</div>';
					echo '<input type="hidden" id="bookId" name="rBookId" value="' . $row["bookId"] . '">';
				echo	'</form>';
				echo '<br>';
			}
		}
	}

	if ($type=="author") {
		$sql = "SELECT
					title, Book.bookId, authorName, ROUND(AVG(rating),1), imgPath, amazonLink
						FROM Authorship
							JOIN Book
								ON Authorship.bookId = Book.bookId
							JOIN Author
								ON Authorship.authorId = Author.authorId
							LEFT JOIN Report
								ON Authorship.bookId = Report.bookId
									WHERE authorName = $word
									GROUP BY Authorship.bookId";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo '<div id="displayRecord">';
					echo '<div id="bookImg">';
						echo '<img src="' . $row["imgPath"] . '" alt="Book Cover Img">';
					echo "</div>";
					echo '<div id="bookInfo">';
						echo '<h1>' . $row["title"] . '</h1><hr>';
						echo '<h2>- by ' . $row["authorName"] . '</h2>';
					echo "</div>";
					echo '<div id="rightBox">';
						echo '<p>Our Ratings</p>';
						echo '<span>' . $row["ROUND(AVG(rating),1)"] . '</span> / 5<br>';
						echo '<div class="rating">';
							echo '<progress class="rating-bg" value="' . $row["ROUND(AVG(rating),1)"] . '" max="5"></progress>';
							echo '<svg><use xlink:href="#fivestars"/></svg>';
						echo "</div>";
						echo '<a href="' . $row["amazonLink"] . '" target="_blank"><button>View on Amazon</button></a>';
					echo "</div>";
				echo "</div>";
				// echo	'<form>';
				echo	'<form action="/~wchan2/php/addReviewer.php" method="get">';


				echo	'<label for="rName">Your Name: </label>';
				echo	'<input type="text" id="rName" name="rName" required="required" 
						 placeholder="Please type your name...">';
				echo	'<label for="rDate">Review Date: </label>';
				echo	'<input type="date" id="rDate" name="rDate" required="required">';
				echo	'<span> Please select your rating: </span>';
				echo	'<input class="submitBtn" type="submit" value="Submit">';
				
				echo '<div class="reviewerRating">';
					echo '<input id="star5" name="star" type="radio" value="5" class="radioBtn hide" required />';
					echo '<label for="star5" >☆</label>';
					echo '<input id="star4" name="star" type="radio" value="4" class="radioBtn hide" />';
					echo '<label for="star4" >☆</label>';
					echo '<input id="star3" name="star" type="radio" value="3" class="radioBtn hide" />';
					echo '<label for="star3" >☆</label>';
					echo '<input id="star2" name="star" type="radio" value="2" class="radioBtn hide" />';
					echo '<label for="star2" >☆</label>';
					echo '<input id="star1" name="star" type="radio" value="1" class="radioBtn hide" />';
					echo '<label for="star1" >☆</label>';
					echo '<div class="clear"></div>';
				echo '</div>';
				echo '<input type="hidden" id="bookId" name="rBookId" value="' . $row["bookId"] . '">';
			echo	'</form>';
				echo '<br>';
			}
		}
	}

	if ($type=="reviewer") {
		$sql = "SELECT
					title, Book.bookId, authorName, ROUND(AVG(rating),1), reviewerName, Book.imgPath, amazonLink
						FROM Authorship
							JOIN Book
								ON Authorship.bookId = Book.bookId
							JOIN Author
								ON Authorship.authorId = Author.authorId
							LEFT JOIN Report
								ON Authorship.bookId = Report.bookId
			  				JOIN Reviewer
								ON Reviewer.reviewerId = Report.reviewerId
									WHERE reviewerName = $word
										GROUP BY Authorship.bookId";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo '<div id="displayRecord">';
					echo '<div id="bookImg">';
						echo '<img src="' . $row["imgPath"] . '" alt="Book Cover Img">';
					echo "</div>";
					echo '<div id="bookInfo">';
						echo '<h1>' . $row["title"] . '</h1><hr>';
						echo '<h2>- by ' . $row["authorName"] . '</h2>';
					echo "</div>";
					echo '<div id="rightBox">';
						echo '<p>Our Ratings</p>';
						echo '<span>' . $row["ROUND(AVG(rating),1)"] . '</span> / 5<br>';
						echo '<div class="rating">';
							echo '<progress class="rating-bg" value="' . $row["ROUND(AVG(rating),1)"] . '" max="5"></progress>';
							echo '<svg><use xlink:href="#fivestars"/></svg>';
						echo "</div>";
						echo '<a href="' . $row["amazonLink"] . '" target="_blank"><button>View on Amazon</button></a>';
					echo "</div>";
				echo "</div>";
				// echo	'<form>';
				echo	'<form action="/~wchan2/php/addReviewer.php" method="get">';

					echo	'<label for="rName">Your Name: </label>';
					echo	'<input type="text" id="rName" name="rName" required="required" 
							placeholder="Please type your name...">';
					echo	'<label for="rDate">Review Date: </label>';
					echo	'<input type="date" id="rDate" name="rDate" required="required">';
					echo	'<span> Please select your rating: </span>';
					echo	'<input class="submitBtn" type="submit" value="Submit">';
					
					echo '<div class="reviewerRating">';
						echo '<input id="star5" name="star" type="radio" value="5" class="radioBtn hide" required />';
						echo '<label for="star5" >☆</label>';
						echo '<input id="star4" name="star" type="radio" value="4" class="radioBtn hide" />';
						echo '<label for="star4" >☆</label>';
						echo '<input id="star3" name="star" type="radio" value="3" class="radioBtn hide" />';
						echo '<label for="star3" >☆</label>';
						echo '<input id="star2" name="star" type="radio" value="2" class="radioBtn hide" />';
						echo '<label for="star2" >☆</label>';
						echo '<input id="star1" name="star" type="radio" value="1" class="radioBtn hide" />';
						echo '<label for="star1" >☆</label>';
						echo '<div class="clear"></div>';
					echo '</div>';
					echo '<input type="hidden" id="bookId" name="rBookId" value="' . $row["bookId"] . '">';
				echo	'</form>';
				echo '<br>';
			}
		}
	}
?>
