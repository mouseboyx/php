<!DOCTYPE html>
<html onmousemove="setxy(event)">
<head>
<title>cursor</title>
<script type="text/javascript">
x = 0;
y = 0;
boxx = 50;
boxy = 50;
boxFactor = 1;
function setxy(event) {
document.getElementsByTagName("div")[0].innerHTML=event.clientX+","+event.clientY
x = event.clientX;
y = event.clientY;
}
function movebox() {
	if (boxx<x) {
		boxx+=boxFactor;
		document.getElementById("box").style.left=boxx+"px";
	}
	if (boxx>x) {
		boxx-=boxFactor;
		document.getElementById("box").style.left=boxx+"px";
	}
	if (boxy<y) {
		boxy+=boxFactor;
		document.getElementById("box").style.top=boxy+"px";
	}
	if (boxy>y) {
		boxy-=boxFactor;
		document.getElementById("box").style.top=boxy+"px";
	}
}
function init() {
	setInterval(movebox,10);
}
		
</script>
<style type="text/css">
body {
	width:100%;
	height:100%;
}
#box {
	position:fixed;
	width:5px;
	height:5px;
	background-color:#000000;
}
</style>
</head>
<body onload="init()">
<div></div>
<div id="box" style="left:50px;top:50px;"></div>
</body>
</html>