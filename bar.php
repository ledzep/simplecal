<?php

if(isset($_GET['date']) == TRUE) {
	$explodedate = explode("-", $_GET['date']);
	$month = $explodedate[0];
	$year = $explodedate[1];
	$numdays = date("t", mktime(0, 0, 0, $month, 1, $year));
}
else {
	$month = date("n", mktime());
	$numdays = date("t", mktime());
	$year = date("Y", mktime());
}

$displaydate = date("F Y", mktime(0, 0, 0, $month, 1, $year));

if($month == 1) {
	$prevdate = "12-" . ($year-1);
}
else {
	$prevdate = ($month-1) . "-" . $year;
}

if($month == 12) {
	$nextdate = "1-" . ($year+1);
}
else {
	$nextdate = ($month+1) . "-" . $year;
}

echo "<span class='datepicker'>";
echo "<a href="$_SERVER['SCRIPT_NAME']?date=' . $prevdate . '">&larr;</a> ";
echo $displaydate;
echo " <a href="$_SERVER['SCRIPT_NAME']?date=' . $nextdate . '">&rarr;</a> ";
echo "</span>";
?>

<div id="eventcage">
	<p>To view event information here, click on the item in the calendar.</p>
</div>

<?php
echo "<h1>Latest Events</h1>";

echo "<ul>";
$nearsql = "SELECT * FROM events WHERE date >= NOW() ORDER BY starttime;";
$nearres = mysql_query($nearsql);
$nearnumrows = mysql_num_rows($nearres);

if($nearnumrows == 0) {
	echo "No events!";
}
else {
	while($nearrow = mysql_fetch_assoc($nearres)) {
		echo "<li><a href='#' onclick='getEvent(" . $nearrow['id'] . ")'>" . $nearrow['name'] . "</a>(<i>" . $nearrow['date'] . "</i>)</li>";
	}
}

echo "</ul>";
?>







