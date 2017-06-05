<?php
	
require("util/connectDB.php");
global $con;
				
$freight_query = mysqli_query($con, "SELECT freight_id, address_from, address_to FROM freight") or die (mysqli_error($con));
while ($freight_result = mysqli_fetch_assoc($freight_query)){			
	$freight_id = $freight_result["freight_id"];
	$address_from = $freight_result["address_from"];
	$address_to = $freight_result["address_to"];
	
	echo $address_from."<br><br>";
	get_lat_long($con, $freight_id, $address_from, $address_to);
}

/*$users_query = mysqli_query($con, "SELECT user_id, city FROM user WHERE type='0'") or die (mysqli_error($con));
while ($users_result = mysqli_fetch_assoc($users_query)){			
	$freight_id = $users_result["user_id"];
	$address = $users_result["city"];
	
	echo $address."<br><br>";
	get_lat_long_city($con, $freight_id, $address);
}*/

/*$freight_query = mysqli_query($con, "SELECT freight_id, X(address_from_point) AS city_point_lat, Y(address_from_point) AS city_point_long FROM freight") or die (mysqli_error($con));
if ($freight_result = mysqli_fetch_assoc($freight_query)){			
	$freight_id = $freight_result["freight_id"];
	$city_point_lat = $freight_result["city_point_lat"];
	$city_point_long = $freight_result["city_point_long"];
	
	$users_query = mysqli_query($con, "SELECT user_id, (
		  6373 * acos (
		  cos ( radians( '$city_point_lat' ) )
		  * cos( radians( X(city_point) ) )
		  * cos( radians( Y(city_point) ) - radians( '$city_point_long' ) )
		  + sin ( radians( '$city_point_lat' ) )
		  * sin( radians( X(city_point) ) )
		)
	) AS distance FROM user WHERE type='0'") or die (mysqli_error($con));
	while ($users_result = mysqli_fetch_assoc($users_query)){			
		$freight_id = $users_result["user_id"];
		$distance = $users_result["distance"];
		
		echo "distance = ".$distance."<br><br>";
	}
}*/





// function to get  the address
function get_lat_long($con, $freight_id, $address_from, $address_to){

    $address_from = str_replace(" ", "+", $address_from);
	
	$address_from = urlencode($address_from);	

    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address_from&sensor=false&key=AIzaSyBL5UB6urkL0ni5h-_R9WqLBIJxWdgZl2w");
    $json = json_decode($json);

    $lat_from = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long_from = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};	
	

    $address_to = str_replace(" ", "+", $address_to);
	
	$address_to = urlencode($address_to);	

    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address_to&sensor=false");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	
	if (!(empty($lat) or empty($long) or empty($lat_from) or empty($long_from))) {	
		//mysqli_query($con, "UPDATE freight SET address_from_point=POINT($lat_from, $long_from), address_to_point=POINT($lat, $long) WHERE freight_id='$freight_id'") or die (mysqli_error($con));
	} else {
		echo "error for freight id = ".$freight_id;
	}
}
	
function get_lat_long_city($con, $user_id, $address){

    $address = str_replace(" ", "+", $address);
	
	$address = urlencode($address);	

    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyBL5UB6urkL0ni5h-_R9WqLBIJxWdgZl2w");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};	
	
	if (empty($lat) or empty($long)) die("error");
	
	
	if (!(empty($lat) or empty($long))) {	
		//mysqli_query($con, "UPDATE user SET city_point=POINT($lat, $long) WHERE user_id='$user_id'") or die (mysqli_error($con));
	} else {
		echo "error for user id = ".$user_id;
	}
}	
	
?>