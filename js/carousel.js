/*
===========================================================
   Western Sydney University

   Student Name:   Wai Chan
     Student ID:   2053 8079
        Contact:   20538079@student.westernsydney.edu.au  
        Subject:   300693 Web Technologies
     Assignment:   1 - Basic Website Construction
       Due Date:   3rd Sept 2021

   © 2021 Wai Chan All Rights Reserved
=========================================================== 
*/

let carDotClass = document.getElementsByClassName("carouselDots");

getCarPos = function() {
	let getCarId = document.getElementsByClassName('carousel')[0].id;
	return (parseInt(getCarId.substr(6)));
};
setDotsColor = function() {
	for (i = 0; i < carDotClass.length; i++) {
		carDotClass[i].firstElementChild.style.color = "grey";
	};
};
putTopImgtoBtm = function() {		// shuffle the imgs by putting the top one to btm
	let getUl = document.getElementById('carUl');
	let getli = getUl.firstElementChild;
	getUl.appendChild(getli.cloneNode(true));
	getUl.removeChild(getUl.firstElementChild);
};
clickRightArrow = function() {
	let dotIndex = getCarPos() + 1;
	putTopImgtoBtm();
	setDotsColor();
	if (dotIndex < carDotClass.length) {
		carDotClass[dotIndex].firstElementChild.style.color = "white";
	} else {
		carDotClass[0].firstElementChild.style.color = "white";
	};
};
clickLeftArrow = function() {
	let dotIndex = getCarPos() - 1;
	let noOfli = document.querySelectorAll("#carUl li").length - 1;
	for(i = 0; i < noOfli; i++) {		// shuffling -- repeating total of images - 1 
		putTopImgtoBtm();
	};
	setDotsColor();
	if (dotIndex < 0) {
		carDotClass[carDotClass.length - 1].firstElementChild.style.color = "white";
	} else {
		carDotClass[dotIndex].firstElementChild.style.color = "white";
	};
};

/* 
Nav to img when click the corresponding dot -- to be done (when I have time)
*********************************************************************************
dotInd = function(e) {			
	let de = e.target.parentNode.id;
	// console.log(de);
};
document.getElementById("dotUl").addEventListener("click", dotInd);
*********************************************************************************
*/

document.getElementById("rightArrow").addEventListener("click", clickRightArrow);
document.getElementById("leftArrow").addEventListener("click", clickLeftArrow);
