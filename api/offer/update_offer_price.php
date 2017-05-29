<?php

require "../../util/connectDB.php";

$freight_id = ISSET($_POST["freight_id"]) ? $_POST["freight_id"] : null;
$offer_id = ISSET($_POST["offer_id"]) ? $_POST["offer_id"] : null;
$price = ISSET($_POST["price"]) ? $_POST["price"] : null;

if ($freight_id==null or $offer_id==null or $price==null){
	die("Пожалуйста заполните все поля.");
}

global $con;

$freight_id = mysqli_real_escape_string($con, $freight_id);
$offer_id = mysqli_real_escape_string($con, $offer_id);
$price = mysqli_real_escape_string($con, $price);

mysqli_query($con, "UPDATE offer SET price='$price' WHERE offer_id='$offer_id'") or die (mysqli_error($con));

echo json_encode(array("offer_id" => $offer_id));

?>