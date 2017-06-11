<?php

session_start();
	
$user_id = @$_SESSION['user_id'];

require "../../../util/connectDB.php";

$make = ISSET($_POST["make"]) ? $_POST["make"] : null;
$model = ISSET($_POST["model"]) ? $_POST["model"] : null;
$type = ISSET($_POST["type"]) ? $_POST["type"] : null;
$weight = ISSET($_POST["weight"]) ? $_POST["weight"] : null;
$length = ISSET($_POST["length"]) ? $_POST["length"] : null;
$width = ISSET($_POST["width"]) ? $_POST["width"] : null;
$height = ISSET($_POST["height"]) ? $_POST["height"] : null;
$volume = ISSET($_POST["volume"]) ? $_POST["volume"] : null;
$description = ISSET($_POST["description"]) ? $_POST["description"] : null;

if (empty($make) or empty($make) or empty($weight)){
	die(json_encode(array("error"=>"Пожалуйста заполните все поля.")));
}

global $con;

$make = mysqli_real_escape_string($con, $make);
$model = mysqli_real_escape_string($con, $model);
$type = mysqli_real_escape_string($con, $type);
$weight = (float) $weight;
$length = (float) $length;
$width = (float) $width;
$height = (float) $height;
$volume = (float) $volume;
$description = mysqli_real_escape_string($con, $description);

$truck_query = mysqli_query($con, "SELECT truck_id, make, model FROM truck WHERE user_id='$user_id'") or die (mysqli_error($con));
$truck_result = mysqli_fetch_assoc($truck_query);

if (!$truck_result) {
	// Create new truck
	mysqli_query($con, "INSERT INTO truck(user_id, make, model, type, weight, length, width, height, volume, description) VALUES('$user_id', '$make', '$model', '$type', '$weight', '$length', '$width', '$height', '$volume', '$description')") or die (mysqli_error($con));
	
	$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
	$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";	
	@mail("dmytro@sheiko.net", "=?UTF-8?B?".base64_encode("Водитель добавил свой транспорт (".time().")")."?=", $make.", ".$model, $headers);
} else {
	mysqli_query($con, "UPDATE truck SET make='$make', model='$model', type='$type', weight='$weight', length='$length', width='$width', height='$height', volume='$volume', description='$description' WHERE user_id='$user_id'") or die (mysqli_error($con));
}

echo json_encode(array("result"=>"success"));

?>