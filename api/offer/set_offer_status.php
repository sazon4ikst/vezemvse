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

echo json_encode(array("offer_id" => mysqli_insert_id($con)));

?>