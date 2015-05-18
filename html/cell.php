<!DOCTYPE html>
<html>
<head>
<title>cells</title>
<script type="text/javascript">
cellD=50;
div = [];
div2 = [];
divstatus = [];
i=0;
rowsi=0;
colsi=0;
function populate() {
cellD=parseInt(document.getElementById("rez").value);
rows = Math.floor(document.documentElement.clientWidth/cellD)
cols = Math.floor(document.documentElement.clientHeight/cellD)
total = rows*cols;
while (i<total) {
	div[i] = document.createElement("DIV");
	div[i].style.width=cellD+"px";
	div[i].style.height=cellD+"px";
	div[i].style.position="absolute";
	div[i].style.background="linear-gradient(45deg,#000000,#ffffff)";
//	div[i].innerHTML=i;
	if (rowsi>=rows) {
	rowsi=0;
	colsi++;
	}
div[i].style.left=(rowsi*cellD)+"px";
div[i].style.top=(colsi*cellD)+"px";
div[i].style.display="inline";
div[i].style.zIndex="5";
div[i].addEventListener("mouseout",function() { changeVisibility(this); });
//div[i].addEventListener("mouseover",function() { changeVisibility(this,true); });
document.getElementById("bodydiv").appendChild(div[i]);

rowsi++;
i++;
}
i=0;
rowsi=0;
colsi=0;
while (i<total) {
	div2[i] = document.createElement("DIV");
	div2[i].style.width=cellD+"px";
	div2[i].style.height=cellD+"px";
	div2[i].style.position="absolute";
	div2[i].style.background="linear-gradient(-45deg,#0000ff,#ffffff)";
//	div[i].innerHTML=i;
	if (rowsi>=rows) {
	rowsi=0;
	colsi++;
	}
div2[i].style.left=(rowsi*cellD)+"px";
div2[i].style.top=(colsi*cellD)+"px";
div2[i].style.display="inline";
div2[i].addEventListener("mouseout",function() { unhide(this); });
//div[i].addEventListener("mouseover",function() { changeVisibility(this,true); });
document.getElementById("bodydiv").appendChild(div2[i]);

rowsi++;
i++;
}
}
function changeVisibility(divi) {
	divi.style.display="none";
//	alert(ii);
//	divi.removeEventListener("mouseover",function() { changeVisibility(this); });
//	divi.addEventListener("mouseover",function() { unhide(this); };
//	divi.addEventListener("mouseover",function { unhide(this); });
	/*
	if (divi.style.display=="none") {
			divi.style.display="inline"
	}
	*/
}

function unhide(divii) {
div[div2.indexOf(divii)].style.display="inline";
}
</script>
<style type="text/css">
body, html, div {
	padding:0px;
	margin:0px;
}
#debug {
	position:absolute;
	top:50px;
	left:50px;
}
</style>
</head>
<body id="bodydiv">
<input type="text" value="50" id="rez" size="4"><input type="button" value="Populate" onclick="populate()">
<div id="debug">test</div>
</body>
</html>