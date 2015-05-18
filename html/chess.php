<!DOCTYPE html>
<html>
<head>
<title>Chess</title>
<script type="text/javascript">
function init() {
selectedpiece=null;
listener = [];
listener2 = []
pieces = [];
pieces[0] = ["r","k","b","q","K","b","k","r","p","p","p","p","p","p","p","p",
"","","","","","","","","","","","","","","","","","","","","","","","","",
"","","","","","","","p","p","p","p","p","p","p","p","r","k","b","q","K","b","k","r"];
pieces[1] = [];
pieces[2] = [];
moves = [];
iswitch=true
	alltds=document.getElementsByTagName("td");

	/* name black and white pieces true for black, false for white */
	for (i=0; i<16; i++) {
		pieces[1][i]=true;
	}
	for (i=48; i<64; i++) {
		pieces[1][i]=false;
	}
	
	for (i=0; i<alltds.length; i++) {
		if (i%8==0) {
			iswitch=!iswitch
		//	alert(iswitch);
		}
		if (!iswitch) {
			if (i%2 == 0) {
				alltds[i].style.backgroundColor="#aaaaaa";
			}		
			if (i%2 == 1) {		
				alltds[i].style.backgroundColor="#666666";
			//	alltds[i].style.color="#ffffff";
			}
		}

		if (iswitch) {
			if (i%2 == 1) {
				alltds[i].style.backgroundColor="#aaaaaa";
			}		
			if (i%2 == 0) {		
				alltds[i].style.backgroundColor="#666666";
			//	alltds[i].style.color="#ffffff";
			}
		}
		
		if (pieces[1][i]==true) {
			piecespan = document.createElement("span");
			piecespan.style.color="#000000";
			piecespan.innerHTML=pieces[0][i];
			alltds[i].appendChild(piecespan);
			
		//	alltds[i].innerHTML='<span style="color:#000000;">'+pieces[0][i]+'</span>';
		}
		if (pieces[1][i]==false) {
			piecespan = document.createElement("span");
			piecespan.style.color="#ffffff";
			piecespan.innerHTML=pieces[0][i];
			alltds[i].appendChild(piecespan);
		//	alltds[i].innerHTML='<span style="color:#ffffff;">'+pieces[0][i]+'</span>';
		}

		/* set switch to see if it is a pawns first move */
		if (pieces[0][i]=="p") {
			pieces[2][i]=true;
		}

		if (pieces[0][i]!="") {
			listener2[i] = function(event) {
																		movepiece(comparetd(selectedpiece),comparetd(event.currentTarget));
																		updateboard();
																	};
			listener[i] = function(event) { 
																if (comparetd(event.currentTarget)!=null) {
																	alert(pieces[0][comparetd(event.currentTarget)]+","+comparetd(event.currentTarget));
																}
																selectedpiece=event.currentTarget;
																findmoves(comparetd(event.currentTarget));
																for (r=0; r<moves.length; r++) {
																	alltds[moves[r]].style.backgroundColor="#ff0000";
																	alltds[moves[r]].addEventListener("click",listener2[i]);

																}
																//alert(moves[0]);
																};
			alltds[i].addEventListener("click",listener[i]);
		}
		
	}
	
		
}

function comparetd(thetd) {
	for (i=0; i<alltds.length; i++) {
		if (alltds[i]==thetd) {
			return i;
		}
	}
}
function findmoves(u) {
	moves = [];
	if (pieces[0][u]=="p" && pieces[2][u]==true && pieces[1][u]==true) {
		moves[0]=u+8;
		moves[1]=u+16;
	}
	if (pieces[0][u]=="p" && pieces[2][u]==true && pieces[1][u]==false) {
		moves[0]=u-8;
		moves[1]=u-16;
	}
	
}

function movepiece(start,stop) {
	pieces[0][stop]=pieces[0][start];
	pieces[1][stop]=pieces[1][start];
	pieces[2][stop]=pieces[2][start];
	pieces[2][stop]=false;
	pieces[0][start]=""
	pieces[1][start]=null;
	pieces[2][start]=null;

//	alert(stop);
	alert(start);
}
function updateboard() {
iswitch=true;
for (i=0; i<alltds.length; i++) {
	alltds[i].innerHTML="";
	if (pieces[1][i]==true) {
			piecespan = document.createElement("span");
			piecespan.style.color="#000000";
			piecespan.innerHTML=pieces[0][i];
			alltds[i].appendChild(piecespan);
			
		//	alltds[i].innerHTML='<span style="color:#000000;">'+pieces[0][i]+'</span>';
	}
	if (pieces[1][i]==false) {
		piecespan = document.createElement("span");
		piecespan.style.color="#ffffff";
		piecespan.innerHTML=pieces[0][i];
		alltds[i].appendChild(piecespan);
	//	alltds[i].innerHTML='<span style="color:#ffffff;">'+pieces[0][i]+'</span>';
	}
	if (i%8==0) {
			iswitch=!iswitch
		//	alert(iswitch);
		}
		if (!iswitch) {
			if (i%2 == 0) {
				alltds[i].style.backgroundColor="#aaaaaa";
			}		
			if (i%2 == 1) {		
				alltds[i].style.backgroundColor="#666666";
			//	alltds[i].style.color="#ffffff";
			}
		}

		if (iswitch) {
			if (i%2 == 1) {
				alltds[i].style.backgroundColor="#aaaaaa";
			}		
			if (i%2 == 0) {		
				alltds[i].style.backgroundColor="#666666";
			//	alltds[i].style.color="#ffffff";
			}
		}
		alltds[i].removeEventListener("click",listener[i]);
		alltds[i].removeEventListener("click",listener2[i]);
		

}

}

</script>
<style type="text/css">
td {
	width:50px;
	height:50px;
	text-align:center;
	padding:0px;
	font-weight:bold;
}
/*
td:nth-of-type(3) {
	background-color:#000000;
	color:#ffffff;
}
td:nth-of-type(2) {
	background-color:#eeeeee;
	color:#000000;
}
*/
</style>
</head>
<body onload="init()">
	<table>
		<tr>
			<td id="a8"></td>
			<td id="b8"></td>
			<td id="c8"></td>
			<td id="d8"></td>
			<td id="e8"></td>
			<td id="f8"></td>
			<td id="g8"></td>
			<td id="h8"></td>
		</tr>
		<tr>
			<td id="a7"></td>
			<td id="b7"></td>
			<td id="c7"></td>
			<td id="d7"></td>
			<td id="e7"></td>
			<td id="f7"></td>
			<td id="g7"></td>
			<td id="h7"></td>
		</tr>
		<tr>
			<td id="a6"></td>
			<td id="b6"></td>
			<td id="c6"></td>
			<td id="d6"></td>
			<td id="e6"></td>
			<td id="f6"></td>
			<td id="g6"></td>
			<td id="h6"></td>
		</tr>
		<tr>
			<td id="a5"></td>
			<td id="b5"></td>
			<td id="c5"></td>
			<td id="d5"></td>
			<td id="e5"></td>
			<td id="f5"></td>
			<td id="g5"></td>
			<td id="h5"></td>
		</tr>
		<tr>
			<td id="a4"></td>
			<td id="b4"></td>
			<td id="c4"></td>
			<td id="d4"></td>
			<td id="e4"></td>
			<td id="f4"></td>
			<td id="g4"></td>
			<td id="h4"></td>
		</tr>
		<tr>
			<td id="a3"></td>
			<td id="b3"></td>
			<td id="c3"></td>
			<td id="d3"></td>
			<td id="e3"></td>
			<td id="f3"></td>
			<td id="g3"></td>
			<td id="h3"></td>
		</tr>
		<tr>
			<td id="a2"></td>
			<td id="b2"></td>
			<td id="c2"></td>
			<td id="d2"></td>
			<td id="e2"></td>
			<td id="f2"></td>
			<td id="g2"></td>
			<td id="h2"></td>
		</tr>
		<tr>
			<td id="a1"></td>
			<td id="b1"></td>
			<td id="c1"></td>
			<td id="d1"></td>
			<td id="e1"></td>
			<td id="f1"></td>
			<td id="g1"></td>
			<td id="h1"></td>
		</tr>
	</table>
</body>
</html>