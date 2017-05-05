<?php

session_start();

require "../../util/connectDB.php";

$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$password = ISSET($_POST["password"]) ? $_POST["password"] : null;

if (empty($email) or empty($password)){
	die(json_encode(array("error"=>"Пожалуйста заполните все поля.")));
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	die(json_encode(array("error"=>"Неправильный адрес электронной почты.")));
}

global $con;

$password = mysqli_real_escape_string($con, $password);
$email = mysqli_real_escape_string($con, $email);

$user_query = mysqli_query($con, "SELECT user_id, name, email, password, type FROM user WHERE email='$email'") or die (mysqli_error($con));
$user_result = mysqli_fetch_assoc($user_query);

if (!$user_result or !password_verify($password, $user_result["password"])) {
	die(json_encode(array("error"=>"Неправильный адрес или пароль.")));
}

$_SESSION['user_id']= $user_result["user_id"];
$_SESSION['name']= $user_result["name"];
$_SESSION['type']= $user_result["type"];

echo json_encode(array("type"=>$user_result["type"]));

?>