<!DOCTYPE html>
<html id="html">
<head>
<meta charset="utf-8">
<title>cursor</title>
<script type="text/javascript">
var fF=1;
var y;
var x;
function setxy(event) {

x = event.clientX;
y = event.clientY;

}
function moveEverything() {

for (i=0; i<numDivs; i++) {
	if (parseFloat(thedivs[i].style.top)<y) {
		thedivs[i].style.top=(parseFloat(thedivs[i].style.top)+fF*i)+"px"
	}
	if (parseFloat(thedivs[i].style.top)>y) {
		thedivs[i].style.top=(parseFloat(thedivs[i].style.top)-fF*i)+"px"
	}
	if (parseFloat(thedivs[i].style.left)<x) {
		thedivs[i].style.left=(parseFloat(thedivs[i].style.left)+fF*i)+"px"
	}
	if (parseFloat(thedivs[i].style.left)>x) {
		thedivs[i].style.left=(parseFloat(thedivs[i].style.left)-fF*i)+"px"
	}
	
}

}
function init() {
thedivs = [];
thedivM = [];
divFactor=6;
numDivs=20;
	for (i=0; i<numDivs; i++) {
		thedivs[i]=document.createElement("div");
		thedivs[i].style.width=(i*divFactor)+"px";
		thedivs[i].style.height="2px";
		thedivs[i].style.position="absolute";
		thedivs[i].style.top="0px";
		thedivs[i].style.left="0px";
		if (i%2==0) {
			
			thedivs[i].style.transform="rotate(90deg)";
			
		}
		//thedivs[i].style.left="-"+((i*divFactor)/2)+"px";

		thedivM[i]=((i*divFactor)/2)
		thedivs[i].style.backgroundColor="#000000";
		
		document.body.appendChild(thedivs[i]);
	}
	document.getElementById("html").addEventListener("mousemove",function(event) {setxy(event)});
	setInterval(moveEverything,100);
}
</script>
</head>
<body onload="init()">
</body>
