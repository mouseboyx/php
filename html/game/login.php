<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="gamestyle.css">
<meta charset="utf-8">
<title>Testing Game Login</title>
<script>
function init() {
	document.getElementById("username").focus();
}
</script>
</head>
<body onload="init()">
	<nav>
		<a href="/game/">Game Home</a>
	</nav>

<?php
if ($_POST['user']==null || $_POST['pass']==null) {
?>
	<h1>Login</h1>
	<form action="login.php" method="post">
	<p>Username: <input type="text" size="32" name="user" id="username"></p>
	<p>Password: <input type="password" size="32" name="pass"></p>
	<p><input type="submit" value="Login"></p>
	</form>
<?php
} else {
	include 'mysqlconnect.php';
	$user = mysql_real_escape_string(stripslashes($_POST['user']));
	$pass = md5($_POST['pass']);
	$userq = mysql_query("select * from gameusers where user='".$user."';");
	$gameusers = mysql_fetch_array($userq, MYSQL_NUM);
	if ($gameusers[1]==$user && $gameusers[2]==$pass) {
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['id']=$gameusers[0];
		echo $_SESSION['user']." Login Finished";
	}
	if ($gameusers[1]==$user && $gameusers[2]!=$pass) {
		?>
		<p class="red">Invalid Passowrd</p>
		<h1>Login</h1>
		<form action="login.php" method="post">
		<p>Username: <input type="text" size="32" name="user"  value="<?php echo $_POST['user']; ?>"></p>
		<p>Password: <input type="password" size="32" name="pass"></p>
		<p><input type="submit" value="Login"></p>
		</form>
		<?php
	}
	
	if ($gameusers[1]!=$user) {
		?>		
		<p class="red">Username does not exist</p>
		<h1>Login</h1>
		<form action="login.php" method="post">
		<p>Username: <input type="text" size="32" name="user" value="<?php echo $_POST['user']; ?>"></p>
		<p>Password: <input type="password" size="32" name="pass"></p>
		<p><input type="submit" value="Login"></p>
		</form>
		<?php
	}

}
session_write_close();
?>
</body>
</html>