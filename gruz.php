<?php
	require("util/connectDB.php");
	global $con;
								
	if (ISSET($_GET["id"])){
		$id = $_GET["id"];
	} else {
		$id = str_replace("/gruz/", "", $_SERVER['REQUEST_URI']);
	}
				
	$freight_query = mysqli_query($con, "SELECT freight_id, title, address_from, area_from, address_to, area_to, distance, weight, volume, price, time FROM freight WHERE freight_id='$id'") or die ("Груз не найден.");
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
							<a style="font-weight:400; padding-bottom:12px" class="_button prdelajit_cenu_255 x-make-proposal-button" href="#" data-intro="Предложите свою цену на перевозку с помощью оранжевой кнопки" data-step="1">
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
															<p style="color:#333"><b class="name" style="color:#333; font-weight:500">Дата перевозки:</b> <span class="date" style="margin-left:3px; font-weight:normal"> с 07.12 по 07.12</span></p>
															<p style="color:#333"><b class="name" style="color:#333; font-weight:500">Общий объем:</b> <span class="date" style="margin-left:3px; font-weight:normal"> 1.38 м3</span></p>
															<p style="color:#333"><b class="name" style="color:#333; font-weight:500">Общий вес:</b> <span class="date" style="margin-left:3px; font-weight:normal"> 110 кг</span></p>
														</div>
														<div class="row sposob_oplati" style="margin-top:10px; border:none; color:#333; font-weight:normal">
															<b style="color:#333; font-weight:500">Комментарий заказчика:</b>
															<p style="margin-top:4px"></p>
															Коробки: 11шт;												Сумки с личными вещами: 2шт;						
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
										<div class="big distance_mobile"><span class="title">Расстояние:</span> 18 км</div>
									</div>
								</div>
								<div class="wr_map no_phone">
									<div class="top_button">
										<p class="blue_bg_button inline_block">
											Расстояние: <span id="distance">18 км</span>
										</p>
										<a href="https://yandex.ru/maps/?rtext=55.655371%2C37.582134%7E55.710844%2C37.753371&amp;rtt=auto" class="map__static-route pull-right" target="_blank">показать маршрут</a>
									</div>
									<div class="map column column-ipad" id="map" style="height: 375px;">
									</div>
								</div>
							</div>
							<div class="breaker"></div>
						</div>
						<div class="wr_predlojenie x-detail-suggestions x-detail-realtime-suggestions ">
							<div class="subsidiary-block">
								<div class="subsidiary-block__left">
									<div class="blue_bg_button2 show_predl">
										<p style="border-bottom:none; text-shadow:none">Ценовые предложения: <span class="x-suggestions-count">4</span></p>
									</div>
								</div>
								<div class="subsidiary-block__right"></div>
							</div>
							<div class="table_details x-detail-price-list" id="x-detail-price-list">
								<div class="x-suggestions-list">
									<div class="detail-suggestions-header">
										<div class="detail-main__block-alpha">Перевозчик / Цена</div>
										<div class="detail-main__block-date">Статус / Сроки</div>
										<div class="detail-main__block-controls"></div>
									</div>
									<div class="row_all x-suggestion  suggestion" data-orderid="414419" data-id="2351372" id="suggestion-2351372">
										<div class="not-prepay-booking x-accept-suggestion-dialog" data-remodal-id="booking">
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
										</div>
										<section class="x-suggestion-title x-suggestion-main detail-main detail-main--performed x-tip-merchant-second">
											<div class="detail-main__top">
												<div class="detail-main__block-alpha">
													<div class="detail-main__name-wrapper">
														<a class="detail-main__name x-notoggle" href="https://www.vezetvsem.ru/profile?id=410943" target="_blank">Warranty</a>
														<div class="detail-main__date-order">07.12.2016 / 03:00</div>
													</div>
												</div>
												<div class="detail-main__block-date">
													<div class="detail-main__icons"></div>
													<span class="detail-main__status">
													Торги завершены							</span>
												</div>
												<div class="detail-main__block-controls"></div>
											</div>
											<div class="detail-main__bottom">
												<div class="detail-main__block-alpha">
													<div class="detail-main__price-wrapper">
														<input type="hidden" class="x-bid" value="2960">
														<div class="detail-main__price">2 960 <span class="detail-main__rub">₴</span></div>
													</div>
												</div>
												<div class="detail-main__block-date">
													<div class="detail-main__date">
														07.12.2016 —
														07.12.2016  							
													</div>
													<div class="detail-main__date detail-main__date--hint">срок перевозки: от 1 до 2 часов</div>
												</div>
												<div class="detail-main__block-controls" style="width: 650px">
													<div class="vv-button vv-button--green detail-main__watch x-sugg-detail-button" style="width:280px; float:right">
													</div>
												</div>
											</div>
										</section>
										<div class="opened_row x-suggestion-body x-tip-merchant-third hide" style="display: none;">
											<div class="right">
												<div class="info_perevozchik">
													<p class="gl-title">Информация о перевозчике</p>
													<div class="in_pervozchik">
														<span class="wr_border d_none-1024 hidden-tablet hidden-phone">
														<span class="img">
														<img alt="" src="/assets/styles/images/v3/perevozchik.svg">
														</span>
														</span>
														<span class="info x-tip-suggestion-i0">
															<b>Тип компании:</b> Частное лицо<br>
															<b>Перевозчик:</b>
															<div class="tail_wr info-tailWr">
																<a class="infoUsername" href="https://www.vezetvsem.ru/profile?id=410943" target="_blank">Warranty</a>
																<span class="tail info-tailUsername">
																Warranty  </span>
															</div>
															<br>
															<b>Время на сайте:</b> 10 месяцев 19 дней <br>
															<b>Реализованных перевозок:</b> 13<a href="https://www.vezetvsem.ru/profile?id=410943" target="_blank"><span class="per_gr no_phone" title="Количество положительных отзывов">9</span></a>
															<a href="https://www.vezetvsem.ru/profile?id=410943" target="_blank"><span class="per_red no_phone" title="Количество негативных отзывов">0</span></a><br>
															<a href="https://www.vezetvsem.ru/profile?id=410943" target="_blank">Посмотреть профиль</a>
														</span>
														<div class="rate_col">
															<div class="wr_border">
																<div class="ureven_nad">
																	<p class="title">Уровень надежности
																		<span class="tail_wr"><img alt="" src="/assets/styles/images/v3/otkloneno.svg" class="otkloneno-img">
																		<span class="tail"><b>Уровень надежности перевозчика</b> — процентная
																		шкала, складывающаяся из нескольких составляющих.
																		Чем выше уровень надежности, тем больше доверия к
																		перевозчику.
																		</span>
																		</span>
																	</p>
																	<span class="ureven ur-95"></span>
																</div>
															</div>
															<div class="wr_border">
																<div class="raeting_wr">
																	<p class="title">Рейтинг
																		<span class="tail_wr"><img alt="" src="/assets/styles/images/v3/otkloneno.svg" class="otkloneno-img">
																		<span class="tail tail150"><b>Рейтинг перевозчика</b> — складывается из истории
																		сделок перевозчика и отзывов заказчиков об его услугах.
																		</span>
																		</span>
																	</p>
																	<span class="rating stars2"></span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="information">
													<p class="title">Транспорт для перевозки</p>
													<div class="in">
														<span class="wr_border hidden-phone">
														<span class="img">
														<a href="https://img.vezetvsem.ru/transport/410943/tf8416ced.jpg" class="fancybox">
														<img alt="" src="//img.vezetvsem.ru/transport/410943/tf8416ced_75.jpg">
														</a>
														</span>
														</span>
														<span class="car_info">
															Транспорт: Ford Transit 2.2 TDCi (85Hp) 2011 г<br>
															<p>Грузоподъемность: 1 т<br>
																Объем: 6.8 м<sup><small>3</small></sup>
															</p>
															<p>Способы погрузки: Боковая, Задняя</p>
															<a href="https://www.vezetvsem.ru/profile?id=410943" target="_blank">Смотреть подробнее</a>
														</span>
														<div class="breaker"></div>
													</div>
												</div>
											</div>
											<div class="left">
												<section class="detail-info">
													<div class="detail-info__title">Информация о предложении</div>
													<div class="detail-info__block">
														<div class="detail-info__block-title">Сроки исполнения:</div>
														<div class="detail-info__block-content detail-info__block-content--dates">
															<div>Погрузка возможна с 07.12.2016по 07.12.2016</div>
															<div class="detail-info__hint">Перевозка займёт от 1 до 2 часов</div>
														</div>
													</div>
													<div class="detail-info__block">
														<div class="detail-info__block-title">Как происходит оплата:</div>
														<div class="detail-info__block-content detail-info__block-content--payment">
															<div>
																<div><a href="/avance#p1">Аванс</a> для бронирования 560 ₴ — <a href="/avance#p6">способы оплаты</a></div>
																<div>
																	2 400 ₴ — на выгрузке
																</div>
															</div>
															<div class="detail-info__hint detail-info__hint--payment">Способы оплаты: Наличный расчет</div>
														</div>
													</div>
													<div class="detail-info__block">
														<div class="detail-info__block-title">Что входит в стоимость:</div>
														<div class="detail-info__block-content">
															2 грузчика									
														</div>
													</div>
												</section>
												<section class="chat x-suggestion-chat">
													<div class="chat__content">
														<header class="chat__header">
															<span class="chat__header-info">Переписка с перевозчиком Warranty</span>
														</header>
														<div class="chat__list x-chat-list">
															<div class="chat-message chat-message--carrier">
																<span class="chat-message__time">07.12 в 03:06</span>
																<div class="chat-message__name">
																	<span class="chat-message__nickname">Warranty</span>
																	<span> (перевозчик):</span>
																</div>
																<span class="chat-message__text">Не волнуйтесь , погрузим и разгрузим куда скажете. Есть одно место для сопровождающего.</span>
															</div>
															<div class="chat-message chat-message--merchant">
																<span class="chat-message__time">07.12 в 03:04</span>
																<div class="chat-message__name">
																	Ксения  (заказчик):
																</div>
																<span class="chat-message__text">Здравствуйте.
																Хочу уточнить несколько моментов.
																Разгрузка,погрузка интересует из балкона одной квартиры на балкон другой(это я уточняю,потому что некоторые только до входной двери.
																И еще момент,будет ли одно пассажирское место,так как принять груз будет некому.</span>
															</div>
															<div class="chat-message chat-message--carrier">
																<span class="chat-message__time">07.12 в 03:00</span>
																<div class="chat-message__name">
																	<span class="chat-message__nickname">Warranty</span>
																	<span> (перевозчик):</span>
																</div>
																<span class="chat-message__text">Здравствуйте, могу 7 декабря помочь перевезти вещи примерно в 21-00. Аккуратно вдвоём погрузим - разгрузим . Если интересно предложение , можете заказывать. Без ограничений по времени и доплат. Чистый и сухой кузов.</span>
															</div>
														</div>
														<div class="x-chat-wrapper">
															<div class="chat__warning">Заказ не активен. Переписка закрыта</div>
														</div>
													</div>
												</section>
											</div>
											<div class="right">
												<div class="documents">
													<p class="title">документы
														<span class="tail_wr"><img alt="" src="../../assets/styles/images/v3/otkloneno.svg" class="otkloneno-img">
														<span class="tail"><b>документы</b> — загруженные перевозчиком и
														проверенные модераторами сервиса документы.
														</span>
														</span>
													</p>
													<div class="in_documents">
														<div class="row_1">
															<img alt="Агентский договор" src="../../assets/styles/images/new_detail/document_img.png">
															<span class="inf">
															Агентский договор </span>
														</div>
														<div class="row_1">
															<img alt="Паспорт (первая страница)" src="../../assets/styles/images/new_detail/document_img.png">
															<span class="inf">
															Паспорт (первая страница) </span>
														</div>
														<div class="row_1">
															<img alt="Водительское удостоверение" src="../../assets/styles/images/new_detail/document_img.png">
															<span class="inf">
															Водительское удостоверение </span>
														</div>
														<div class="row_1">
															<img alt="Паспорт (прописка)" src="../../assets/styles/images/new_detail/document_img.png">
															<span class="inf">
															Паспорт (прописка) </span>
														</div>
														<div class="row_1">
															<img alt="ИНН" src="../../assets/styles/images/new_detail/document_img.png">
															<span class="inf">
															ИНН </span>
														</div>
													</div>
												</div>
											</div>
											<div class="left">
												<div class="review documents x-feedbacks" data-user_id="410943" data-offset="0">
													<div class="title">
														<span class="hidden-phone">Отзывы заказчиков о</span>
														<span class="visible-phone">Заказчики о</span> <a href="https://www.vezetvsem.ru/profile?id=410943">Warranty</a>
														<div class="page"> <span class="prev x-prev"></span> <span class="next x-next"></span> </div>
														<div class="breaker"></div>
													</div>
													<div class="in ">
														<p>
															<i>«<span class="x-content">Спасибо Сергею. Приехали во время. Диван упаковали, погрузили, доставили по месту назначения. Бонусом ещё и собрали. Всё четко, аккуратно. Рекомендую всем, смело обращайтесь.</span>»</i>
														</p>
													</div>
												</div>
												<div class="review documents">
													<p class="title">Информация о компании</p>
													<div class="in">
														<p>
															Перевозчик не предоставил дополнительной информации о себе или о компании
														</p>
													</div>
												</div>
											</div>
											<div class="breaker"></div>
										</div>
									</div>
									<div class="row_all x-suggestion x-hidden suggestion" data-orderid="414419" data-id="2351367" id="suggestion-2351367" style="display: block;">
										<div class="not-prepay-booking x-accept-suggestion-dialog" data-remodal-id="booking">
											<button data-remodal-action="close" class="remodal-close"></button>
											<form class="x-accept-sugg-form" action="https://www.vezetvsem.ru/suggestion/approveSuggest" method="POST">
												<p class="remodal-header">
													Вы выбрали перевозчика
													<a target="_blank" href="https://www.vezetvsem.ru/profile?id=106337">Dreammeker</a>
												</p>
												<p class="remodal-p">
													Укажите ваш телефон, чтобы перевозчик смог с вами связаться
												</p>
												<p class="remodal-p">
													<input id="x-phone-accept" placeholder="+79998885555" type="text" class="input input_1 remodal-phone-input" name="phone">
													<input class="accept_suggestion_id" name="suggestion_id" value="2351367" type="hidden">
												</p>
												<br>
												<button data-remodal-action="cancel" class="remodal-cancel">Закрыть</button>
												<button type="submit" class="remodal-confirm">Продолжить</button>
											</form>
										</div>
										<section class=" x-suggestion-title x-suggestion-main detail-main detail-main--declined x-tip-merchant-second  ">
											<div class="detail-main__top">
												<div class="detail-main__block-alpha">
													<div class="detail-main__name-wrapper">
														<a class="detail-main__name x-notoggle" href="https://www.vezetvsem.ru/profile?id=106337" target="_blank">Dreammeker</a>
														<div class="detail-main__date-order">07.12.2016 / 02:20</div>
													</div>
												</div>
												<div class="detail-main__block-date">
													<div class="detail-main__icons">
														<span title="«Везёт Всем» рекомендует" class="vv-icon vv-icon--pro">
															<svg xmlns="http://www.w3.org/2000/svg" width="36" height="18" viewBox="0 0 36 18">
																<rect fill="#30c161" width="36" height="18" rx="9" ry="9"></rect>
																<path fill="#fff" d="M9.627 9.294v2.373H8.4v-6.4h2.7a2.93 2.93 0 0 1 1.883.56 1.8 1.8 0 0 1 .7 1.478A1.74 1.74 0 0 1 13 8.77a3.08 3.08 0 0 1-1.912.524zm0-.9H11.1a1.556 1.556 0 0 0 1-.28.976.976 0 0 0 .345-.805 1.052 1.052 0 0 0-.35-.83 1.434 1.434 0 0 0-.962-.32H9.627zm8.227.812h-1.37v2.46h-1.23v-6.4h2.488a3.11 3.11 0 0 1 1.89.5A1.686 1.686 0 0 1 20.3 7.2a1.68 1.68 0 0 1-.343 1.076 2.166 2.166 0 0 1-.957.67l1.59 2.663v.056h-1.317zm-1.37-.9h1.263a1.507 1.507 0 0 0 .972-.283.946.946 0 0 0 .35-.776 1 1 0 0 0-.325-.8 1.465 1.465 0 0 0-.964-.29h-1.3zm11.123.33a3.6 3.6 0 0 1-.36 1.65 2.55 2.55 0 0 1-1.026 1.09 3.292 3.292 0 0 1-3.07 0 2.59 2.59 0 0 1-1.04-1.085 3.5 3.5 0 0 1-.37-1.62v-.36a3.57 3.57 0 0 1 .367-1.65 2.584 2.584 0 0 1 1.035-1.1 3.3 3.3 0 0 1 3.066 0 2.544 2.544 0 0 1 1.032 1.08 3.56 3.56 0 0 1 .37 1.64zM26.38 8.3a2.59 2.59 0 0 0-.446-1.63 1.67 1.67 0 0 0-2.507 0 2.552 2.552 0 0 0-.46 1.6v.37a2.575 2.575 0 0 0 .455 1.63 1.517 1.517 0 0 0 1.26.575 1.5 1.5 0 0 0 1.257-.562 2.623 2.623 0 0 0 .44-1.644z"></path>
															</svg>
														</span>
													</div>
													<span class="detail-main__status">
													Отклонен							</span>
												</div>
												<div class="detail-main__block-controls"></div>
											</div>
											<div class="detail-main__bottom">
												<div class="detail-main__block-alpha">
													<div class="detail-main__price-wrapper">
														<input type="hidden" class="x-bid" value="3020">
														<div class="detail-main__price">3 020 <span class="detail-main__rub">₴</span></div>
													</div>
												</div>
												<div class="detail-main__block-date">
													<div class="detail-main__date">
														Погрузка: Открытая дата
													</div>
													<div class="detail-main__date detail-main__date--hint">срок перевозки: от 1 до 3 часов</div>
												</div>
												<div class="detail-main__block-controls" style="width: 650px">
													<div class="vv-button vv-button--green detail-main__watch x-sugg-detail-button" style="width:280px; float:right">
													</div>
												</div>
											</div>
										</section>
									</div>								
								</div>
							</div>
						</div>
						<div class="x-ineedhelp-blacker ineedhelp__modal-blacker"></div>
						<div class="ineedhelp__modal-success x-ineedhelp-success">
							<p class="ineedhelp__modal-success-title">Ваше обращение отправлено в&nbsp;службу поддержки.</p>
							<p class="ineedhelp__modal-success-text">В&nbsp;ближайшее время наши специалисты свяжутся с&nbsp;вами!</p>
							<div class="ineedhelp__blue-button ineedhelp__modal-success-ok x-ineedhelp-success-ok">Ок</div>
						</div>						
					</div>
				</div>
				<div id="x-modal-chat-warning" class="modal fade hidden" role="dialog" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Почему на «Везёт Всем» запрещен обмен контактными данными в переписке</h3>
					</div>
					<div class="modal-body modal-text">
						<p>
							«Везёт Всем» - в первую очередь сервис, а не простая доска объявлений. Мы полностью проводим вашу перевозку от начала и до конца, подбираем лучшие цены от надежных перевозчиков и <a target="_blank" href="https://www.vezetvsem.ru/avance">несем ответственность</a> за все условия сделки, согласованные на сервисе.
							Напоминаем вам, что если вы решите работать с исполнителем напрямую, минуя услуги «Везёт Всем», то сервис полностью снимает с себя все обязательства и не гарантирует, что стоимость перевозки не изменится в последний момент.
						</p>
						<p>Все интересующие вас детали вы можете уточнить в переписке. Если вы согласны осуществить свой заказ с одним из перевозчиков, нажмите зеленую кнопку «заказать транспорт» в подробностях его ценового предложения и следуйте дальнейшим инструкциям.</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</button>
					</div>
				</div>
			</section>
		</div>
		<script>
		var map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -34.397, lng: 150.644},
				zoom: 8
			});
		}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCncHq_o9gZVaJDpnuOdq7hVwJo6-7Nc7I&callback=initMap&language=ru&region=UA" async defer></script>
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