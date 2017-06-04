<?php
session_start();

$session_user_id = @$_SESSION['user_id'];
	
require("../../../util/connectDB.php");
global $con;
	
$type = null;
if ($session_user_id != null){
	// Get user type
	$session_user_query = mysqli_query($con, "SELECT type FROM user WHERE user_id='$session_user_id'");
	$session_user_result = mysqli_fetch_assoc($session_user_query);
	$type = $session_user_result["type"];
}

$freight_query = mysqli_query($con, "SELECT user_id, freight_id AS freightid, title, address_from, address_to, distance, weight, volume, price, start_time, status, (SELECT price FROM offer WHERE offer.freight_id=freightid ORDER BY price ASC LIMIT 1) AS last_offer, (SELECT status FROM offer WHERE offer.freight_id=freightid ORDER BY status ASC LIMIT 1) AS offer_status FROM freight WHERE fake='0' ORDER BY posted_time DESC") or die (mysqli_error($con));
$freights = array();
while ($freight_result = mysqli_fetch_assoc($freight_query)){
	$title = $freight_result["title"];
	array_push($freights, array("title"=>$title));
}

echo json_encode($freights);

?>