<?php

$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$message = ISSET($_POST["message"]) ? $_POST["message"] : null;

$headers = "From: "."=?UTF-8?B?".base64_encode("Пользователь")."?="."<".$email.">\r\n";
$headers .= "Reply-To: ".$email."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

@mail("info@gurugruza.com.ua", "=?UTF-8?B?".base64_encode("Запрос поддержки \"Гуру Груза\"")."?=", $message."<br><br>".$email, $headers);

echo json_encode(array("result"=>"success"));

?>