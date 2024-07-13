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

<!-- <link href="../css/updateWrap.css" rel="stylesheet"> -->
<link href="css/updateWrap.css" rel="stylesheet">
<link href="css/displayRecord.css" rel="stylesheet">
<!-- <link href="css/displayRecord.css" rel="stylesheet"> -->

<div id="updateWrap">
    <h1 id="indexH1">&lt; Review Book &gt;</h1>
    <hr id="indexHr">
    <div id="updateMenuBar">
        <!-- <form method = "post" action = "http://www.deitel.com"> -->
        <form>
            <select id="bookToUpdate" onclick="searchBookBy()">
                <option value="" disabled selected>Search Book(s) By</option>
                <option value="title">Title</option>
                <option value="author">Author</option>
                <option value="reviewer">Reviewer</option>
                <option value="Rating">Rating</option>
            </select>

            <select name="dropDownBox" id="middleDropdownBox" onClick="middledropDownBox()" disabled>
                <!-- <option value="" disabled selected>Select a Book Title below</option> -->
            </select>
            <input  id="searchBox" name = "name" type = "text" size = "35" 
                    placeholder="Search by Keywords..." onkeyup="displaySearch(this.value)" disabled>
        </form>
        <div id="ajaxResultWrap" onclick="dropDownList()"></div>
    </div>
    <br>
    <div id="bookCard">

<!-- <input class="submitBtn" type="submit" value="Submit"> -->
<!-- <button type="button" onclick="reviewerSubmit(); return false;">Add Item</button> -->

    </div>
</div>

<script src="js/updateWrap.js"></script>
