<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
</head>
<body>
<?php

function youtubedl($location,$audioonly,$url,$download) {
		if ($audioonly==true) {
			$output = shell_exec("python youtube-dl -x ".escapeshellarg($url));
			echo $output;
			
			preg_match('/Destination\: .*\.m4a/',$output,$filenamearray);
			$downloadfilename=str_replace("Destination: ","",$filenamearray[0]);
			$filename = escapeshellarg(str_replace("Destination: ","",$filenamearray[0]));	
		}
		if ($audioonly==false) {
			$output = shell_exec("python youtube-dl ".escapeshellarg($url));
			echo $output;
			
			preg_match('/Destination\: .*\.mp4/',$output,$filenamearray);
			$downloadfilename=str_replace("Destination: ","",$filenamearray[0]);
			$filename = escapeshellarg(str_replace("Destination: ","",$filenamearray[0]));
		}
		
		
		$chmodoutput = shell_exec("chmod 666 ".$filename);
		echo $chmodoutput;
		
		if ($audioonly==true && $download==false) {
			$output = shell_exec("rename -v 's/-.{11}\.m4a/\.m4a/' ".$filename);
			echo $output;
			$mvoutput = shell_exec("mv -v *.m4a ".$location);
			echo $mvoutput;
		}
		
		if ($audionly==false && $download==false) {
			$output = shell_exec("rename -v 's/-.{11}\.mp4/\.mp4/' ".$filename);
			echo $output;
			$mvoutput = shell_exec("mv -v *.mp4 ".$location);
			echo $mvoutput;
		}

		if ($audioonly==true && $download==true) {
			$mvoutput = shell_exec("mv -v *.m4a ".$location);
			echo $mvoutput;
			echo '</pre><p><a href="youtube/'.$downloadfilename.'">Download</a></p>';
			$pre==true;
		}
		
		if ($audioonly==false && $download==true) {
			$mvoutput = shell_exec("mv -v *.mp4 ".$location);
			echo $mvoutput;
			echo '</pre><p><a href="youtube/'.$downloadfilename.'">Download</a></p>';
			$pre==true;
		}
		
		if ($pre==null) {
		echo '</pre>';
		}
		
}
if (isset($_GET['url'])) {
if ($_GET['url']!=null) {
	
	echo "<pre>";
	
	if ($_GET['moveto']=="downloads" && $_GET['audioonly']=="yes") {
		youtubedl("/home/kent/Downloads",true,$_GET['url'],false);
	}
	
	if ($_GET['moveto']=="downloads" && $_GET['audioonly']==null) {
		youtubedl("/home/kent/Downloads",false,$_GET['url'],false);
	}
	
	if ($_GET['moveto']=="music" && $_GET['audioonly']=="yes") {
		youtubedl("/home/kent/Downloads/music",true,$_GET['url'],false);
	}
	
	if ($_GET['moveto']=="music" && $_GET['audioonly']==null) {
		youtubedl("/home/kent/Downloads/music",false,$_GET['url'],false);
	}

	if ($_GET['moveto']=="youtube" && $_GET['audioonly']=="yes") {
		youtubedl("youtube",true,$_GET['url'],true);
	}

	if ($_GET['moveto']=="youtube" && $_GET['audioonly']==null) {
		youtubedl("youtube",false,$_GET['url'],true);
	}
	
	/* Old code before function was created ///////////////////////////////////////

	if ($_GET['moveto']=="downloads" && $_GET['audioonly']=="yes") {
		$output = shell_exec("python youtube-dl -x ".escapeshellarg($_GET['url']));
		echo $output;
		preg_match('/Destination\: .*\.m4a/',$output,$filenamearray);
		$filename = escapeshellarg(str_replace("Destination: ","",$filenamearray[0]));
		$chmodoutput = shell_exec("chmod 666 ".$filename);
		echo $chmodoutput;
		$output = shell_exec("rename -v 's/-.{11}\.m4a/\.m4a/' ".$filename);
		echo $output;
		$mvoutput = shell_exec("mv -v *.m4a /home/kent/Downloads");
		echo $mvoutput;
		
	}
	if ($_GET['moveto']=="downloads" && $_GET['audioonly']==null) {
		$output = shell_exec("python youtube-dl ".escapeshellarg($_GET['url']));
		echo $output;
		$mvoutput = shell_exec("mv -v *.mp4 /home/kent/Downloads");
		echo $mvoutput;
		preg_match('/Destination\: .*\.mp4/',$output,$filenamearray);
		$filename = str_replace("Destination: ","",$filenamearray[0]);
		$output = shell_exec("rename -v 's/-.{11}\.mp4/\.mp4/' ".'"/home/kent/Downloads/'.$filename.'"');
		echo $output;
	}
	if ($_GET['moveto']=="music" && $_GET['audioonly']==null) {
		$output = shell_exec("python youtube-dl ".escapeshellarg($_GET['url']));
		echo $output;
		$mvoutput = shell_exec("mv -v *.mp4 /home/kent/Downloads/music");
		echo $mvoutput;
		preg_match('/Destination\: .*\.mp4/',$output,$filenamearray);
		$filename = str_replace("Destination: ","",$filenamearray[0]);
		$output = shell_exec("rename -v 's/-.{11}\.mp4/\.mp4/' ".'"/home/kent/Downloads/music/'.$filename.'"');
		echo $output;
	}
	if ($_GET['moveto']=="music" && $_GET['audioonly']=="yes") {
		$output = shell_exec("python youtube-dl -x ".escapeshellarg($_GET['url']));
		echo $output;
		$mvoutput = shell_exec("mv -v *.m4a /home/kent/Downloads/music");
		echo $mvoutput;
		preg_match('/Destination\: .*\.m4a/',$output,$filenamearray);
		$filename = str_replace("Destination: ","",$filenamearray[0]);
		$output = shell_exec("rename -v 's/-.{11}\.m4a/\.m4a/' ".'"/home/kent/Downloads/music/'.$filename.'"');
		echo $output;
		
	}
	if ($_GET['moveto']=="youtube" && $_GET['audioonly']==null) {
		$output = shell_exec("python youtube-dl ".escapeshellarg($_GET['url']));
		echo $output;
		preg_match('/Destination\: .*\.mp4/',$output,$filenamearray);
		$filename = str_replace("Destination: ","",$filenamearray[0]);
		$output = shell_exec("mv -v *.mp4 youtube");
		echo $output;
		echo '</pre><a href="youtube/'.$filename.'">Download</a>';
		$pre==false;
		
	}
	if ($_GET['moveto']=="youtube" && $_GET['audioonly']=="yes") {
		$output = shell_exec("python youtube-dl -x ".escapeshellarg($_GET['url']));
		echo $output;
		preg_match('/Destination\: .*\.m4a/',$output,$filenamearray);
		$filename = str_replace("Destination: ","",$filenamearray[0]);
		$output = shell_exec("mv -v *.m4a youtube");
		echo $output;
		echo '</pre><a href="youtube/'.$filename.'">Download</a>';
		$pre=false;
		
	}
	////////////////////////////////////////////////////////////////*/

	
	echo '<p><a href="/?audioonly='.htmlspecialchars($_GET['audioonly'])."&moveto=".htmlspecialchars($_GET['moveto']).'">Return</a></p>';
}
} else {

if (isset($_GET['q'])==false)
{
?>

<div>
<h2>Search youtube.com</h2>
<form method="get" action="/">
<p><input type="text" name="q" size="55" value="<?php if (isset($_GET['lq'])) { echo htmlspecialchars($_GET['lq']); } ?>"></p>


<p><input type="radio" name="moveordl" value="move"<?php if (isset($_GET['move']) && $_GET['move']=="move") { echo " checked"; } ?>> Move to music</p>
<p><input type="radio" name="moveordl" value="dl"<?php if (isset($_GET['move']) && $_GET['move']=="dl") { echo " checked"; } ?>> Download</p>

<p><input type="checkbox" name="audioonly" value="yes" <?php if (isset($_GET['audioonly']) && $_GET['audioonly']=="yes") { echo "checked"; } ?>> Audio only</p>

<input type="submit">

</form>


</div>
<div>
	<h2>Download by URL</h2>
	<form action="/" method="get">
	
	<input type="text" name="url" size="55">
	<p><input type="radio" name="moveto" value="downloads" <?php if (isset($_GET['moveto']) && $_GET['moveto']=="downloads") { echo "checked"; } ?>> Move to Downloads</p>
	<p><input type="radio" name="moveto" value="music" <?php if (isset($_GET['moveto']) && $_GET['moveto']=="music") { echo "checked"; } ?>> Move to Music</p>
	<p><input type="radio" name="moveto" value="youtube" <?php if (isset($_GET['moveto']) && $_GET['moveto']=="youtube") { echo "checked"; } ?>> Download</p>
	<p><input type="checkbox" name="audioonly" value="yes" <?php if (isset($_GET['audioonly']) && $_GET['audioonly']=="yes") { echo "checked"; } ?>> Audio Only</p>
	<input type="submit">
	</form>
</div>
<?php
} else {
$q=str_replace(" ","+",$_GET['q']);
$searchresult = file_get_contents("http://www.youtube.com/results?search_query=".$q);

preg_match('/\?v=.{11}/',$searchresult,$marray);
$youtubeurl = "http://www.youtube.com/watch".$marray[0];
echo $youtubeurl."<br>";

// file_put_contents("ytdl","youtube-dl "."http://www.youtube.com/watch".$marray[0]);
if ($_GET['audioonly']=="yes") {
	$ytoutput = shell_exec("python youtube-dl -x ".$youtubeurl);
	preg_match('/Destination\: .*\.m4a/',$ytoutput,$filenamearray);
} else {
	$ytoutput = shell_exec("python youtube-dl ".$youtubeurl);
	preg_match('/Destination\: .*\.mp4/',$ytoutput,$filenamearray);
}
// preg_match('/Destination\: .*'.PHP_EOL.PHP_EOL.'\[download\]/',$ytoutput,$filenamearray);

// preg_match('/Post-process file .* exists, skipping/',$ytoutput,$filenamearray);
$filename = str_replace("Destination: ","",$filenamearray[0]);
$filename = str_replace(" [download]","",$filename);
if ($_GET['moveordl']=="dl") {
	$moveoutput = shell_exec("mv -v *.m4a youtube");
	echo $moveoutput;
	$moveoutput2 = shell_exec("mv -v *.mp4 youtube");
	echo $moveoutput2;
	echo '<br><a href="/youtube/'.$filename.'">Download</a><br>';
}
echo "<br><br><pre>";
echo $ytoutput;

echo "<br><br></pre>";
echo $filename;
if ($_GET['moveordl']=="move") {
	shell_exec("chmod 666 *.m4a");
	shell_exec("chmod 666 *.mp4");
	$moveoutput = shell_exec("mv -v *.m4a /home/kent/Downloads/music");
	$renameoutput = shell_exec("rename -v 's/-.{11}\.m4a/\.m4a/' ".'"/home/kent/Downloads/music/'.$filename.'"');
	$moveoutput2 = shell_exec("mv -v *.mp4 /home/kent/Downloads/music");
	$renameoutput2 = shell_exec("rename -v 's/-.{11}\.mp4/\.mp4/' ".'"/home/kent/Downloads/music/'.$filename.'"');
}
echo "<br><pre>".$moveoutput."</pre><br>";
echo "\n<pre>".$renameoutput."</pre>";
echo "<br><pre>".$moveoutput2."</pre><br>";
echo "\n<pre>".$renameoutput2."</pre>";
// echo $_GET['q'];


?>
<br>
<a href="/?lq=<?php echo htmlspecialchars($_GET['q']).'&move='.htmlspecialchars($_GET['moveordl']).'&audioonly='.htmlspecialchars($_GET['audioonly']); ?>">Return</a> 
<a href="/?move=<?php echo $_GET['moveordl'].'&audioonly='.htmlspecialchars($_GET['audioonly']); ?>">New Search</a>
<?php
}
}
?>
<div>
<p>
	<a href="youtube/"><h2>Youtube Directory</h2></a>
</p>
<p><a href="ajax.php">Ajax Download</a></p>
</div>
</body>
</html>