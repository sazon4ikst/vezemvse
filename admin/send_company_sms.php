<?php

require "../util/connectDB.php";

$freights_query = mysqli_query($con, "SELECT freight_id, title, address_from, address_to FROM freight WHERE fake=0 ORDER BY freight_id DESC") or die (mysqli_error($con));
?>

<form method="get">
	<h1>ОТПРАВИТЬ СМС КОМПАНИЯМ</h1>
	<h3>Груз</h3>
	<select name="freight" style="width:815px; height:30px;">
	<?php
	while ($freights_result = mysqli_fetch_assoc($freights_query)){
		$freight_id = $freights_result["freight_id"];
		$title = $freights_result["title"];
		$address_from = $freights_result["address_from"];
		$address_to = $freights_result["address_to"];
		
		echo "<option value='$freight_id'><b>$address_from</b> → $address_to ($title)</option>";
	}
	?>
	</select>
	
	<h3>Область</h3>
	<p><input type="radio" name="area" value='Волынская'>Волынская</input></p>
	<p><input type="radio" name="area" value='Киевская' checked>Киевская</input></p>
	<p><input type="radio" name="area" value='Одесская'>Одесская</input></p>
	<p><input type="radio" name="area" value='Черкасская'>Черкасская</input></p>
	<p><input type="radio" name="area" value='Запорожская'>Запорожская</input></p>
	<p><input type="radio" name="area" value='Ровенская'>Ровенская</input></p>
	<p><input type="radio" name="area" value='Днепропетровская'>Днепропетровская</input></p>
	<p><input type="radio" name="area" value='Кривой Рог'>Только Кривой Рог</input></p>	
	<p><input type="radio" name="area" value='Николаевская'>Николаевская</input></p>
	<p><input type="radio" name="area" value='Тернопольская'>Тернопольская</input></p>
	<p><input type="radio" name="area" value='Львовская'>Львовская</input></p>
	<p><input type="radio" name="area" value='Черновицкая'>Черновицкая</input></p>
	<p><input type="radio" name="area" value='Полтавская'>Полтавская</input></p>
	<p><input type="radio" name="area" value='Сумская'>Сумская</input></p>
	<p><input type="radio" name="area" value='Харьковская'>Харьковская</input></p>
	<p><input type="radio" name="area" value='Херсонская'>Херсонская</input></p>
	<p><input type="radio" name="area" value='Хмельницкая'>Хмельницкая</input></p>
	<p><input type="radio" name="area" value='Винницкая'>Винницкая</input></p>
	<p><input type="radio" name="area" value='Винницкие компании'>Винницкие компании</input></p>
	<p><input type="radio" name="area" value='Тест (Я)'>Тест (Я)</input></p>
	
	<div><input type="submit" style="width:815px; height:30px; margin-top:10px" value="Отправить СМС"></input></div>
<form>



<?php

if (!ISSET($_GET["freight"]) or !ISSET($_GET["area"])) return;

$area = $_GET["area"];

$gruz_id = $_GET["freight"];

$freight_query = mysqli_query($con, "SELECT title, price, weight, address_from, address_to, X(address_from_point) AS lat_from, Y(address_from_point) AS long_from FROM freight WHERE freight_id='$gruz_id'") or die (mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_query);
$title = $freight_result["title"];
$price = $freight_result["price"];
$address_from = $freight_result["address_from"];
$address_to = $freight_result["address_to"];
$lat_from = $freight_result["lat_from"];
$long_from = $freight_result["long_from"];
$weight = $freight_result["weight"];

if ($area == "Волынская"){
	$driver_phones = array(
	);
} else if ($area == "Одесская"){
	$driver_phones = array(
	);
} else if ($area == "Черкасская"){
	$driver_phones = array(
	);
} else if ($area == "Киевская"){
	$driver_phones = array(
	);
} else if ($area == "Запорожская"){
	$driver_phones = array(
	);
} else if ($area == "Ровенская"){
	$driver_phones = array(
	);
} else if ($area == "Днепропетровская"){
	$driver_phones = array(
	);
} else if ($area == "Николаевская"){
	$driver_phones = array(
	);
} else if ($area == "Тернопольская"){
	$driver_phones = array(
	);	
} else if ($area == "Львовская"){
	$driver_phones = array(
	);	
} else if ($area == "Кривой Рог"){
	$driver_phones = array(
	);	
} else if ($area == "Черновицкая"){
	$driver_phones = array(
	);
} else if ($area == "Полтавская"){
	$driver_phones = array(
	);
} else if ($area == "Сумская"){
	$driver_phones = array(
	);
} else if ($area == "Винницкие компании"){
	$driver_phones = array(
	);
} else if ($area == "Тест (Я)"){
	$driver_phones = array(
		"0950252903",
	);
} else if ($area == "Харьковская"){
	$driver_phones = array(
	);
} else if ($area == "Херсонская"){
	$driver_phones = array(
	);
} else if ($area == "Хмельницкая"){
	$driver_phones = array(	
	);
} else if ($area == "Винницкая"){
	$driver_phones = array(
	);
}

//Добавляем несколько телефонов для рассылки
$new_recipient_phones = array();

for ($i=0; $i<count($driver_phones); $i++){
	$phone = $driver_phones[$i];
	
	$phone = str_replace("(", "" ,$phone);
	$phone = str_replace(")", "" ,$phone);
	$phone = str_replace(" ", "" ,$phone);
	$phone = str_replace("+", "" ,$phone);
	$phone = str_replace("-", "" ,$phone);
	
	
	if (startsWith($phone, "38")){
		$phone = substr($phone, 2);;
	}
	
	// Check if already sent SMS for this freight to this number
	$sms_query = mysqli_query($con, "SELECT sms_id FROM sms WHERE phone='$phone' and freight_id='$gruz_id'") or die (mysqli_error($con));
	$sms_result = mysqli_fetch_assoc($sms_query);
	if ($sms_result == null){	
		array_push($new_recipient_phones, $phone);
	}
}

/* This sets the $time variable to the current hour in the 24 hour clock format */
$time = date("H");
/* Set the $timezone variable to become the current timezone */
$timezone = date("e");
/* If the time is less than 1200 hours, show good morning */
if ($time < "11") {
    $greeting = "Доброе утро";
} else
/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
if ($time >= "11" && $time < "17") {
    $greeting =  "Добрый день";
} else
/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
if ($time >= "17" && $time < "19") {
    $greeting =  "Добрый вечер";
} else
/* Finally, show good night if the time is greater than or equal to 1900 hours */
if ($time >= "19") {
    $greeting =  "Добрый вечер";
}

require_once('Googl.class.php');

$googl = new Googl('AIzaSyAu9Ir6s-3lhkphxpq1uf_qGlvD3n_zvDk');

// Shorten URL
$link = $googl->shorten("https://gurugruza.com.ua?zakaz".$gruz_id);

ob_start();

echo $greeting?>! Интересует заказ?

<?php echo $title ?>

<?php
$address_from = str_replace(", город Киев", "", $address_from);
$address_to = str_replace(", город Киев", "", $address_to);
echo  $address_from?> → <?php echo $address_to ?>

<?php if (!empty($price)) { ?>
Оплата: <?php echo $price ?> грн
<?php } ?>

Подробнее: <?php echo $link ?>
<?php
$message = ob_get_clean();

echo $message;

echo "<br><br>Sent to ".(count($new_recipient_phones))." devices from ".count($driver_phones)."<br><br>";

for ($i=0; $i<count($new_recipient_phones); $i++){
	$phone = $new_recipient_phones[$i];
	
	//mysqli_query($con, "INSERT INTO sms(phone, text, freight_id) VALUES ('$phone', '$message', '$gruz_id')") or die (mysqli_error($con));
}

function startsWith($haystack, $needle){
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

// Send sms
$google_token_query = mysqli_query($con, "SELECT google_token FROM notification WHERE id='1'") or die(mysqli_error($con));
$google_token_result = mysqli_fetch_assoc($google_token_query);
$google_token = $google_token_result["google_token"];

sendNotificationSms($google_token, $message, $new_recipient_phones);

function sendNotificationSms($google_token, $message, $new_recipient_phones){
	$apiKey = 'AAAAFyQweMM:APA91bHMstbTnB6wd9kK87L3Vqvx9uXkTOEBLaAX2UmB5AEt35ytYH_vK-SUthfofc1Ir8ulP4diJVKedRSJmFGKHob1bb0g-VlXhPBBWV6D0pHNtqOQKFogYe2Lb9RE5IEmnUru9d4g';
	
	$user_google_tokens = array();
	array_push($user_google_tokens, $google_token);
	
	$data = array("message"=>$message, "recipients"=>$new_recipient_phones);

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