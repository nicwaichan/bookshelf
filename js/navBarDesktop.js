/*
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
*/

pathname = $(location).attr('pathname');
console.log(pathname);

navBarPageOnClick = function() {
	if ((pathname == "/~wchan2/index.php") || (pathname == "/~wchan2/")) {
		$("#navBarPage li:nth-child(1) a").css({
			'color': "rgb(235, 59, 135)",
			"animation": "0s"
		});
	};
	if (pathname == "/~wchan2/book.php") {
		$("#navBarPage li:nth-child(2) a").css({
			'color': "rgb(235, 59, 135)",
			"animation": "0s"
		});
	};
	if (pathname == "/~wchan2/update.php") {
		$("#navBarPage li:nth-child(3) a").css({
			'color': "rgb(235, 59, 135)",
			"animation": "0s"
		});
	};
	if (pathname == "/~wchan2/about.php") {
		$("#navBarPage li:nth-child(4) a").css({
			'color': "rgb(235, 59, 135)",
			"animation": "0s"
		});
	};
	if (pathname == "/~wchan2/contact.php") {
		$("#navBarPage li:nth-child(5) a").css({
			'color': "rgb(235, 59, 135)",
			"animation": "0s"
		});
	};
}

$(document).ready(function() {

	navBarPageOnClick();

	$("#menuBtn").on("touchend", function(e) {
		e.preventDefault();
		console.log("pathname");
		$("#greyOut, #mainWrap, #navBarWrap").animate({right: '250px'});
		$("#greyOut").css("display", "block");
		$("#menuBtn, #navBarWrap").css("opacity", "0");

		$($('#navBarPage').clone()).appendTo("#menuMobile");

		$("#navBarPage").css("display", "inline-block");
	});

	$("#greyOut").on("touchend", function(e) {
		e.preventDefault();
		$("#greyOut, #mainWrap, #navBarWrap").animate({right: '0'});
		$("#greyOut").hide();
		$("#menuBtn, #navBarWrap").css("opacity", "1");
		$("#navBarWrap").css("position", "sticky");
		$("#navBarPage").css("display", "none");
	});

	$("#greyOut").on("touchstart", function(e) {
		e.preventDefault();
	});

	var lastY;
	$(document).on('touchmove', function(e) {
		var currentY = e.touches[0].clientY;
		var asd = currentY - lastY;
		if (asd < 0) {				 	
			$("#navBarWrap").css("position", "relative");
		}
		lastY = currentY;
	});

	$(document).on('touchstart', function(e) {
		var touchStart = e.touches[0].clientY;
		var touchDistance = 0;
	
		function touchMove(e) {
			touchDistance = e.touches[0].clientY - touchStart;
			if (touchDistance > 5) {
				$("#navBarWrap").css("position", "sticky");
			};
 		}
		$(this).on('touchmove', touchMove).one('touchend', function() {
			$(this).off('touchmove', touchMove);
		});
	});
});
