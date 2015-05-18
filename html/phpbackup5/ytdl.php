<?php
session_start();
function youtubedl($url) {
		
	$i=0;
	while (file_exists("ytdl".$i)) {
		$i++;
	}
	$newfolder="ytdl".$i;
	
	shell_exec("mkdir ".$newfolder);
//	$output = shell_exec("cd ".$newfolder." && python ../youtube-dl -x ".escapeshellarg($url)." > ".$newfolder."/ytdl &");	
	if ($_GET['audioonly']=="true") {
		$output = shell_exec("sh bashytdl ".$newfolder." ".escapeshellarg($url));	
	}
	if ($_GET['audioonly']=="false") {
		$output = shell_exec("sh bashytdlmp4 ".$newfolder." ".escapeshellarg($url));
	}
    echo $newfolder."/ytdl";
	$_SESSION['dir']=$newfolder;
		
}

if ($_GET['url']!=null) {

	youtubedl($_GET['url']);
	

}
session_write_close();
?>