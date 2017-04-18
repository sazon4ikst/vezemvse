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
echo json_encode(array("offer_id" => mysqli_insert_id($con)));

?>