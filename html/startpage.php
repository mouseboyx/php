<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>New Tab</title>
<style type="text/css">
@keyframes bodyanimation {
	0% {background:#ffffff;}
	50% {background:#000000;}
	100% {background;#ffffff;}
}
body {
	font-family:sans;
	padding:0px;
	background-color:#999999;
	margin:0px;	
//	animation:bodyanimation 10s linear infinite;
}
input {
	opacity:0.65;
	margin-left:0px;
	margin-right:0px;
//	font-size:12px;
}
h2 {
	margin-top:0px;
	margin-bottom:0px;
	padding:5px;
	height:25px;
}
form {
	display:block;
	padding-left:10px;
}
div {
	display:block;
	padding-left:10px;
}
div.right {
	float:right;
}

a.search {
//	font-size:12px;
}

a:link {
	text-decoration:none;
	color:blue;
}

a:hover {	
	text-decoration:underline;
	color:blue;
}
a:visited {
	text-decoration:none;
	color:blue;
}
p {
	margin-top:0px;
	margin-bottom:0px;
	padding-left:10px;
	padding-right:10px;
}
table {
	border-collapse:collapse;
	width:512px;
	float:left;
	margin:0px;
}
tr,td {
padding:0px;
}
td:nth-of-type(2n+2) {
	padding-left:10px;
	padding-right:10px;
	text-align:center;
}
#linkblock {
	float:left;
	clear:left;
	position:relative;
	margin-left:-10px;
}
#kickass {
	margin-left:10px;
}
#thepiratebay {
	margin-left:10px;
}
iframe.ajax {
	position:fixed;
	border-style:none;
	float:right;
	width:512px;
	height:450px;
//	height:276px;	
margin:0px;
}
</style>

<script type="text/javascript">
fontarr = ["sans","times","droid sans","serif"]
var fontarrpos = 4;
function kickass() {
	window.location.assign("https://kickass.to/usearch/"+document.getElementById("kickass").value+"/");
}
function thepiratebay() {
	window.location.assign("https://thepiratebay.se/search/"+document.getElementById("thepiratebay").value+"/0/7/0");
}
function enterkey(event,site) {
	var key = event.which || event.keyCode;
	if (key==13) {
		if (site==0) {
			kickass();
		}
		if (site==1) {
			thepiratebay();
		}
	}
}
function init() {
alldivs=document.getElementsByTagName("div");
allforms=document.getElementsByTagName("form");
allps=document.getElementsByTagName("p");
allas=document.getElementsByTagName("a");
alltrs=document.getElementsByTagName("tr");
/*
colorr = Math.round(Math.random()*100);
colorg = Math.round(Math.random()*100);
colorb = Math.round(Math.random()*100);
document.getElementsByTagName("h1")[0].style.color="rgb("+colorr+","+colorg+","+colorb+")";
*/
colorr = Math.round(Math.random()*50)+100;
colorg = Math.round(Math.random()*50)+100;
colorb = Math.round(Math.random()*50)+100;
document.getElementsByTagName("h2")[0].style.backgroundColor="rgba("+colorr+","+colorg+","+colorb+",0.5)";
/*
for (i=0; i<alldivs.length; i++) {
colorr = Math.round(Math.random()*100)+155;
colorg = Math.round(Math.random()*100)+155;
colorb = Math.round(Math.random()*100)+155;
alldivs[i].style.backgroundColor="rgb("+colorr+","+colorg+","+colorb+")";
}

for (i=0; i<allforms.length; i++) {
colorr = Math.round(Math.random()*100)+155;
colorg = Math.round(Math.random()*100)+155;
colorb = Math.round(Math.random()*100)+155;
allforms[i].style.backgroundColor="rgb("+colorr+","+colorg+","+colorb+")";
}
*/

for (i=0; i<allps.length; i++) {
colorr = Math.round(Math.random()*50)+100;
colorg = Math.round(Math.random()*50)+100;
colorb = Math.round(Math.random()*50)+100;
allps[i].style.backgroundColor="rgba("+colorr+","+colorg+","+colorb+",0.5)";
}
for (i=0; i<alltrs.length; i++) {
colorr = Math.round(Math.random()*50)+100;
colorg = Math.round(Math.random()*50)+100;
colorb = Math.round(Math.random()*50)+100;
alltrs[i].style.backgroundColor="rgba("+colorr+","+colorg+","+colorb+",0.5)";
}
/*
for (i=0; i<allas.length; i++) {
colorr = Math.round(Math.random()*100)+155;
colorg = Math.round(Math.random()*100)+155;
colorb = Math.round(Math.random()*100)+155;
allas[i].style.backgroundColor="rgb("+colorr+","+colorg+","+colorb+")";
}
*/

}
function h1font() {
theh1 = document.getElementsByTagName("h2")[0];
theh1.style.fontFamily=fontarr[fontarrpos%4];
fontarrpos++;
}

function init2() {
setInterval(h1font,1000);
h1font();
document.getElementsByTagName("html")[0].addEventListener("click",function() {init();},false);
init();
}


</script>
</head>
<body onload="init2()">
	<h2>Start Page</h2>
	<table>
	<tr>
		<td>
			<form action="http://youtube.com/results" method="get">
				<input size="20" placeholder="Search Youtube" name="search_query">
				<input type="submit" value="youtube.com">
			</form>
		</td>
		<td>
			<a href="http://www.youtube.com/" class="search">Youtube</a>
		</td>
	</tr>
	<tr>
		<td>
			<form action="http://www.imdb.com/find" method="get">
				<input size="20" placeholder="Search IMDB" name="q">
				<input type="submit" value="imdb.com">
			</form>
		</td>
		<td>
			<a href="http://www.imdb.com/" class="search">imdb.com</a>
		</td>
	</tr>

	<tr>
	
		<td>
			
				<input onkeyup="enterkey(event,1)" type="text" id="thepiratebay" size="20" placeholder="Search thepiratebay.se">
				<input type="button" value="thepiratebay.se" onclick="thepiratebay()">
			
		</td>
		<td>
			<a href="http://thepiratebay.se/" class="search">thepiratebay.se</a>
		</td>
	</tr>

	<tr>
		<td>
			<form action="http://torrentz.eu/search" method="get">
				<input size="20" placeholder="Search torrentz.eu" name="q">
				<input type="submit" value="torrentz.eu">
			</form>
		</td>
		<td>
			<a href="http://torrentz.eu/" class="search">torrentz.eu</a>
		</td>
	</tr>
	<tr>
	
		<td>
			
				<input onkeyup="enterkey(event,0)" type="text" id="kickass" size="20" placeholder="Search kickass.to">
				<input type="button" value="kickass.so" onclick="kickass()">
			
		</td>
		<td>
			<a href="http://kickass.to/" class="search">kickass.to</a>
		</td>
	</tr>
	<tr>
		<td>
			<form action="http://en.wikipedia.org/w/index.php" method="get">
				<input size="20" placeholder="Search Wikipedia" name="search">
				<input type="submit" value="en.wikipedia.org">
			</form>
		</td>
		<td>
			<a href="http://en.wikipedia.org/" class="search">en.wikipedia.org</a>
		</td>
	</tr>
	<tr>
		<td>
			<form action="https://www.google.com/search" method="get">
			<input type="hidden" name="tbm" value="isch">
			<input type="text" size="20" name="q" placeholder="Search Google Images">
			<input type="submit" value="images.google.com">
			</form>
		</td>
		<td>
			<a href="http://images.google.com/" class="search">images.google.com</a>
		</td>
	</tr>
	</table>

	<iframe src="ajax.php" class="ajax"></iframe> 

	<div id="linkblock">
		<p><a href="http://boards.4chan.org/g/">http://boards.4chan.org/g/</a></p>
		<p><a href="https://mail.google.com/">Gmail</a></p>
		<p><a href="ajax.php">Ajax YTDL</a></p>
		<p><a href="https://online.jccc.edu">online.jccc.edu</a></p>
		<p><a href="https://my.jccc.edu/cp/home/displaylogin">my.jccc.edu</a></p>
		<p><?php include 'pageview.php'; ?> Page Views</p>
	</div>
	
</body>