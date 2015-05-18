jsseconds=document.getElementById("jsseconds");
jsseconds.innerHTML="";
s=null;
l=1;
exptolvl=10;
lastexptolvl=null;
intervalset=null;
mod=5;
a=1;
a2=0;
newcolor=null;
randomcolorseed=Math.round(Math.random()*255);
randomg=Math.round(Math.random()*255);
randomb=Math.round(Math.random()*255);
or=200;
og=200;
ob=200;
r=150;
g=150;
b=150;
function modset() {
	mod=document.getElementById("modifier").value/1;
	l=null;
	lastexptolvl=null;
	exptolvl=10;
}

function gainlevel(sparam) {
while (s>=exptolvl) {

l++;
exptolvl=Math.round(exptolvl+(l*mod));
lastexptolvl=Math.round(exptolvl-(l*mod));
}
document.getElementById("level").innerHTML="Level:"+l+" Next:"+exptolvl+" Debug: "+sparam;
}
function progressbarupdate(sparam2) {
	iprogressbar=document.getElementById("iprogbar");
	iprogressbar.style.width=(Math.round((100-(exptolvl-sparam2)/(exptolvl-lastexptolvl)*100)))*5+"px";
//	progressbar.style.width=500*Math.round((exptolvl-sparam2)/exptolvl)+"px";
//	progressbar.style.width="400px";
	progressbar=document.getElementById("progbart");
	progressbar.innerHTML=Math.round((100-(exptolvl-sparam2)/(exptolvl-lastexptolvl)*100))+"%";
}

function updateseconds()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		s=xmlhttp.responseText;
		jsseconds.innerHTML=s;
		progressbarupdate(s);
		gainlevel(s);
		
    }
  }
xmlhttp.open("GET","returnstats.php",true);
xmlhttp.send();
}

function pulsealpha() {
	iprogbar=document.getElementById("iprogbar");
	//alpha 1 statements
	if (a>=1) {
		switcha=true;
		
	}
	if (a<=0) {
		switcha=false;
		
	}
	if (switcha==true) {
		a=(a/1)-0.05
	}
	if (switcha==false) {
		a=(a/1)+0.05;
	}
	a2=(a-1)*-1;
	if (a2==undefined) {
		a2=0;
	}
//	iprogbar.style.color="rgba("+Math.round(a*255)+","+Math.round(a*255)+","+Math.round(a*255)+",1)";
//	rand=Math.random();	
//	rand2=Math.random();
	/*	
	if (a<0.33 || rand<0.33) {
		newcolor="255,0,0";
	}	
	if ((a>0.33 && a<0.66) || (rand>0.33 && rand<0.66)) {
		newcolor="0,255,0";
	}
	if (a>0.66 || rand>0.66) {
		newcolor="0,0,255";
	}
	

	if (rand<0.33) {
		newcolor="255,0,0";
	}	
	if (rand>0.33 && rand<0.66) {
		newcolor="0,255,0";
	}
	if (rand>0.66) {
		newcolor="0,0,255";
	}

	if (rand2<0.33) {
		newcolo2r="255,0,0";
	}	
	if (rand2>0.33 && rand<0.66) {
		newcolor2="0,255,0";
	}
	if (rand2>0.66) {
		newcolor2="0,0,255";
	}
	*/
	newcolor="255,0,0";
	newcolor2="0,0,255";
	if (navigator.userAgent.indexOf("Firefox")!=-1) {
		iprogbar.style.background="linear-gradient(to right,rgba(0,0,0,"+a+"), rgba("+newcolor+","+a2+"), rgba("+newcolor2+","+a2+"), rgba(0,0,0,"+a+"))";
	}
	if (navigator.userAgent.indexOf("Chrome")!=-1) {
		iprogbar.style.background="-webkit-linear-gradient(right,rgba(0,0,0,"+a+"), rgba("+newcolor+","+a2+"), rgba("+newcolor2+","+a2+"), rgba(0,0,0,"+a+"))";
	}
//	document.getElementById("level").innerHTML+=a;
	progbar=document.getElementById("progbar");
//	progbar.style.color="rgba("+Math.round(a*255)+","+Math.round(a*255)+","+Math.round(a*255)+",1)";
}

function randomcseed() {
	randomcolorseed=Math.round((Math.random()*200)+55);

}
function randomcseedg() {
	randomg=Math.round((Math.random()*200)+55);
}
function randomcseedb() {
	randomb=Math.round((Math.random()*200)+55);
}
function steptocolor() {
	if (randomcolorseed>r) {
		r++;
	}
	if (randomcolorseed<r) {
		r--;
	}

	if (randomcolorseed==r) {
		randomcseed();
		
	}

	if (randomg>g) {
		g++;
	}
	if (randomg<g) {
		g--;
	}

	if (randomg==g) {
		randomcseedg();
		
	}

	if (randomb>b) {
		b++;
	}
	if (randomb<b) {
		b--;
	}

	if (randomb==b) {
		randomcseedb();
		
	}
	document.getElementById("red").innerHTML=r+","+randomcolorseed;
	document.getElementById("green").innerHTML=g+","+randomg;
	document.getElementById("blue").innerHTML=b+","+randomb;

//	document.getElementById("level").innerHTML+=r;
	document.getElementById("realbody").style.background="linear-gradient(to right,rgb("+r+","+g+","+b+"),rgb("+(b-55)+","+(r-55)+","+(g-55)+"))";
}

intervalset = setInterval(updateseconds,500);
intervalset2 = setInterval(pulsealpha,30);
intervalset3 = setInterval(steptocolor,10);

function stopcolorchange() {
clearInterval(intervalset3);
}