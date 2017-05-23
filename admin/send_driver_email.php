<?php

require "../util/connectDB.php";

// Send email about the new job to all drivers
$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$driver_emails = array();
array_push($driver_emails, "dmytro@sheiko.net");

$gruz_id = 5256;

for ($i=0; $i<count($driver_emails); $i++){
	$email = $driver_emails[$i];
	
	$freight_query = mysqli_query($con, "SELECT title, price, address_from, address_to FROM freight WHERE freight_id='$gruz_id'") or die (mysqli_error($con));
	$freight_result = mysqli_fetch_assoc($freight_query);
	$title = $freight_result["title"];
	$price = $freight_result["price"];
	$address_from = $freight_result["address_from"];
	$address_to = $freight_result["address_to"];
	
	ob_start();
	
	require("new_freight_email.html");
	$message = ob_get_clean();
	
	mail($email, "=?UTF-8?B?".base64_encode("Новый заказ от сервиса \"Гуру Груза\" – ".$title)."?=", $message, $headers);
	
	echo "Письмо отправленно.<br>";
}

?>