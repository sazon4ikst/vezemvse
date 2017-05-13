<?php

require "../../util/connectDB.php";

$user_id = isset($_POST['user_id']) ? $_POST["user_id"] : null;
$freight_id = isset($_POST['freight_id']) ? $_POST["freight_id"] : null;
$offer_id = isset($_POST['offer_id']) ? $_POST["offer_id"] : null;
$message = isset($_POST['message']) ? $_POST["message"] : null;

if (empty($user_id) or empty($freight_id) or empty($offer_id) or empty($message)){
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

// Send email notification
$owner_query = mysqli_query($con, "SELECT user_id, freight_id FROM offer WHERE offer_id='$offer_id'") or die(mysqli_error($con));
$owner_result = mysqli_fetch_assoc($owner_query);
$owner_id = $owner_result["user_id"];
$freight_id = $owner_result["freight_id"];
$freight_owner_query = mysqli_query($con, "SELECT user_id FROM freight WHERE freight_id='$freight_id'") or die(mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_owner_query);
$freight_owner_id = $freight_result["user_id"];
if ($user_id == $owner_id){
	$recipient_id = $freight_owner_id;
} else {	
	$recipient_id = $owner_id;
}
// Find recipient's email
$recipient_query = mysqli_query($con, "SELECT email FROM user WHERE user_id='$recipient_id'") or die(mysqli_error($con));
$recipient_result = mysqli_fetch_assoc($recipient_query);
$email = $recipient_result["email"];

// Send registration email
$headers = "From: "."=?UTF-8?B?".base64_encode("Везём Всё")."?="."<info@vezemvse.com.ua>\r\n";
$headers .= "Reply-To: info@vezemvse.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ob_start();
require("new_message_email.html");
$message = ob_get_clean();

mail($email, "=?UTF-8?B?".base64_encode("Вам пришло новое сообщение")."?=", $message, $headers);

?>