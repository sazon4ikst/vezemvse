<?php

require("../util/connectDB.php");
global $con;

require_once "ultimate-web-scraper/support/http.php";
require_once "ultimate-web-scraper/support/web_browser.php";
require_once "ultimate-web-scraper/support/simple_html_dom.php";

$freights_json = array();


//$url = "https://ru.lardi-trans.com/gruz/?foi=&filter_marker=new&countryfrom=UA&countryto=UA&cityFrom=&cityTo=&dateFrom=&dateTo=&bt_chbs_slc=&mass=&mass2=&value=&value2=&gabDl=&gabSh=&gabV=&zagruzFilterId=&adr=-1&showType=all&startSearch=%D0%A1%D0%B4%D0%B5%D0%BB%D0%B0%D1%82%D1%8C+%D0%B2%D1%8B%D0%B1%D0%BE%D1%80%D0%BA%D1%83";
$url = "http://localhost/scraper/fake_lordi.html";

$html = new simple_html_dom();

$web = new WebBrowser();

require "set_cookies.php";

$result = $web->Process($url);
	
if (!$result["success"]){
	echo "Error retrieving URL.  " . $result["error"] . "\n";
} else if ($result["response"]["code"] != 200){
	echo "Error retrieving URL.  Server returned:  " . $result["response"]["code"] . " "
	. $result["response"]["meaning"] . "\n";
} else {
	$html->load($result["body"]);

	$freights = $html->find('.predlInfoRow');		
		
	mysqli_query($con, "DELETE FROM freight");
	
	foreach ($freights as $freight){
		$id = str_replace("predlRowGruz", "", $freight->attr["id"]);
		$time = parseTime($freight->find("td", 3)->plaintext);		
		if ($time == null) continue;		
		$title = mb_ucfirst($freight->find("td", 7)->plaintext, "utf-8");
		$address_from = explode("(", $freight->find("td", 5)->plaintext)[0];
		$area_from = substr(explode("(", $freight->find("td", 5)->plaintext)[1], 0, -1);
		$address_to = explode("(", $freight->find("td", 6)->plaintext)[0];
		$area_to = substr(explode("(", $freight->find("td", 6)->plaintext)[1], 0, -1);
		$price = parsePrice($freight->find("td", 8)->plaintext);
		
		getDistance($id);
		
		$phone = $freight->find("td", 9)->find(".uiFirmContScroolBlock", 0)->find("span", 0)->plaintext;
		
		$start = translateMonth($start_time).' 00:00:00';
		$new_date = DateTime::createFromFormat('d F H:i:s', $start);
		$start_time = $new_date->getTimestamp();
		
		if ($distance == null) continue;
		
		$id = mysqli_real_escape_string($con, $id);
		$time = mysqli_real_escape_string($con, $time);		
		$title = mysqli_real_escape_string($con, $title);
		$address_from = mysqli_real_escape_string($con, $address_from);
		$area_from = mysqli_real_escape_string($con, $area_from);
		$address_to = mysqli_real_escape_string($con, $address_to);
		$area_to = mysqli_real_escape_string($con, $area_to);
		$distance = mysqli_real_escape_string($con, $distance);
		$phone = mysqli_real_escape_string($con, $phone);
		$volume = mysqli_real_escape_string($con, $volume);
		$weight = mysqli_real_escape_string($con, $weight);
		$description = mysqli_real_escape_string($con, $description);
		$start_time = mysqli_real_escape_string($con, $start_time);
		if ($price != null) $price = mysqli_real_escape_string($con, $price);
		
		$freight_query = mysqli_query($con, "SELECT freight_id FROM freight WHERE freight_id='$id'");
		if (mysqli_num_rows($freight_query) == 0){
			mysqli_query($con, "INSERT INTO freight(freight_id, posted_time, title, address_from, area_from, address_to, area_to, distance, price, volume, weight, description, start_time) VALUES('$id', '$time', '$title', '$address_from', '$area_from', '$address_to', '$area_to', '$distance', '$price', '$volume', '$weight', '$description', '$start_time')") or die(mysqli_error($con));
		} else {
			mysqli_query($con, "UPDATE freight SET posted_time='$time', title='$title', address_from='$address_from', area_from='$area_from', address_to='$address_to', area_to='$area_to', distance='$distance', price='$price', volume='$volume', weight='$weight', description='$description', start_time='$start_time' WHERE freight_id='$id'") or die(mysqli_error($con));
		}	
	
		array_push($freights_json, array(
			"id" => $id,
			"time" => $time,
			"title" => $title,
			"address_from" => $address_from,
			"area_from" => $area_from,
			"address_to" => $address_to,
			"area_to" => $area_to,
			"price" => $price,
			"distance" => $distance,
			"phone" => $phone,
			"volume" => $volume,
			"weight" => $weight,
			"description" => $description,
			"start_time" => $start_time,
			"start_time" => $start_time,
		));
	}
}

function translateMonth($month){
	$month = str_replace("января", "January", $month);
	$month = str_replace("февраля", "February", $month);
	$month = str_replace("марта", "March", $month);
	$month = str_replace("апреля", "April", $month);
	$month = str_replace("мая", "May", $month);
	$month = str_replace("июня", "June", $month);
	$month = str_replace("июля", "July", $month);
	$month = str_replace("августа", "August", $month);
	$month = str_replace("сентября", "September", $month);
	$month = str_replace("октября", "October", $month);
	$month = str_replace("ноября", "November", $month);
	$month = str_replace("декабря", "December", $month);
	return $month;
}

function getDistance($id){
	//$url = "https://ru.lardi-trans.com/gruz/view/".$id;
	$url = "http://localhost/scraper/fake_lordi_details.html";
	
	$html = new simple_html_dom();

	$web = new WebBrowser();
	$result = $web->Process($url);
	
	$html->load($result["body"]);
	$infos = $html->find('.uiSlideDivDiscription tr');
	if ($infos != null){
		foreach ($infos as $info){
			if ($info->find("td", 0)->plaintext == "Расстояние"){
				global $distance;
				$distance = $info->find("td", 1)->plaintext;
			} else if ($info->find("td", 0)->plaintext == "Объем"){
				global $volume;
				$volume = $info->find("td", 1)->plaintext;
				$volume = str_replace("м3", " м3", $volume);
			} else if ($info->find("td", 0)->plaintext == "Масса"){
				global $weight;
				$weight = $info->find("td", 1)->plaintext;
				$weight = str_replace("т", " т", $weight);
			} else if ($info->find("td", 0)->plaintext == "Тип кузова"){
				global $description;
				$description = $info->find("td", 1)->plaintext;
			} else if ($info->find("td", 0)->plaintext == "Загрузка"){
				global $description;
				$description = $description.", загрузка ".$info->find("td", 1)->plaintext;
			} else if ($info->find("td", 0)->plaintext == "Дата загрузки"){
				global $start_time;
				$start_time = $info->find("td", 1)->plaintext;
			}
		}
	}
}

function mb_ucfirst($string, $encoding){
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}

function parseTime($time){
	$dtime = DateTime::createFromFormat("d.m", $time);
	if (!empty($dtime)){
		return $dtime->getTimestamp();
	} else {
		return null;
	}
}

function parsePrice($price){
	$price_parts = preg_split("/\D+/", $price, null, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
	if (count($price_parts) > 0 and strlen($price_parts[0])>1){
		return $price_parts[0];
	}
	return null;
}

echo json_encode($freights_json);
?>