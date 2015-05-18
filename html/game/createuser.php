<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="gamestyle.css">
<meta charset="utf-8">
<title>Create User</title>
<script>
function init() {
	document.getElementById("username").focus();
}
</script>
</head>
<body onload="init()">
	<nav>
		<a href="/game/">Game Home</a> -
		<a href="login.php">Login</a>
	</nav>
<?php
if ($_POST['user']==null || $_POST['pass']==null) {
?>
<h1>Create User Account</h1>
<form action="createuser.php" method="post">
<p>Username: <input type="text" size="32" name="user" id="username"></p>
<p>Password: <input type="password" size="32" name="pass"></p>
<p><input type="submit" value="Create User"></p>
</form>
<?php
} else {
include 'mysqlconnect.php';
$user = mysql_real_escape_string(stripslashes($_POST['user']));
$pass = md5($_POST['pass']);
$dupuserq = mysql_query("select * from gameusers where binary user='".$user."';");
$gameusers = mysql_fetch_array($dupuserq, MYSQL_NUM);

if ($gameusers[1]==$user) {
	echo '<p class="red">Username "'.$user.'" already exists</p>';
	?>
	<h1>Create User Account</h1>
	<form action="createuser.php" method="post">
	<p>Username: <input type="text" size="32" name="user"></p>
	<p>Password: <input type="password" size="32" name="pass"></p>
	<p><input type="submit" value="Create User"></p>
	</form>
	<?php
} else {
	mysql_query("insert into gameusers (user,pass) values ('".$user."','".$pass."');");
	$idq = mysql_query("select * from gameusers where binary user='".$user."';");
	$id = mysql_fetch_array($idq, MYSQL_NUM);
	mysql_query("insert into userstats (id, unixtime) values (".$id[0].",".time().");");
	echo $user.", ".$id[0]." Created";
//	echo '<a href="login.php">Login</a>';
}
}
?>
</body>
</html>