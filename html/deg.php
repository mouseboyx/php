<!DOCTYPE html>
<html id="html" onmousemove="setxy(event)">
<head>
<meta charset="utf-8">
<title>deg</title>
<script type="text/javascript">
function init() {
thediv = null;
thedivs = [];
r=false;
randFactor=0.5;
divfactor=(0.002)/100;
divcount=200;
width = 600;
widthFactor=250;
height = 25;
startx = 300;
starty = 250;
background="rgba(0,0,0,0.25)"
deg = 0;
x = startx;
y = starty;
newx = startx;
newy = starty;
	/*
	thediv=document.createElement("div");
	thediv.style.width=width+"px";
	thediv.style.height=height+"px";
	thediv.style.position="absolute";
	thediv.style.left=startx+"px";
	thediv.style.top=starty+"px";
	thediv.style.backgroundColor=background;
	document.body.appendChild(thediv);

	point=document.createElement("div");
	point.style.width="2px";
	point.style.height="2px";
	point.style.position="absolute";
	point.style.left=startx+"px";
	point.style.top=starty+"px";
	point.style.backgroundColor="#ff0000";
	document.body.appendChild(point);
*/
	for (i=0; i<divcount; i++) {
		
		thedivs[i]=document.createElement("div");
		thedivs[i].style.borderRadius="20px";
		thedivs[i].width=(widthFactor*((i+1)/100));
		thedivs[i].style.width=thedivs[i].width+"px";
		thedivs[i].style.height=height+"px";
		thedivs[i].style.position="fixed";
		thedivs[i].style.left=startx+"px";
		thedivs[i].style.top=starty+"px";
		thedivs[i].style.backgroundColor=background;
		if (!r) {
			rand=0
		} else {
			rand=Math.random()*randFactor;
		}
		thedivs[i].speed=(i+1)*(i*divfactor)+1+(rand);
		thedivs[i].newx=0;
		thedivs[i].newy=0;
		thedivs[i].deg=0;
		
		document.body.appendChild(thedivs[i]);
	}

	setInterval(moveEverything,10);
}
function moveEverything() {
/*
deg=deg+(1);
rad = (deg/360)*(2*Math.PI);
newx = ((width/2)-((width/2)*Math.cos(rad)))
newx = startx-newx;
newy = (((width/2)*Math.sin(rad)));
newy = starty+newy;
thediv.style.left=newx+"px";
thediv.style.top=newy+"px";
thediv.style.transform="rotate("+deg+"deg)";
*/
for (i=0; i<thedivs.length; i++) {
	thedivs[i].deg=thedivs[i].deg+(thedivs[i].speed);
	rad= (thedivs[i].deg/360)*(2*Math.PI);
	thedivs[i].newx = ((thedivs[i].width/2)-((thedivs[i].width/2)*Math.cos(rad)));
	thedivs[i].newx = startx-thedivs[i].newx;
	thedivs[i].newy = (((thedivs[i].width/2)*Math.sin(rad)));
	thedivs[i].newy = starty+thedivs[i].newy;
	thedivs[i].style.left=thedivs[i].newx+"px";
	thedivs[i].style.top=thedivs[i].newy+"px";
	
	thedivs[i].style.transform="rotate("+thedivs[i].deg+"deg)";
}
newy = starty+newy;
//document.body.innerHTML+=Math.sin(0);
}
function changeSpeed() {
	
	for(i=0; i<thedivs.length; i++) {
		thedivs[i].speed=(i+1)*(i*parseFloat(document.getElementById("speed").value))+1;
	}
}
function setxy(event) {
startx = event.clientX;
starty = event.clientY;
}
</script>
<style type="text/css">
body {
	background-image:url("sunset.jpg");
	
}
</style>
</head>
<body onload="init()">
<input type="text" value="0.1" id="speed" onkeyup="changeSpeed()">
</body>
</html>