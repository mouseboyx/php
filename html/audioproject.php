<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>random music</title>
<script>

a2200 = new Audio("2200.wav");
a2331 = new Audio("2331.wav");
a2469 = new Audio("2469.wav");
a2616 = new Audio("2616.wav");
a2772 = new Audio("2772.wav");
a2937 = new Audio("2937.wav");
a3111 = new Audio("3111.wav");
a3296 = new Audio("3296.wav");
a3492 = new Audio("3492.wav");
a3700 = new Audio("3700.wav");
a3920 = new Audio("3920.wav");
a4153 = new Audio("4153.wav");
a4400 = new Audio("4400.wav");
parsed = null;
i = 0;
ii = 0;
lengtha=0;
audioarr = [a2200,a2331,a2469,a2616,a2772,a2937,a3111,a3296,a3492,a3700,a3920,a4153,a4400];

function playaudio1() {
//a2200.play();
randnum = Math.round(Math.random()*12);
audioarr[randnum].currentTime=0;
audioarr[randnum].play();

document.getElementById("debugi").innerHTML=randnum
}
function setintervala() {
setInterval(playaudio1,1010);
}

/*
document.getElementById("startbtn1").addEventListener("click",playaudio1);

//document.getElementById("startbtn1").addEventListener("click",playaudio1);
document.getElementById("debugi").innerHTML="debug";
*/

/*
function myFunction1() {
document.getElementById("debugi").innerHTML="hi";
document.getElementById("start1").addEventListener("click",myFunction2);
}
function myFunction2() {
document.getElementById("debugi").innerHTML="hi2";
}
*/
function parseAndPlay() {
parsed=document.getElementById("inputa").value.split(",");
i=0;
lengtha=document.getElementById("lengtha").value;
intervalseq = setInterval(playParsed,lengtha);

// setTimeout(function() { setInterval(stopA,lengtha-1); },legntha-1);
// setInterval(stopA,lengtha);
}
function stopA() {
audioarr[parsed[i]].currentTime=0;
audioarr[parsed[i]].pause();
}
function playParsed() {
//a2200.play();
if (i>(parsed.length-1)) {
i=0;
}
while (ii<audioarr.length) {
audioarr[ii].currentTime=0;
audioarr[ii].pause();

ii++;
}
ii=0;
/*
audioarr[parsed[i]].currentTime=0;
audioarr[parsed[i]].pause();
*/
audioarr[parsed[i]].play();

document.getElementById("debugi").innerHTML=i+","+parsed[i]+","+parsed.length;
i++;

}
function pentatonic() {
document.getElementById("inputa").value="0,2,4,7,9,12,9,7,4,2";
}
function major() {
document.getElementById("inputa").value="0,1,3,5,6,8,10,12,10,8,6,5,3,1";
}
function clearintseq() {
ii=0;
while (ii<audioarr.length) {
audioarr[ii].currentTime=0;
audioarr[ii].pause();

ii++;
}
clearInterval(intervalseq);
}
</script>
</head>
<body onload="myFunction1()">
<input type="button" value="startRandom" id="start1" onclick="setintervala()"><input type="button" value="start sequence" onclick="parseAndPlay()"><input type="text" size="4" id="lengtha" value="500"><input type="button" onclick="clearintseq()" value="stop sequence">
<span id="debugi">test</span><br>
<textarea id="inputa" cols="50" rows="25"></textarea>
<input style="" value="Pentatonic" onclick="pentatonic()" type="button">
<input style="position:relative;bottom:30px;right:93px;" value="Major" onclick="major()" type="button">
</body>
</html>
