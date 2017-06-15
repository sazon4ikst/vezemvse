<?php

require "../util/connectDB.php";

if (!ISSET($_GET["link"])) {
	$offer_query = mysqli_query($con, "SELECT offer_id, freight_id FROM offer ORDER BY offer_id DESC") or die (mysqli_error($con));
	$offer_result = mysqli_fetch_assoc($offer_query);
	$last_offer_id = $offer_result["offer_id"];
	$last_freight_id = $offer_result["freight_id"];
	$last_link = "https://gurugruza.com.ua/gruz?id=$last_freight_id&open_offer=$last_offer_id";
} else {
	$last_link = "";
}

$freights_query = mysqli_query($con, "SELECT freight_id, title, address_from, address_to FROM freight WHERE fake=0 ORDER BY freight_id DESC") or die (mysqli_error($con));
?>

<form method="get">
	<h3>Ссылка на предложение</h3>
	<input type="text" name="link" style="width:815px; height:30px;" value="<?php echo ISSET($_GET["link"]) ? $_GET["link"] : $last_link ?>"/>
	
	<div><input type="submit" style="width:815px; height:30px; margin-top:10px" value="Отправить СМС"></input></div>
<form>



<?php

if (!ISSET($_GET["link"]) and empty($last_link)) return;

if (ISSET($_GET["link"])){
	$link = $_GET["link"];
} else {
	$link = $last_link;
}
parse_str(parse_url($link, PHP_URL_QUERY), $array);

$gruz_id = $array["id"];
$offer_id = $array["open_offer"];

$freight_query = mysqli_query($con, "SELECT user_id, title, price, weight, address_from, address_to, X(address_from_point) AS lat_from, Y(address_from_point) AS long_from FROM freight WHERE freight_id='$gruz_id'") or die (mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_query);
$owner_id = $freight_result["user_id"];
$title = $freight_result["title"];
$price = $freight_result["price"];
$address_from = $freight_result["address_from"];
$address_to = $freight_result["address_to"];
$lat_from = $freight_result["lat_from"];
$long_from = $freight_result["long_from"];
$weight = $freight_result["weight"];

$owner_query = mysqli_query($con, "SELECT name, phone FROM user WHERE user_id='$owner_id'") or die (mysqli_error($con));
$owner_result = mysqli_fetch_assoc($owner_query);
$owner_name = $owner_result["name"];
$owner_phone = $owner_result["phone"];
	
$owner_phone = str_replace("(", "" ,$owner_phone);
$owner_phone = str_replace(")", "" ,$owner_phone);
$owner_phone = str_replace(" ", "" ,$owner_phone);
$owner_phone = str_replace("+", "" ,$owner_phone);
$owner_phone = str_replace("-", "" ,$owner_phone);

$offer_query = mysqli_query($con, "SELECT user_id, price FROM offer WHERE offer_id='$offer_id'") or die (mysqli_error($con));
$offer_result = mysqli_fetch_assoc($offer_query);
$driver_id = $offer_result["user_id"];
$price = $offer_result["price"];
$driver_query = mysqli_query($con, "SELECT name FROM user WHERE user_id='$driver_id'") or die (mysqli_error($con));
$driver_result = mysqli_fetch_assoc($driver_query);
$driver_name = $driver_result["name"];

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
$link = $googl->shorten($link);

$title = trim(preg_replace("/\([^)]+\)/","", mb_strtolower($title)));
$first_word = explode(' ', $title)[0];

$last_char = mb_substr($first_word, -1);

echo "<br><br><br>";
echo $greeting.", ".my_ucfirst($owner_name, 'utf-8')."!<br><br>$driver_name предложил перевезти Ваш".(($last_char=="ы" or $last_char=="и")?"и":"")." ".$title." за $price грн.<br><br>Подробности и переписка: $link";
echo "<br><br><b>$owner_phone</b>";

function my_ucfirst($string, $e ='utf-8') { 
        if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) { 
            $string = mb_strtolower($string, $e); 
            $upper = mb_strtoupper($string, $e); 
            preg_match('#(.)#us', $upper, $matches); 
            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e); 
        } else { 
            $string = ucfirst($string); 
        } 
        return $string; 
} 

?>