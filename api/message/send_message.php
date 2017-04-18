<?php

require "../../util/connectDB.php";

$user_id = isset($_POST['user_id']) ? $_POST["user_id"] : null;
$offer_id = isset($_POST['offer_id']) ? $_POST["offer_id"] : null;
$message = isset($_POST['message']) ? $_POST["message"] : null;

if (empty($user_id) or empty($offer_id) or empty($message)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$user_id = mysqli_real_escape_string($con, $user_id);
$offer_id = mysqli_real_escape_string($con, $offer_id);
$message = mysqli_real_escape_string($con, $message);

mysqli_query($con, "INSERT INTO message(user_id, offer_id, message) VALUES ('$user_id', '$offer_id', '$message')") or die (mysqli_error($con));

$message_id = mysqli_insert_id($con);
$message_query = mysqli_query($con, "SELECT time FROM message WHERE message_id='$message_id'") or die(mysqli_error($con));
$message_result = mysqli_fetch_assoc($message_query);
$time = $message_result["time"];

$user_query = mysqli_query($con, "SELECT name, type FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
$user_result = mysqli_fetch_assoc($user_query);
$name = $user_result["name"];
$type = $user_result["type"];

echo json_encode(array("name"=>$name, "time"=>date("d.m в H:i", strtotime($time)), "type"=>$type));

?>