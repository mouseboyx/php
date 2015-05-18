<?php
	session_start();
	if ($_GET['audioonly']=="true") {

		if ($_GET['oggorm4a']=="m4a") {
			$basedir=escapeshellarg($_GET['bdir']);
			$lspart = shell_exec("ls ".$basedir."/*.part");
			if ($lspart=="") {
		
				$output = shell_exec("mv -v ".$basedir."/*.m4a youtube");
	
				preg_match('/youtube\/.*\.m4a/',$output,$filenamearray);
				$filename=$filenamearray[0];
				$filename=str_replace("youtube/","",$filename);
				$filename=str_replace("\'","'",$filename);
				echo $filename;
			}
			$lsm4a = shell_exec("ls ".$basedir."/*.m4a");
			if ($lsm4a=="") {
		
				$safebasedir=str_replace("ytdl","",$_GET['bdir']);
				if (is_numeric($safebasedir)) {
		
					shell_exec("rm -rf ".escapeshellarg("ytdl".$safebasedir));
				}
			}
		}
		if ($_GET['oggorm4a']=="ogg") {
			$basedir=escapeshellarg($_GET['bdir']);
			$lspart = shell_exec("ls ".$basedir."/*.part");
			if ($lspart=="") {
		
				$output = shell_exec("mv -v ".$basedir."/*.ogg youtube");
	
				preg_match('/youtube\/.*\.ogg/',$output,$filenamearray);
				$filename=$filenamearray[0];
				$filename=str_replace("youtube/","",$filename);
				$filename=str_replace("\'","'",$filename);
				echo $filename;
			}
			$lsogg = shell_exec("ls ".$basedir."/*.ogg");
			if ($lsogg=="") {
		
				$safebasedir=str_replace("ytdl","",$_GET['bdir']);
				if (is_numeric($safebasedir)) {
		
					shell_exec("rm -rf ".escapeshellarg("ytdl".$safebasedir));
				}
			}
		}
	}
	
	if ($_GET['audioonly']=="false" && $_GET['oggorm4a']=="mp4") {
			$basedir=escapeshellarg($_GET['bdir']);
			$lspart = shell_exec("ls ".$basedir."/*.part");
			if ($lspart=="") {
		
				$output = shell_exec("mv -v ".$basedir."/*.mp4 youtube");
	
				preg_match('/youtube\/.*\.mp4/',$output,$filenamearray);
				$filename=$filenamearray[0];
				$filename=str_replace("youtube/","",$filename);
				$filename=str_replace("\'","'",$filename);
				echo $filename;
			}
			$lsm4a = shell_exec("ls ".$basedir."/*.mp4");
			if ($lsm4a=="") {
		
				$safebasedir=str_replace("ytdl","",$_GET['bdir']);
				if (is_numeric($safebasedir)) {
		
					shell_exec("rm -rf ".escapeshellarg("ytdl".$safebasedir));
				}
			}
	}

	if ($_GET['audioonly']=="false" && $_GET['oggorm4a']=="webm") {
			$basedir=escapeshellarg($_GET['bdir']);
			$lspart = shell_exec("ls ".$basedir."/*.part");
			if ($lspart=="") {
		
				$output = shell_exec("mv -v ".$basedir."/*.webm youtube");
	
				preg_match('/youtube\/.*\.webm/',$output,$filenamearray);
				$filename=$filenamearray[0];
				$filename=str_replace("youtube/","",$filename);
				$filename=str_replace("\'","'",$filename);
				echo $filename;
			}
			$lsm4a = shell_exec("ls ".$basedir."/*.webm");
			if ($lsm4a=="") {
		
				$safebasedir=str_replace("ytdl","",$_GET['bdir']);
				if (is_numeric($safebasedir)) {
		
					shell_exec("rm -rf ".escapeshellarg("ytdl".$safebasedir));
				}
			}
	}
		
?>