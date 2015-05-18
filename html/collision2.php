<!DOCTYPE html>
<html>
<head>
<title>collision2</title>
<script type="text/javascript">
div = [];
i=0;
maxSpeed=10;
squareSize=50;
numberOfSquares=20

function init() {
	cy = document.documentElement.clientHeight-20
	cx = document.documentElement.clientWidth-20
	populate();
	
	mainint = setInterval(mainMovement,100);
}
function populate() {
	while (i<=numberOfSquares) {
	div[i]=document.createElement("div");
	div[i].style.width=squareSize+"px";
	div[i].style.height=squareSize+"px";
	div[i].style.backgroundColor="#000000";
	div[i].style.position="absolute";
	randx = Math.floor(Math.random()*cx);
	randy = Math.floor(Math.random()*cy);
	div[i].style.top=randx+"px";
	div[i].style.left=randy+"px";
	div[i][0] = Math.round((Math.random()*maxSpeed)-(Math.random()*maxSpeed));
	div[i][1] = Math.round((Math.random()*maxSpeed)-(Math.random()*maxSpeed));
	div[i][2] = randx;
	div[i][3] = randy;
	document.getElementsByTagName("body")[0].appendChild(div[i]);
	i++;
	}
}

function mainMovement() {
	detectcol();
	for (c=0; c<i; c++) {
		if (div[c][2]>=cx-(squareSize/2)) {
			div[c][0]=div[c][0]*-1;
		}
		if (div[c][2]<=0) {
			div[c][0]=div[c][0]*-1;
		}
		if (div[c][3]>=cy-(squareSize/2)) {
			div[c][1]=div[c][1]*-1;
		}
		if (div[c][3]<=0) {
			div[c][1]=div[c][1]*-1;
		}
		div[c][2]+=div[c][0];
		div[c][3]+=div[c][1];
		div[c][2]=Math.round(div[c][2]);
		div[c][3]=Math.round(div[c][3]);
		div[c].style.left=div[c][2]+"px";
		div[c].style.top=div[c][3]+"px";
		
	}

}


function detectcol() {
	for (r=0; r<i; r++) {
		for (g=0; g<i; g++) {
		/*
			if (div[r][2]+8<=div[g][2] && div[g][2]>=div[r][2]) {
				if (div[r][3]+8<=div[g][3] && div[g][3]>=div[r][3]) {
				div[r].style.backgroundColor="#ff0000";
				}
			}
		*/
			
			if (r!=g) {
				for (h=0; h<=squareSize; h++) {
					for (k=0; k<=squareSize; k++) {
						for (j=0; j<=squareSize; j++) {
							for (l=0; l<=squareSize; l++) {
							//	alert(h+","+k+","+j+","+l);
								if (div[r][2]+l==div[g][2]+j) {
									div[r][0]=div[r][0]*-1;
									div[r][1]=div[r][1]*-1;
									div[g][0]=div[g][0]*-1;
									div[g][1]=div[g][1]*-1;
								}
							}
						}
						
					}
				}
				
			/*
				for (h=0; h<=squareSize; h++) {
					for (k=0; k<=squareSize; k++) {
						if (div[r][2]+h==div[g][2]) {
							for (j=0; j<=squareSize; j++) {
								for (l=0; l<=squareSize; l++) {
									if (div[r][3]+j==div[g][3]) {
								
										div[r][0]=div[r][0]*-1;
										div[r][1]=div[r][1]*-1;
										div[g][0]=div[g][0]*-1;
										div[g][1]=div[g][1]*-1;
									}
								}
							}
						}
					}
				}
				*/
				/*
				for (h=0; h<=squareSize; h++) {
					if (div[r][2]==div[g][2]+h) {
						for (j=0; j<=squareSize; j++) {
							if (div[r][3]==div[g][3]+j) {
								
								div[r][0]=div[r][0]*-1;
								div[r][1]=div[r][1]*-1;
								div[g][0]=div[g][0]*-1;
								div[g][1]=div[g][1]*-1;
							}
						}
					}
				}
				*/
				
			/*
				if (div[r][2]+8<=div[g][2] && div[g][2]>div[r][2]) {
					div[r][0]=div[r][0]*-1;
				}
				if (div[r][3]+8<=div[g][3] && div[g][3]>div[r][3]) {
					
					div[r][1]=div[r][1]*-1;
				}
			
				if ((div[r][2]+8)<=div[g][2] && div[r][2]>=div[g][2]) {
					div[r][0]=div[r][0]*-1;
					div[r][1]=div[r][1]*-1;
				}
				if (div[r][2]==div[g][2] && div[r][3]==div[g][3]) {
					div[r][0]=div[r][0]*-1;
					div[r][1]=div[r][1]*-1;
				}
				if (div[r][2]+8<=div[g][2]) {
					if (div[g][2]>=div[r][2]) {
						if (div[r][3]+8<=div[g][3]) {
							if (div[g][3]>=div[g][3]) {
								div[r][0]=div[r][0]*-1;
								
							}
						}
					
					}
				}
			*/
			}
		}
	}
}


function stopint() {
clearInterval(mainint);
}

</script>
<style type="text/css">
</style>
<body onload="init()">
<input type="button" onclick="stopint()" value="stop" style="z-index:2;">
</body>
</html>