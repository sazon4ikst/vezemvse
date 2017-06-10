<?php

session_start();
	
$user_id = @$_SESSION['user_id'];

require "../../../util/connectDB.php";

$password = ISSET($_POST["password"]) ? $_POST["password"] : null;
$new_password = ISSET($_POST["new_password"]) ? $_POST["new_password"] : null;

if (empty($user_id) or empty($password) or empty($new_password)){
	die(json_encode(array("error"=>"Пожалуйста заполните все поля.")));
}

global $con;

$password = mysqli_real_escape_string($con, $password);
$new_password = mysqli_real_escape_string($con, $new_password);

$user_query = mysqli_query($con, "SELECT password FROM user WHERE user_id='$user_id'") or die (mysqli_error($con));
$user_result = mysqli_fetch_assoc($user_query);

if (!$user_result or !password_verify($password, $user_result["password"])) {
	die(json_encode(array("error"=>"Неправильный старый пароль.")));
}

// Encrypt the password
$new_password = password_hash($new_password, PASSWORD_DEFAULT);

mysqli_query($con, "UPDATE user SET password='$new_password' WHERE user_id='$user_id'");

echo json_encode(array("result"=>"success"));

?>