<?php

require "../../util/connectDB.php";

$offer_id = isset($_POST['offer_id']) ? $_POST["offer_id"] : null;

if (empty($offer_id)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$offer_id = mysqli_real_escape_string($con, $offer_id);

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
	
	array_push($messages, array("message"=>$message, "name"=>$name, "time"=>date("d.m в H:i", strtotime($time)), "type"=>$type));
}

echo json_encode($messages);

?>