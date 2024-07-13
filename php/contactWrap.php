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

<link href="css/contactWrap.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div id="contactWrap">
	<div id="contactBody">
		<a href="/~wchan2/about.php">
			<img src="/~wchan2/media/myPhoto.jpeg" alt="Wai Chan Photo" title="Click to toggle About Me page">
		</a>
		<h1>Let's Get In Touch</h1>
		<h3>
			<span class="material-icons contactIco">local_phone</span>
			 Phone: +61 404 116 106
		</h3>
		<h3 title="Click to open your email client">
			<span class="material-icons contactIco">email</span>
			<a href="mailto:20538079@student.westernsydney.edu.au">
				Email: 20538079@student.westernsydney.edu.au
			</a>
			
		</h3>
		<h3 title="Click to open Google Map page on a new tab">
			<span class="material-icons contactIco">place</span>
			<a href="http://maps.google.com/?q=169 Macquarie St, Parramatta NSW 2150" target="_blank">
				Address: 169 Macquarie St, Parramatta NSW 2150
			</a>
		</h3>
		<hr>
		<form name="contactMeForm" action="/~wchan2/php/contactEmail.php" method="post">
			<input type="text" id="name" class="formVal" name="name" placeholder="Name"><br>
			<input type="email" id="email" name="email" placeholder="Email"><br>
			<textarea id="textArea" class="formVal" name="textArea" rows="4" cols="40" placeholder="Message..."></textarea>
			<br>
			<input id="sendBtn" type="submit" value="SEND MESSAGE">
			<!-- <input id="sendBtn" value="SEND MESSAGE" onclick="contactMeSubmit(); return false;"> -->
		</form>
	</div>
</div>
