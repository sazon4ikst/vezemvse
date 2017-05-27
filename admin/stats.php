<?php

require "../util/connectDB.php";

$freight_query = mysqli_query($con, "SELECT COUNT(freight_id) as freight_count, SUM(price) as freight_price FROM freight WHERE fake='0'") or die (mysqli_error($con));
$freight_result = mysqli_fetch_assoc($freight_query);
$freight_count = $freight_result["freight_count"];
$freight_price = $freight_result["freight_price"];

$driver_query = mysqli_query($con, "SELECT COUNT(user_id) as driver_count FROM user WHERE fake='0' AND type='0'") or die (mysqli_error($con));
$driver_result = mysqli_fetch_assoc($driver_query);
$driver_count = $driver_result["driver_count"];

echo "<h1>Размещено грузов: ".$freight_count."</h1>";
echo "<h1>Стоимость грузов: ".$freight_price." грн, ".round($freight_price/26.33)."$</h1>";
echo "<h1>Доход (5%): ".($freight_price*0.05)." грн, ".round($freight_price/26.33*0.05)."$</h1>";
echo "<h1>Зарегистрировано водителей: ".$driver_count."</h1>";

?>