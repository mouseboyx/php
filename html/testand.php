<?php
$output = shell_exec("python youtube-dl https://www.youtube.com/watch?v=oOyzIWQJaak > ytdl &");
echo $output;
?>