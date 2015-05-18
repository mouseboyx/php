<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,user-scalable=yes">
<link href="style.css" rel="stylesheet">
<title>Ajax Youtube Audio Download</title>
<script>
var i = 0;
var responsetext=null;
var statInterval=null;
var directory=null;
var basedirectory=null;
var encodeurl=null;
var responsetextarray=null;
var endresptext=null;
var innerstatusbar=null;
var calcresptext=null;
function getStatus()
{
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
		i=i+1;
		responsetext=xmlhttp.responseText;
		responsetextarray=responsetext.split("[download]");
		endresptext=responsetextarray[responsetextarray.length-1];
		responsetext=responsetextarray[1]+"\n"+responsetextarray[responsetextarray.length-1]+"\n\n"+i+" seconds";
		responsetext=responsetext.toString().replace("undefined","working...");
		
//		Statusbar
		innerstatusbar=document.getElementById("innerstatusbar");
		endresptext=endresptext.split("%")[0];
		endresptext=endresptext.replace(" ","");
		
		calcresptext=(((endresptext/1)/100)*300);
		if (calcresptext>0) {		
			document.getElementById("statusbar").style.visibility="visible";
			innerstatusbar.style.width=(((endresptext/1)/100)*300)+"px";
			if ((endresptext/1)<9) {
				innerstatusbar.style.color="#ffffff";
			}
			if ((endresptext/1)>9) {
				innerstatusbar.style.color="#000000";
			}		
			endresptext=endresptext+"%";
						
			innerstatusbar.innerHTML=endresptext;
		}
		

//    	document.getElementById("myPre").innerHTML=basedirectory+"\n"+i+"\n"+xmlhttp.responseText;
		document.getElementById("myPre").innerHTML=responsetext;
		
    }
  }
xmlhttp.open("GET","getytdltext.php?dir="+directory,true);
xmlhttp.send();
window.location.assign("#bottom");
		if (responsetextarray[responsetextarray.length-1].indexOf("[youtube] Post-process")!=-1) {
			
			
			endinit2("m4a");
			
		}
		
		if (responsetextarray[responsetextarray.length-1].indexOf("Deleting original file")!=-1 && responsetextarray[responsetextarray.length-1].indexOf(" (pass -k to keep)")!=-1) {
			endinit2("ogg");
		}

}

function sendURL()
{
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
    document.getElementById("requestsent").innerHTML=xmlhttp.responseText;
	directory=xmlhttp.responseText;
	basedirectory=directory.split("/")[0];
    }
  }
xmlhttp.open("GET","ytdl.php?url="+document.getElementById("sendurl").value,true);
xmlhttp.send();
}

function moveanddownload(oggorm4a)
{
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
	encodeurl=encodeURIComponent(xmlhttp.responseText).replace("_'","'");
	encodeurl=encodeurl.replace("\\'","'");
	encodeurl=encodeurl.replace("\'","'");
    document.getElementById("downloadid").innerHTML+='<p><a href="youtube/'+encodeurl+'">Download</a></p><p><a href="ajax.php">Download Another</a></p>';
	window.location.assign("#bottom");    
	}
  }
xmlhttp.open("GET","movem4a.php?bdir="+basedirectory+"&oggorm4a="+oggorm4a,true);
xmlhttp.send();
}




function init() {

	if (i==0) {
		sendURL();
		statInterval = setInterval(function() { getStatus() }, 1000);
	}
}

function endinit2(oggorm4a) {

		if (i>0 && i!=null) {
			clearInterval(statInterval);
			document.getElementById("stoppre").innerHTML+="\nDone";
			setTimeout(function() { moveanddownload(oggorm4a) },2000);
		}
	
	
}

function confirmendinit2() {
	if (confirm("Are you sure you want to stop the script?")) {
		endinit2("");
	}
}


</script>
<link href="style.css" href="stylesheet">
<style type="text/css">

#statusbar {
	width:300px;
	height:1.1em;
	background-color:#000000;
	padding:0px;
	border:none;
	margin:5px;
	margin-top:25px;
	visibility:hidden;
	font-weight:bold;

}
#innerstatusbar {
	margin:0px;
	padding:0px;
	float:left;
	width:100px;
	height:1.1em;
	color:#000000;
	background-color:#00ff00;
	border:none;
	text-align:center;
}

input {
	margin-right:10px;
}

</style>
</head>

<body>
<p><a href="youtube/">Youtube Directory</a> - <a href="/">Home</a></p>
<h3>Ajax Download is Audio only</h3>
<p>URL: <input type="text" size="55" id="sendurl" style="max-width:100%;"></p>
<input type="button" value="Begin" onclick="init()"><input type="button" onclick="confirmendinit2()" value="Stop">

<div id="statusbar"><div id="innerstatusbar">text</div></div>

<p id="requestsent"></p>
<pre id="myPre">
</pre>
<pre id="stoppre">
</pre>
<p id="downloadid"></p>
<p id="bottom"> </p>
</body>
</html>