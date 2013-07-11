<?php

session_start();
require("db.php");

?>

<!DOCTYPE html>
<head>
	<title><?php echo $config_name; ?></title>
	<script language="javascript" type="text/javascript" src="./internal_request.js">
	</script>
</head>
<body>
	<div id="header">
		<h1><?php echo $config_name; ?></h1>
	</div>
	<div id="menu">
		&bull;
		<a href="<?php echo $config_basedir; ?>">This month</a>
		&bull;
		<a href="<?php echo $config_basedir; ?>logout.php">Logout</a>
		&bull;
	</div>
	<div id="container">
		<div id="bar">
			<?php require("bar.php"); ?>
		</div>
