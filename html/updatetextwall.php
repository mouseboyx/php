<?php
$x=intval($_GET['x']);
$y=intval($_GET['y']);
$text=$_GET['text'];
$string = htmlspecialchars("\n".$y."\n".$x."\n".$text);
if (substr_count($string,"\n")==3) {
file_put_contents("textwallfile.htm", $string, FILE_APPEND);
}
?>