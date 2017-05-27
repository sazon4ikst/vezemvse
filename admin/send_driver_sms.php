<?php

require "../util/connectDB.php";

$gruz_id = 5271;

$freight_query = mysqli_query($con, "SELECT title, price, address_from, address_to FROM freight WHERE freight_id='$gruz_id'") or die (mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_query);
$title = $freight_result["title"];
$price = $freight_result["price"];
$address_from = $freight_result["address_from"];
$address_to = $freight_result["address_to"];	

// Одесса
/*$driver_phones = array(
	"0950252903",
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
	"0950252903",
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
	/////////////
	"0978014059",
	"0981501910",
	"0950105981",
	"0975677367",
	"0675868886",
	"0680131149",
	"0683072574",
	"0985512819",
	"0939596676",
	"0974099592",
	"0677543070",
	"0988312770",
	"0934387254",
	"0675033973",
	"0674736512",
	"0505254416",
	"0984605103",
	"0975970093",
	"0999362938",
	"0671071849",
	"0976171299",
	"0939201432",
	"0676812274",
	"0675935989",
	"0675935989",
	"0672901734",
	"0679661919",
	"0677734782",
	"0675843371",
	"0674725813",
	"0971081993",
	"0965045040",
	"0987940986",
	"0674172049",
	"0967784858",
	"0963527536",
	"0675976018",
	"0674735383",
	"098097020",
	"0969160213",
	"0687542975",
	"0503537249",
	"0977989808",
	"0503349783",
	"0471644516",
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
	"0672592358",
	"0969781615",
	"0442877124",
	"0955236066",
	"0979119672",
	"0934517707",
	"0639130368",
	"0961444048",
	"0673769455",
	"0989645318",
	"0506603653",
	"0680535569",
	"0637375778",
	"0991942926",
	"0631477065",
	"0935092526",
	"0995517040",
	"0671929595",
	"0986677215",
	"0967328899",
	"0975786233",
	"0632084225",
	"0637194736",
	"0938233793",
	"0679113558",
	"09936501199",
	"0662900559",
	"0985920351",
	"0957433871",
	"0678973996",
	"0979410557",
	"0930589434",
	"0967691605",
	"0674652315",
	"0986612320",
	"0671108062",
	"0672804880",
	//
	"0501474111",
	"0675843371",
	"0504693700",
	"0934418262",
	"0672468537",
	"0672324402",
	"0672592358",
	"0982867615",
);*/

// Запорожье
/*$driver_phones = array(
	"0950252903",
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
	"0676390388",
	"0507305503",
	"0504846285",
	"0990455395",
	"0967765855",
	"0505282395",
	"0504962055",
	"0678867830",
	"0676138137",
	"0666341102",
	"0999464839",
	"0675831000",
	"0976694056",
	"0677142694",
	"0997937395",
	"0501475776",
	"0980334242",
	"0975542471",
	"0980997767",
	"0955205746",
	"0674507241",
	"0676176505",
	"0679139151",
	"0979281874",	
);*/

// Ровно
/*$driver_phones = array(
	"0950252903",
	"0968367020",
	"0966545140",
	"0504349609",
	"0937561823",
	"0987608547",
	"0993015291",
	"0962017290",
	"0637803828",
	"0633588948",
	"0679985352",
	"0633606290",
	"0503553322",
	"0673011839",
	"0505353740",
	"0987274826",
	"0985779910",
	"0992199199",
	"0680036414",
	"0975445808",
	"0502393631",
	"0982832995",
	"0673641329",
	"0976097553",
	"0997537990",
	"0673631500",
	"0673965045",
	"0673015012",
	"0982025890",
	"0673772505",
	"0680247927",
	"0980537684",
	"0967955914",
	"0503722337",
	"0935322202",
	"0978196907",
	"0661282507",
	"0955506736",
	"0673803758",
	"0683325567",
	"0675819372",
	"0963834308",
	"0678831692",
	"0502962623",
	"0975483196",
);*/

// Днепропетровская область
/*$driver_phones = array(
	"0950252903",
	"0664667609",
	"0502724254",
	"0969682761",
	"0976923554",
	"0679871172",
	"0972724103",
	"0961730369",
	"0507523001",
	"0679614459",
	"0972972734",
	"0687759152",
	"0676086830",
	"0688745967",
	"0664827031",
	"0934845549",
	"0983814022",
	"0664742772",
	"0951303343",
	"0935769086",
	"0968110087",
	"0983061245",
	"0666365548",
	"0675277442",
	"0978871619",
	"0964537408",
	"0675625324",
	"0968302002",
	"0958199245",
	"0678496489",
	"0669173760",
	"0988277961",
	"0504203203",
	"0674928904",
	"0509965088",
	"0970780361",
	"0976948124",
	"0639329216",
	"0672200461",
	"0960564002",
	"0679346586",
	"0938165209",
	"0661705629",
	"0961842145",
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


if (count($new_recipient_phones)>0){
	$res = $Stat->createCampaign("testName", $message, $addrbook_id, "", 0, 0, 0, "");
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