<?php

date_default_timezone_set("Europe/Kiev");

if ($_SERVER['SERVER_NAME'] !== "vezemvse.com.ua"){
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "vezemvse_db";
} else {
	$host = "vezemvse.mysql.ukraine.com.ua";
	$username = "vezemvse_db";
	$password = "eY62xfNe";
	$db_name = "vezemvse_db";
}

$con = mysqli_connect($host, $username, $password, $db_name);

if (mysqli_connect_errno()) {
	die("Failed to connect to MySQL: " . mysqli_connect_error());
} else {
	mysqli_set_charset($con, 'utf8');
	mysqli_select_db($con, $db_name);
}

?>