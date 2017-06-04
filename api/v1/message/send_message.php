<?php

require "../../../util/connectDB.php";

$user_id = isset($_POST['user_id']) ? $_POST["user_id"] : null;
$freight_id = isset($_POST['freight_id']) ? $_POST["freight_id"] : null;
$offer_id = isset($_POST['offer_id']) ? $_POST["offer_id"] : null;
$message = isset($_POST['message']) ? $_POST["message"] : null;

if (empty($user_id) or empty($freight_id) or empty($offer_id) or empty($message)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$user_id = mysqli_real_escape_string($con, $user_id);
$offer_id = mysqli_real_escape_string($con, $offer_id);
$message = mysqli_real_escape_string($con, $message);

mysqli_query($con, "INSERT INTO message(user_id, offer_id, message) VALUES ('$user_id', '$offer_id', '$message')") or die (mysqli_error($con));

$message_id = mysqli_insert_id($con);
$message_query = mysqli_query($con, "SELECT time FROM message WHERE message_id='$message_id'") or die(mysqli_error($con));
$message_result = mysqli_fetch_assoc($message_query);
$time = $message_result["time"];

$user_query = mysqli_query($con, "SELECT name, type FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
$user_result = mysqli_fetch_assoc($user_query);
$name = $user_result["name"];
$type = $user_result["type"];

echo json_encode(array("name"=>$name, "time"=>date("d.m в H:i", strtotime($time)), "type"=>$type));

// Send email notification
$owner_query = mysqli_query($con, "SELECT user_id, freight_id FROM offer WHERE offer_id='$offer_id'") or die(mysqli_error($con));
$owner_result = mysqli_fetch_assoc($owner_query);
$owner_id = $owner_result["user_id"];
$freight_id = $owner_result["freight_id"];
$freight_owner_query = mysqli_query($con, "SELECT user_id FROM freight WHERE freight_id='$freight_id'") or die(mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_owner_query);
$freight_owner_id = $freight_result["user_id"];
if ($user_id == $owner_id){
	$recipient_id = $freight_owner_id;
} else {	
	$recipient_id = $owner_id;
}
// Find recipient's email
$recipient_query = mysqli_query($con, "SELECT email, phone FROM user WHERE user_id='$recipient_id'") or die(mysqli_error($con));
$recipient_result = mysqli_fetch_assoc($recipient_query);
$email = $recipient_result["email"];
$phone = $recipient_result["phone"];

// Send registration email
$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ob_start();
require("new_message_email.html");
$message = ob_get_clean();

@mail($email, "=?UTF-8?B?".base64_encode("Вам пришло новое сообщение")."?=", $message, $headers);
@mail("dmytro@sheiko.net", "=?UTF-8?B?".base64_encode("Вам пришло новое сообщение")."?=", $message, $headers);

// Send sms
$google_token_query = mysqli_query($con, "SELECT google_token FROM notification WHERE id='1'") or die(mysqli_error($con));
$google_token_result = mysqli_fetch_assoc($google_token_query);
$google_token = $google_token_result["google_token"];

//sendNotificationSms($google_token, $phone, $name);

function sendNotificationSms($google_token, $phone, $name){
	$apiKey = 'AAAAFyQweMM:APA91bHMstbTnB6wd9kK87L3Vqvx9uXkTOEBLaAX2UmB5AEt35ytYH_vK-SUthfofc1Ir8ulP4diJVKedRSJmFGKHob1bb0g-VlXhPBBWV6D0pHNtqOQKFogYe2Lb9RE5IEmnUru9d4g';
	
	$user_google_tokens = array();
	array_push($user_google_tokens, $google_token);
	
	$recipients = array();
	array_push($recipients, $phone);
	$data = array("message"=>$name." отправил Вам новое сообщение. Подробности: http://gurugruza.com.ua.\n\n(Не отвечайте на это уведомление.)", "recipients"=>$recipients);

    // Set POST request body
    $post = array(
                    'registration_ids'   => $user_google_tokens,
                    'data' => $data
                 );

    // Set CURL request headers 
    $headers = array( 
                        'Authorization: key=' . $apiKey,
                        'Content-Type: application/json'
                    );

    // Initialize curl handle       
    $ch = curl_init();

    // Set URL to GCM push endpoint     
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    // Set request method to POST       
    curl_setopt($ch, CURLOPT_POST, true);

    // Set custom request headers       
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Get the response back as string instead of printing it       
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Set JSON post data
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));

    // Actually send the request    
    curl_exec($ch);

    // Close curl handle
    curl_close($ch);
}

?>