<?php
session_start();

require "../../../util/connectDB.php";

$user_id = ISSET($_POST["user_id"]) ? $_POST["user_id"] : null;
$title = ISSET($_POST["title"]) ? $_POST["title"] : null;
$weight = ISSET($_POST["weight"]) ? $_POST["weight"] : null;
$volume = ISSET($_POST["volume"]) ? $_POST["volume"] : null;
$price = ISSET($_POST["price"]) ? $_POST["price"] : null;
$address_from = ISSET($_POST["address_from"]) ? $_POST["address_from"] : null;
$address_to = ISSET($_POST["address_to"]) ? $_POST["address_to"] : null;
$full_name = ISSET($_POST["full_name"]) ? $_POST["full_name"] : null;
$email = ISSET($_POST["email"]) ? $_POST["email"] : null;
$phone = ISSET($_POST["phone"]) ? $_POST["phone"] : null;
$password = ISSET($_POST["password"]) ? $_POST["password"] : null;
$start_time = ISSET($_POST["time"]) ? $_POST["time"] : null;
$distance = ISSET($_POST["distance"]) ? $_POST["distance"] : null;
$description = ISSET($_POST["description"]) ? $_POST["description"] : null;
$registered = ISSET($_POST["registered"]) ? $_POST["registered"] : "false";
$posted_time = time();

if (empty($title) or empty($address_from) or empty($address_to)){
	die("Пожалуйста заполните все поля.");
}

global $con;

if (empty($user_id)){
	if ($registered == "false"){
		$raw_password = mt_rand(100000, 999999);

		// Encrypt the password
		$password = password_hash($raw_password, PASSWORD_DEFAULT);
		$password = mysqli_real_escape_string($con, $password);
		
		$user_query = mysqli_query($con, "SELECT user_id FROM user WHERE email='$email'") or die (mysqli_error($con));
		$user_result = mysqli_fetch_assoc($user_query);

		if ($user_result) {
			die(json_encode(array("error"=>"Вы уже зарегистрированы, нажмите на переключатель вверху и введите пароль.")));
		}
		
		mysqli_query($con, "INSERT INTO user(name, email, phone, password, type) VALUES ('$full_name', '$email', '$phone', '$password', '1')") or die (mysqli_error($con));
		$user_id = mysqli_insert_id($con);
		
		// Send registration email
		$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
		$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		ob_start();
		require("registration_email_owner.html");
		$message = ob_get_clean();

		mail($email, "=?UTF-8?B?".base64_encode("Спасибо за регистрацию на нашем сайте")."?=", $message, $headers);
		$message = null;
		
		$_SESSION['name'] = $full_name;
	} else {		
		$password = mysqli_real_escape_string($con, $password);
		$email = mysqli_real_escape_string($con, $email);
		
		$user_query = mysqli_query($con, "SELECT user_id, name, password, type FROM user WHERE email='$email'") or die (mysqli_error($con));
		$user_result = mysqli_fetch_assoc($user_query);

		if (!$user_result or !password_verify($password, $user_result["password"])) {
			die(json_encode(array("error"=>"Неправильный адрес или пароль.")));
		}
		
		if ($user_result["type"] == "0"){
			die(json_encode(array("error"=>"Вы уже зарегистрированы как водитель. Пожалуйста создайте новый аккаунт.")));
		}

		$user_id = $user_result["user_id"];
		$name = $user_result["name"];
		
		$_SESSION['name'] = $name;
	}

	$_SESSION['user_id'] = $user_id;
	$_SESSION['type'] = "1";
	$_SESSION['email'] = $email;
}

$title = mysqli_real_escape_string($con, $title);
$price = mysqli_real_escape_string($con, $price);
$weight = mysqli_real_escape_string($con, $weight);
$volume = mysqli_real_escape_string($con, $volume);
$address_from = mysqli_real_escape_string($con, $address_from);
$address_to = mysqli_real_escape_string($con, $address_to);
$full_name = mysqli_real_escape_string($con, $full_name);
$email = mysqli_real_escape_string($con, $email);
$phone = mysqli_real_escape_string($con, $phone);
$posted_time = mysqli_real_escape_string($con, $posted_time);
$start_time = mysqli_real_escape_string($con, $start_time);
$description = mysqli_real_escape_string($con, $description);
$distance = mysqli_real_escape_string($con, $distance);

mysqli_query($con, "INSERT INTO freight(user_id, posted_time, start_time, title, description, address_from, address_to, distance, weight, volume, price) VALUES ('$user_id', '$posted_time', '$start_time', '$title', '$description', '$address_from', '$address_to', '$distance', '$weight', '$volume', '$price')") or die (mysqli_error($con));
$freight_id = mysqli_insert_id($con);

@get_lat_long($con, $freight_id, $address_from, $address_to);

echo json_encode(array("freight_id" => $freight_id));

// Send email about the new job to all drivers
$headers = "From: "."=?UTF-8?B?".base64_encode("Гуру Груза")."?="."<info@gurugruza.com.ua>\r\n";
$headers .= "Reply-To: info@gurugruza.com.ua\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$drivers_query = mysqli_query($con, "SELECT name, email, (
		  6373 * acos (
		  cos ( radians( '".$GLOBALS["lat_from"]."' ) )
		  * cos( radians( X(city_point) ) )
		  * cos( radians( Y(city_point) ) - radians( '".$GLOBALS["long_from"]."' ) )
		  + sin ( radians( '".$GLOBALS["lat_from"]."' ) )
		  * sin( radians( X(city_point) ) )
		)
	) AS distance FROM user WHERE (type='0' OR type='2') AND email<>'dmytro@sheiko.net' AND email<>'post_man@ukr.net' AND email<>'andzej@bigmir.net' HAVING distance<150") or die(mysqli_error($con));
while ($drivers_result = mysqli_fetch_assoc($drivers_query)){
	$email = $drivers_result["email"];
	$driver_name = $drivers_result["name"];	

	ob_start();
	require("new_freight_email.html");
	$message = ob_get_clean();
	
	@mail($email, "=?UTF-8?B?".base64_encode("Новый заказ – ".$title)."?=", $message, $headers);
	$message = null;
}

$email = "dmytro@sheiko.net";
$driver_name = "Дмитрий";	

ob_start();
require("new_freight_email.html");
$message = ob_get_clean();

@mail("dmytro@sheiko.net", "=?UTF-8?B?".base64_encode("Новый заказ – ".$title." (".time().")")."?=", $message, $headers);
$message = null;

function get_lat_long($con, $freight_id, $address_from, $address_to){
    $address_from = str_replace(" ", "+", $address_from);
	
	$address_from = urlencode($address_from);	

    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address_from&sensor=false&key=AIzaSyBL5UB6urkL0ni5h-_R9WqLBIJxWdgZl2w");
    $json = json_decode($json);

    $lat_from = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long_from = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};	
	

    $address_to = str_replace(" ", "+", $address_to);
	
	$address_to = urlencode($address_to);	

    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address_to&sensor=false&key=AIzaSyBL5UB6urkL0ni5h-_R9WqLBIJxWdgZl2w");
    $json = json_decode($json);

    $lat_to = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long_to = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	
	if (!(empty($lat_to) or empty($long_to) or empty($lat_from) or empty($long_from))){
		mysqli_query($con, "UPDATE freight SET address_from_point=POINT($lat_from, $long_from), address_to_point=POINT($lat_to, $long_to) WHERE freight_id='$freight_id'") or die (mysqli_error($con));
		
		$GLOBALS['lat_from'] = $lat_from;
		$GLOBALS['long_from'] = $long_from;
		$GLOBALS['lat_to'] = $lat_to;
		$GLOBALS['long_to'] = $long_to;
	} else {
		$GLOBALS['lat_from'] = 0;
		$GLOBALS['long_from'] = 0;
		$GLOBALS['lat_to'] = 0;
		$GLOBALS['long_to'] = 0;
	}
}

return;

// Отправить СМС диспетчеру

error_reporting(0);

$gruz_id = $freight_id;

$freight_query = mysqli_query($con, "SELECT title, price, address_from, address_to FROM freight WHERE freight_id='$gruz_id'");
$freight_result = mysqli_fetch_assoc($freight_query);
$title = $freight_result["title"];
$price = $freight_result["price"];
$address_from = $freight_result["address_from"];
$address_to = $freight_result["address_to"];	

// Диспетчер
$driver_phones = array(
	//"0950252903",
	"0678882806",
);	

include 'sms/config.php';
include 'sms/Addressbook.php';
include 'sms/Exceptions.php';
include 'sms/Account.php';
include 'sms/Stat.php';

$Gateway=new APISMS($sms_key_private,$sms_key_public, 
					'http://atompark.com/api/sms/');
$Addressbook=new Addressbook($Gateway);
$Exceptions=new Exceptions($Gateway);
$Account=new Account($Gateway);
$Stat = new Stat ($Gateway);

//Первым делом, зарегистрируем имя отправителя, если собираемся рассылать СМС
// в том числе в Украину
//Если вы собираетесь отправлять смс исключительно в Россию - 
//регистрировать имя отправителя нет необходимости
$res=$Account->registerSender('Guru Gruza','ua');

//Проверяем успешность операции
if (isset($res["result"]["error"])) {
}

//Создаем адресную книгу
$res=$Addressbook->addAddressBook('Test book');

//Проверяем успешность операции
if (isset($res["result"]["error"])) {
} else {
//Получаем ИД книги
$addrbook_id = $res["result"]["addressbook_id"];
}

//Добавляем несколько телефонов для рассылки

$new_recipient_phones = array();

for ($i=0; $i<count($driver_phones); $i++){
	$phone = $driver_phones[$i];
	
	$phone = str_replace("(", "" ,$phone);
	$phone = str_replace(")", "" ,$phone);
	$phone = str_replace(" ", "" ,$phone);
	$phone = str_replace("+", "" ,$phone);
	
	if (!startsWith($phone, "38")){
		$phone = "38".$phone;
	}
	
	// Check if already sent SMS for this freight to this number
	$sms_query = mysqli_query($con, "SELECT sms_id FROM sms WHERE phone='$phone' and freight_id='$gruz_id'");
	$sms_result = mysqli_fetch_assoc($sms_query);
	if ($sms_result == null){	
		array_push($new_recipient_phones, $phone);
		
		$res=$Addressbook->addPhoneToAddressBook($addrbook_id, 
						$phone, 'Перевозчик;');
		if (isset($res["result"]["error"])) {
		}
	}
}

//Проверяем баланс счета
$res=$Account->getUserBalance();
if (isset($res["result"]["error"])) {
} else {
$balance = $res["result"]["balance_currency"];
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

ob_start();

echo $greeting?>, Руслан! Поступил новый заказ:

<?php echo $title ?>

<?php echo str_replace(", город Киев", "", $address_from) ?> → <?php echo str_replace(", город Киев", "", $address_to) ?>

<?php if (!empty($weight)) { ?>
<?php echo $weight." кг" ?>
<?php } ?>

<?php if (!empty($price)) { ?>
<?php echo $price ?> грн
<?php } ?>

Подробности: https://gurugruza.com.ua/gruz?id=<?php echo $gruz_id ?><?php
$message = ob_get_clean();

//Проверим, хватает ли денег на запланированную рассылку
$res = $Stat->checkCampaignPrice("Guru Gruza", 
		$message, 
		$addrbook_id);
if (isset($res["result"]["error"])) {
} else {
$cost = $res["result"]["price"];
}

if ($balance > $cost) {
//А теперь по созданной адресной книге отправим рассылку


if (count($new_recipient_phones)>0){
	$res = $Stat->createCampaign("Guru Gruza", $message, $addrbook_id, "", 0, 0, 0, "");
}



if (isset($res["result"]["error"])) {
} else {
$campaign_id = $res["result"]["id"];
}


for ($i=0; $i<count($new_recipient_phones); $i++){
	$phone = $new_recipient_phones[$i];
	
	mysqli_query($con, "INSERT INTO sms(phone, text, freight_id) VALUES ('$phone', '$message', '$gruz_id')") or die (mysqli_error($con));
}

//Теперь можно получить данные о доставке. 
//Понятно, что в реальности необходимо будет немного подождать 
//для обновления статусов, 
//сохранив $campaign_id и выполнив запрос позже.
$res = $Stat->getCampaignDeliveryStats($campaign_id);

//если запрос выполнить сразу, то мы получим JSON 
//примерно следующего содержания
/*
{
"result":{
"phone":["79010000001","79010000002"],
"sentdate":["0000-00-00 00:00:00","0000-00-00 00:00:00"],
"donedate":["0000-00-00 00:00:00","0000-00-00 00:00:00"],
"status":["0","0"]
}
}
//Что значит, что кампания еще находится в очереди отправки
*/

} else {
//недостаточно денег на рассылку
}

function startsWith($haystack, $needle){
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}


?>