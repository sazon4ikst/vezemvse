<?php
session_start();

require "../../util/connectDB.php";

$user_id = ISSET($_POST["user_id"]) ? $_POST["user_id"] : null;
$title = ISSET($_POST["title"]) ? $_POST["title"] : null;
$weight = ISSET($_POST["weight"]) ? $_POST["weight"] : null;
$volume = ISSET($_POST["volume"]) ? $_POST["volume"] : null;
$price = ISSET($_POST["price"]) ? $_POST["price"] : null;
$address_from = ISSET($_POST["address_from"]) ? $_POST["address_from"] : null;
$address_to = ISSET($_POST["address_to"]) ? $_POST["address_to"] : null;
$full_name = ISSET($_POST["full_name"]) ? $_POST["full_name"] : null;
$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$phone = ISSET($_POST["phone"]) ? $_POST["phone"] : null;
$password = ISSET($_POST["password"]) ? $_POST["password"] : null;
$start_time = ISSET($_POST["time"]) ? $_POST["time"] : null;
$distance = ISSET($_POST["distance"]) ? $_POST["distance"] : null;
$description = ISSET($_POST["description"]) ? $_POST["description"] : null;
$posted_time = time();

if (empty($title) or empty($address_from) or empty($address_to)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$registered = false;
if (empty($user_id)){	
	if (empty($password)){
		$password = "password";

		// Encrypt the password
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		mysqli_query($con, "INSERT INTO user(name, email, phone, password, type) VALUES ('$full_name', '$email', '$phone', '$password', '1')") or die (mysqli_error($con));
		$user_id = mysqli_insert_id($con);
	} else {		
		$password = mysqli_real_escape_string($con, $password);
		$email = mysqli_real_escape_string($con, $email);
		
		$user_query = mysqli_query($con, "SELECT user_id, name, password, type FROM user WHERE email='$email'") or die (mysqli_error($con));
		$user_result = mysqli_fetch_assoc($user_query);

		if (!$user_result or !password_verify($password, $user_result["password"])) {
			die(json_encode(array("error"=>"Неправильный адрес или пароль.")));
		}
		
		if ($user_result["type"] == "0"){
			die(json_encode(array("error"=>"Вы уже зарегистрированы как водитель. Пожалуйста создайте новый аккаунт.")));
		}

		$user_id = $user_result["user_id"];
		$name = $user_result["name"];
	}

	$_SESSION['user_id'] = $user_id;
	$_SESSION['name'] = $name;
}

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
$distance = mysqli_real_escape_string($con, $distance);

mysqli_query($con, "INSERT INTO freight(user_id, posted_time, start_time, title, description, address_from, address_to, distance, weight, volume, price) VALUES ('$user_id', '$posted_time', '$start_time', '$title', '$description', '$address_from', '$address_to', '$distance', '$weight', '$volume', '$price')") or die (mysqli_error($con));
echo json_encode(array("freight_id" => mysqli_insert_id($con)));

?>