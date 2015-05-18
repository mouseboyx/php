<?php
$basedir=$_GET['bdir'];
$done = file_get_contents($basedir."/done");
echo $done;
?>