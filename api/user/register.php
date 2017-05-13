<?php

session_start();

require "../../util/connectDB.php";

$name = ISSET($_POST["name"]) ? $_POST["name"] : null;
$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$phone = ISSET($_POST["phone"]) ? $_POST["phone"] : null;
$city = ISSET($_POST["city"]) ? $_POST["city"] : null;
$password = ISSET($_POST["password"]) ? $_POST["password"] : null;

$email = "dmytro@sheiko.net";

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
$_SESSION['email'] = $email;


// Send registration email
$headers = "From: "."=?UTF-8?B?".base64_encode("Везём Всё")."?="."<info@vezemvse.com.ua>\r\n";
$headers .= "Reply-To: info@vezemvse.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ob_start();
require("registration_email_driver.html");
$message = ob_get_clean();

mail($email, "=?UTF-8?B?".base64_encode("Спасибо за регистрацию на нашем сайте")."?=", $message, $headers);

?>