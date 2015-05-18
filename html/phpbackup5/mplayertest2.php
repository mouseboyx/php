<?php
$output = shell_exec('sudo DISPLAY=:0 xfce4-terminal');
// $output = shell_exec("ls");

echo $output;
?>