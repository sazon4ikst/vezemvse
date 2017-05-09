<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="googlebot" content="noarchive">
	<meta name="keywords" content="грузовые перевозки, информационная система грузоперевозок, компании грузоперевозок, онлайн грузоперевозки, онлайн-сервис грузоперевозок, сайт грузоперевозок, сайт перевозки грузов">
	<meta name="description" content="Грузоперевозки в Киеве, организация грузовых перевозок с помощью информационной системы Везём Всё. Каталог компаний">
	<meta name="author" content="Dmytro Sheiko">
	<meta name="robots" content="noyaca" />
	<meta property="og:title" content="Везём Всё - онлайн-сервис по грузоперевозкам." />
	<meta property="og:description" content="Узнайте стоимость своей перевозки и сэкономьте до 70%. Перевозим Всё, Везде, Всегда." />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="index.html" />
	<meta property="og:image" content="assets/images/other/social_logo.jpg" />
	<meta property="og:site_name" content="vezemvse.com.ua" />
	<meta itemprop="name" content="Везём Всё - онлайн-сервис по грузоперевозкам." />
	<meta itemprop="description" content="Узнайте стоимость своей перевозки и сэкономьте до 70%. Перевозим Всё, Везде, Всегда." />
	<meta itemprop="image" content="assets/images/other/social_logo.jpg" />
	<meta itemprop="address" content="02000, Киев, Днепровская Наебержная 14Б, 1603" />
	<meta name="robots" content="index,follow" />
	<link rel="shortcut icon" href="assets/styles/images/favicon.ico">
	<title>Везём Всё — грузоперевозки в Киеве, цены на грузовые перевозки по Киеву и области, организация перевозок грузов</title>
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

	<!--<script>
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
<!-- Yandex.Metrika counter -->
	<!--
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter42689514 = new Ya.Metrika({
                    id:42689514,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42689514" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

	<meta name="yandex-verification" content="02cbc138dbce34b8" />
</head>

<body>
	<?php require("./util/support_dialog.html") ?>
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
				Вы перевозчик? <a href="kak_rabotat" style="color:#fff">Присоединяйтесь</a>
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
				<div class="layout__title">
					<img class="layout__logo" src="assets/images/home_v4/logo-mobile.png" alt="Везет Всем — онлайн-сервис грузоперевозок" />
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
							<a class="header__action _order" href="booking">
								<strong>Узнайте лучшую цену</strong>
								<br/>на перевозку груза
							</a>
						</div>
						<div class="header__item header__carriers">
							<a class="header__action _order" href="poisk">
								<strong>Вы перевозчик?</strong>
								<br/>найдите груз
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
							<a class="header__support-phone" style="cursor:pointer">info@vezemvse.com.ua</a>
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
					<div class="header__categories _hidden">
						<div class="header__categories-group">
							<div class="header__categories-title">Поиск груза
								<svg class="header__categories-arrow" width="11" height="12" viewBox="0 0 11 12" xmlns="http://www.w3.org/2000/svg">
									<g fill-rule="evenodd">
										<path class="bar" d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1V0h1v9h1V8h1V7h1V6h2v1h-1z" />
										<path d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1h1V9h1V8h1V7h1V6h2v1h-1z" />
									</g>
								</svg>
							</div>
							<ul class="header__categories-list">
								<li><a href="poisk/all.html">Все заказы</a>
								</li>
								<li><a href="poisk/all/mebel_i_bytovaja_tehnika.html">Мебель и бытовая техника</a>
								</li>
								<li><a href="poisk/all/pereezd.html">Переезд</a>
								</li>
								<li><a href="poisk/all/stroitelnye_gruzy_i_oborudovanie.html">Строительные грузы и оборудование</a>
								</li>
								<li><a href="poisk/all/vyvoz_musora.html">Вывоз мусора</a>
								</li>
								<li><a href="poisk/all/transportnye_sredstva.html">Транспортные средства</a>
								</li>
								<li><a href="poisk/all/perevozka_zhivotnyh.html">Перевозка животных</a>
								</li>
								<li><a href="poisk/all/passazhirskie_perevozki.html">Пассажирские перевозки</a>
								</li>
								<li><a href="poisk/all/produkty_pitanija.html">Продукты питания</a>
								</li>
								<li><a href="poisk/all/dogruz.html">Догруз</a>
								</li>
								<li><a href="poisk/all/prochie_gruzy.html">Прочие грузы</a>
								</li>
								<li><a href="poisk/moskva.html">Грузоперевозки по Киеву</a>
								</li>
							</ul>
						</div>
						<div class="header__categories-group">
							<div class="header__categories-title">Перевозки
								<svg class="header__categories-arrow" width="11" height="12" viewBox="0 0 11 12" xmlns="http://www.w3.org/2000/svg">
									<g fill-rule="evenodd">
										<path class="bar" d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1V0h1v9h1V8h1V7h1V6h2v1h-1z" />
										<path d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1h1V9h1V8h1V7h1V6h2v1h-1z" />
									</g>
								</svg>
							</div>
							<ul class="header__categories-list">
								<li><a href="dostavka-gruzov.html">Доставка грузов</a>
								</li>
								<li><a href="mashina-dlya-perevozki-gruza/fury.html">Грузоперевозки фурами</a>
								</li>
								<li><a href="gruzoperevozki/avtomobilnye.html">Автомобильные перевозки</a>
								</li>
								<li><a href="gruzoperevozki/mezhdunarodnye.html">Международные перевозки</a>
								</li>
								<li><a href="gruzoperevozki/po-rossii.html">Грузоперевозки по Украине</a>
								</li>
								<li><a href="gruzoperevozki/poputnye.html">Попутные грузоперевозки</a>
								</li>
								<li><a href="mashina-dlya-perevozki-gruza/gazel.html">Грузоперевозки на Газели</a>
								</li>
								<li><a href="gruzovye-perevozki/chastnye.html">Частные грузовые перевозки</a>
								</li>
								<li><a href="passazhirskie-perevozki.html">Пассажирские перевозки</a>
								</li>
								<li><a href="gruzoperevozki/mezhdugorodnie.html">Междугородние перевозки</a>
								</li>
							</ul>
						</div>
						<div class="header__categories-group">
							<div class="header__categories-title">Категории перевозок
								<svg class="header__categories-arrow" width="11" height="12" viewBox="0 0 11 12" xmlns="http://www.w3.org/2000/svg">
									<g fill-rule="evenodd">
										<path class="bar" d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1V0h1v9h1V8h1V7h1V6h2v1h-1z" />
										<path d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1h1V9h1V8h1V7h1V6h2v1h-1z" />
									</g>
								</svg>
							</div>
							<ul class="header__categories-list">
								<li><a href="mashina-dlya-perevozki-gruza/10-tonn.html">Грузоперевозки 10 тонн</a>
								</li>
								<li><a href="mashina-dlya-perevozki-gruza/5-tonn.html">Грузоперевозки 5 тонн</a>
								</li>
								<li><a href="gruzoperevozki/krupnogabaritnye.html">Крупногабаритные перевозки</a>
								</li>
								<li><a href="gruzoperevozki/melkogabaritnye.html">Малогабаритные перевозки</a>
								</li>
								<li><a href="gruzoperevozki/sbornye.html">Доставка сборных грузов</a>
								</li>
								<li><a href="peregon-avtomobilej.html">Перегон автомобилей</a>
								</li>
								<li><a href="perevozka-mebeli.html">Перевозка мебели</a>
								</li>
								<li><a href="perevozka-veshej.html">Перевозка вещей</a>
								</li>
								<li><a href="perevozka-zhivotnyh.html">Перевозка животных</a>
								</li>
								<li><a href="gruzoperevozki/negabaritnye.html">Перевозка негабаритных грузов</a>
								</li>
							</ul>
						</div>
						<div class="header__categories-group">
							<div class="header__categories-title">Дополнительно
								<svg class="header__categories-arrow" width="11" height="12" viewBox="0 0 11 12" xmlns="http://www.w3.org/2000/svg">
									<g fill-rule="evenodd">
										<path class="bar" d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1V0h1v9h1V8h1V7h1V6h2v1h-1z" />
										<path d="M10 7v1H9v1H8v1H7v1H6v1H5v-1H4v-1H3V9H2V8H1V7H0V6h2v1h1v1h1v1h1v1h1V9h1V8h1V7h1V6h2v1h-1z" />
									</g>
								</svg>
							</div>
							<ul class="header__categories-list">
								<li><a href="pereezd/kvartiry.html">Переезд квартиры</a>
								</li>
								<li><a href="pereezd/ofisnyj.html">Офисный переезд</a>
								</li>
								<li><a href="pereezd/na-dachu.html">Переезд на дачу</a>
								</li>
								<li><a href="pereezd/iz-goroda-v-gorod.html">Переезд в другой город</a>
								</li>
								<li><a href="pereezd/mezhdunarodnyj.html">Международный переезд</a>
								</li>
								<li><a href="pereezd/mashina-s-gruzchikami.html">Машина с грузчиками для переезда</a>
								</li>
								<li><a href="dostavka_tovarov_i_mebeli_ikea.html">Доставка товаров из Ikea</a>
								</li>
								<li><a href="perevozka-avtomobilej.html">Перевозка автомобилей</a>
								</li>
								<li><a href="perevozka-avtomobilej/avtovozom.html">Перевозка автовозами</a>
								</li>
								<li><a href="dostavka-avtomobilej.html">Доставка автомобилей</a>
								</li>
								<li><a href="perevozka-avtomobilej/na-poezde-kontejnerom-i-setkoj.html">Перевозка авто по ж/д, сетка</a>
								</li>
								<li><a href="perevozka-avtomobilej/iz-moskvy.html">Доставка авто из Киева</a>
								</li>
							</ul>
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
				<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="booking">Узнать стоимость своей перевозки</a>
				<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="poisk">Вы водитель? Найдите груз</a>
				<div class="drawer__support">
					<span class="drawer__support-link">Служба поддержки</span>
					<a class="drawer__support-phone" href="mailto:info@vezemvse.com.ua">info@vezemvse.com.ua</a>
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
							Как работает «Везём Всё»
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
									Выберите исполнителя и «Везём Всё» пришлет его контактные данные, чтобы совершить грузоперевозки в Киеве.
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
						<a class="description__feature" href="booking">
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
							Почему клиенты выбирают «Везём Всё»
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
						<div class="advantages__item _tracking">
							<div class="advantages__title">Отслеживание маршрута перевозки</div>
							<div class="advantages__text">Система отслеживания покажет где ваш груз</div>
						</div>
						<div class="advantages__item _insurance">
							<div class="advantages__title">Страхование грузов</div>
							<div class="advantages__text">Застрахуйте грузоперевозку с&nbsp;помощью одного из&nbsp;партнёров «Везём Всё»</div>
						</div>
						<div class="advantages__item _notifications">
							<div class="advantages__title">Бесплатные уведомления</div>
							<div class="advantages__text">Цены на перевозку грузов в&nbsp;смс или по&nbsp;электронной почте. Бесплатно и&nbsp;без спама</div>
						</div>
					</div>
				</div>
			</article>

			<!--<article class="numbers">
    <div class="numbers__content">
      <header class="numbers__header">
        <div class="numbers__header-title">
          «Везём Всё» в&nbsp;цифрах
        </div>
      </header>
      <div class="numbers__item _clients">
        <span class="numbers__number">
            <em class="numbers__char">5</em><em class="numbers__char">6</em><em class="numbers__char">7</em><em class="numbers__char">5</em>        </span>
        клиентов сэкономили на&nbsp;перевозке
      </div>
      <div class="numbers__item _carriers">
        <span class="numbers__number">
            <em class="numbers__char">1</em><em class="numbers__char">8</em><em class="numbers__char">9</em><em class="numbers__char">7</em>        </span>
        проверенных перевозчиков
      </div>
      <div class="numbers__item _support">
        <span class="numbers__number">
            <em class="numbers__char">2</em><em class="numbers__char">0</em>
        </span>
        сотрудников службы заботы готовы помочь
      </div>
    </div>
  </article>

  <article class="feedbacks">
    <div class="feedbacks__content">
      <header class="feedbacks__header">
        <div class="feedbacks__header-title">
          200 отзывов, которыми мы гордимся
        </div>
      </header>
      <div class="feedbacks__reviews layout__container">
        <div class="x-carousel">
            <div class="feedbacks__review">
              <div class="feedbacks__text">
                <blockquote class="feedbacks__quote">
                  Нашей компании было необходимо перевезти 3&nbsp;автомобиля из&nbsp;Краснодара в&nbsp;Новосибирск. После того, как я&nbsp;поискала в&nbsp;интернете перевозчиков, наткнулась на&nbsp;сайт &laquo;Везём Всё&raquo;. Оказалось, очень удобно искать перевозчика таким образом&nbsp;&mdash; не&nbsp;теряя времени на&nbsp;звонках и&nbsp;сравнении условий. <span class="feedbacks__quote-mobile">Первое предложение поступило уже через 20&nbsp;минут после размещения на&nbsp;сайте. На&nbsp;следующий день я&nbsp;уже смогла выбрать себе перевозчика, подходящего мне по&nbsp;условиям. Если однажды возникнет потребность в&nbsp;перевозке, с&nbsp;удовольствием воспользуюсь сайтом &laquo;Везет всем&raquo; и&nbsp;порекомендую знакомым. Спасибо за&nbsp;работу!</span>
                </blockquote>
                <div class="feedbacks__profile">
                  <img class="feedbacks__photo"
                       src="assets/images/home_v4/urchenko.jpg"
                       width="124"
                       height="124" />
                  <div class="feedbacks__name">Дарья&nbsp;Юрченко
                    <span class="feedbacks__position">Специалист по&nbsp;административным вопросам Tele2</span></div>
                </div>
              </div>
            </div>
            <div class="feedbacks__review">
              <div class="feedbacks__text">
                <blockquote class="feedbacks__quote">
                  &laquo;Везём Всё&raquo;&nbsp;&mdash; прекрасная вещь по&nbsp;одной простой причине: это сайт, превращающий абсолютной темный и&nbsp;непонятный рынок грузоперевозок в Киеве в&nbsp;простой и&nbsp;удобный сервис. <span class="feedbacks__quote-mobile">Отвезти кучу вещей из&nbsp;любой точки на&nbsp;земле в&nbsp;любую точку на&nbsp;земле (ну&nbsp;почти) в&nbsp;несколько кликов&nbsp;&mdash; это круто. Исходя из&nbsp;собственного опыта, могу дать только один совет: торгуйтесь с&nbsp;перевозчиками и&nbsp;не&nbsp;соглашайтесь на&nbsp;первое&nbsp;же предложение.</span>
                  <a class="feedbacks__link" href="pereezd/latvija_rossija_pereezd_kvartiry_163871.html#pricelist">Посмотреть заказ</a>
                </blockquote>
                <div class="feedbacks__profile">
                  <img class="feedbacks__photo"
                       src="assets/images/home_v4/krasilschik.jpg"
                       width="124"
                       height="124" />
                  <div class="feedbacks__name">Илья&nbsp;Красильщик
                    <span class="feedbacks__position">издатель Meduza.io</span></div>
                </div>
              </div>
            </div>
            <div class="feedbacks__review _otzovik">
              <div class="feedbacks__text">
                <blockquote class="feedbacks__quote">
                  Скорость, поддержка оператором по&nbsp;телефону, оперативность, огромный выбор самых выгодных предложений, возможность общения с&nbsp;перевозчиками для уточнения деталей.

                  <span class="x-hori" data-key="aa3040aebc5c476da502ad53debf6de3"></span>                </blockquote>
                <div class="feedbacks__profile">
                  <img class="feedbacks__photo"
                       src="assets/images/home_v4/otzovik.png"
                       width="124"
                       height="124" />
                  <div class="feedbacks__name">Otzovik.com.ua</div>
                </div>
              </div>
            </div>
            <div class="feedbacks__review">
              <div class="feedbacks__text">
                <blockquote class="feedbacks__quote">
                  Я&nbsp;пользовался &laquo;Везём Всё&raquo; в&nbsp;2014-м году при переезде из&nbsp;Москвы в&nbsp;Санкт-Петербург, соответственно, вещей было много. Мне удалось найти водителя, который приехал, помог погрузить все вещи и&nbsp;отправился в&nbsp;Питер в&nbsp;тот&nbsp;же день. <span class="feedbacks__quote-mobile">Там он&nbsp;дождался меня, помог разгрузиться и&nbsp;отбыл. Полностью услуга обошлась в&nbsp;12000&nbsp;рублей. Можно было и&nbsp;дешевле (самая низкая предложенная цена была 8400&nbsp;рублей), но&nbsp;пришлось&nbsp;бы ждать несколько дней.</span>
                  <a class="feedbacks__link" href="pereezd/moskva_sankt-peterburg_pereezd_kvartiry_96297.html">Посмотреть заказ</a>
                </blockquote>
                <div class="feedbacks__profile">
                  <img class="feedbacks__photo"
                       src="assets/images/home_v4/sinodov.jpg"
                       width="124"
                       height="124" />
                  <div class="feedbacks__name">Юрий&nbsp;Синодов
                    <span class="feedbacks__position">основатель Roem.гu</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="feedbacks__review">
              <div class="feedbacks__text">
                <blockquote class="feedbacks__quote">
                  Решив переехать из&nbsp;Москвы в&nbsp;Петербург, я&nbsp;искала тех, кто быстро и&nbsp;недорого перевезет мои вещи. <span class="feedbacks__quote-mobile">Предложения не&nbsp;радовали, разговоры с&nbsp;транспортными компаниями были невнятными&nbsp;&mdash; я&nbsp;не&nbsp;крупный заказчик.</span> И&nbsp;тут мне попался сайт &laquo;Везём Всё&raquo;. <span class="feedbacks__quote-mobile">Он&nbsp;был приятно и&nbsp;хорошо сделан, но&nbsp;было страшно, непривычно хорошо&nbsp;&mdash; ищешь подвох. Я&nbsp;понимала, что разместив заказ, я&nbsp;ничего не&nbsp;теряю.</span> Система работает как аукцион: размещаешь заказ, ждешь предложений. Мой вопрос решился в&nbsp;течение одного рабочего дня! <span class="feedbacks__quote-mobile">Не&nbsp;сразу, но&nbsp;мне предложили перевезти мои неудобные килограммы за&nbsp;сумму, которая меня устроила, ответили подробно на&nbsp;все вопросы, приехали точно вовремя, все сами упаковали, отзвонились из&nbsp;Петербурга.</span>
                </blockquote>
                <div class="feedbacks__profile">
                  <img class="feedbacks__photo"
                       src="assets/images/home_v4/veselova.jpg"
                       width="124"
                       height="124" />
                  <div class="feedbacks__name">Анастасия&nbsp;Веселова
                    <span class="feedbacks__position">координатор работ Детских научных лабораторий</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="feedbacks__review">
              <div class="feedbacks__text">
                <blockquote class="feedbacks__quote">
                  Ресурс привлекает большое количество современных и&nbsp;гибких перевозчиков, работать с&nbsp;которыми одно удовольствие. То, что надо для современного бизнеса, который основан на&nbsp;рациональном использовании времени и&nbsp;денег. <span class="feedbacks__quote-mobile">Уже на&nbsp;первом&nbsp;же заказе мы&nbsp;уменьшили стоимость перевозки груза по Киеву в&nbsp;два раза по&nbsp;отношению к&nbsp;&laquo;независимым&raquo; перевозчикам из&nbsp;интернета!</span>
                </blockquote>
                <div class="feedbacks__profile">
                  <img class="feedbacks__photo"
                       src="assets/images/home_v4/novoselov.jpg"
                       width="124"
                       height="124" />
                  <div class="feedbacks__name">Николай&nbsp;Новоселов
                    <span class="feedbacks__position">CEO АртНаука: Физика Невозможного</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="feedbacks__all">
        <a href="otzyvy.html" class="feedbacks__button">Посмотреть все отзывы</a>
      </div>
    </div>
  </article>-->

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
										<a href="mailto:info@vezemvse.com.ua">info@vezemvse.com.ua</a>
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
							© 2017 Все права на&nbsp;<a class="footer__copyright-link" href="index.html">сайт грузоперевозок «vezemvse.com.ua»</a> принадлежат ООО&nbsp;«Везём Всё»
						</div>
					</div>
				</article>
			</footer>
		</main>
		<div class="layout__fog js-fog"></div>
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