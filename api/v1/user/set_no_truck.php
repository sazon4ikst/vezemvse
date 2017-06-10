<?php

session_start();
	
$user_id = @$_SESSION['user_id'];

require "../../../util/connectDB.php";

if (empty($user_id)){
	die(json_encode(array("error"=>"Пожалуйста заполните все поля.")));
}

global $con;

mysqli_query($con, "UPDATE user SET updated_truck='1' WHERE user_id='$user_id'") or die (mysqli_error($con));

echo json_encode(array("result"=>"success"));

?>