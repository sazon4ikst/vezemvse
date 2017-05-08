<?php

$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$message = ISSET($_POST["message"]) ? $_POST["message"] : null;

@mail("dmytro@sheiko.net", "Запрос поддержки", $message."\n\n".$email);
@mail("info@vezemvse.com.ua", "Запрос поддержки", $message."\n\n".$email);

echo json_encode(array("result"=>"success"));

?>