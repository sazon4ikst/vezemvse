<?php

require "../../util/connectDB.php";

$freight_id = $_POST["freight_id"];
$user_id = $_POST["user_id"];
$price = $_POST["price"];
$message = $_POST["message"];

if (empty($freight_id) or empty($user_id) or empty($price)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$freight_id = mysqli_real_escape_string($con, $freight_id);
$user_id = mysqli_real_escape_string($con, $user_id);
$price = mysqli_real_escape_string($con, $price);
$message = mysqli_real_escape_string($con, $message);

mysqli_query($con, "INSERT INTO offer(freight_id, user_id, price, message, status) VALUES ('$freight_id', '$user_id', '$price', '$message', '1')") or die (mysqli_error($con));
$offer_id = mysqli_insert_id($con);
echo json_encode(array("offer_id" => $offer_id));

// Send email notification about the added offer to owner
$owner_query = mysqli_query($con, "SELECT email FROM user WHERE user_id IN (SELECT user_id FROM freight WHERE freight_id='$freight_id')") or die(mysqli_error($con));
$owner_result = mysqli_fetch_assoc($owner_query);
$email = $owner_result["email"];

$user_query = mysqli_query($con, "SELECT name FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
$user_result = mysqli_fetch_assoc($user_query);
$name = $user_result["name"];

$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ob_start();
require("new_offer_email.html");
$message = ob_get_clean();

@mail($email, "=?UTF-8?B?".base64_encode("Новое предложение от перевозчика ".$name)."?=", $message, $headers);
@mail("dmytro@sheiko.net", "=?UTF-8?B?".base64_encode("Новое предложение от перевозчика ".$name)."?=", $message, $headers);

?>