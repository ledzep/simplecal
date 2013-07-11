<?php

require("header.php");

if(isset($_SESSION['LOGGEDIN']) == FALSE) {
	header("Location: " . $config_basedir);
}

function short_event($name) {
	$final = "";
	$final = (substr($name, 0, 12) . "...");
	
	return $final;
}

if($_GET['error']) {
	echo "<script>newEvent('" . $_GET['eventdate'] . "', 1)</script>";
}

$cols = 7;
$weekday = date("w", mkttime(0, 0, 0, $month, 1, $year));

$numrow = ceil(($numdays + $weekday) / $cols);

echo "<br />";
echo "<table class='cal' cellspacing=0 cellpadding=5 border=1>";
echo "<>




