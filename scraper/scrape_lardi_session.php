<?php

require("../util/connectDB.php");
global $con;

require_once "ultimate-web-scraper/support/http.php";
require_once "ultimate-web-scraper/support/web_browser.php";
require_once "ultimate-web-scraper/support/simple_html_dom.php";

$freights_json = array();

$url = "https://lardi-trans.com/log/index.jsp";

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

	$freights = $html->find('a');		
	
	foreach ($freights as $freight){
		echo $freight->plaintext." <br>";
	}
}
?>