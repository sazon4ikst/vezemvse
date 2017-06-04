<?php

session_start();

require "../../../util/connectDB.php";

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
if (mysqli_num_rows($user_query)>0) {
	die(json_encode(array("error"=>"Пользователь с таким адресом почты уже зарегистрирован.")));
}

mysqli_query($con, "INSERT INTO user(name, email, phone, city, password) VALUES ('$name', '$email', '$phone', '$city', '$password')") or die(mysqli_error($con));

$user_id = mysqli_insert_id($con);

echo json_encode(array("result"=>"success"));

get_lat_long_city($con, $user_id, $city);

$_SESSION['user_id'] = $user_id;
$_SESSION['name'] = $name;
$_SESSION['type'] = "0";
$_SESSION['email'] = $email;


// Send registration email
$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ob_start();
require("registration_email_driver.html");
$message = ob_get_clean();

@mail($email, "=?UTF-8?B?".base64_encode("Спасибо за регистрацию на нашем сайте")."?=", $message, $headers);
@mail("dmytro@sheiko.net", "=?UTF-8?B?".base64_encode("Новый водитель (".time().")")."?=", $message, $headers);

function get_lat_long_city($con, $user_id, $address){
    $address = str_replace(" ", "+", $address);
	
	$address = urlencode($address);	

    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyBL5UB6urkL0ni5h-_R9WqLBIJxWdgZl2w");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};	
	
	if (empty($lat) or empty($long)) die("error");	
	
	mysqli_query($con, "UPDATE user SET city_point=POINT($lat, $long) WHERE user_id='$user_id'") or die (mysqli_error($con));
}

?>