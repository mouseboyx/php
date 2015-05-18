<!DOCTYPE html>
<html id="html" onmousemove="mouseMove(event)" onkeydown="createProj(event)">
<head>
<meta charset="utf-8">
<title>distance</title>
<script type="text/javascript">
var firstPoint = true;
var x1,x2,y1,y2,distance,angle,angleRad,lineX;
var maxX=window.innerWidth;
var maxY=window.innerHeight;
var speed=0.1;
var boxCount = 0;
var boxes = [];
var boxWidth=10;
var firstDiv = document.createElement("div");
firstDiv.style.width="4px";
firstDiv.style.height="4px";
firstDiv.style.backgroundColor="#ff0000";
firstDiv.style.position="fixed";
firstDiv.style.top="-1px;";
firstDiv.style.left="-1px;";
var secondDiv = document.createElement("div");
secondDiv.style.width="4px";
secondDiv.style.height="4px";
secondDiv.style.position="fixed";
secondDiv.style.top="-1px;";
secondDiv.style.left="-1px;";
secondDiv.style.backgroundColor="#0000ff";
var line = document.createElement("div");
line.style.width="1px;";
line.style.height="1px;";
line.style.backgroundColor="#ffffff";
line.style.position="fixed";
line.style.top="-1px;";
line.style.left="-1px;";

var ballDiameter = 20;

function setPoint2(event) {
x1 = event.clientX;
y1 = event.clientY;
firstDiv.style.top=(y1)+"px";
firstDiv.style.left=(x1)+"px";

}
function mouseMove(event) {
	x2 = event.clientX;
	y2 = event.clientY;
	
	distanceLine();
	document.getElementById("debug").innerHTML=x1+","+y1+" ; "+x2+","+y2+"distance:"+distance+"angle: "+angle+"angleRad:"+angleRad+"LineX:"+lineX;

}
function animation() {
	secondDiv.style.top=(y2)+"px";
	secondDiv.style.left=(x2)+"px";
	if (boxCount>0) {
		for (i=1; i<=boxCount; i++) {
			if (boxes[i].x>maxX) {
				boxes[i].xSpeed=(boxes[i].xSpeed*-1)
			}
			if (boxes[i].x<0) {
				boxes[i].xSpeed=(boxes[i].xSpeed*-1)
			}
			if (boxes[i].y>maxY) {
				boxes[i].ySpeed=(boxes[i].ySpeed*-1)
			}
			if (boxes[i].y<0) {
				boxes[i].ySpeed=(boxes[i].ySpeed*-1)
			}
			boxes[i].x+=boxes[i].xSpeed*speed;
			boxes[i].y+=boxes[i].ySpeed*speed;
			boxes[i].style.top=boxes[i].y+"px";
			boxes[i].style.left=boxes[i].x+"px";	
		}	
	}	
}
function setPoint(event) {

	if (firstPoint) {
		
		x1 = event.clientX;
		y1 = event.clientY;
		distanceLine();
		firstDiv.style.top=(y1)+"px";
		firstDiv.style.left=(x1)+"px";
		firstPoint=false;
	} else {
		x2 = event.clientX;
		y2 = event.clientY;
		secondDiv.style.top=(y2)+"px";
		secondDiv.style.left=(x2)+"px";
		distanceLine();
		firstPoint=true;
	}
	document.getElementById("debug").innerHTML=x1+","+y1+" ; "+x2+","+y2+"dist:  "+distance+"  :  "+parseFloat(angle)+"angleRad:"+angleRad;
	
}
function distanceLine() {
		distanceX=(x1-x2);
		distanceY=(y1-y2);
		distance = Math.sqrt(Math.pow((x1-x2),2)+Math.pow((y1-y2),2));
		a=distanceX;
		b=distanceY;
		c=distance;
		if (y2>=y1 && x2>x1) {
			angleRad = Math.atan(b/a)-(Math.PI);
			angle = -((Math.atan(-b/a)/(2*Math.PI))*360)-180;
		} else {
			if (y2<y1 && !(x1==x2)) {
				angleRad = Math.acos(a/c);
				angle = -(Math.acos(-a/c)/(2*Math.PI))*360;
			} else {
				angleRad = Math.asin(b/c);
				angle = -(Math.asin(-b/c)/(2*Math.PI))*360;
			}
		}
		lineX= ((distance/2)*Math.cos(angleRad))
		lineY= (((distance/2)*Math.sin(angleRad)));
		
		line.style.transform="rotate("+angle+"deg)";
//		document.getElementById("debug").innerHTML+="  :  "+angle;
		line.style.width=distance+"px";
		line.style.height="1px";
		line.style.top=(y1-lineY)+"px";
		line.style.left=(x1-lineX-(distance/2))+"px";
}

function createProj(event) {
	if (event.keyCode==32) {
		boxCount++;
		boxes[boxCount]=document.createElement("div");
		boxes[boxCount].xSpeed=-(x1-x2);
		boxes[boxCount].ySpeed=-(y1-y2);
		boxes[boxCount].x=x1;
		boxes[boxCount].y=y1;
		boxes[boxCount].style.width=boxWidth+"px";
		boxes[boxCount].style.height=boxWidth+"px";
		boxes[boxCount].style.borderRadius=(boxWidth/2)+"px";
		boxes[boxCount].style.backgroundColor="#ffffff";
		boxes[boxCount].style.position="fixed";
		boxes[boxCount].style.top=y1+"px";
		boxes[boxCount].style.left=x1+"px";
		document.body.appendChild(boxes[boxCount]);
	}
	if (event.keyCode==82) {
		
		for (j=1; j<=boxCount; j++) {
			document.body.removeChild(boxes[j]);
		}
		
		boxCount=0;
		
	}
	//alert(event.keyCode);
}


function init() {

document.getElementsByTagName("html")[0].addEventListener("mousedown", function (event) { setPoint2(event) });
document.body.appendChild(firstDiv);
document.body.appendChild(secondDiv);
document.body.appendChild(line);
setInterval(animation, 10);
}

</script>
<style type="text/css">
body {
	height:100%;
	width:100%;
	background-color:#000000;
	color:#ffffff;
	
}
#debug {
	display:none;
}
html {
cursor:none;
}
</style>
</head>
<body onload="init()">
<div id="debug"></div>
</body>
</html>