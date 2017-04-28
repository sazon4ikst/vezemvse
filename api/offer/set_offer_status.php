<?php

require "../../util/connectDB.php";

$offer_id = ISSET($_POST["offer_id"]) ? $_POST["offer_id"] : null;
$status = ISSET($_POST["status"]) ? $_POST["status"] : null;

if ($offer_id==null or $status==null){
	die("Пожалуйста заполните все поля.");
}

global $con;

$offer_id = mysqli_real_escape_string($con, $offer_id);
$status = mysqli_real_escape_string($con, $status);

mysqli_query($con, "UPDATE offer SET status='$status' WHERE offer_id='$offer_id'") or die (mysqli_error($con));
echo json_encode(array("offer_id" => mysqli_insert_id($con)));

?>