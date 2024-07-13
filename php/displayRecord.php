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

<!-- <link href="../css/displayRecord.css" rel="stylesheet"> -->    <!-- for standalone development / debugging purpose -->
<link href="css/displayRecord.css" rel="stylesheet">

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

    $sql =  "SELECT
                title, authorName, ROUND(AVG(rating),1), imgPath, amazonLink
                    FROM Authorship
                        JOIN Book
                            ON Authorship.bookId = Book.bookId
                        JOIN Author
                            ON Authorship.authorId = Author.authorId
                        LEFT JOIN Report
                            ON Authorship.bookId = Report.bookId
                            GROUP BY Book.title
                            ORDER BY Book.bookId DESC";

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
        }
    }
    $conn->close();
?>
