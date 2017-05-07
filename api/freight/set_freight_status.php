<?php

require "../../util/connectDB.php";

$freight_id = ISSET($_POST["freight_id"]) ? $_POST["freight_id"] : null;
$status = ISSET($_POST["status"]) ? $_POST["status"] : null;

if ($freight_id==null or $status==null){
	die("Пожалуйста заполните все поля.");
}

global $con;

$freight_id = mysqli_real_escape_string($con, $freight_id);
$status = mysqli_real_escape_string($con, $status);

mysqli_query($con, "UPDATE freight SET status='$status' WHERE freight_id='$freight_id'") or die (mysqli_error($con));

echo json_encode(array("result" => "success"));

?>