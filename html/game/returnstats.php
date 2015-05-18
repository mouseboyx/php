<?php
include 'mysqlconnect.php';
session_start();
if ($_SESSION['user']!=null && $_SESSION['id']!=null) {

	$user=$_SESSION['user'];
	$id=$_SESSION['id'];
	$q=mysql_query("select * from userstats where id=".$id.";");
	$stats = mysql_fetch_array($q,MYSQL_NUM);
	echo time()-$stats[1];
}
?>
