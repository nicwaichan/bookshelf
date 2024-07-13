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

<!-- <link href="../css/carousal.css" rel="stylesheet"> --> <!-- for debugging propose -->
<link href="css/carousal.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div id="carouselWrap">
	<div id="leftArrow"><span class="material-icons">chevron_left</span></div>
	<div id="rightArrow"><span class="material-icons">chevron_right</span></div>
	<ul id="carUl">
		<?php
			$liNo = 0;
			// $fileList = glob('../uploads/*');
			$fileList = glob('uploads/*');
			foreach($fileList as $filename) {
				if(is_file($filename)) {
					echo "<li class='carousel' id='carImg" . $liNo . "'><a href=''>";
					echo '<img src="' . $filename . '" alt="' . $filename . '">';
					echo "<p></p></a></li>";
					$liNo++;
				}
			}
		?>
	</ul>
	<ul id="dotUl">
		<?php
			$liNo = 0;
			foreach($fileList as $filename) {
				echo "<li class='carouselDots' id='dotIndex" . $liNo . "'><a>";
				echo ".</a></li>";
				$liNo++;
			}
		?>
	</ul>
</div>

<script src="js/carousel.js"></script>
<!-- <script src="../js/carousel.js"></script> --> <!-- for debugging propose -->