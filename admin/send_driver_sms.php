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
	<p><input type="radio" name="area" value='Винницкие компании'>Винницкие компании</input></p>
	<p><input type="radio" name="area" value='Тест (Я)'>Тест (Я)</input></p>
	
	<div><input type="submit" style="width:815px; height:30px; margin-top:10px" value="Отправить СМС"></input></div>
<form>



<?php

if (!ISSET($_GET["freight"]) or !ISSET($_GET["area"])) return;

$area = $_GET["area"];

$gruz_id = $_GET["freight"];

$freight_query = mysqli_query($con, "SELECT title, price, address_from, address_to FROM freight WHERE freight_id='$gruz_id'") or die (mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_query);
$title = $freight_result["title"];
$price = $freight_result["price"];
$address_from = $freight_result["address_from"];
$address_to = $freight_result["address_to"];

if ($area == "Волынская"){
	$driver_phones = array(
		"0673511424",
		"09924О616З",
		"067З511424",
		"0673532711",
		"0965403852",
	);
} else if ($area == "Одесская"){
	$driver_phones = array(
		"0969781615",
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
		// Только из базы данных
		"0932471487"
	);
} else if ($area == "Черкасская"){
	$driver_phones = array(
		"0969781615",
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
	);
} else if ($area == "Киевская"){
	// Только из базы данных
	$driver_phones = array(
		"0969781615",
		"0935442985",
		"0686525410",
		"0506822499",
		// "0504623375", отказался от рассылки
		"0668177858",
		// "0968242478", отказался от рассылки
		"0630456383",
		"0963330712",
		"0932369567",
		"0951793080",
		"0672592358",
		"0501474111",
		"0675843371",
		// "0504693700", отказался от рассылки
		"0934418262",
		"0672468537",
		"0672324402",
		"0953017185",
		"0674521928",
		"0687733435",
		"0677000719",
		"0968008515",
		"0673286114",
		"0932030449",
		"0967273894",
		"0507098888",
	);
} else if ($area == "Запорожская"){
	$driver_phones = array(
		"0969781615",
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
	);
} else if ($area == "Ровенская"){
	$driver_phones = array(
		"0969781615",
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
	);
} else if ($area == "Днепропетровская"){
	$driver_phones = array(
		/*"0969781615",
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
		"0961842145",*/
		
		// Только из базы данных
		"0682589336"
	);
} else if ($area == "Николаевская"){
	$driver_phones = array(
		"0969781615",
		"0680837979",
		"0993174181",
		"0939092249",
		"0933246006",
		"0969844847",
		"0664283560",
		"06641855571",
		"0960198657",
		"0667439685",
		"0976885393",
		"0937700058",
		"0631345266",
		"0677547794",
		"0933784425",
		"0930220070",
		"0985408351",
		"0972603090",
		"0959020309",
		"0977108050",
		"0636134130",
		"0977325949",
		"0997534502",
		"0687980636",
		"0679226482",
	);
} else if ($area == "Тернопольская"){
	$driver_phones = array(
		"0969781615",
		"0672640515",
		"0676714117",
		"0676980493",
		"0961232338",
		"0974888341",
		"0671450797",
		"0968748369",
		"0971465140",
		"0672640515",
		"0981306834",
		"0677942332",
		"0672408759",
		"0684696658",
		"0673510931",
	);	
} else if ($area == "Львовская"){
	$driver_phones = array(
		"0969781615",
		"0506983809",
		"0973702494",
		"0967500264",
		"0672787785",
		"0686828810",
		"0972495501",
		"0673402511",
		"0673415022",
		"0679746074",
		"0992717930",
		"0962279299",
		"0968165324",
		"0982066493",
		"0676720330",
		"0679619535",
		"0673719911",
		"0636084047",
		"0509664201",
		"0673141102",
		"0969907763",
		"0965252675",
		"0986007677",
		"0978555618",
		"0675005593",
		"0676747955",
		"0989547119",
		"0999224409",
		"0979740634",
		"0678430236",
	);	
} else if ($area == "Кривой Рог"){
	$driver_phones = array(
		"0982867615",
	);	
} else if ($area == "Черновицкая"){
	$driver_phones = array(
		"0955168465",
		"0665954065",
		"0993103560",
		"0979993461",
		"0990011388",
		"0978436603",
		"0505551463",
		"0957356740",
		"0972246276",
		"0671362030",
		"0975307774",
		"0953164275",
		"0660160927",
		"0992314357",
		"0660160927",
		"0992314357",
		"0934905929",
		"0979476158",
		"0669214462",
		"0508031397",
		"0673515278",
		"0676075018",
		"0506612050",
		"0967841056",
		"0951895057",
		"0978811597",
		"0962428202",
		"0503747708",
		"0660193741",
		"0503747787",
		"0503760130",
		"0955419419",		
	);
} else if ($area == "Полтавская"){
	// Из базы данных
	$driver_phones = array(
		"0501308091",
		"0958643667",
	);
} else if ($area == "Сумская"){
	$driver_phones = array(
		"0506979060",
		"0662122421",
		"0997253475",
		"0506300230",
		"0953171332",
		"0954117173",
		"0679570483",
		"0666054486",
		"0950159717",
		"0671959521",
		"0671193156",
		"0508064628",
		"O67З511424",
		"093 202 77 97",
		"(066) 487-59-00",
		"+38 (066) 210-56-00",
		"38 (066) 869-17-12",
		"38 (050) 643-03-45",
		"38 (096) 557-54-81",
		"+38 (050) 887-84-67",
		"38 (067) 711-62-26",
		"38 (093) 070-50-39",

		// Из базы данных
		"0938863773",
	);
} else if ($area == "Винницкие компании"){
	$driver_phones = array(
		"+380 (97) 160-46-55",
		"+380 (98) 444-55-80",
		"+380 (67) 506-42-75",
		"+380 (99) 062-48-96",
		"+380 (97) 722-71-88",
		"+380 (68) 214-47-79",
		"+380 (97) 576-06-23",
		"+3809826740",
		"+38 (099) 232-01-49",
		"+38 (067) 306-86-45",
		"+38 (098) 195-44-09",
		"+38 (068) 275-32-60",
		"+38 (093) 070-50-39",
		"+38 (097) 167-50-26",
		"+38 (098) 267-40-58",
		"+38 (098) 550-25-23",
		"+38 (050) 211-97-59",
		"+38 (093) 260-02-57",
		"+38 (067) 711-62-26",
		"+38 (098) 195-60-94",
		"+38 (097) 017-47-60",	
		"+38 (097) 167-51-39",
		"+38 (097) 169-23-94",
		"+38 (067) 506-42-75",
		"+38 (098) 195-44-12",
		"+38 (098) 195-60-99",
	);
} else if ($area == "Тест (Я)"){
	$driver_phones = array(
		"0950252903",
	);
} else if ($area == "Харьковская"){
	$driver_phones = array(
		"063-761-30-65",
		"099-717-60-03",
		"066-190-60-96",
		"050-908-92-77",
		"099-750-33-83",
		"099-263-27-11",
		"050-572-25-61",
		"050-325-57-42",
		"066-058-93-12",
		"063-931-37-42",
		"050-985-62-21",
		"098-066-70-70",
		"099-424-44-55",
		"050-784-01-00",
		"099-250-09-16",
		"063-111-26-46",
		"099-263-27-11",
		"098-066-70-70",
		"050-572-25-61",
		"063-394-50-30",
		"050-301-49-54",
		"063-761-30-65",
		"063-761-30-65",
		"050-985-62-21",
		"050-876-66-21",
	);
} else if ($area == "Херсонская"){
	$driver_phones = array(
		"+380507665472",
		"050 698 0824",
		"0673532711",
		"0507566901",
		"(099)1250828",
		"(096)4178500",
		"(050)3156378",
		"(0552)510403",
		"(050)6130108",
		"(0552)393973",
		"(098)6419983",
		"(050)4886809",
		"(050)3158690",
		"(099)2374246",
		"(0552)356070",
		"(050)3154848",
		"(0552)314266",
		"(095)7775475",
		"(050)1703031",
		"(0552)324331",
		"(0552)374130",
		"(050)4187203",
		"(050)3159518",
		"(050)7649829",
		
	);
} else if ($area == "Хмельницкая"){
	$driver_phones = array(
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",		
	);
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