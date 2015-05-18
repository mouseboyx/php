<head>
<link href="style.css" rel="stylesheet">
<?php
/* directory making code

$i=0;
while (file_exists("ytdl".$i)) {
	$i++;
}
$newfolder="ytdl".$i;
echo $newfolder;
shell_exec("mkdir ".$newfolder);

*/
session_start();
if (!isset($_SESSION['hi'])) {
	$_SESSION['hi']=0;
} else {
	$_SESSION['hi']++;
	
}
echo $_SESSION['hi'];
echo $_SESSION['dir'];
echo "<br><pre>";
$output = shell_exec("ls ytdl0/*.part");
print_r($output);
if ($output=="") {
	echo "\nhello";
}
echo "</pre><br>";
preg_match('/ls\: cannot access *.part\: No such file or directory/',$output,$lsarray);
echo $lsarray[0];
echo "<br>";
$teststr="Hello 1 2 3 Hello";
echo str_replace("Hello","",$teststr);


session_write_close();
?>

<img src="working.gif">