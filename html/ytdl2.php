<?php
// session_start();
function youtubedl($url) {
		
	$i=0;
	while (file_exists("ytdl".$i)) {
		$i++;
	}
	$newfolder="ytdl".$i;
	
	shell_exec("mkdir ".$newfolder);
//	$output = shell_exec("cd ".$newfolder." && python ../youtube-dl -x ".escapeshellarg($url)." > ".$newfolder."/ytdl &");	
	$output = shell_exec("sh bashytdl2 ".$newfolder." ".escapeshellarg($url));
	echo file_get_contents($newfolder."/ytdlfn");
//	echo $newfolder."/ytdl";
//	$_SESSION['dir']=$newfolder;
		
}

if ($_GET['url']!=null) {

	youtubedl($_GET['url']);
	

}
// session_write_close();
?>