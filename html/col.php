<!DOCTYPE html>
<html onmousemove="setxy(event)">
<head>
<title>col</title>
<script type="text/javascript">
function init() {
	boxSize=60;
	speedDecay=0.5;
	speedFactor=0.1;
	cy = document.documentElement.clientHeight
	cx = document.documentElement.clientWidth

	cause = document.getElementById("cause");
	effect = document.getElementById("effect");

	effectSpeedLeft=0;
	effectSpeedRight=0;
	effectSpeedUp=0;
	effectSpeedDown=0;
	
	cause.style.backgroundColor="#555555";
	cause.style.width=boxSize+"px";
	cause.style.height=boxSize+"px";
	cause.style.position="absolute";

	effect.style.backgroundColor="#000000";
	effect.style.width=boxSize+"px";
	effect.style.height=boxSize+"px";
	effect.style.position="absolute";
	effectY=Math.round((cy/2)-(boxSize/2));
	effectX=Math.round((cx/2)-(boxSize/2));
	effect.style.top=Math.round(cy/2)-(boxSize/2)+"px";
	effect.style.left=Math.round(cx/2)-(boxSize/2)+"px";
	setInterval(mainPhysics,42);
}

function setxy(event) {
	causeX=Math.round(event.clientX-(boxSize/2));
	causeY=Math.round(event.clientY-(boxSize/2));
	cause.style.top=causeY+"px";
	cause.style.left=causeX+"px";
}

function mainPhysics() {
	if (causeX+boxSize>effectX && causeY+boxSize>effectY && effectY+boxSize>causeY && effectX+boxSize>causeX) {
		if (effectX+(boxSize/2)>causeX+boxSize) {
		//	effectX++;
			effectSpeedRight+=((causeX+boxSize)-effectX)*speedFactor;
		}
		if (effectX+(boxSize/2)<causeX+boxSize) {
		//	effectX--;
			effectSpeedLeft+=((effectX+boxSize)-causeX)*speedFactor;
		}
		
		if (effectY+(boxSize/2)>causeY+boxSize) {
		//	effectY++;
			effectSpeedDown+=((causeY+boxSize)-effectY)*speedFactor;
		}
		if (effectY+(boxSize/2)<causeY+boxSize) {			
		//	effectY--;
			effectSpeedUp+=((effectY+boxSize)-causeY)*speedFactor;
		}
		
		
	//	effectX++;
	}
	if (effectY<0) {
		effectSpeedDown=effectSpeedUp;		
		effectSpeedUp=0;
	}
	if (effectX<0) {
		effectSpeedRight=effectSpeedLeft;
		effectSpeedLeft=0;
	}
	if (effectY>(cy-(boxSize/2))) {
		effectSpeedUp=effectSpeedDown;
		effectSpeedDown=0;
	}
	if (effectX>(cx-(boxSize/2))) {
		effectSpeedLeft=effectSpeedRight;
		effectSpeedRight=0;
	}
		
	effectX+=effectSpeedRight;
	effectX-=effectSpeedLeft;
	effectY+=effectSpeedDown;
	effectY-=effectSpeedUp;
	
	effect.style.left=Math.round(effectX)+"px";
	effect.style.top=Math.round(effectY)+"px";
	effectSpeedRight-=speedDecay;
	effectSpeedLeft-=speedDecay;
	effectSpeedDown-=speedDecay;
	effectSpeedUp-=speedDecay;
	if (effectSpeedRight<0) {
		effectSpeedRight=0;
	}
	if (effectSpeedLeft<0) {
		effectSpeedLeft=0;
	}
	if (effectSpeedDown<0) {
		effectSpeedDown=0;
	}
	if (effectSpeedUp<0) {
		effectSpeedUp=0;
	}

	
}

	
</script>
<style type="text/css">
html,body {
	padding:0px;
	margin:0px;
}
</style>
</head>
<body onload="init()">
<div id="effect"></div>
<div id="cause"></div>
</body>
</html>