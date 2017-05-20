<?php

require "../../util/connectDB.php";

$participant_google_token = ISSET($_POST["participant_google_token"]) ? $_POST["participant_google_token"] : null;

if (empty($participant_google_token)){
	die(json_encode(array("error"=>"Пожалуйста заполните все поля.")));
}

$participant_google_token = mysqli_real_escape_string($con, $participant_google_token);
mysqli_query($con, "UPDATE notification SET google_token='$participant_google_token' WHERE id='1'") or die (mysqli_error($con))

?>