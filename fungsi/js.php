<?php
set_time_limit(30000);
//error_reporting(0);
session_start();
include "koneksi.php";
function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float) $usec + (float) $sec);
}


if ($_GET['ua'] == 'a') {
	$time_start = microtime_float();
	include "../data/test_algoritma/data.php";


	// Sleep for a while
	usleep(100);

	$time_end = microtime_float();
	$time = $time_end - $time_start;

	echo "<br><br>Waktu Eksekusi $time Detik\n";
} elseif ($_GET['ua'] == 'b') {
	include "../data/algoritma/data.php";
}
