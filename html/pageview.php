<?php
$bt = debug_backtrace();
include 'mysqlconnect.php';
$sq = mysql_query('select * from main where pagename="'.$bt[0]['file'].'";');
$arr = mysql_fetch_array($sq,MYSQL_ASSOC);
if ($arr['pagename']==$bt[0]['file']) {
$views=$arr['views']+1;
mysql_query('update main set views='.$views.' where pagename="'.$bt[0]['file'].'"');
}
if ($arr['pagename']!=$bt[0]['file']) {
mysql_query('insert into main (pagename,views) values ("'.$bt[0]['file'].'",1)');
$views=1;
}
echo $views;
?>