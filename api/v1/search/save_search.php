<?php

session_start();

$_SESSION['search_address_from'] = ISSET($_POST["address_from"]) ? $_POST["address_from"] : "";
$_SESSION['search_address_to'] = ISSET($_POST["address_to"]) ? $_POST["address_to"] : "";
$_SESSION['search_from_lat'] = ISSET($_POST["from_lat"]) ? $_POST["from_lat"] : "";
$_SESSION['search_from_lng'] = ISSET($_POST["from_lng"]) ? $_POST["from_lng"] : "";
$_SESSION['search_to_lat'] = ISSET($_POST["to_lat"]) ? $_POST["to_lat"] : "";
$_SESSION['search_to_lng'] = ISSET($_POST["to_lng"]) ? $_POST["to_lng"] : "";
$_SESSION['search_weight_min'] = ISSET($_POST["weight_min"]) ? $_POST["weight_min"] : "0";
$_SESSION['search_weight_max'] = ISSET($_POST["weight_max"]) ? $_POST["weight_max"] : "30";

?>