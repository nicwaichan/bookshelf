/*	==============================================================================
 *	Student Name: Wai Chan
 *	SID: 2053 8079
 *	Subject: Web Tech
 *	Assignment 1
 *	© 2021 Wai Chan All Rights Reserved
============================================================================== */



var ua = window.navigator.userAgent;
var iOS = !!ua.match(/iPad/i) || !!ua.match(/iPhone/i);
var webkit = !!ua.match(/WebKit/i);
var iOSSafari = iOS && webkit && !ua.match(/CriOS/i);

var winW = $(window).width() 
 var winH = $(window).height()

console.log(ua);
console.log(iOS);
console.log(webkit);
console.log(iOSSafari);
console.log(winW);
console.log(winH);
console.log("12345");

var isMob = /Mobi|Android/i.test(navigator.userAgent);

if (isMob) {
	$("<link/>", {
		rel: "stylesheet",
		type: "text/css",
		href: "../~wchan2/css/appMobile.css"
	}).appendTo("head");
};

