<?php

require "../../util/connectDB.php";

$title = ISSET($_POST["title"]) ? $_POST["title"] : null;
$weight = ISSET($_POST["weight"]) ? $_POST["weight"] : null;
$volume = ISSET($_POST["volume"]) ? $_POST["volume"] : null;
$price = ISSET($_POST["price"]) ? $_POST["price"] : null;
$address_from = ISSET($_POST["address_from"]) ? $_POST["address_from"] : null;
$address_to = ISSET($_POST["address_to"]) ? $_POST["address_to"] : null;
$full_name = ISSET($_POST["full_name"]) ? $_POST["full_name"] : null;
$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$phone = ISSET($_POST["phone"]) ? $_POST["phone"] : null;
$start_time = ISSET($_POST["time"]) ? $_POST["time"] : null;
$area_to = ISSET($_POST["area_to"]) ? $_POST["area_to"] : null;
$area_from = ISSET($_POST["area_from"]) ? $_POST["area_from"] : null;
$distance = ISSET($_POST["distance"]) ? $_POST["distance"] : null;
$description = ISSET($_POST["description"]) ? $_POST["description"] : null;

//if ($offer_id==null or $status==null){
//	die("Пожалуйста заполните все поля.");
//}

$user_id = "4";
$posted_time = time();

global $con;

$title = mysqli_real_escape_string($con, $title);
$weight = mysqli_real_escape_string($con, $weight);
$price = mysqli_real_escape_string($con, $price);
$address_from = mysqli_real_escape_string($con, $address_from);
$address_to = mysqli_real_escape_string($con, $address_to);
$full_name = mysqli_real_escape_string($con, $full_name);
$email = mysqli_real_escape_string($con, $email);
$phone = mysqli_real_escape_string($con, $phone);
$posted_time = mysqli_real_escape_string($con, $posted_time);
$start_time = mysqli_real_escape_string($con, $start_time);
$description = mysqli_real_escape_string($con, $description);
$area_to = mysqli_real_escape_string($con, $area_to);
$area_from = mysqli_real_escape_string($con, $area_from);
$distance = mysqli_real_escape_string($con, $distance);

mysqli_query($con, "INSERT INTO freight(user_id, posted_time, start_time, title, description, address_from, area_from, address_to, area_to, distance, weight, volume, price) VALUES ('$user_id', '$posted_time', '$start_time', '$title', '$description', '$address_from', '$area_from', '$address_to', '$area_to', '$distance', '$weight', '$volume', '$price')") or die (mysqli_error($con));
echo json_encode(array("freight_id" => mysqli_insert_id($con)));

?>