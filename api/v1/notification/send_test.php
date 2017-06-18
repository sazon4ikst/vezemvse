<?php

require "../../../util/connectDB.php";

global $con;

$phone = "0950252903";
$name = "Димчик";

// Send sms
$google_token_query = mysqli_query($con, "SELECT google_token FROM notification WHERE id='1'") or die(mysqli_error($con));
$google_token_result = mysqli_fetch_assoc($google_token_query);
$google_token = $google_token_result["google_token"];

sendNotificationSms($google_token, $phone, $name);

function sendNotificationSms($google_token, $phone, $name){
	$apiKey = 'AAAAFyQweMM:APA91bHMstbTnB6wd9kK87L3Vqvx9uXkTOEBLaAX2UmB5AEt35ytYH_vK-SUthfofc1Ir8ulP4diJVKedRSJmFGKHob1bb0g-VlXhPBBWV6D0pHNtqOQKFogYe2Lb9RE5IEmnUru9d4g';
	
	$user_google_tokens = array();
	array_push($user_google_tokens, $google_token);
	
	$recipients = array();
	array_push($recipients, $phone);
	$data = array("message"=>$name." отправил Вам новое сообщение"/*. Подробности: https://gurugruza.com.ua.\n\n(Не отвечайте на это уведомление.)"*/, "recipients"=>$recipients);

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
    $result = curl_exec($ch);
	var_dump($result);

    // Close curl handle
    curl_close($ch);
}

?>