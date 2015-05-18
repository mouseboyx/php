<!DOCTYPE html>
<html onclick="openEdit(event)" onclick="focuseditinput()">
<head>
<script type="text/javascript">
function init() {
resptextl = 0;
div = [];
editdiv=null;
thettext=null;
editinput=null;
editdiv=null;
postx=0;
posty=0;
getText();
setInterval(getText,1000);
}
function getText() {
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
		responsetext=xmlhttp.responseText.split("\n");
		
		if (responsetext.length>resptextl) {

			for (i=0; i<(responsetext.length/3); i++) {
				
					div[i] = document.createElement("DIV");
					div[i].style.position="absolute";
					div[i].style.padding="0px";
					div[i].style.top=responsetext[i*3]+"px";
					div[i].style.left=responsetext[(i*3)+1]+"px";
					div[i].style.wordWrap="break-word";
					div[i].style.backgroundColor="rgba(0,0,0,0.75";
//					div[i].style.width="20em";
					/*
					if (responsetext[(i*3)+2].length<20) {
						div[i].style.width=(responsetext[(i*3)+2].length*16)+"px";
					} else {
						div[i].style.width="20em";
					}
					*/
					div[i].style.maxWidth="20em";
					div[i].innerHTML=responsetext[(i*3)+2];
					
					document.getElementById("bodyid").appendChild(div[i]);
					resptextl=(i+1)*3
					document.getElementById("debug").innerHTML+=+responsetext[i*3]+""+responsetext[(3*i)+1]+""+responsetext[(3*i)+2]+","+resptextl+","+responsetext.length;
				
			}
		
		}
		
		
    }
  }
xmlhttp.open("GET","returntextwall.php",true);
xmlhttp.send();
}
function openEdit(event) {
	// alert(event.clientX+","+event.clientY);
	if (editdiv == null) {
		postx=event.pageX;
		posty=event.pageY;
		editdiv = document.createElement("div");
		editdiv.style.position="absolute";
		editdiv.style.padding="0px";
		editdiv.style.top=posty+"px";
		editdiv.style.left=postx+"px";
		editdiv.style.zIndex="5";
	//	editdiv.innerHTML="hello";
	
		editinput = document.createElement("input");
		typ = document.createAttribute("type");
		siz = document.createAttribute("size");
		siz.value="55";
		typ.value="text";
		editinput.attributes.setNamedItem(typ);
		editinput.attributes.setNamedItem(siz);
		editinput.addEventListener("keyup",function(event) { enterkey(event); });
		editinput2 = document.createElement("input");
		typ2 = document.createAttribute("type");
		typ2.value="button"
		value = document.createAttribute("value");
		value.value="Post";
		editinput2.attributes.setNamedItem(typ2);
		editinput2.attributes.setNamedItem(value);
		
		editinput2.addEventListener("click",posttext);
	
		editinput3 = document.createElement("input");
		typ3 = document.createAttribute("type");
		typ3.value = "button";
		value2 = document.createAttribute("value");
		value2.value="Cancel";
		editinput3.attributes.setNamedItem(typ3);
		editinput3.attributes.setNamedItem(value2);
		editinput3.addEventListener("mouseup",cancel);

		document.getElementById("bodyid").appendChild(editdiv);
		editdiv.appendChild(editinput);
		editdiv.appendChild(editinput2);
		editdiv.appendChild(editinput3);
		focuseditinput();
		
	}
}
function enterkey(event) {
	var key = event.which || event.keyCode;
	if (key==13) {
		posttext();
	}

}
function posttext() {
thetext=editinput.value;

//alert("1"+thetext+","+postx+","+posty);
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
		
		document.getElementById("bodyid").removeChild(editdiv);
		editdiv=null;
		for (i=0; i<div.length; i++) {
			document.getElementById("bodyid").removeChild(div[i]);
		}
		getText();
		
  }
}
xmlhttp.open("GET","updatetextwall.php?x="+postx+"&y="+posty+"&text="+encodeURIComponent(thetext),true);
xmlhttp.send();

}
function cancel() {
	document.getElementById("bodyid").removeChild(editdiv);
	editdiv=null;
}
function focuseditinput() {
	editinput.focus();
}
</script>
<style type="text/css">
#debug {
position:absolute;
top:100px;
left:10px;
display:none;
}
body {

//font-size:1vw;
color:#ffffff;
background-color:#000000;
font-family:monospace;
}
</style>
</head>


<body id="bodyid" onload="init()">
<pre id="debug" onclick="getText()">
test
</pre>
</body>
</html>