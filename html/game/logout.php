<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="gamestyle.css">
<meta charset="utf-8">
<title>Testing Game</title>
</head>
<body>
	<nav>
		<a href="/game/">Game Home</a> -
		<a href="login.php">Login</a> -
		<a href="createuser.php">Create User</a>
	</nav>
<?php
session_start();
$user = $_SESSION['user'];
	if ($_SESSION['user']!=null) {
		$_SESSION['user']=null;
		$_SESSION['id']=null;
		echo "Logout of ".$user." Complete";
		
	} else {
		echo "Not logged in";
	}
?>
		