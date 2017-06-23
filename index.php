<?php

session_start();

if (isset($_GET["zakaz"])){
	echo "Загрузка...";

	require "util/connectDB.php";
	global $con;

	$freight_id = $_GET["zakaz"];

	mysqli_query($con, "UPDATE freight SET view = view + 1 WHERE freight_id='$freight_id'");

	header('Location: /gruz?id='.$freight_id);

	die();
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="googlebot" content="noarchive">
	<meta name="keywords" content="грузовые перевозки, информационная система грузоперевозок, компании грузоперевозок, онлайн грузоперевозки, онлайн-сервис грузоперевозок, сайт грузоперевозок, сайт перевозки грузов">
	<meta name="description" content="Грузоперевозки в Киеве, организация грузовых перевозок с помощью информационной системы Гуру Груза. Каталог компаний">
	<meta name="author" content="Dmytro Sheiko">
	<meta name="robots" content="noyaca" />
	<meta property="og:title" content="Гуру Груза - онлайн-сервис по грузоперевозкам." />
	<meta property="og:description" content="Узнайте стоимость своей перевозки и сэкономьте до 70%. Перевозим Всё, Везде, Всегда." />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="index.html" />
	<meta property="og:image" content="assets/images/other/social_logo.jpg" />
	<meta property="og:site_name" content="gurugruza.com.ua" />
	<meta itemprop="name" content="Гуру Груза - онлайн-сервис по грузоперевозкам." />
	<meta itemprop="description" content="Узнайте стоимость своей перевозки и сэкономьте до 70%. Перевозим Всё, Везде, Всегда." />
	<meta itemprop="image" content="assets/images/other/social_logo.jpg" />
	<meta itemprop="address" content="02000, Киев, Днепровская Наебержная 14Б, 1603" />
	<meta name="robots" content="index,follow" />
	<link rel="shortcut icon" href="assets/styles/images/favicon.ico">
	<title>Гуру Груза — грузоперевозки в Киеве, цены на грузовые перевозки по Киеву и области, организация перевозок грузов</title>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400,300&amp;subset=latin,cyrillic" media="screen" />
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:700,400,300&amp;subset=latin,cyrillic" media="screen" />
	<link type="text/css" rel="stylesheet" href="assets/cache/201722/home_v42017222331.min.css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style type="text/css">
		@media (max-width: 767px) {
			.description__feature-button {
				height:48px !important;
			}
		}
	</style>
	<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "Organization",
	  "url": "https://gurugruza.com.ua",
	  "contactPoint": [{
		"@type": "ContactPoint",
		"email": "info@gurugruza.com.ua",
		"url": "https://gurugruza.com.ua",
		"contactType": "customer service",
		"areaServed": "UA"
	  }]
	}
	</script>

	<?php
	require_once("util/analytics.php");
	
	if ($_SERVER['SERVER_NAME'] == "gurugruza.com.ua" and !$analytics_disabled){ ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-89978000-4', 'auto');
	  ga('send', 'pageview');

	</script>
	<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0056/1107.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
	</script>

	<?php } ?>
</head>

<body>
	<?php require("./util/support_dialog.html") ?>
					
					<?php


					$session_user_id = @$_SESSION['user_id'];
					$type = @$_SESSION['type'];

					$updated_truck = null;
					if (ISSET($session_user_id)){
						require (substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../")."util/connectDB.php";
						
						$session_user_query = mysqli_query($con, "SELECT type, updated_truck FROM user WHERE user_id='$session_user_id'");
						$session_user_result = mysqli_fetch_assoc($session_user_query);
						if ($session_user_result){
							$updated_truck = $session_user_result["updated_truck"];
						}
						$truck_query = mysqli_query($con, "SELECT truck_id FROM truck WHERE user_id='$session_user_id'") or die (mysqli_error($con));
						$truck_result = mysqli_fetch_assoc($truck_query);
						if ($truck_result) {
							$updated_truck = 1;
						}
						if ($session_user_result["type"]!=="0"){
							$updated_truck = 1;
						}
						
						// Set last seen
						mysqli_query($con, "UPDATE user SET last_seen=NOW() WHERE user_id='$session_user_id'") or die (mysqli_error($con));
					}

					?>
	<article class="billboard">
		<video id="billboard-video" class="billboard__video" loop="loop" preload="none" poster="assets/images/home_v4/video-preview.jpg">
			<source src="../assets/video/vv.webm" type="video/webm" />
			<source src="../assets/video/vv.mp4" type="video/mp4" />
		</video>
		<div class="billboard__video-fog"></div>
		<div class="billboard__content">
			<h1 class="billboard__title">
       Найдём перевозчика<br/>
       для доставки любого груза
     </h1>
			<div class="billboard__slogan">
				<div class="billboard__subslogan">
					Сравните цены и&nbsp;выберите лучшую
				</div>
				<div class="billboard__subslogan">
					Экономьте до&nbsp;72%
					<br/>
				</div>
			</div>
			<a class="billboard__button vv-button vv-button--gold vv-button--big" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
       Разместить запрос
     </a>
	 
			<div style="color:#fff; padding-top:40px">
				Вы перевозчик? <a href="kak_rabotat" style="color:#fff">Зарабатывайте с нами</a>
			</div>
		</div>

		<svg class="_arrowdown billboard__arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Слой_1" x="0px" y="0px" viewBox="0 0 45 45" enable-background="new 0 0 45 45" xml:space="preserve">
			<g>
				<path opacity="1" fill="#FFFFFF" enable-background="new" d="M22.6,1.5C10.9,1.5,1.4,11,1.4,22.7c0,11.7,9.5,21.2,21.2,21.2 s21.2-9.5,21.2-21.2C43.8,11,34.3,1.5,22.6,1.5z M22.5,41.3C12.3,41.3,4,33,4,22.8S12.3,4.2,22.5,4.2S41,12.5,41,22.8 C41,33,32.7,41.3,22.5,41.3z" />
				<polygon fill="#FFFFFF" points="23.4,31.3 29.2,25.5 28.1,24.3 23.4,29.1 23.4,13.1 21.4,13.1 21.4,29.1 16.6,24.3 15.5,25.5    21.4,31.3 21.4,31.3 21.4,31.3 23.3,31.3 23.4,31.3 23.4,31.3  " />
			</g>
		</svg>
	</article>
	<div class="layout">
		<header class="layout__header">
			<div class="layout__drawer-button x-drawer-button"></div>
		   <div class="layout__header-row _viewport_mobile">
			  <div class="layout__title header_mobile">
				<a href="/"><img class="layout__logo" src="<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>assets/images/home_v4/logo-mobile.png" alt="Везет Всем — онлайн-сервис грузоперевозок" /></a>
				
					<font id='account_counter' style='display:<?php echo $updated_truck=="0" ? "block" : "none" ?> !important; position:absolute; right:30px; top: 5px; color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:middle; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block; margin-left:5px;     font-family: Arial, Helvetica, sans-serif;'>1</font>
	  </div>
		   </div>
			<div class="layout__header-row _viewport_desktop">
				<div class="header">
					<?php require("util/session_header.php") ?>

					<div class="header__content">
						<div class="header__item header__title">
							<a href="#">
								<img class="header__title-logo" src="assets/images/home_v4/logo-white.png" alt="Сайт грузоперевозок «Везет Всем»">
								<img class="header__title-logo _blue" src="assets/images/home_v4/logo-blue.png" alt="Сайт грузоперевозок «Везет Всем»">
							</a>
							<a class="header__title-link" href="#">Онлайн-сервис перевозок</a>
						</div>
						<div class="header__item">
							<a class="header__action _order" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
								<strong>Узнайте лучшую цену</strong>
								<br/>на перевозку груза
							</a>
						</div>
						<div class="header__item header__carriers">
							<a class="header__action _order" href="kak_rabotat">
								<strong>Вы перевозчик?</strong>
								<br/>Присоединяйтесь
							</a>
						</div>
						<?php
						if(!isset($_SESSION['user_id'])){
							echo '
							<div class="header__item">
								<div class="_regblock">
									<a href="/auth/choice" class="header__link header__register">Регистрация</a>
									<br>
									<span class="x-open-login-box">
										<a href="/auth/login" class="header__link header__login x-open-login-box">Войти</a>
										<svg class="header__login-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-473 275 21 21"><path d="M-468 289v4c0 1.7 1.3 3 3 3h10c1.7 0 3-1.1 3-3v-15c0-1.7-1.3-3-3-3h-10c-1.7 0-3 1.3-3 3v4h2v-4c0-.5.5-1 1-1h10c.6 0 1 .4 1 1v15c0 .6-.5 1-1 1h-10c-.5 0-1-.5-1-1v-4h-2z"></path><path d="M-458 285.5l-5-3.5v2.5h-10v2h10v2.5"></path></svg>
									</span>
								</div>
							</div>
							';
						}
						?>
						<div class="header__support header__item">
							<span class="header__support-link contact x-open-support-box">Служба поддержки</span>
							<br>
							<a class="header__support-phone" style="cursor:pointer">info@gurugruza.com.ua</a>
							<br/> Работаем круглосуточно
						</div>
						<div class="header__categories-button" style="display:none">
							<svg class="header__categories-button-burger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 30">
								<path d="M0 0h36v6H0zM0 12h36v6H0zM0 24h36v6H0z" />
							</svg>
							<svg class="header__categories-button-cross" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="29.688" height="29.688" viewBox="0 0 29.688 29.688">
								<path d="M29.693 25.45l-4.243 4.243-10.606-10.607L4.237 29.693-.005 25.45 10.6 14.844-.004 4.237l4.24-4.242L14.846 10.6 25.45-.004l4.243 4.242-10.606 10.607L29.693 25.45z" />
							</svg>
						</div>
					</div>
				</div>
			</div>
		</header>

<div class="layout__drawer x-drawer">
	<div class="drawer__close"></div>
	<div class="drawer">
		<div class="drawer__login">
			<span class="x-hori" data-key="d89fd3d5ae09d3ce4eb131aaef56df7e"></span> <span class="x-hori" data-key="5fad0b1810e3a2b87f6bdad937571a48"></span> </div>
			
		<?php if(!isset($_SESSION['user_id'])){ ?>
			<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="booking" style="margin:0 10px 0 10px; width:calc(100% - 20px)">Узнать стоимость своей перевозки</a>
			<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="kak_rabotat" style="margin:10px 10px 0 10px; width:calc(100% - 20px)">Вы водитель? Присоединяйтесь</a>
			
			<a href="/auth/choice" class="header__link header__register" style="color:#333; margin:20px 10px 0 10px; display:block">Регистрация</a>
			<br>
			<a href="/auth/login" class="header__link header__register" style="color:#333; margin:0 10px 20px 10px; display:block">Войти</a>
		<?php } else { ?>
		<?php if ($type=="0") {
				echo '<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'poisk" style="margin:10px 10px 0 10px; width:calc(100% - 20px); height:auto; padding:15px 0 15px 0">Поиск груза</a>';
				echo '<div id="drawer_new_messages" style="display:none"><a id="drawer_new_messages_link" class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="color:#333; margin:20px 10px 0 10px; display:inline-block; text-decoration:underline">Новые сообщения</a><font id="messages_counter_drawer" style="color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:bottom; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block">1</font></div>';
				echo '<a class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'account/main" style="color:#333; margin:20px 10px 0 10px; display:inline-block; text-decoration:underline">Личный кабинет</a>'.($updated_truck == "0" ? '<font id="account_counter_drawer" style="color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:bottom; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block">1</font>':'').'<br>';
				echo '<a class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="color:#333; margin:20px 10px 0 10px; display:block; text-decoration:underline">Мои ставки</a>';
			}  else {
				echo '<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="margin:10px 10px 0 10px; width:calc(100% - 20px); height:auto; padding:15px 0 15px 0">Мои запросы</a>';
				echo '<div id="drawer_new_messages" style="display:none"><a id="drawer_new_messages_link" class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="color:#333; margin:20px 10px 0 10px; display:inline-block; text-decoration:underline">Новые сообщения</a><font id="messages_counter_drawer" style="color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:bottom; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block">1</font></div>';
			}
			echo '<a class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'auth/logout" style="color:#333; margin:20px 10px 20px 10px; display:block; text-decoration:underline">Выйти</a>';
		} ?>
		
		<div class="drawer__support" style="padding-left:10px;">
			<span class="drawer__support-link">Служба поддержки</span>
			<a class="drawer__support-phone">info@gurugruza.com.ua</a>
			<span>Работаем круглосуточно</span>
		</div>
		<div class="drawer__buttons">
			<span class="x-hori" data-key="72088cf0c122072528987c85c7b0b62e"></span>
			<span class="x-hori" data-key="996d7e8d2c9b99cfb25ab9f418df21fb"></span> </div>
	</div>
</div>
		<div class="layout__drawer-backdrop x-drawer-backdrop"></div>
		<main class="layout__content">

			<article class="description">
				<div class="description__content">
					<header class="description__header">
						<div class="description__header-title">
							Как работает «Гуру Груза»
						</div>
					</header>

					<div class="description__steps layout__container">
						<div class="description__step">
							<div class="description__step-content">
								<div class="description__step-number">
									1
								</div>
								<div class="description__step-title">
									<a href="booking" onclick="yaCounter42689514.reachGoal('booking')">Разместите запрос</a> на&nbsp;грузоперевозку
								</div>
								<div class="description__step-text">
									Напишите что нужно перевезти, откуда и&nbsp;куда.
								</div>
							</div>
						</div>
						<div class="description__step">
							<div class="description__step-content">
								<div class="description__step-number">
									2
								</div>
								<div class="description__step-title">
									Перевозчики торгуются за&nbsp;ваш заказ, снижая цены
								</div>
								<div class="description__step-text">
									Через несколько минут после размещения запроса вы&nbsp;получите первые предложения на&nbsp;перевозку грузов по Киеву.
								</div>
							</div>
						</div>
						<div class="description__step">
							<div class="description__step-content">
								<div class="description__step-number">
									3
								</div>
								<div class="description__step-title">
									Вы выбираете лучшую цену и&nbsp;экономите до&nbsp;72%
								</div>
								<div class="description__step-text">
									Выберите исполнителя и «Гуру Груза» пришлет его контактные данные, чтобы совершить грузоперевозки в Киеве.
								</div>
							</div>
						</div>
					</div>

					<a class="description__action-button" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
						<strong>Разместите запрос</strong>
						<br> и получите лучшую цену
					</a>

					<header class="description__header">
						<div class="description__header-title">
							Найдите перевозчика на любой груз
						</div>
					</header>

					<div class="description__features">
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/flat.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Домашние вещи и переезды
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat2_moving_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/cars.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Автомобили и мототехника
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat7_auto_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/water.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Водный транспорт
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat7_boat_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/way.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Попутные грузы
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat11_suppload_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/liquid.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Наливные грузы
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat12_bulkliquid_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/granulars.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Сыпучие грузы
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat12_bulkcargo_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/build.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Строительные грузы
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat3_build_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/food.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Продукты питания
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat10_food_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/animals.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Перевозка животных
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat8_animal_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/agro.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Сельхозпродукция
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat10_agro_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/garbage.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Вывоз мусора
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat4_garbage_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/rails.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Перевозка по ЖД
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat12_railroad_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/oversize.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Негабаритные грузы
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat12_oversize_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/passengers.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Пассажирские перевозки
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_cat9_passangers_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking" onclick="yaCounter42689514.reachGoal('booking')">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/order-car.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Заказать отдельную машину
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_ordercar_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
						<a class="description__feature" href="booking/category/manipulator.html">
							<img class="description__feature-image" src="assets/images/home_v4/mosaic/manipulator.jpg">
							<div class="description__feature-summary">
								<div class="description__feature-title">
									Манипулятор
								</div>
								<div class="description__feature-order">
									<div class="description__feature-button vv-button vv-button--gold gtagm_ordercarmanip_button">
										Заказать перевозку
									</div>
								</div>
							</div>
						</a>
					</div>

				</div>
			</article>

			<article class="advantages">
				<div class="advantages__content">
					<header class="advantages__header">
						<div class="advantages__header-title">
							Почему клиенты выбирают «Гуру Груза»
						</div>
					</header>
					<div class="advantages__list">
						<div class="advantages__item _economy">
							<div class="advantages__title">Экономия времени</div>
							<div class="advantages__text">Не&nbsp;надо звонить и&nbsp;вести долгие переговоры</div>
						</div>
						<div class="advantages__item _solid">
							<div class="advantages__title">Надежные перевозчики</div>
							<div class="advantages__text">Мы&nbsp;проверяем документы и&nbsp;выбираем лучших для сотрудничества</div>
						</div>
						<div class="advantages__item _price">
							<div class="advantages__title">Гарантированная цена</div>
							<div class="advantages__text">Исполнитель не&nbsp;изменит цену и&nbsp;условия в&nbsp;последний момент</div>
						</div>
					</div>
				</div>
			</article>
			<article class="inquiry">
				<div class="inquiry__content">
					<header class="inquiry__header">
						<div class="inquiry__header-title">
							Найдём лучшего перевозчика для доставки любого груза
						</div>
					</header>
					<ul class="inquiry__steps">
						<li class="inquiry__step">
							<span class="inquiry__step-number">1</span>Разместите запрос
						</li>
						<li class="inquiry__step">
							<span class="inquiry__step-number">2</span>Сравните цены
						</li>
						<li class="inquiry__step">
							<span class="inquiry__step-number">3</span>Выберите лучшую
						</li>
					</ul>
					<div class="inquiry__text">
						и&nbsp;сэкономьте до&nbsp;72% стоимости на грузоперевозках
					</div>
					<a class="inquiry__button vv-button vv-button--gold vv-button--big" href="booking" onclick="yaCounter42689514.reachGoal('booking')">Разместить бесплатный запрос</a>
				</div>
			</article>

			<footer>
				<article class="contacts">
					<div class="vv-container">
						<div class="contacts__content">
							<div class="contacts__column-left">
								<div class="contacts__section contacts__section--address">
									<div class="contacts__section-judge">
										<div class="contacts__title">Юридический и почтовый адрес</div>
										02000, Киев, Днепровская Набережная&nbsp;14А, офис&nbsp;1603
									</div>
								</div>
								<div class="contacts__section contacts__section--phone">
									<div class="contacts__section-email">
										<div class="contacts__title">Почта</div>
										<a href="mailto:info@gurugruza.com.ua">info@gurugruza.com.ua</a>
									</div>
								</div>
							</div>
							<div class="contacts__column-right"></div>
						</div>
					</div>
				</article>
				<article class="footer" style="padding:20px">
					<div class="vv-container">
						<div class="footer__copyright">
							© 2017 Все права на&nbsp;<a class="footer__copyright-link" href="index.html">сайт грузоперевозок «gurugruza.com.ua»</a> принадлежат ООО&nbsp;«Гуру Груза»
						</div>
					</div>
				</article>
			</footer>
		</main>
		<div class="layout__fog js-fog"></div>
		<div class="x-backdrop modal-backdrop fade in" style="display:none"></div>
		<script type="text/javascript" src="assets/cache/201722/home_v42017222331.min.js" charset="UTF-8"></script>
		
		<script type="text/javascript" src="assets/cache/201722/support_dialog.min.js" charset="UTF-8"></script>
	</div>
	<!-- Begin Inspectlet Embed Code -->
	<!--
<script type="text/javascript" id="inspectletjs">
window.__insp = window.__insp || [];
__insp.push(['wid', 1423836748]);
(function() {
function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
})();
</script>
<!-- End Inspectlet Embed Code -->
<script type='text/javascript' src="util/jivosite.js"></script>
</body>

</html>