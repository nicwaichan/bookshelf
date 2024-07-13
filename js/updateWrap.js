/*	==============================================================================
 *	Student Name: Wai Chan
 *	SID: 2053 8079
 *	Subject: Web Tech
 *	Assignment 1
 *	© 2021 Wai Chan All Rights Reserved
============================================================================== */

xhr = new XMLHttpRequest();

displaySearch = function(str) {				// ajax for typing the right search box
	let url = "/~wchan2/php/searchDb.php?q=" + str;
	let e = document.getElementById("bookToUpdate");
	let value = e.options[e.selectedIndex].value;
	url = url + "&type=" + value; 

	console.log(url);
	if (str.length == 0) { 
		document.getElementById("ajaxResultWrap").innerHTML = "";
		return;
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("ajaxResultWrap").innerHTML = xhr.responseText;
			document.getElementById("middleDropdownBox").selectedIndex = "0";
		}
	}
	xhr.open("GET", url, true);
	xhr.send();
};

searchBookBy = function() {					// ajax for middle drop down box
	let e = document.getElementById("bookToUpdate");
	let value = e.options[e.selectedIndex].value;

	let url = "/~wchan2/php/searchDb.php?q=" + value;
	// console.log(url);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("middleDropdownBox").innerHTML = xhr.responseText;
			document.getElementById('middleDropdownBox').disabled = false;
			document.getElementById('searchBox').disabled = false;
		}
	}
	xhr.open("GET", url, true);
	xhr.send();
};

dropDownList = function() {
	let e 		= document.getElementById("bookToUpdate");
	let type	= e.options[e.selectedIndex].value;					//get title / author or reviewer
	let radios	= document.getElementsByClassName('searchList');
	let value;

	for (let i = 0; i < radios.length; i++) {						//get selected radio button value 
		if (radios[i].type === 'radio' && radios[i].checked) {
			value = radios[i].value;
			break;
		}
	}
	let url = "/~wchan2/php/showBookCard.php?radio=" + value + "&type=" + type;

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("bookCard").innerHTML = xhr.responseText;
			document.getElementById('searchBox').value = "";
			document.getElementById("ajaxResultWrap").innerHTML = "";
		}
	}
	xhr.open("GET", url, true);
	xhr.send();
};

middledropDownBox = function() {
	let e 		= document.getElementById("bookToUpdate");
	let type	= e.options[e.selectedIndex].value;					//get title / author or reviewer
	let ev		= document.getElementById("middleDropdownBox");
	let value	= ev.options[ev.selectedIndex].value;				//get middle drop down box value
	let url 	= "/~wchan2/php/showBookCard.php?radio=" + value + "&type=" + type;
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("bookCard").innerHTML = xhr.responseText;
			document.getElementById('searchBox').value = "";
			document.getElementById("ajaxResultWrap").innerHTML = "";
		}
	}
	xhr.open("GET", url, true);
	xhr.send();
};

reviewerSubmit = function() {
	console.log("hehehehehe");
}

document.getElementById("middleDropdownBox").addEventListener('mousedown', function() {
	document.getElementById('searchBox').value = "";
	document.getElementById("ajaxResultWrap").innerHTML = "";
});

