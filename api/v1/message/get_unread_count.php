<?php
require "../../../util/connectDB.php";

$user_id = isset($_POST['user_id']) ? $_POST["user_id"] : null;
if (empty($user_id)){
	die("Пожалуйста заполните все поля.");
}

global $con;

$user_id = mysqli_real_escape_string($con, $user_id);

// Check unread messages for owner
$my_freights_query = mysqli_query($con, "SELECT freight_id FROM freight WHERE user_id='$user_id'") or die(mysqli_error($con));
$messages = array();
while ($my_freights_result = mysqli_fetch_assoc($my_freights_query)){
	$freight_id = $my_freights_result["freight_id"];
	
	$offers_query = mysqli_query($con, "SELECT offer_id, seen FROM offer WHERE freight_id='$freight_id'") or die(mysqli_error($con));
	while ($offers_result = mysqli_fetch_assoc($offers_query)){
		$offer_id = $offers_result["offer_id"];
		$seen = $offers_result["seen"];
	
		if ($seen == "0"){		
			array_push($messages, array("message"=>"Новое предложение", "offer_id"=>$offer_id, "freight_id"=>$freight_id));
		}
		
		$unread_messages_query = mysqli_query($con, "SELECT message FROM message WHERE offer_id='$offer_id' AND user_id<>'$user_id' AND seen=0") or die(mysqli_error($con));
		while ($unread_messages_result = mysqli_fetch_assoc($unread_messages_query)){
			$message = $unread_messages_result["message"];
			
			array_push($messages, array("message"=>$message, "freight_id"=>$freight_id, "offer_id"=>$offer_id));
		}
	}
}

// Check unread messages for driver
$my_offers_query = mysqli_query($con, "SELECT offer_id, freight_id FROM offer WHERE user_id='$user_id'") or die(mysqli_error($con));
while ($my_offers_result = mysqli_fetch_assoc($my_offers_query)){
	$offer_id = $my_offers_result["offer_id"];
	$freight_id = $my_offers_result["freight_id"];
	
	$unread_messages_query = mysqli_query($con, "SELECT message FROM message WHERE offer_id='$offer_id' AND user_id<>'$user_id' AND seen=0") or die(mysqli_error($con));
	while ($unread_messages_result = mysqli_fetch_assoc($unread_messages_query)){
		$message = $unread_messages_result["message"];
			
		array_push($messages, array("message"=>$message, "offer_id"=>$offer_id, "freight_id"=>$freight_id));
	}
}

echo json_encode($messages);

?>