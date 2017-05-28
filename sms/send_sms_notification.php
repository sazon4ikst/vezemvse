<?php

require "../util/connectDB.php";

$driver_phones = array(
	"0950252903",
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
die ("Ошибка: ".$res["result"]["code"]);
}
var_dump($res);
echo "<br><br>";

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
	
	if (!startsWith($phone, "38")){
		$phone = "38".$phone;
	}
	

	array_push($new_recipient_phones, $phone);
		
	$res=$Addressbook->addPhoneToAddressBook($addrbook_id, 
					$phone, 'Перевозчик;');
	if (isset($res["result"]["error"])) {
	echo ("Ошибка: ".$res["result"]["code"]."
	");
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
<?php
$message = ob_get_clean();

echo $message;

//Проверим, хватает ли денег на запланированную рассылку
$res = $Stat->checkCampaignPrice("testName", 
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


//$res = $Stat->createCampaign("testName", $message, $addrbook_id, "", 0, 0, 0, "");


echo "<br><br>Sent to ".(count($new_recipient_phones))." devices<br><br>";



if (isset($res["result"]["error"])) {
echo ("Ошибка: ".$res["result"]["code"]."
");
} else {
$campaign_id = $res["result"]["id"];
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