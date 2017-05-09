<?php

session_start();

require "../../util/connectDB.php";

$name = ISSET($_POST["name"]) ? $_POST["name"] : null;
$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$phone = ISSET($_POST["phone"]) ? $_POST["phone"] : null;
$city = ISSET($_POST["city"]) ? $_POST["city"] : null;
$password = ISSET($_POST["password"]) ? $_POST["password"] : null;

if (empty($name) or empty($email) or empty($phone) or empty($city) or empty($password)){
	die(json_encode(array("error"=>"Пожалуйста заполните все поля.")));
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	die(json_encode(array("error"=>"Неправильный адрес электронной почты.")));
}

global $con;

// Encrypt the password
$password = password_hash($password, PASSWORD_DEFAULT);

$name = mysqli_real_escape_string($con, $name);
$email = mysqli_real_escape_string($con, $email);
$phone = mysqli_real_escape_string($con, $phone);
$city = mysqli_real_escape_string($con, $city);
$password = mysqli_real_escape_string($con, $password);

$user_query = mysqli_query($con, "SELECT user_id, name, email, password, type FROM user WHERE email='$email'") or die (mysqli_error($con));
$user_result = mysqli_fetch_assoc($user_query);
if ($user_result) {
	die(json_encode(array("error"=>"Пользователь с таким адресом почты уже зарегистрирован.")));
}

mysqli_query($con, "INSERT INTO user(name, email, phone, city, password) VALUES ('$name', '$email', '$phone', '$city', '$password')") or die(mysqli_error($con));

$user_id = mysqli_insert_id($con);

echo json_encode(array("result"=>"success"));

$_SESSION['user_id'] = $user_id;
$_SESSION['name'] = $name;
$_SESSION['type'] = "0";

?>