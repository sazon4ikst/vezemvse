<?php

require "../../../util/connectDB.php";

$offer_id = isset($_POST['offer_id']) ? $_POST["offer_id"] : null;
$user_id = isset($_POST['user_id']) ? $_POST["user_id"] : null;
$mark_seen = isset($_POST['mark_seen']) ? $_POST["mark_seen"] : false;

if (empty($offer_id)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$offer_id = mysqli_real_escape_string($con, $offer_id);

if ($mark_seen == 'true'){
	mysqli_query($con, "UPDATE message SET seen='1' WHERE offer_id='$offer_id' AND user_id<>'$user_id'") or die(mysqli_error($con));
	mysqli_query($con, "UPDATE offer SET seen='1' WHERE offer_id='$offer_id' AND user_id<>'$user_id'") or die(mysqli_error($con));
}

$messages = array();

$message_query = mysqli_query($con, "SELECT user_id, message, time FROM message WHERE offer_id='$offer_id' ORDER BY time ASC") or die(mysqli_error($con));
while ($message_result = mysqli_fetch_assoc($message_query)){
	$user_id = $message_result["user_id"];
	$message = $message_result["message"];
	$time = $message_result["time"];
	
	$user_query = mysqli_query($con, "SELECT name, type FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
	$user_result = mysqli_fetch_assoc($user_query);
	$name = $user_result["name"];
	$type = $user_result["type"];
	
	array_push($messages, array("user_id"=>$user_id, "message"=>$message, "name"=>$name, "time"=>date("d.m в H:i", strtotime($time)), "type"=>$type));
}

echo json_encode($messages);

?>