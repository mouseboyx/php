<pre>
<?php
/*
$ytoutput = "[download] Destination: Jimi Hendrix Purple Haze-39DENARnUtM.m4a [download]";
// $ytoutput = "hi";
preg_match('/Destination\: .* \[download\]/',$ytoutput,$filenamearray);
$filename = str_replace("Destination: ","",$filenamearray[0]);
$filename = str_replace(" [download]","",$filename);
echo $filename;
*/
?>


<?php
$output = '‘(Full Album) Buckethead - Final Bend of the Labyrinth (Buckethead PIkes #73)-oOyzIWQJaak.m4a’ -> ‘youtube/(Full Album) Buckethead - Final Bend of the Labyrinth (Buckethead PIkes #73)-oOyzIWQJaak.m4a’';
preg_match('/youtube\/.*\.m4a/',$output,$filenamearray);
	
	$filename=$filenamearray[0];
	$filename=str_replace("youtube/","",$filename);
	echo $filename;
$ll = shell_exec("ls");
echo "\n";

echo $ll;

?>
</pre>