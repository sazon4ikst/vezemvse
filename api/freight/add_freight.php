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
$registered = ISSET($_POST["registered"]) ? $_POST["registered"] : "false";
$posted_time = time();

if (empty($title) or empty($address_from) or empty($address_to)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$registered = false;
if (empty($user_id)){
	if ($registered == false){
		$raw_password = mt_rand(100000, 999999);

		// Encrypt the password
		$password = password_hash($raw_password, PASSWORD_DEFAULT);
		$password = mysqli_real_escape_string($con, $password);
		
		$user_query = mysqli_query($con, "SELECT user_id FROM user WHERE email='$email'") or die (mysqli_error($con));
		$user_result = mysqli_fetch_assoc($user_query);

		if ($user_result) {
			die(json_encode(array("error"=>"Вы уже зарегистрированы, нажмите на переключатель вверху и введите пароль.")));
		}
		
		mysqli_query($con, "INSERT INTO user(name, email, phone, password, type) VALUES ('$full_name', '$email', '$phone', '$password', '1')") or die (mysqli_error($con));
		$user_id = mysqli_insert_id($con);
		
		// Send registration email
		$headers = "From: "."=?UTF-8?B?".base64_encode("Везём Всё")."?="."<info@vezemvse.com.ua>\r\n";
		$headers .= "Reply-To: info@vezemvse.com.ua\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		ob_start();
		require("registration_email_owner.html");
		$message = ob_get_clean();

		mail($email, "=?UTF-8?B?".base64_encode("Спасибо за регистрацию на нашем сайте")."?=", $message, $headers);
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
	$_SESSION['name'] = $full_name;
	$_SESSION['type'] = "1";
	$_SESSION['email'] = $email;
}

$title = mysqli_real_escape_string($con, $title);
$price = mysqli_real_escape_string($con, $price);
$weight = mysqli_real_escape_string($con, $weight);
$volume = mysqli_real_escape_string($con, $volume);
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
$freight_id = mysqli_insert_id($con);
echo json_encode(array("freight_id" => $freight_id));

// Send email about the new job to all drivers
$headers = "From: "."=?UTF-8?B?".base64_encode("Везём Всё")."?="."<info@vezemvse.com.ua>\r\n";
$headers .= "Reply-To: info@vezemvse.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$drivers_query = mysqli_query($con, "SELECT name, email FROM user WHERE type='0'") or die(mysqli_error($con));
while ($drivers_result = mysqli_fetch_assoc($drivers_query)){
	$email = $drivers_result["email"];
	$driver_name = parseFirstName($drivers_result["name"]);	

	ob_start();
	require("new_freight_email.html");
	$message = ob_get_clean();
	
	mail($email, "=?UTF-8?B?".base64_encode("Новый заказ – ".$title)."?=", $message, $headers);
}

function parseFirstName($name){
	$nameParts = explode(" ", $name);
	return $nameParts[0];
}

?>