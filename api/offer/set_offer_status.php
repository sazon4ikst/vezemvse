<?php

require "../../util/connectDB.php";

$freight_id = ISSET($_POST["freight_id"]) ? $_POST["freight_id"] : null;
$offer_id = ISSET($_POST["offer_id"]) ? $_POST["offer_id"] : null;
$status = ISSET($_POST["status"]) ? $_POST["status"] : null;

if ($freight_id==null or $offer_id==null or $status==null){
	die("Пожалуйста заполните все поля.");
}

global $con;

$freight_id = mysqli_real_escape_string($con, $freight_id);
$offer_id = mysqli_real_escape_string($con, $offer_id);
$status = mysqli_real_escape_string($con, $status);

mysqli_query($con, "UPDATE offer SET status='$status' WHERE offer_id='$offer_id'") or die (mysqli_error($con));

$JOB_STATUS_IN_TRANSIT = "1";
$OFFER_STATUS_ACCEPTED = "0";
if ($status == $OFFER_STATUS_ACCEPTED){
	mysqli_query($con, "UPDATE freight SET status='$JOB_STATUS_IN_TRANSIT' WHERE freight_id='$freight_id'") or die (mysqli_error($con));
}

echo json_encode(array("offer_id" => $offer_id));


if ($status == $OFFER_STATUS_ACCEPTED){
	// Send email notification about the accepted offer to driver
	$driver_query = mysqli_query($con, "SELECT email FROM user WHERE user_id IN (SELECT user_id FROM offer WHERE offer_id='$offer_id')") or die(mysqli_error($con));
	$driver_result = mysqli_fetch_assoc($driver_query);
	$email = $driver_result["email"];

	$freight_query = mysqli_query($con, "SELECT title, price, address_to, address_from, user_id FROM freight WHERE freight_id='$freight_id'") or die(mysqli_error($con));
	$freight_result = mysqli_fetch_assoc($freight_query);
	$title = $freight_result["title"];
	$price = $freight_result["price"];
	$address_to = $freight_result["address_to"];
	$address_from = $freight_result["address_from"];
	$freight_owner_id = $freight_result["user_id"];

	// Retrieve freight owner
	$owner_query = mysqli_query($con, "SELECT name, phone FROM user WHERE user_id='$freight_owner_id'") or die(mysqli_error($con));
	$owner_result = mysqli_fetch_assoc($owner_query);

	$headers = "From: "."=?UTF-8?B?".base64_encode("Везём Всё")."?="."<info@vezemvse.com.ua>\r\n";
	$headers .= "Reply-To: info@vezemvse.com.ua\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	ob_start();
	require("offer_accepted_email.html");
	$message = ob_get_clean();

	mail($email, "=?UTF-8?B?".base64_encode("Вас выбрали для выполнения заказа \"$title\"!")."?=", $message, $headers);
}

?>