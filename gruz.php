<?php
	require("util/connectDB.php");
	global $con;
								
	if (ISSET($_GET["id"])){
		$id = $_GET["id"];
	} else {
		$id = str_replace("/gruz/", "", $_SERVER['REQUEST_URI']);
	}
				
	$freight_query = mysqli_query($con, "SELECT freight_id, title, address_from, area_from, address_to, area_to, distance, weight, volume, price, time, start_time, end_time, volume, weight, description FROM freight WHERE freight_id='$id'") or die ("Груз не найден.");
	$freight_result = mysqli_fetch_assoc($freight_query);
	?>
<html>
	<head>
		<meta charset="utf-8">
		<meta lang="ru">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="googlebot"content="noarchive">
		<meta name="keywords" content="грузовые перевозки, информационная система грузоперевозок, компании грузоперевозок, онлайн грузоперевозки, онлайн-сервис грузоперевозок, сайт грузоперевозок, сайт перевозки грузов">
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
		<link type="text/css" rel="stylesheet" href="/assets/cache/201736/common2017362446.min.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="/assets/styles/gruz/bid_form_productionru20173142467.min.css" media="screen" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link type="text/css" rel="stylesheet" href="/assets/cache/201736/detail2017362446.min.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:700,500,400,300&amp;subset=latin,cyrillic" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,500,400,300&amp;subset=latin,cyrillic" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:700,500,400,300&amp;subset=latin,cyrillic" media="screen" />
	</head>
	<body style="background:#f9f8f3">
		<div style="min-height:calc(100% + 70px); position:relative; padding: 130px 0 40px 0">
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
								<svg class="header__categories-button-burger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 30">
									<path d="M0 0h36v6H0zM0 12h36v6H0zM0 24h36v6H0z"/>
								</svg>
								<svg class="header__categories-button-cross" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="29.688" height="29.688" viewBox="0 0 29.688 29.688">
									<path d="M29.693 25.45l-4.243 4.243-10.606-10.607L4.237 29.693-.005 25.45 10.6 14.844-.004 4.237l4.24-4.242L14.846 10.6 25.45-.004l4.243 4.242-10.606 10.607L29.693 25.45z"/>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</header>
			<section id="content">
				<div data-cat-name="moving" data-id="414419" data-name="Переезд" data-distance="18" data-subcat-name="office" class="vv-container vv-container--no-padding x-detail">
					<input type="hidden" id="order_id" value="414419">
					<input type="hidden" id="order_categories" value="[" 2","2"]"="">
					<input type="hidden" id="order_subcategories" value="[" 202","201"]"="">
					<input type="hidden" id="order_distance" value="18">
					<input type="hidden" id="order_deviation" value="50">
					<input type="hidden" id="show_suggested_orders" value="0">
					<input type="hidden" id="logged_user_id" value="806077">
					<div id="x-order-questions-block"></div>
					<div class="new_detalizacia" id="order-info">
						<div id="x-order-title-info" class="wr_prod_info x-tip-additional-offset">
							<div class="prod_info inline_block" style="padding-left:0px">
								<p class="proposal"></p>
								<h1 style="font-size:28px; font-family:'Roboto',Helvetica,Arial, sans-serif; color:#333; font-weight: 400"><?php echo $freight_result["title"] ?></h1>
								<p></p>
								<div class="breaker"></div>
								<p class="date" style="margin-top:15px">
									<span class="date">№ <?php echo $freight_result["freight_id"] ?></span>
								</p>
								<p class="torg_green">Заказ выполнен</p>
							</div>
						</div>
						<div class="det_button">
							<a style="font-weight:400; padding-bottom:12px" class="_button prdelajit_cenu_255 x-make-proposal-button" href="#bid" data-intro="Предложите свою цену на перевозку с помощью оранжевой кнопки" data-step="1">
							Предложить свою цену
							</a>
						</div>
						<div class="breaker"></div>
						<div class="x-tip-merchant-main">
							<div class="oh for_hight  x-description">
								<div id="x-cargo-list-info">
									<div class="wr_zruz_info-col single-colum">
										<div class="wr_zruz_info">
											<div class="col">
												<div class="info_edit">
													<p class="blue_bg_button">Информация о грузе</p>
													<span id="x-edit-cargo-button">
													</span>
												</div>
												<div class="in_col column column-1024" style="height:375px; overflow-x:hidden; padding:12px 20px; background:#d5ecf7">
													<div class="wr_row" style="font-family: 'Roboto', Helvetica, Arial, sans-serif">
														<div class="row row_top" style="padding-bottom:20px;">
															<p><b class="name"> </b></p>
															<p style="color:#333"><b class="name" style="color:#333; font-weight:500">Дата перевозки:</b> <span class="date" style="margin-left:3px; font-weight:normal">
																с 
																<?php
																	if (!empty($freight_result["start_time"])){
																		$date = new DateTime("@".$freight_result["start_time"]); echo $date->format('d.m');
																	}
																	?>
																по 
																<?php
																	if (!empty($freight_result["end_time"])){
																		$date = new DateTime("@".$freight_result["end_time"]); echo $date->format('d.m');
																	}
																	?>
																</span>
															</p>
															<p style="color:#333"><b class="name" style="color:#333; font-weight:500">Общий объем:</b> <span class="date" style="margin-left:3px; font-weight:normal"><?php echo $freight_result["volume"] ?></span></p>
															<p style="color:#333"><b class="name" style="color:#333; font-weight:500">Общий вес:</b> <span class="date" style="margin-left:3px; font-weight:normal"><?php echo $freight_result["weight"] ?></span></p>
														</div>
														<div class="row sposob_oplati" style="margin-top:10px; border:none; color:#333; font-weight:normal">
															<b style="color:#333; font-weight:500">Комментарий заказчика:</b>
															<p style="margin-top:4px"></p>
															<?php echo $freight_result["description"] ?>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="edit_info">
									<div class="top_button">
										<p class="blue_bg_button no_phone inline_block">Погрузка / Выгрузка</p>
										<span id="x-edit-route-button">
										</span>
									</div>
									<div class="info column column-ipad column-1024" id="editmap" style="height:375px; padding:20px 10px; color:#333; background:#d5ecf7">
										<div class="top_dot">
											<div class="big">
												<h2 class="otkuda">
													<span class="title" style="font-family: 'Roboto', Helvetica, Arial, sans-serif; font-weight:500">Погрузка:</span><br>
													<p style="font-family: 'Roboto', Helvetica, Arial, sans-serif; margin-top:4px"><?php echo $freight_result["area_from"] ?></p>
													<p style="font-family: 'Roboto', Helvetica, Arial, sans-serif; margin-top:1px"><?php echo $freight_result["address_from"] ?></p>
												</h2>
											</div>
										</div>
										<div class="top_dot" style="margin-top:20px">
											<div class="big">
												<h2 class="kuda">
													<span class="title" style="font-family: 'Roboto', Helvetica, Arial, sans-serif; font-weight:500">Выгрузка:</span><br>
													<p style="font-family: 'Roboto', Helvetica, Arial, sans-serif; margin-top:4px"><?php echo $freight_result["area_to"] ?></p>
													<p style="font-family: 'Roboto', Helvetica, Arial, sans-serif; margin-top:1px"><?php echo $freight_result["address_to"] ?></p>
												</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="wr_map no_phone">
									<div class="top_button">
										<p class="blue_bg_button inline_block">
											Расстояние: <span id="distance"></span>
										</p>
										<a href="https://maps.google.com?saddr=<?php echo urlencode($freight_result["area_from"].", ".$freight_result["address_from"]) ?>&daddr=<?php echo urlencode($freight_result["area_to"].", ".$freight_result["address_to"]) ?>&hl=ru" class="map__static-route pull-right" target="_blank">показать маршрут</a>
									</div>
									<div class="map column column-ipad" id="map" style="height: 375px;">
									</div>
								</div>
							</div>
							<div class="breaker"></div>
						</div>
						<div class="wr_predlojenie x-detail-suggestions x-detail-realtime-suggestions ">
							<?php $offers_query = mysqli_query($con, "SELECT offer_id, user_id, price, message, status, time FROM offer ORDER BY status ASC, time DESC") or die(mysqli_error($con)); ?>
							<div class="subsidiary-block">
								<div class="subsidiary-block__left">
									<div class="blue_bg_button2 show_predl">
										<p style="border-bottom:none; text-shadow:none">Ценовые предложения: <span class="x-suggestions-count"><?php echo mysqli_num_rows($offers_query) ?></span></p>
									</div>
								</div>
								<div class="subsidiary-block__right"></div>
							</div>
							<div class="table_details x-detail-price-list" id="x-detail-price-list">
								<div class="x-suggestions-list">
									<div class="detail-suggestions-header">
										<div class="detail-main__block-alpha">Перевозчик / Цена</div>
										<div class="detail-main__block-date">Статус / Сообщение</div>
										<div class="detail-main__block-controls"></div>
									</div>
									<?php
										while ($offers_result = mysqli_fetch_assoc($offers_query)){ ?>
									<div class="row_all x-suggestion x-hidden suggestion" data-orderid="414419" data-id="2351367" id="suggestion-2351367" style="display: block;">
										<!-- detail-main--declined detail-main--performed или удалить -->
										<section class=" x-suggestion-title x-suggestion-main detail-main <?php echo $offers_result["status"] == 2 ? "detail-main--declined" : ($offers_result["status"] == 1 ? "" : "detail-main--performed")?> x-tip-merchant-second  ">
											<div class="detail-main__top">
												<div class="detail-main__block-alpha">
													<div class="detail-main__name-wrapper">
														<a class="detail-main__name x-notoggle" href="https://www.vezetvsem.ru/profile?id=106337" target="_blank">
														<?php
															// Get user from the database
															$user_id = $offers_result["user_id"];
															$user_query = mysqli_query($con, "SELECT name FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
															$user_result = mysqli_fetch_assoc($user_query);
															echo $user_result["name"];
															?>
														</a>
														<div class="detail-main__date-order">
															<?php echo date("d.m.Y / H:i", strtotime($offers_result["time"])) ?>
														</div>
													</div>
												</div>
												<div class="detail-main__block-date">
													<div class="detail-main__icons">
													</div>
													<span class="detail-main__status">
													<?php
														if ($offers_result["status"] == 2){
															echo "Отклонен";
														} else if ($offers_result["status"] == 1){
															echo "Ожидает ответа";		
														} else {
															echo "Торги завершены";											
														}
														
														?>
													</span>
												</div>
												<div class="detail-main__block-controls"></div>
											</div>
											<div class="detail-main__bottom">
												<div class="detail-main__block-alpha">
													<div class="detail-main__price-wrapper">
														<input type="hidden" class="x-bid" value="3020">
														<div class="detail-main__price"><?php echo number_format($offers_result["price"], 0, ',', ' ') ?> грн</div>
													</div>
												</div>
												<div class="detail-main__block-date" style="width:500px">
													<div class="detail-main__date" style="line-height: 1.5em">
														<?php echo nl2br($offers_result["message"]) ?>
													</div>
												</div>
												<div class="detail-main__block-controls" style="width: 650px;">
													<div class="vv-button vv-button--green detail-main__watch x-sugg-detail-button" style="width:280px; position:absolute; bottom:0; right:0; margin:30px">
													</div>
												</div>
											</div>
										</section>
									</div>
									<?php
										}				
										?>
								</div>
							</div>
						</div>
						<div id="bid" style="margin-top:100px">
							<div data-reactroot="" class="bf-bid-form" id="bf">
								<div class="bf-title">
									<div class="bf-title__text">
										Ваше предложение по&nbsp;заказу №&nbsp<?php echo $freight_result["freight_id"] ?>
									</div>
								</div>
								<section class="bf-bid-form__block bf-bid-form__block--required bf-bid-form__block--price bf-price" id="bf-price">
									<div class="bf-bid-form__block-hint"><span class="bf-bid-form__required">Обязательно к&nbsp;заполнению</span>
									</div>
									<div class="bf-bid-form__block-title bf-bid-form__required">Стоимость перевозки</div>
									<article class="bf-price__row">
										<div class="bf-price__col bf-price__col--bid">
											<div class="bf-price__el">
												<div class="Input Input--label-left">
													<input type="text" name="bid" value="" id="2" class="Input-control Input-control--left bf-price__price bf-price__price--fat">
													<!-- react-text: 15 -->
													<!-- /react-text -->
													<!-- react-text: 16 -->
													<!-- /react-text -->
												</div>
												<div class="SelectControl SelectControl--default SelectControl--top bf-price__currency-select" style="width:46px">
													<div class="Select bf-price__currency-select bf-price__currency-select--fat Select--single has-value" style="width:46px">
														<div class="Select-control">
															<span class="Select-multi-value-wrapper" id="react-select-2--value">
																<div class="Select-value" style="cursor:default"><span class="Select-value-label" role="option" aria-selected="true" id="react-select-2--value-item">грн</span>
																</div>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</article>
									<article class="bf-price__row">
										<div class="bf-price__col bf-price__col--manual"></div>
									</article>
								</section>
								<section class="bf-bid-form__block bf-bid-form__block--required bf-dates" id="bf-date">
									<div class="bf-bid-form__block-hint"><span class="bf-bid-form__required">Обязательно к&nbsp;заполнению</span>
									</div>
									<div class="bf-bid-form__block-title">Сроки исполнения</div>
									<!-- react-empty: 39 -->
									<div class="bf-datetime__content">
										<div class="bf-datetime__col bf-datetime__col--from">
											<div class="Datepicker Datepicker--labelleft bf-datetime__el">
												<div class="Datepicker-title -greyText"><span class="bf-datetime__point">Погрузка</span>
												</div>
												<div class="Datepicker-wrapper">
													<div class="Datepicker-input">
														<p class="-greyText">Выберите дату</p>
													</div>
													<div class="Datepicker-daypickerWrapper Datepicker-daypickerWrapper--bottom-right">
														<div class="DayPicker DayPicker--ru" role="application" tabindex="0">
															<div class="DayPicker-NavBar"><span role="button" class="DayPicker-NavButton DayPicker-NavButton--prev"></span><span role="button" class="DayPicker-NavButton DayPicker-NavButton--next"></span>
															</div>
															<div class="DayPicker-Month">
																<div class="DayPicker-Caption" role="heading">март 2017</div>
																<div class="DayPicker-Weekdays" role="rowgroup">
																	<div class="DayPicker-WeekdaysRow" role="columnheader">
																		<div class="DayPicker-Weekday"><abbr title="понедельник">пн</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="вторник">вт</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="среда">ср</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="четверг">чт</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="пятница">пт</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="суббота">сб</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="воскресенье">вс</abbr>
																		</div>
																	</div>
																</div>
																<div class="DayPicker-Body" role="grid">
																	<div class="DayPicker-Week" role="gridcell">
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--disabled"></div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--disabled"></div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="0" role="gridcell" aria-label="ср 1 мар. 2017 г." aria-disabled="true" aria-selected="false">1</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="чт 2 мар. 2017 г." aria-disabled="true" aria-selected="false">2</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пт 3 мар. 2017 г." aria-disabled="true" aria-selected="false">3</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 4 мар. 2017 г." aria-disabled="true" aria-selected="false">4</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 5 мар. 2017 г." aria-disabled="true" aria-selected="false">5</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пн 6 мар. 2017 г." aria-disabled="true" aria-selected="false">6</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="вт 7 мар. 2017 г." aria-disabled="true" aria-selected="false">7</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="ср 8 мар. 2017 г." aria-disabled="true" aria-selected="false">8</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="чт 9 мар. 2017 г." aria-disabled="true" aria-selected="false">9</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пт 10 мар. 2017 г." aria-disabled="true" aria-selected="false">10</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 11 мар. 2017 г." aria-disabled="true" aria-selected="false">11</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 12 мар. 2017 г." aria-disabled="true" aria-selected="false">12</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пн 13 мар. 2017 г." aria-disabled="true" aria-selected="false">13</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="вт 14 мар. 2017 г." aria-disabled="true" aria-selected="false">14</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="ср 15 мар. 2017 г." aria-disabled="true" aria-selected="false">15</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="чт 16 мар. 2017 г." aria-disabled="true" aria-selected="false">16</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пт 17 мар. 2017 г." aria-disabled="true" aria-selected="false">17</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 18 мар. 2017 г." aria-disabled="true" aria-selected="false">18</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 19 мар. 2017 г." aria-disabled="true" aria-selected="false">19</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пн 20 мар. 2017 г." aria-disabled="true" aria-selected="false">20</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="вт 21 мар. 2017 г." aria-disabled="true" aria-selected="false">21</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="ср 22 мар. 2017 г." aria-disabled="true" aria-selected="false">22</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="чт 23 мар. 2017 г." aria-disabled="true" aria-selected="false">23</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пт 24 мар. 2017 г." aria-disabled="true" aria-selected="false">24</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 25 мар. 2017 г." aria-disabled="true" aria-selected="false">25</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 26 мар. 2017 г." aria-disabled="true" aria-selected="false">26</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="пн 27 мар. 2017 г." aria-disabled="true" aria-selected="false">27</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="вт 28 мар. 2017 г." aria-disabled="true" aria-selected="false">28</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="ср 29 мар. 2017 г." aria-disabled="true" aria-selected="false">29</div>
																		<div class="DayPicker-Day DayPicker-Day--disabled" tabindex="-1" role="gridcell" aria-label="чт 30 мар. 2017 г." aria-disabled="true" aria-selected="false">30</div>
																		<div class="DayPicker-Day DayPicker-Day--today" tabindex="-1" role="gridcell" aria-label="пт 31 мар. 2017 г." aria-disabled="false" aria-selected="false">31</div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--sunday"></div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--sunday"></div>
																	</div>
																</div>
															</div>
															<div class="DayPicker-Month">
																<div class="DayPicker-Caption" role="heading">апрель 2017</div>
																<div class="DayPicker-Weekdays" role="rowgroup">
																	<div class="DayPicker-WeekdaysRow" role="columnheader">
																		<div class="DayPicker-Weekday"><abbr title="понедельник">пн</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="вторник">вт</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="среда">ср</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="четверг">чт</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="пятница">пт</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="суббота">сб</abbr>
																		</div>
																		<div class="DayPicker-Weekday"><abbr title="воскресенье">вс</abbr>
																		</div>
																	</div>
																</div>
																<div class="DayPicker-Body" role="grid">
																	<div class="DayPicker-Week" role="gridcell">
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--disabled"></div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--disabled"></div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--disabled"></div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--outside DayPicker-Day--disabled"></div>
																		<div role="gridcell" aria-disabled="true" class="DayPicker-Day DayPicker-Day--today DayPicker-Day--outside"></div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="0" role="gridcell" aria-label="сб 1 апр. 2017 г." aria-disabled="false" aria-selected="false">1</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 2 апр. 2017 г." aria-disabled="false" aria-selected="false">2</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пн 3 апр. 2017 г." aria-disabled="false" aria-selected="false">3</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="вт 4 апр. 2017 г." aria-disabled="false" aria-selected="false">4</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="ср 5 апр. 2017 г." aria-disabled="false" aria-selected="false">5</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="чт 6 апр. 2017 г." aria-disabled="false" aria-selected="false">6</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пт 7 апр. 2017 г." aria-disabled="false" aria-selected="false">7</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 8 апр. 2017 г." aria-disabled="false" aria-selected="false">8</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 9 апр. 2017 г." aria-disabled="false" aria-selected="false">9</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пн 10 апр. 2017 г." aria-disabled="false" aria-selected="false">10</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="вт 11 апр. 2017 г." aria-disabled="false" aria-selected="false">11</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="ср 12 апр. 2017 г." aria-disabled="false" aria-selected="false">12</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="чт 13 апр. 2017 г." aria-disabled="false" aria-selected="false">13</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пт 14 апр. 2017 г." aria-disabled="false" aria-selected="false">14</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 15 апр. 2017 г." aria-disabled="false" aria-selected="false">15</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 16 апр. 2017 г." aria-disabled="false" aria-selected="false">16</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пн 17 апр. 2017 г." aria-disabled="false" aria-selected="false">17</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="вт 18 апр. 2017 г." aria-disabled="false" aria-selected="false">18</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="ср 19 апр. 2017 г." aria-disabled="false" aria-selected="false">19</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="чт 20 апр. 2017 г." aria-disabled="false" aria-selected="false">20</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пт 21 апр. 2017 г." aria-disabled="false" aria-selected="false">21</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 22 апр. 2017 г." aria-disabled="false" aria-selected="false">22</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 23 апр. 2017 г." aria-disabled="false" aria-selected="false">23</div>
																	</div>
																	<div class="DayPicker-Week" role="gridcell">
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пн 24 апр. 2017 г." aria-disabled="false" aria-selected="false">24</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="вт 25 апр. 2017 г." aria-disabled="false" aria-selected="false">25</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="ср 26 апр. 2017 г." aria-disabled="false" aria-selected="false">26</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="чт 27 апр. 2017 г." aria-disabled="false" aria-selected="false">27</div>
																		<div class="DayPicker-Day" tabindex="-1" role="gridcell" aria-label="пт 28 апр. 2017 г." aria-disabled="false" aria-selected="false">28</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="сб 29 апр. 2017 г." aria-disabled="false" aria-selected="false">29</div>
																		<div class="DayPicker-Day DayPicker-Day--sunday" tabindex="-1" role="gridcell" aria-label="вс 30 апр. 2017 г." aria-disabled="false" aria-selected="false">30</div>
																	</div>
																</div>
															</div>
														</div>
														<i class="Datepicker-exit" title="Закрыть календарь">
															<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 9.88 9.876">
																<defs>
																	<style>.Datepicker-exitSvg{fill:#ccc;fill-rule:evenodd}</style>
																</defs>
																<path d="M9.89 8.473L8.474 9.887 4.94 6.352 1.403 9.887-.01 8.473l3.535-3.535L-.01 1.402 1.404-.012 4.94 3.524 8.474-.012 9.89 1.402 6.352 4.938 9.89 8.473z" class="Datepicker-exitSvg"></path>
															</svg>
														</i>
													</div>
												</div>
											</div>
										</div>
										<div class="bf-datetime__col bf-datetime__col--to">
											<div class="bf-datetime__el bf-datetime__wrapper-ship-time">
												<div class="Input Input--label-left bf-datetime__ship-from">
													<label class="Input-label Input-label--normal Input-label--grey" for="4">
														<span class="bf-bid-form__required">Перевозка займёт от</span>
														<!-- react-text: 177 -->
														<!-- /react-text -->
														<!-- react-text: 178 -->
														<!-- /react-text -->
													</label>
													<input type="text" value="" id="4" class="Input-control Input-control--left bf-datetime__ship-time">
													<!-- react-text: 180 -->
													<!-- /react-text -->
													<!-- react-text: 181 -->
													<!-- /react-text -->
												</div>
												<div class="Input Input--label-left bf-datetime__ship-to">
													<label class="Input-label Input-label--normal Input-label--grey" for="5">
														<!-- react-text: 184 -->до
														<!-- /react-text -->
														<!-- react-text: 185 -->
														<!-- /react-text -->
														<!-- react-text: 186 -->
														<!-- /react-text -->
													</label>
													<input type="text" value="" id="5" class="Input-control Input-control--left bf-datetime__ship-time">
													<!-- react-text: 188 -->
													<!-- /react-text -->
													<!-- react-text: 189 -->
													<!-- /react-text -->
												</div>
												<div class="RadioGroup bf-datetime__radio-group">
													<label class="Radio bf-datetime__ship-radio">
													<input type="radio" class="Radio-input" name="shipping_period_type" value=""><span class="Radio-box"></span><span class="Radio-label">часы</span>
													</label>
													<label class="Radio bf-datetime__ship-radio">
													<input type="radio" class="Radio-input" name="shipping_period_type" value="1"><span class="Radio-box"></span><span class="Radio-label">дни</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</section>
								<section class="bf-bid-form__block bf-bid-form__block--required bf-payment" id="bf-payment">
									<div class="bf-bid-form__block-hint"><span class="bf-bid-form__required">Обязательно к&nbsp;заполнению</span>
									</div>
									<div class="bf-bid-form__block-title bf-bid-form__required">Оплата</div>
									<!-- react-empty: 339 -->
									<div class="bf-payment__content">
										<div class="bf-payment__row">
											<label class="Checkbox Checkbox--standart bf-payment__el">
												<input type="checkbox" class="Checkbox-input" name="cash" value="false" label="Наличный расчет">
												<div class="Checkbox-box"></div>
												<span class="Checkbox-label">Наличный расчет</span>
											</label>
											<label class="Checkbox Checkbox--standart bf-payment__el">
												<input type="checkbox" class="Checkbox-input" name="card" value="false" label="На&nbsp;карту">
												<div class="Checkbox-box"></div>
												<span class="Checkbox-label">На&nbsp;карту</span>
											</label>
											<label class="Checkbox Checkbox--standart bf-payment__el">
												<input type="checkbox" class="Checkbox-input" name="transfer" value="false" label="Денежный перевод">
												<div class="Checkbox-box"></div>
												<span class="Checkbox-label">Денежный перевод</span>
											</label>
										</div>
									</div>
								</section>
								<section></section>
								<section class="bf-bid-form__block bf-bid-form__block bf-bid-form__block--message bf-comment">
									<div class="bf-bid-form__block-title">Сообщение заказчику</div>
									<div class="bf-comment__content">
										<div class="bf-comment__textarea Textarea">
											<textarea class="Textarea-textarea--resize-vertical Textarea-textarea" rows="3" placeholder="Это сообщение будет показано заказчику в чате, где Вы сможете вести с ним переговоры по деталям перевозки, оплаты и т.п."></textarea>
										</div>
										<div class="bf-comment__attention">
											<span style="padding-top:4px">
												<b>ОБРАТИТЕ ВНИМАНИЕ!</b> Согласно правилам переписки, обмениваться контактными данными до&nbsp;заключения сделки запрещено.
											</span>
										</div>
									</div>
								</section>
								<section class="bf-bid-form__controls bf-controls">
									<article class="bf-controls__block"  style="width:100%">
										<button class="Button Button-forest Button-text Button-s bf-controls__big-button"><span class="bf-controls__add-suggestion-content" >Добавить предложение</span>
										</button>
									</article>
								</section>
								<div class="SpinnerContainer"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVFLhJdzYyO3lSp-JUYITYBrWJ-Jy419I&callback=initMap&language=ru&region=UA" async defer></script>
		<script>
			var directionDisplay;
			var directionsService;
			var map;
			
			function initMap() {
				directionsService = new google.maps.DirectionsService()
				directionsDisplay = new google.maps.DirectionsRenderer();
				var chicago = new google.maps.LatLng(48.4122019, 30.5669957);
				var myOptions = {
					zoom: 5,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					center: chicago,
					disableDefaultUI: true
				}
				map = new google.maps.Map(document.getElementById("map"), myOptions);
				directionsDisplay.setMap(map);
				calcRoute();
			}
			
			function calcRoute() {
			
			  var request = {
				// from: Blackpool to: Preston to: Blackburn
				origin: "<?php echo $freight_result["area_from"].",".$freight_result["address_from"] ?>",
				destination: "<?php echo $freight_result["area_to"].",".$freight_result["address_to"] ?>",
				optimizeWaypoints: true,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			  };
			  directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
				  directionsDisplay.setDirections(response);
				  computeTotalDistance(response);
				}
			  });
			}
			
			function computeTotalDistance(result) {
			  var totalDist = 0;
			  var totalTime = 0;
			  var myroute = result.routes[0];
			  for (i = 0; i < myroute.legs.length; i++) {
				totalDist += myroute.legs[i].distance.value;
				totalTime += myroute.legs[i].duration.value;
			  }
			  totalDist = totalDist / 1000.
			  $("#distance").text(Math.round(totalDist) + " км");
			}
		</script>
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
<!--<div class="not-prepay-booking x-accept-suggestion-dialog" data-remodal-id="booking" style="display:block">
	<button data-remodal-action="close" class="remodal-close"></button>
	<form class="x-accept-sugg-form" action="https://www.vezetvsem.ru/suggestion/approveSuggest" method="POST">
		<p class="remodal-header">
			Вы выбрали перевозчика
			<a target="_blank" href="https://www.vezetvsem.ru/profile?id=410943">Warranty</a>
		</p>
		<p class="remodal-p">
			Укажите ваш телефон, чтобы перевозчик смог с вами связаться
		</p>
		<p class="remodal-p">
			<input id="x-phone-accept" placeholder="+79998885555" type="text" class="input input_1 remodal-phone-input" name="phone">
			<input class="accept_suggestion_id" name="suggestion_id" value="2351372" type="hidden">
		</p>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Закрыть</button>
		<button type="submit" class="remodal-confirm">Продолжить</button>
	</form>
	</div>-->