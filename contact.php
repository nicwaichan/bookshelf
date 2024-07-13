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
            <?php include 'php/contactWrap.php' ?>
            <footer>
		        <p>© 2021 Wai Chan (Western Sydney University SID: 20538079) All Rights Reserved</p>
	        </footer>
        </div>
    </body>
</html>
