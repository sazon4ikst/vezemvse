<?php

require "../util/connectDB.php";

$gruz_id = 5258;

$freight_query = mysqli_query($con, "SELECT title, price, address_from, address_to FROM freight WHERE freight_id='$gruz_id'") or die (mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_query);
$title = $freight_result["title"];
$price = $freight_result["price"];
$address_from = $freight_result["address_from"];
$address_to = $freight_result["address_to"];	

// Одесса
/*$driver_phones = array(
	//"0950252903",
	"0968991479",
	"0675147905",
	"0679995268",
	"0965839257",
	"0987677455",
	"0969361592",
	"0954677645",
	"0930131905",
	"0663736881",
	"0935821706",
	"0679567386",
	"0503954999",
	"0679804455",
	"0678575633",
);*/

// Черкассы
/*$driver_phones = array(
	//"0950252903",
	"0978014059",
	"0675019321",
	"0938201414",
	"0939052824",
	"0678385639",
	"0672901647",
	"0635786728",
	"0675981946",
	"0674738655",
	"0661120027",
	"0982724001",
	"0687397646",
	"0981501910",
	"0950105981",
	"0966602607",
);*/

// Киев
/*$driver_phones = array(
	//"0950252903",
	"0676560808",
	"0970224024",
	"0504494909",
	"0976831184",
	"0445033961",
	"0672329063",
	"0632037968",
	"0684161995",
	"0675278711",
	"0977596058",
	"0672497969",
	"0672362510",
	"0676593327",
	"0937749931",
	"0985036394",
);*/

// Запорожье
/*$driver_phones = array(
	//"0950252903",
	"0504565096",
	"0509224183",
	"0506552322",
	"0964563479",
	"0930770942",
	"0979554875",
	"0678642805",
	"0664303653",
	"0934034043",
	"0994817299",
	"0994727477",
	"0982420432",
	"0667471409",
	"0676390388"
);*/
	

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
$res=$Account->registerSender('testName','ua');

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

for ($i=0; $i<count($driver_phones); $i++){
	$phone = $driver_phones[$i];
	
	$phone = str_replace("(", "" ,$phone);
	$phone = str_replace(")", "" ,$phone);
	$phone = str_replace(" ", "" ,$phone);
	$phone = str_replace("+", "" ,$phone);
	
	if (!startsWith($phone, "38")){
		$phone = "38".$phone;
	}
	
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
		".$res["result"]["result"]["currency"]);
$balance = $res["result"]["balance_currency"];
}

/* This sets the $time variable to the current hour in the 24 hour clock format */
$time = date("H");
/* Set the $timezone variable to become the current timezone */
$timezone = date("e");
/* If the time is less than 1200 hours, show good morning */
if ($time < "12") {
    $greeting = "Доброе утро";
} else
/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
if ($time >= "12" && $time < "17") {
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

<?php echo str_replace(", город Киев", "", $address_from) ?> → <?php echo str_replace(", город Киев", "", $address_to) ?>

<?php if (!empty($price)) { ?>
Оплата: <?php echo $price ?> грн
<?php } ?>

Подробности: https://gurugruza.com.ua/gruz?id=<?php echo $gruz_id ?>
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



$res = $Stat->createCampaign("testName", $message, $addrbook_id, "", 0, 0, 0, "");




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