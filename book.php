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

<!DOCTYPE html>
<html>
    <head>
        <?php include 'php/head.php' ?>
        <link href="css/bookPage.css" rel="stylesheet">
    </head>

    <body>
        <div id="menuMobile"></div>
        <div id="greyOut"><a><span class="material-icons">close</span></a></div>
	    <div id="mainWrap">
            <div id="navBarWrap">
                <?php include 'php/navBarLogo.php' ?>
                <?php include 'php/navBarIcon.php' ?>
                <?php include 'php/navBarPage.php' ?>

            </div>
            <h1 id="indexH1">&lt; Our Book List &gt;</h1>
            <hr id="indexHr">

            <div id="updateMenuBar">
                <form>
                    <select id="bookToUpdate" onclick="searchBookBy()">
                        <option value="" disabled selected>Sort Books By (to be done)</option>
                        <option value="higherReview">Most Popular</option>
                        <option value="lowerReview">Less Popular</option>
                        <option value="highRating">Higher Rating</option>
                        <option value="lowerRating">Higher Rating</option>
                        <option value="latest">Latest Upload</option>
                        <option value="oldest">Oldest Upload</option>
                    </select>

                    <select name="dropDownBox" id="middleDropdownBox" onClick="middledropDownBox()" disabled>
                        <!-- <option value="" disabled selected>Select a Book Title below</option> -->
                    </select>
                    <input  id="searchBox" name = "name" type = "text" size = "35" 
                            placeholder="Search by Keywords..." onkeyup="displaySearch(this.value)" disabled>
                </form>
            </div>
            <br>

            <?php include 'php/displayRecord.php' ?>
            <footer>
		        <p>© 2021 Wai Chan (Western Sydney University SID: 20538079) All Rights Reserved</p>
	        </footer>
        </div>
    </body>
</html>
