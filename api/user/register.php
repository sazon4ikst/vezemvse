<?php

require "../../util/connectDB.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$city = $_POST["city"];
$password = $_POST["password"];

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

//mysqli_query($con, "INSERT INTO user(name, email, phone, city, password) VALUES ($name, $email, $phone, $city, $password)") or die("Ошибка сервера, не можем создать пользователя.");

mysqli_query($con, "INSERT INTO user(name, email, phone, city, password) VALUES ('$name', '$email', '$phone', '$city', '$password')") or die(mysqli_error($con));
?>