<!DOCTYPE html>
<html onmousemove="setxy(event)" onkeydown="rotatebody(event)" onclick="creatediv()" onmousedown="setastrue()" onmouseup="setasfalse()">
<head>
<title>velocity</title>
<script type="text/javascript">
xrotate=0;
var cx;
var cy;
maxy=0;
i = 1;
div = [];
counter = 1;
gravity = 0.3;
elast = 0;
execute = false;
thehr= null;
function setxy(event) {
cx = event.clientX;
cy = event.clientY;
document.getElementsByTagName("div")[0].innerHTML=cx+","+cy+","+maxy+","+div[1][9];
}

function creatediv() {
div[i] = document.createElement("DIV");
div[i].style.width="4px";
div[i].style.height="4px";
div[i].style.backgroundColor="#000000";
div[i].style.position="absolute";
div[i].style.top=cy+"px";
div[i].style.left=cx+"px";
div[i][0]=0;
div[i][1]=cy;
div[i][2]=true;
div[i][3]=true;
div[i][4]=0;
div[i][5]=0;
div[i][6]=0;
div[i][7]=0;
div[i][8]=1;
div[i][9]=1;
document.getElementsByTagName("body")[0].appendChild(div[i]);
i++;
}

function init() {
maxy = (parseInt(document.documentElement.clientHeight)-20);

thehr = document.createElement("p");
thehr.style.position="absolute";
thehr.style.left="0px";
thehr.style.height="1px";
thehr.style.backgroundColor="#000000";
thehr.style.top=maxy+"px";
thehr.style.width="100%";
document.getElementsByTagName("body")[0].appendChild(thehr);
setInterval(addvelocity,10);
setInterval(checkadd,10);
}

function setastrue() {
	execute=true;
}

function setasfalse() {
	execute=false;
}

function checkadd() {
	if (execute) {
		creatediv();
	}
}
function addvelocity() {
counter = 1;
	while (counter<=i) {
		divy = parseInt(div[counter].style.top);
		/*
		if (divy>maxy) {
			div[counter].style.display="none";
			div[counter][2]=false;
		}
		*/
		if (div[counter][2]==true) {
		
			
				div[counter][0]+=gravity;
			
			if (divy>maxy) {
				div[counter][5]=Math.pow(div[counter][0],2)
				div[counter][6]=div[counter][1];
				div[counter][2]=false;
				div[counter][8]=(maxy-div[counter][1])/(2/div[counter][9]);
				div[counter][9]+=0.05;
				
				
			}
				
			

//			div[counter][0]-=div[counter][4];
			div[counter][7] = Math.round(Math.pow(div[counter][0],2)+div[counter][1]);
			div[counter].style.top=div[counter][7]+"px";	
			
		}
		
		if (div[counter][2]==false) {
			div[counter][0]-=gravity;
			div[counter][7] = Math.round(Math.pow(div[counter][0],2)+div[counter][1]);
			div[counter].style.top=div[counter][7]+"px";
			/*
			if (div[counter][7]<=(div[counter][1]+div[counter][8])) {
				div[counter][1]=(div[counter][1]+div[counter][8])
				div[counter][0]=0;
				div[counter][2]=true;
				
			}
			*/
			
			if (div[counter][0]<=0) {
				div[counter][2]=true;
			}
			
		}
		/*

		if (div[counter][2]==false) {
			div[counter][0]-=gravity;
			velocity = Math.round(Math.pow(div[counter][0],2)+div[counter][1]);
			div[counter].style.top=velocity+"px";
			if (velocity<=div[counter][6]) {
			//	div[counter][2]=true;
			
				
			}	
		}
		*/
		counter++;
	}
	
}

function rotatebody(event) {
var dirkey = event.which || event.keyCode;
if (dirkey==37) {
xrotate-=1;
}
if (dirkey==39) {
xrotate+=1;
}
document.getElementsByTagName("html")[0].style.transform="rotateY("+xrotate+"deg)";
}
</script>
<style type="text/css">
body {
background-color:#eeeeee;
}
.debug {
	display:none;
}
</style>
</head>
<body onload="init()">
<div class="debug"></div>
</body>
</html>