<!DOCTYPE html>
<html>
<head>
<title>collision</title>
<script type="text/javascript">
key = null;
paddlex = 20;
paddley = 100;
fieldY = 300;
fieldX = 600;
ballX = 295;
ballY = 145;
left = true;
up = false;
down = false;
right = false;
score = 0;
// var fieldyy = document.getElementById("field").style.height;
paddleSpeed=16;
ballFactorY=8;
ballSpeedX=8;
ballSpeedY=8;


function init() {
	document.getElementById("field").style.height=(document.documentElement.clientHeight-20)+"px";
	document.getElementById("field").style.width=(document.documentElement.clientWidth-20)+"px";
	
	document.getElementById("paddle").style.height="50px";
	document.getElementById("paddle").style.width="10px";
	fieldY=parseInt(document.getElementById("field").style.height);
	fieldX=parseInt(document.getElementById("field").style.width);
	fieldYPaddle=fieldY-parseInt(document.getElementById("paddle").style.height);

	document.getElementById("option").style.display="none";	
	
	paddleSpeed=parseInt(document.getElementById("psy").value);
	ballFactorY=parseInt(document.getElementById("bsy").value);
	ballSpeedX=parseInt(document.getElementById("bsx").value);
	ballSpeedY=parseInt(document.getElementById("bsy").value);

	mainTimeout();
}

function mainMovement() {
	
	if (key==83 && paddley<=fieldYPaddle) {
	//	document.getElementById("body1").innerHTML+=paddle.style.color+","+paddley+",";
		paddley+=paddleSpeed;
		if (paddley>fieldYPaddle) {
			paddley=fieldYPaddle;
		}
		document.getElementById("paddle").style.top=paddley+"px";
	}
	if (key==87 && paddley>=0) {
		
		paddley-=paddleSpeed;
		if (paddley<0) {
			paddley=0;
		}
		document.getElementById("paddle").style.top=paddley+"px";
	}
	key = null;
	if (left) {
		ballX-=ballSpeedX;
	}
	if (right) {
		ballX+=ballSpeedX;
	}
	if (up) {
		ballY-=ballSpeedY;
	}
	if (down) {
		ballY+=ballSpeedY;
	}
	document.getElementById("ball").style.top=ballY+"px";
	document.getElementById("ball").style.left=ballX+"px";
	
	if (ballX<paddlex+10 && ballY>=paddley-10 && ballY<=paddley+50) {
		left=false;
		right=true;
		
		if (ballY<(paddley-10)+35) {
			ballSpeedY=	Math.round(((((paddley-10)+35)-ballY)/25)*ballFactorY)
			down=false;
			up=true;
		}
		
		if (ballY>(paddley-10)+35) {
			ballSpeedY=	Math.round(((25-(((paddley-10)+60)-ballY))/25)*ballFactorY)
			up=false;
			down=true;
//			alert(25-(((paddley-10)+60)-ballY));
//			alert(fieldX);
		}

	}
		
	if (ballY<=0) {
		up=false;
		down=true;
	}
	
	if (ballY>=fieldY-10) {
		down=false;
		up=true;
	}
	if (ballX>=fieldX-10) {
		right=false;
		left=true;
		score++;
		document.getElementById("score").innerHTML=score;
	}
	if (ballX<=0) {
		gameover();
	}
	
	
//	alert("'"+document.getElementById("field").style.height+"'");
	
//	document.getElementById("body1").innerHTML+=parseInt(document.getElementById("paddle").style.top);
}
function returnkey(event) {
	key = event.which || event.keyCode;
//	document.getElementById("body1").innerHTML+=key+" ";
//	mainMovement();
}
function mainTimeout() {
ballandpaddle = setInterval(mainMovement,50);
}
function gameover() {
clearInterval(ballandpaddle);
document.getElementById("field").innerHTML+="GAME OVER";
}

function paddle(event) {

	paddley=event.clientY;
	if (paddley>fieldYPaddle) {
		paddley=fieldYPaddle;
	}
	document.getElementById("paddle").style.top=paddley+"px";
	
//	alert(event.clientY);
}
</script>
<style type="text/css">
body {
	background-color:#000000;
	color:#ffffff;
	padding:0px;
	margin:0px;

}
#paddle {
	position:absolute;
	top:100px;
	left:20px;
	width:10px;
	height:50px;
	background-color:red;
	color:#ffffff;
	background-color:#ffffff;
}
#ball {
	position:absolute;
	left:295px;
	top:145px;
	width:10px;
	height:10px;
	background-color:#ffffff;
	border-radius:5px;
	
	
}
#field {
	width:600px;
	height:300px;
	margin:0px;
	padding:0px;
	border: solid 1px #ffffff;
}
#score {
	position:absolute;
	top:2em;
	left:2em;
}
#option {
	position:absolute;
	top:10px;
	left:50px;
	border: 1px solid #ffffff;
	padding:10px;
}
html {
	padding:0px;
}
</style>
</head>
<body id="body1" onkeydown="returnkey(event)" onmousemove="paddle(event)">
<div id="option">
<input type="text" value="8" id="bsx">Ball Speed X
<br>
<input type="text" value="8" id="bsy">Ball Speed Y
<br>
<input type="text" value="16" id="psy">Paddle Speed
<br>
<input type="button" value="Start Game" onclick="init()">
</div>
<div id="field">
<div id="score">0</div>
<div id="paddle"></div>
<div id="ball"></div>
</div>
</body>
</html>
