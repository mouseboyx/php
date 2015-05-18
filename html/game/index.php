<?php
include "mysqlconnect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="gamestyle.css">
<meta charset="utf-8">
<title>Testing Game</title>
</head>
<script src="main.js" defer></script>
<body id="realbody">
	<nav>
		<a href="login.php">Login</a> -
		<a href="createuser.php">Create User</a> -
		<a href="logout.php">Log Out</a>
	</nav>
	<div>
		<h2>
		<?php
		if ($_SESSION['user']!=null && $_SESSION['id']!=null) {
			echo "Hello ".$_SESSION['user']." ID:".$_SESSION['id'];
		} else {
			echo "Hello Guest";
		}
		?>
		</h2>
	</div>
	<div id="body">
	Seconds since account creation <span id="jsseconds"></span>
	<p>Level Modifier: <input type="text" value="5" id="modifier"><input type="button" onclick="modset()" value="Set"></p>
	<div id="progbar"><span id="progbart"></span>
		<div id="iprogbar">
		</div>
	</div>
	<div id="level">
	</div>
	<div>
	<span id="red"></span> <span id="green"></span> <span id="blue"></span> <input type="button" value="Stop color" onclick="stopcolorchange()">
	</div>
</body>

</html>

