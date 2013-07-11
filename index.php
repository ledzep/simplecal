<?php
session_start();
require("db.php");

if(isset($_SESSION['LOGGEDIN']) == TRUE) {
	header("Location: " . $config_basedir . "view.php");
}

if($_POST['submit']) {
	$temp = sha1($_POST['passBox']);
	$loginsql = "SELECT * FROM logins WHERE
				username = '" . $_POST['userBox'] . "' AND password = '$temp'";
	$loginres = mysql_query($loginsql);
	$numrows = mysql_num_rows($loginres);
	
	if($numrows == 1) {
		$loginrow = mysql_fetch_assoc($loginres);
		
		$_SESSION['LOGGEDIN'] = 1;
		
		header("Location: " . $config_basedir . "view.php");
	}
	else {
		header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?error=1");
	}
}
else {
	?>
<!DOCTYPE html>
<head>
	<title></title>
</head>
<body>
	<div id="login">
		<h1>Calendar Login</h1>
		Please enter your username and password to log on.
		<p>
			<?php
			if($_GET['error']) {
				echo "<strong>Incorrect username/password</strong>";
			}
			?>
			
			<form action="<?php echo $_SERVER['SCRIPT_NAME'] ; ?>" method="POST">
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="userBox">
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="passBox">
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Log in">
				</tr>
			</table>
			</form>
	</div>
	<?php
}
?>

			
			 
