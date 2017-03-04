<html>
<head>
    <meta charset="utf-8">
    <meta lang="ru">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="googlebot"   content="noarchive">
    <meta name="keywords"    content="грузовые перевозки, информационная система грузоперевозок, компании грузоперевозок, онлайн грузоперевозки, онлайн-сервис грузоперевозок, сайт грузоперевозок, сайт перевозки грузов">
    <meta name="description" content="Грузоперевозки в Киеве, организация грузовых перевозок с помощью информационной системы Везём Всё. Каталог компаний">
    <meta name="author" content="Dmytro Sheiko">    
    <link rel="shortcut icon" href="assets/styles/images/favicon.ico">
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
	<meta itemprop="telephone" content="+38-095-029-29-03" />
	<title>Доставка груза по Украине. Стоимость доставки груза - онлайн-аукцион сайт грузоперевозок по Украине «Везём Всё»</title>
	<link type="text/css" rel="stylesheet" href="listing/assets/main.css" media="screen" />
	<link type="text/css" rel="stylesheet" href="assets/cache/201722/home_v42017222331.min.css" media="screen" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>
<body style="background:#f9f8f3">
	<div style="min-height:calc(100% - 54px); position:relative; padding: 130px 0 40px 0">	
    <header class="layout__header _fixed">
      <div class="layout__drawer-button x-drawer-button"></div>
      <div class="layout__header-row _viewport_mobile">
        <div class="layout__title">
          <img class="layout__logo" src="assets/images/home_v4/logo-mobile.png" alt="Везет Всем — онлайн-сервис грузоперевозок" />
        </div>
      </div>
      <div class="layout__header-row _viewport_desktop">
        <div class="header">

            
          <div class="header__content">
            <div class="header__item header__title">
              <a href="/">
                <img class="header__title-logo" src="assets/images/home_v4/logo-white.png" alt="Сайт грузоперевозок «Везет Всем»">
                <img class="header__title-logo _blue" src="assets/images/home_v4/logo-blue.png" alt="Сайт грузоперевозок «Везет Всем»">
              </a>
              <a class="header__title-link" href="#">Онлайн-сервис перевозок</a>
            </div>
            <div class="header__support header__item">
              <span class="header__support-link contact x-open-support-box">Служба поддержки</span><br>
              <a class="header__support-phone" href="tel:0950292903">0 (095) 029-29-03</a><br/>
              Работаем круглосуточно
            </div>
            <div class="header__categories-button" style="display:none">
                <svg class="header__categories-button-burger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 30"><path d="M0 0h36v6H0zM0 12h36v6H0zM0 24h36v6H0z"/></svg>
                <svg class="header__categories-button-cross" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="29.688" height="29.688" viewBox="0 0 29.688 29.688"><path d="M29.693 25.45l-4.243 4.243-10.606-10.607L4.237 29.693-.005 25.45 10.6 14.844-.004 4.237l4.24-4.242L14.846 10.6 25.45-.004l4.243 4.242-10.606 10.607L29.693 25.45z"/></svg>
            </div>
          </div>
        </div>
      </div>
    </header>
	<table id="listing_table" style="font-weight: 700; color: #444">
		<tr>
			<th style="width:100px">Дата</th>
			<th style="width:120px">Откуда</th>
			<th style="width:120px">Куда</th>
			<th>Груз</th>
			<th style="text-align:right">Вес</th>
			<th style="text-align:right">Объём</th>
			<th style="width:100px; text-align:right">Ставок</th>
			<th style="width:170px">Оплата</th>
		</tr>
		<?php
		require("util/connectDB.php");
		global $con;
		$freight_query = mysqli_query($con, "SELECT title, address_from, address_to, weight, volume, price, time FROM freight") or die (mysqli_error($con));
		while ($freight_result = mysqli_fetch_assoc($freight_query)){?>
			<tr>
				<td>
					<?php echo date('j.m',strtotime($freight_result["time"])) ?>
				</td>
				<td>
					<?php echo $freight_result["address_from"] ?>
				</td>
				<td>
					<?php echo $freight_result["address_to"] ?>
				</td>
				<td>
					<?php echo $freight_result["title"] ?>
				</td>
				<td style="text-align:right">
					<?php echo empty($freight_result["weight"]) ? "—" : $freight_result["weight"] ?>
				</td>
				<td style="text-align:right">
					<?php echo empty($freight_result["volume"]) ? "—" : $freight_result["volume"] ?>
				</td>
				<td style="text-align:right">
					<?php echo 0 ?>
				</td>
				<td>
					<?php echo empty($freight_result["price"]) ? "—" : $freight_result["price"] ?>
				</td>
			</tr>
		<?php
		}	
		?>
	</table>
	</div>
</body>
<footer>
	<article class="footer">
		<div class="vv-container">
			<div class="footer__copyright">
				© 2017 Все права на&nbsp;<a class="footer__copyright-link" href="index.html">сайт грузоперевозок «vezemvse.com.ua»</a> принадлежат ООО&nbsp;«Везём Всё»
			</div>
		</div>
	</article>
</footer>
</html>