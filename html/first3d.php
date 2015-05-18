<!DOCTYPE html>
<html onkeydown="setPerspective(event)">
<head>
<title>first3d</title>
<script type="text/javascript">
function init() {
wx = document.documentElement.clientWidth;
wy = document.documentElement.clientHeight;
bx = 100;
by = 100;
pox = 50;
poy = 200;
left = false;
right = false;
up = false;
down = false;
xp = 0;
yp = 0;
zp = 0;
thediv = document.createElement("div");
thediv.innerHTML="test";
thediv.style.backgroundColor="#000000";
thediv.style.color="#ffffff";
thediv.style.width=bx+"px";
thediv.style.height=by+"px";
thediv.style.position="absolute";
thediv.style.top=((wy/2)-(by/2))+"px";
thediv.style.left=((wx/2)-(bx/2))+"px";

thediv2 = document.createElement("div");
thediv2.innerHTML="test";
thediv2.style.backgroundColor="#ff0000";
thediv2.style.color="#ffffff";
thediv2.style.width=bx+"px";
thediv2.style.height=by+"px";
thediv2.style.position="absolute";
thediv2.style.top=((wy/2)-(by/2))+"px";
thediv2.style.left=((wx/2)-(bx/2))+"px";
thediv2.style.transform=" translate3d(100px,0px,0px)";

document.getElementsByTagName("body")[0].style.perspective="0px";
document.getElementsByTagName("body")[0].appendChild(thediv);
document.getElementsByTagName("body")[0].appendChild(thediv2);

// setInterval(set3d,500);
setInterval(movekeys,10);
}
function set3d() {
x1 = document.getElementById("x1");
y1 = document.getElementById("y1");
z1 = document.getElementById("z1");
thediv.innerHTML=x1.value+","+y1.value+","+z1.value;

// thediv.style.transform="translateX("+x1.value+")";
thediv.style.transform="translate3d("+x1.value+"px,"+y1.value+"px,"+z1.value+"px)";
}
function setPerspective(event) {
var key = event.which || event.keyCode;
if (key==37) {
xp-=2;
}
if (key==39) {
xp+=2;
}
if (key==38) {
yp-=2;
}
if (key==40) {
yp+=2;
}
if (key==32) {
zp+=2;
}
if (key==8) {
zp-=2;
}
thediv.style.transform="translate3d("+xp+"px,"+yp+"px,"+zp+"px)";
// document.getElementsByTagName("body")[0].style.perspectiveOrigin=pox+"% "+poy+"%";
//document.getElementsByTagName("body")[0].style.perspectiveOrigin="50% 150%";
}
function movekeys() {
if (left) {
pox-=1;
}
//document.getElementsByTagName("body")[0].style.perspectiveOrigin=pox+"% "+poy+"%";
}
</script>
<style type="text/css">
body {
	perspective:400px;
	perspective-origin:50% 200%;

}
div.test {
	width:100px;
	height:100px;
	background-color:#ff0000;
	transform:translateX(2px);
	
}
</style>
</head>
<body onload="init()">
<input type="text" value="1" id="x1" size="4">
<input type="text" value="1" id="y1" size="4">
<input type="text" value="1" id="z1" size="4">
<div class="test"></div>
</body>
</html>