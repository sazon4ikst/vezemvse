<?php

require "../../util/connectDB.php";

$name = ISSET($_POST["name"]) ? $_POST["name"] : null;
$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$phone = ISSET($_POST["phone"]) ? $_POST["phone"] : null;
$city = ISSET($_POST["city"]) ? $_POST["city"] : null;
$password = ISSET($_POST["password"]) ? $_POST["password"] : null;

if (empty($name) or empty($email) or empty($phone) or empty($city) or empty($password)){
	die("Пожалуйста заполните все поля.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	die("Неправильный адрес электронной почты.");
}

global $con;

// Encrypt the password
$password = password_hash($password, PASSWORD_DEFAULT);

$name = mysqli_real_escape_string($con, $name);
$email = mysqli_real_escape_string($con, $email);
$phone = mysqli_real_escape_string($con, $phone);
$city = mysqli_real_escape_string($con, $city);
$password = mysqli_real_escape_string($con, $password);

mysqli_query($con, "INSERT INTO user(name, email, phone, city, password) VALUES ($name, $email, $phone, $city, $password)") or die(mysqli_error($con));

?>