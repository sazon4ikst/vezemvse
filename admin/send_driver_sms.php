<?php

require "../util/connectDB.php";

$freights_query = mysqli_query($con, "SELECT freight_id, title, address_from, address_to FROM freight WHERE fake=0 ORDER BY freight_id DESC") or die (mysqli_error($con));
?>

<form method="get">
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

$include_own_drivers = true;
if ($include_own_drivers) {
	$drivers_query = mysqli_query($con, "SELECT user_id, name, phone, city, (
		  6373 * acos (
		  cos ( radians( '".$lat_from."' ) )
		  * cos( radians( X(city_point) ) )
		  * cos( radians( Y(city_point) ) - radians( '".$long_from."' ) )
		  + sin ( radians( '".$lat_from."' ) )
		  * sin( radians( X(city_point) ) )
		)
	) AS distance FROM user WHERE (type='0' OR type='2') AND disabled_sms_notifications=0 AND fake=0 GROUP BY phone HAVING distance<150") or die(mysqli_error($con));
	while ($drivers_result = mysqli_fetch_assoc($drivers_query)){
		$user_id = $drivers_result["user_id"];
		$driver_name = $drivers_result["name"];
		$phone = $drivers_result["phone"];
		
		$truck_query = mysqli_query($con, "SELECT weight, volume FROM truck WHERE user_id='$user_id'") or die(mysqli_error($con));
		if ($truck_result = mysqli_fetch_assoc($truck_query)){
			if ((!empty($truck_result["weight"]) and $truck_result["weight"]*1000 < $weight) or (!empty($truck_result["volume"]) and $truck_result["volume"] < $volume)){
				continue;
			}
		}

		array_push($driver_phones, $phone);
	}
	
	echo("<br>Will be sent to ".count($driver_phones)." drivers");
}

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
die ("Ошибка: ".$res["result"]["code"]);
}

//Создаем адресную книгу
$res=$Addressbook->addAddressBook('Test book');

//Проверяем успешность операции
if (isset($res["result"]["error"])) {
die ("Ошибка: ".$res["result"]["code"]);
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
	$phone = str_replace("-", "" ,$phone);
	
	
	if (!startsWith($phone, "38")){
		$phone = "38".$phone;
	}
	
	// Check if already sent SMS for this freight to this number
	$sms_query = mysqli_query($con, "SELECT sms_id FROM sms WHERE phone='$phone' and freight_id='$gruz_id'") or die (mysqli_error($con));
	$sms_result = mysqli_fetch_assoc($sms_query);
	if ($sms_result == null){	
		array_push($new_recipient_phones, $phone);
		
		$res=$Addressbook->addPhoneToAddressBook($addrbook_id, 
						$phone, 'Перевозчик;');
		if (isset($res["result"]["error"])) {
		echo ("Ошибка: ".$res["result"]["code"]."
		");
		}
	}
}

//Проверяем баланс счета
$res=$Account->getUserBalance();
if (isset($res["result"]["error"])) {
echo ("Ошибка: ".$res["result"]["code"]."
");
} else {
echo ("Баланс: ".$res["result"]["result"]["balance_currency"]." 
		".$res["result"]["result"]["currency"]."<br><br>");
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

echo $greeting?>! Интересует заказ?

<?php echo $title ?>

<?php
$address_from = str_replace(", город Киев", "", $address_from);
$address_to = str_replace(", город Киев", "", $address_to);
echo  $address_from?> → <?php echo $address_to ?>

<?php if (!empty($price)) { ?>
Оплата: <?php echo $price ?> грн
<?php } ?>

Подробнее: https://gurugruza.com.ua?zakaz=<?php echo $gruz_id ?>
<?php
$message = ob_get_clean();

echo $message;

//Проверим, хватает ли денег на запланированную рассылку
$res = $Stat->checkCampaignPrice("Guru Gruza", 
		$message, 
		$addrbook_id);
if (isset($res["result"]["error"])) {
die ("Ошибка: ".$res["result"]["code"]."
");
} else {
$cost = $res["result"]["price"];
}

var_dump($cost);

if ($balance > $cost) {
//А теперь по созданной адресной книге отправим рассылку


if (count($new_recipient_phones)>0){
	$res = $Stat->createCampaign("Guru Gruza", $message, $addrbook_id, "", 0, 0, 0, "");
}

echo "<br><br>Sent to ".(count($new_recipient_phones))." devices from ".count($driver_phones)."<br><br>";



if (isset($res["result"]["error"])) {
echo ("Ошибка: ".$res["result"]["code"]."
");
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


var_dump($res);
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