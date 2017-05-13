<?php
	session_start();
	$session_user_id = @$_SESSION['user_id'];
	
	require("util/connectDB.php");
	global $con;
								
	if (ISSET($_GET["id"])){
		$id = $_GET["id"];
	} else {
		$id = str_replace("/gruz/", "", $_SERVER['REQUEST_URI']);
	}
				
	$freight_query = mysqli_query($con, "SELECT freight_id, user_id, title, address_from, address_to, distance, weight, volume, price, posted_time, start_time, volume, weight, description, status FROM freight WHERE freight_id='$id'") or die ("Груз не найден."."<br><br>".mysqli_error($con));
	$freight_result = mysqli_fetch_assoc($freight_query);
	$freight_owner_id = $freight_result["user_id"];
	$freight_status = $freight_result["status"];
	
	// Retrieve freight owner
	$owner_query = mysqli_query($con, "SELECT name FROM user WHERE user_id='$freight_owner_id'") or die(mysqli_error($con));
	$owner_result = mysqli_fetch_assoc($owner_query);
	$owner_name = $owner_result["name"];
	
	// Check if user already submitted an offer
	$my_offer_query = mysqli_query($con, "SELECT offer_id FROM offer WHERE freight_id='$id' AND user_id='$session_user_id'");
	$already_have_offer = mysqli_fetch_assoc($my_offer_query) !== null;
	
	if ($session_user_id != null){
		// Get user type
		$session_user_query = mysqli_query($con, "SELECT type FROM user WHERE user_id='$session_user_id'");
		$session_user_result = mysqli_fetch_assoc($session_user_query);
		$type = $session_user_result["type"];
	}
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta lang="ru">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
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
		<link type="text/css" rel="stylesheet" href="assets/cache/201722/home_v42017222331.min.css" media="screen" />

		<style type="text/css" data-ymaps="css-modules">			
			#content_body {
				padding: 20px 0 40px 0;
			}

			@media (max-width: 767px) {
				#content_body {
					padding: 10px 0 10px 0;
				}
			}
			
			.gruz_mobile_padding {
				padding: 0;
			}

			@media (max-width: 767px) {
				.gruz_mobile_padding {
					padding: 0 15px;
				}
			}
			
			.gruz_info {
				padding:12px 25px !important;
				min-height:300px;
			}

			@media (max-width: 767px) {
				.gruz_info {
					padding:12px 15px !important;
					width: 100% !important;
					height:auto !important;
					min-height:0;
				}
			}
			@media (max-width: 767px) {
				.gruz_info_wrapper {
					width: 100% !important;
					padding-top: 5px !important;
				}
			}
			.gruz_address {
				padding:20px 10px !important;
				min-height:300px;
			}
			@media (max-width: 767px) {
				.gruz_address {
					padding:15px 0 7px 0 !important;
					height:auto !important;
					min-height:0;
				}
			}
			@media (max-width: 767px) {
				.gruz_address_wrapper {
					margin-left:0 !important;
					width: 100% !important;
					padding-top: 5px !important;
				}
			}
			.gruz_info, .gruz_address {
				border-radius:0 !important;
			}
			
			@media (max-width: 767px) {
				.gruz_map {
					width: 100% !important;
				}
			}
			
			#map {				
				min-height:300px;
			}			
			@media (max-width: 767px) {
				#map {
					min-height:180px;
				}
			}
			a[href^="http://maps.google.com/maps"],
			a[href^="https://maps.google.com/maps"],
			a[href^="https://www.google.com/maps"] {
				display: none !important;
			}
			.gmnoprint:not(.gm-bundled-control) {
				display: none;
			}
			.gm-bundled-control .gmnoprint {
				display: block;
			}
			
			#bid_button {
				width: 320px;
				block: none;
			}	
			@media (max-width: 767px) {
				#bid_button {
					display: none;
				}
			}
			
			@media (max-width: 767px) {
				.bf-bid-form__block-hint, .bf-bid-form__block {
					padding-left: 15px;
					padding-right: 15px;
				}
			}
			@media (max-width: 767px) {
				#bid_button_wrapper {
					margin-left: 7px;
					margin-right: 7px;
				}
			}
			@media (max-width: 767px) {
				#bid {
					margin-bottom: -60px;
				}
			}
			
			.details_button {
				width: 280px;
				margin:30px; 
			}
			@media (max-width: 767px) {
				.details_button {
					width: calc(100% - 20px);
					margin: 0 0 20px 0;
				}
			}
			
			@media (max-width: 767px) {
				.info_perevozchik {
					width: 100%;
					margin-left: 23px;
					border-radius: 0 !important;
				}
			}
			
			@media (max-width: 767px) {
				.chat_perevozchik {
					width: 100% !important;
					margin-left: 0 !important;
				}
				.info_perevozchik {
					width: 100% !important;
					margin-left: 0 !important;
					padding: 5px 0 10px 15px;
				}
				.chat__content{					
					width: 100% !important;
				}
				.chat__header {
					border-radius: 0;
					margin: 0: !important;
				}
				.chat__warning {
					border-radius: 0;
					width: 100% !important;
					margin: 0: !important;
				}
				.left {
					width: 100% !important;
					float: none: !important;
					margin: 0: !important;
				}
				.details_block {					
					border-radius: 0;
					border-left: none !important;
					border-right: none !important;
				}
				.opened_row {
					padding: 0 !important;
				}
			}
			
			.vi_perevozchik {
				width:auto !important;
			}
			@media (max-width: 767px) {
				.vi_perevozchik {
					width: 100% !important;
					margin-right: 15px !important;
					margin-left: 15px !important;
				}
				.det_button {					
					width: calc(100% - 30px) !important;
					float: none !important;
				}
			}
			
			#details_arrow {
				margin-top: -1px;
			}
			@media (max-width: 767px) {
				#details_arrow {
					margin-top: -7px;
				}
			}

			.driver_selected {
				background: #d1f5d7;
				padding: 10px 30px 40px 30px;
				margin-bottom: 20px;
				margin-top: 20px;
			}
			.driver_selected_text {
				margin-left:20px; 
			}
			@media (max-width: 767px) {
				.driver_selected {
					background: #d1f5d7;
					padding: 0 15px 25px 15px;
					margin-bottom: 10px;
				}
				.driver_selected_text {
					margin-left: 0; 
				}
				#selected_driver_image {
					display: none;
				}
				#selected_driver_title {
					font-size: 25px !important;
					line-height: 35px;
					margin: 7px 0 15px 0 !important;
				}
			}
			
		</style>
	</head>
	<body style="background:#f9f8f3">
		<?php require("./util/support_dialog.html") ?>
		
		<div id="content_body" style="min-height:calc(100% + 70px); position:relative;">
			
			<?php require("./util/header.php") ?>
			<section id="content">
				<div class="vv-container vv-container--no-padding x-detail">
					<div id="x-order-questions-block"></div>
					<?php
					$offers_query = mysqli_query($con, "SELECT offer_id, user_id, price, message, status, time FROM offer WHERE freight_id='$id' ORDER BY status ASC, time DESC") or die(mysqli_error($con));
					
					if ($freight_status == "1" and $freight_owner_id==$session_user_id){
						$accepted_offer_query = mysqli_query($con, "SELECT name, phone FROM user WHERE user_id IN (SELECT user_id FROM offer WHERE freight_id='$id' AND status='0')");
						$accepted_offer_result = mysqli_fetch_assoc($accepted_offer_query);
						?>
						<div class="driver_selected">
							<img id="selected_driver_image" alt="" src="/assets/styles/images/v3/perevozchik.svg" height="100px" width="100px" style="margin-top:-60px">
							<div class="driver_selected_text" style="display:inline-block; margin-bottom:-40px; margin-top:10px">
								<h2 id="selected_driver_title" style="color:#30c161; margin-bottom: 30px">Вы выбрали перевозчика <?php echo $accepted_offer_result["name"] ?></h2>
								Номер телефона: <?php echo $accepted_offer_result["phone"] ?>. Нужна помощь? <a href="mailto:info@vezemvse.com.ua">Напишите нам</a>
							</div>
						</div>
					<?php } else if (mysqli_num_rows($offers_query) == 0 and $freight_owner_id==$session_user_id) { ?>
						<div class="driver_selected">
							<div class="driver_selected_text" style="display:inline-block; margin-bottom:-40px">
								<h2 id="selected_driver_title" style="color:#30c161; margin-bottom: 30px">Заявка успешно опубликована</h2>
								В скором времени Вы начнете получать предложения от перевозчиков. Нужна помощь? <a href="mailto:info@vezemvse.com.ua">Напишите нам</a>
							</div>
						</div>
					<?php } ?>
					<div class="new_detalizacia" id="order-info">
						<div id="x-order-title-info" class="wr_prod_info x-tip-additional-offset gruz_mobile_padding">
							<div class="prod_info inline_block" style="padding-left:0px">
								<p class="proposal"></p>
								<h1 style="font-size:28px; font-family:'Roboto',Helvetica,Arial, sans-serif; color:#333; font-weight: 400"><?php echo $freight_result["title"] ?></h1>
								<p></p>
								<div class="breaker"></div>
								<p class="date" style="margin-top:15px">
									<span class="date">№ <?php echo $freight_result["freight_id"] ?></span>
								</p>
								<?php if ($freight_status == 2){ ?>
									<p class="torg_green">Заказ выполнен</p>
								<?php } ?>
							</div>
						</div>
						<div class="det_button">
							<?php if ($session_user_id == $freight_owner_id and $freight_status=="1"){ ?>
								<a class="vi_perevozchik" id="button_delivered" style="cursor:pointer; margin-bottom:40px; font-weight:500; font-size:18px; padding:13px 30px 15px 30px; width:auto; line-height:25px">
									Подтвердить доставку груза
								</a>
							<?php } else if (!empty($session_user_id) and !$already_have_offer and $type=="0" and $freight_status=="0"){ ?>
								<a id="bid_button" style="margin-bottom:40px; font-family: 'Roboto', Helvetica, Arial, sans-serif; font-weight:500; font-size:18px; padding: 17px 30px 18px 30px; box-shadow: 0px 8px 8px 0px rgba(0, 0, 0, 0.2);" class="_button prdelajit_cenu_255 x-make-proposal-button" data-intro="Предложите свою цену на перевозку с помощью оранжевой кнопки" data-step="1">
									ПРЕДЛОЖИТЬ СВОЮ ЦЕНУ
								</a>
							<?php } else if (empty($session_user_id)){ ?>
								<a class="vi_perevozchik" href="/kak_rabotat" style="cursor:pointer; margin-bottom:40px; font-weight:500; font-size:18px; padding:13px 30px 15px 30px; line-height:25px">
									Вы перевозчик?<br>Узнайте как с нами работать!
								</a>
							<?php } ?>
						</div>
						<div class="breaker"></div>
						<div class="x-tip-merchant-main">
							<div class="oh for_hight  x-description">
								<div id="x-cargo-list-info">
									<div class="wr_zruz_info-col single-colum gruz_info_wrapper">
										<div class="wr_zruz_info">
											<div class="col">
												<div class="info_edit gruz_mobile_padding">
													<p class="blue_bg_button">Информация о грузе</p>
													<span id="x-edit-cargo-button">
													</span>
												</div>
												<div class="in_col column column-1024 gruz_info" style="overflow-x:hidden; overflow-y:auto; background:#dfeaf5">
													<div class="wr_row" style="font-family: 'Roboto', Helvetica, Arial, sans-serif; height:270px">
														<div class="row row_top" style="padding-bottom:10px;">
															<p style="color:#333"><b class="name" style="width:auto; color:#333; font-weight:500">Заказчик:</b> <span class="date" style="margin-left:3px; font-weight:normal"><?php echo $owner_name ?></span></p>
															<?php if (!empty($freight_result["price"])){ ?>
																<p style="color:#333"><b class="name" style="width:auto; color:#333; font-weight:500">Желаемая стоимость:</b> <span class="date" style="margin-left:3px; font-weight:normal"><?php echo $freight_result["price"]." грн" ?></span></p>
															<?php } ?>
															<p style="color:#333"><b class="name" style="width:auto; color:#333; font-weight:500">Дата погрузки:</b> <span class="date" style="margin-left:3px; font-weight:normal">
																<?php
																	if (!empty($freight_result["start_time"])){
																		$date = new DateTime("@".$freight_result["start_time"]); echo $date->format('d.m');
																	} else {
																		echo "не указана";
																	}
																?>
																</span>
															</p>
															<?php if (!empty($freight_result["volume"])){ ?>
																<p style="color:#333"><b class="name" style="width:auto; color:#333; font-weight:500">Общий объем:</b> <span class="date" style="margin-left:3px; font-weight:normal"><?php echo $freight_result["volume"] ?></span></p>
															<?php } 
															if (!empty($freight_result["weight"])){ ?>													
																<p style="color:#333"><b class="name" style="width:auto; color:#333; font-weight:500">Общий вес:</b> <span class="date" style="margin-left:3px; font-weight:normal"><?php echo formatWeight($freight_result["weight"]) ?></span></p>
															<?php } ?>
														</div>
														<?php if (!empty($freight_result["description"])){ ?>
															<div class="row sposob_oplati" style="margin-top:10px; padding-bottom: 20px; padding-right: 20px; line-height: 24px; border:none; color:#333; font-weight:normal">
																<b style="color:#333; font-weight:500">Комментарий заказчика:</b>
																<p style="margin-top:4px"></p>
																<?php echo $freight_result["description"] ?>	
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="edit_info gruz_address_wrapper">
									<div class="top_button gruz_mobile_padding">
										<p class="blue_bg_button no_phone inline_block">Погрузка / Выгрузка</p>
										<span id="x-edit-route-button">
										</span>
									</div>
									<div class="info column column-ipad column-1024 gruz_address" id="editmap" style="color:#333; background:#dfeaf5">
										<div class="top_dot">
											<div class="big">
												<h2 class="otkuda">
													<span class="title" style="font-family: 'Roboto', Helvetica, Arial, sans-serif; font-weight:500">Погрузка:</span><br>
													<p style="font-family: 'Roboto', Helvetica, Arial, sans-serif; margin-top:1px"><?php echo $freight_result["address_from"] ?></p>
												</h2>
											</div>
										</div>
										<div class="top_dot" style="margin-top:20px">
											<div class="big">
												<h2 class="kuda">
													<span class="title" style="font-family: 'Roboto', Helvetica, Arial, sans-serif; font-weight:500">Выгрузка:</span><br>
													<p style="font-family: 'Roboto', Helvetica, Arial, sans-serif; margin-top:1px"><?php echo $freight_result["address_to"] ?></p>
												</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="wr_map no_phone gruz_map">
									<div class="top_button gruz_mobile_padding">
										<p class="blue_bg_button inline_block">
											Расстояние: <span id="distance"></span>
										</p>
										<a href="https://maps.google.com?saddr=<?php echo urlencode($freight_result["address_from"]) ?>&daddr=<?php echo urlencode($freight_result["address_to"]) ?>&hl=ru" class="map__static-route pull-right" target="_blank">показать маршрут</a>
									</div>
									<div class="map column column-ipad" id="map">
									</div>
								</div>
							</div>
							<div class="breaker"></div>
						</div>
						<?php
						
						$already_accepted_query = mysqli_query($con, "SELECT offer_id, user_id, price, message, status, time FROM offer WHERE freight_id='$id' AND status='0'");
						$already_accepted = mysqli_fetch_assoc($already_accepted_query) != null;
						
						?>
							
						<div class="wr_predlojenie x-detail-suggestions x-detail-realtime-suggestions "  style="display:<?php echo mysqli_num_rows($offers_query)>0 ? "block" : "none" ?>">
							<div class="subsidiary-block">
								<div class="subsidiary-block__left">
									<p class="blue_bg_button">Ценовые предложения: <span class="x-suggestions-count"><?php echo mysqli_num_rows($offers_query) ?></p>
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
									<div class="row_all x-suggestion x-hidden suggestion" style="display: block">
										<section  id="suggestion-<?php echo $offers_result["offer_id"]?>" class="x-suggestion-title x-suggestion-main detail-main <?php echo $offers_result["status"] == 2 ? "detail-main--declined" : ($offers_result["status"] == 1 ? ($already_accepted ? "detail-main--declined" : "") : "detail-main--performed")?> x-tip-merchant-second">
											<div class="detail-main__top">
												<div class="detail-main__block-alpha">
													<div class="detail-main__name-wrapper">
														<a class="detail-main__name x-notoggle" target="_blank">
														<?php
															// Get user from the database
															$user_id = $offers_result["user_id"];
															$user_query = mysqli_query($con, "SELECT name, time FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
															$user_result = mysqli_fetch_assoc($user_query);
															echo $user_result["name"];
															if ($user_id == $session_user_id){
																echo " (Вы)";
															}
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
															echo "Отклонён заказчиком";
														} else if ($offers_result["status"] == 0){
															echo "Торги завершены";		
														} else if ($already_accepted){
															echo "Не актуален";
														} else {
															echo "Ожидает ответа";											
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
														<?php echo !empty($offers_result["message"]) ? nl2br($offers_result["message"]) : "<i>Водитель согласился с условиями перевозки.</i>" ?>
													</div>
												</div>
												<div class="detail-main__block-controls" style="width: 650px;">
												
													<?php if ($offers_result["status"] == 1 and !$already_accepted and $session_user_id == $freight_owner_id and $freight_status=="0"){ ?>
														<div style="width:280px; position:absolute; bottom:50px; right:0; margin:30px">
															<div offer_id="<?php echo $offers_result["offer_id"] ?>" class="accept_button vv-button vv-button--green detail-main__accept x-sugg-detail-button" style="width:135px; display:inline-block; padding-left:0; padding-right:0">
																Согласиться
															</div>
															<div offer_id="<?php echo $offers_result["offer_id"] ?>" class="decline_button vv-button vv-button--green detail-main__accept x-sugg-detail-button" style="width:135px; margin-left:5px; background:#f44336; display:inline-block; padding-left:0; padding-right:0">
																Отклонить
															</div>
														</div>
													<?php } ?>
													<div class="details_button vv-button vv-button--green detail-main__watch x-sugg-detail-button" style="position:absolute; bottom:0; right:0; background:#7194cc">
														<span id="details_arrow" class="detail-main__watch-icon"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="7" viewBox="0 0 12 7"><defs><style>.a{fill:#fff}</style></defs><path class="a" d="M6 6.707L.646 1.354l.708-.708L6 5.293 10.646.646l.708.708L6 6.707z"></path></svg></span>
													</div>
												</div>
											</div>
										</section>
										<div class="opened_row x-suggestion-body x-tip-merchant-third hide details_block" style="display: block;">
											<div class="right">
												<div class="info_perevozchik">
													<p class="gl-title">Информация о перевозчике</p>
													<div class="in_pervozchik" style="border-top:none">
														<span class="wr_border d_none-1024 hidden-tablet hidden-phone">
														<span class="img">
														<img alt="" src="/assets/styles/images/v3/perevozchik.svg" height="90px" width="90px" >
														</span>
														</span>
														<span class="info x-tip-suggestion-i0">
															<span class="bold">Перевозчик:</span>
															<div class="tail_wr info-tailWr">
																<a class="infoUsername" target="_blank"><?php echo $user_result["name"] ?></a>
																<span class="tail info-tailUsername">
																<?php echo $user_result["name"] ?>                             </span>
															</div>
															<br>
															<div style="padding-top:5px"><span class="bold">Дата регистрации:</span> <?php echo date("d.m.Y", strtotime($user_result["time"])) ?> <br></div>
															</span>
													</div>
												</div>
											</div>
											<div class="left">
												<section class="chat x-suggestion-chat chat_perevozchik">
													<div class="chat__content" style="margin-top:0">
														<header class="chat__header">
															<span class="chat__header-info">Переписка с перевозчиком</span>
														</header>
														<div class="chat__list x-chat-list" offer_id="<?php echo $offers_result["offer_id"] ?>" offer_user_id="<?php echo $offers_result["user_id"] ?>" style="padding-bottom:7px">
															<?php
															$messages_query = mysqli_query($con, "SELECT user_id, message, time FROM message WHERE offer_id='".$offers_result["offer_id"]."' ORDER BY time ASC") or die(mysqli_error($con));
															while ($messages_result = mysqli_fetch_assoc($messages_query)){
																$message_user_id = $messages_result["user_id"];
																$message_user_query = mysqli_query($con, "SELECT name, type FROM user WHERE user_id='$message_user_id'") or die(mysqli_error($con));
																$message_user_result = mysqli_fetch_assoc($message_user_query);
															
																?>
																	<div class="chat-message chat-message<?php echo $message_user_result["type"]==0?"--carrier":"--merchant" ?>">
																		<span class="chat-message__time"><?php echo date("d.m в H:i", strtotime($messages_result["time"])) ?></span>
																		<div class="chat-message__name">
																			<span class="chat-message__nickname"><?php echo $message_user_result["name"] ?></span>
																			<?php if ($message_user_result["type"]==0){ ?>
																				<span> (перевозчик):</span>
																			<?php } ?>
																		</div>
																		<span class="chat-message__text"><?php echo $messages_result["message"] ?></span>
																	</div>
																<?php
															}
															?>
														</div>
														<div class="x-chat-wrapper">
															<?php if ($session_user_id == null or ($session_user_id != $freight_owner_id and $session_user_id != $offers_result["user_id"])){ ?>
																<div class="chat__warning" style="border-top:none; padding:0"></div>
															<?php } else if ($offers_result["status"] != 0 and ($offers_result["status"] == 2 or $already_accepted)){ ?>
																<div class="chat__warning">Переписка закрыта</div>
															<?php } else { ?>
																<div class="chat__warning" style="padding:0;">
																	<table style="width:100%;">
																		<tr>
																			<td style="width:100%">
																				<input offer_id="<?php echo $offers_result["offer_id"] ?>"class="message_text" type="text" placeholder="Ваше сообщение…" style="width:100%; border: none; margin-top:2px; padding: 15px 13px; height:57px"/>
																			</td>
																			<td>
																				<button style="margin:13px" class="message_send_button">Отправить</button>
																			</td>
																		</tr>
																	</table>
																</div>
															<?php } ?>
														</div>
													</div>
												</section>
											</div>
											<div class="breaker"></div>
										</div>
									</div>
									<?php
										}				
										?>
								</div>
							</div>
						</div>
						<?php						
						
						if (!empty($session_user_id) and !$already_have_offer and $type=="0" and $freight_status=="0"){
						?>
							<div id="bid" style="margin-top:40px">
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
										<article class="bf-price__row" style="margin-bottom:0">
											<div class="bf-price__col bf-price__col--bid">
												<div class="bf-price__el">
													<div class="Input Input--label-left">
														<input type="number" name="bid" value="" id="price" class="Input-control Input-control--left bf-price__price bf-price__price--fat">
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
									<section class="bf-bid-form__block bf-bid-form__block bf-bid-form__block--message bf-comment">
										<div class="bf-bid-form__block-title">Сообщение заказчику</div>
										<div class="bf-comment__content">
											<div class="bf-comment__textarea Textarea">
												<textarea id="message" class="Textarea-textarea--resize-vertical Textarea-textarea" rows="3" placeholder="Это сообщение будет показано заказчику в чате, где Вы сможете вести с ним переговоры по деталям перевозки, оплаты и т.п."></textarea>
											</div>
											<div class="bf-comment__attention">
												<span style="padding-top:4px">
												<b>ОБРАТИТЕ ВНИМАНИЕ!</b> Согласно правилам переписки, обмениваться контактными данными до&nbsp;заключения сделки запрещено.
												</span>
											</div>
										</div>
									</section>
									<section class="bf-bid-form__controls bf-controls" id="bid_button_wrapper">
										<article class="bf-controls__block"  style="width:100%; margin-bottom:4px">
											<button class="Button Button-forest Button-text Button-s bf-controls__big-button" id="add_button"><span class="bf-controls__add-suggestion-content" id="add_button_text" style="font-size:20px; font-family: 'Roboto', Helvetica, Arial, sans-serif; font-weight:400;">ДОБАВИТЬ ПРЕДЛОЖЕНИЕ</span>
											</button>
										</article>
									</section>
									<div class="SpinnerContainer"></div>
								</div>
							</div>
						<?php } else if (!$already_have_offer and isset($type) and $type=="0" and $freight_status=="0") { ?>
							<div id="bid" style="margin:40px 0 20px 0">
								Зарегистрируйтесь чтобы добавить заявку. Это бесплатно.
							</div>
						<?php } else if ($freight_status!=="0" and $type=="0") { ?>
							<div id="bid" style="margin:40px 0 20px 0">
								Заказ уже выполнен, приём заявок закрыт. <a href="/poisk">Найти другой груз</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		</div>
		<script src="assets/scripts/jQueryRotate.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVFLhJdzYyO3lSp-JUYITYBrWJ-Jy419I&callback=initMap&language=ru&region=UA" async defer></script>
		
		<script>
			var directionDisplay;
			var directionsService;
			var map;
			
			function initMap() {				
				var pOptions = {
						strokeColor: "#7290cb",
						strokeOpacity: 1 ,
						strokeWeight: 4,
				};
				var mDirectionsRendererOptions = {
					polylineOptions: pOptions
				};
				directionsService = new google.maps.DirectionsService();
				directionsDisplay = new google.maps.DirectionsRenderer(mDirectionsRendererOptions);
				var ukraine = new google.maps.LatLng(48.4122019, 30.5669957);
				var myOptions = {
					zoom: 5,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					center: ukraine,
					disableDefaultUI: true,
				}
				map = new google.maps.Map(document.getElementById("map"), myOptions);
				directionsDisplay.setMap(map);
				calcRoute();
			}
			
			function calcRoute() {
			
			  var request = {
				origin: "<?php echo $freight_result["address_from"] ?>",
				destination: "<?php echo $freight_result["address_to"] ?>",
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
			
			$("#add_button").click(function() {
				var freight_id = "<?php echo $id?>";
				var user_id = "<?php echo $session_user_id ?>";
				var price = $("#price").val();
				var message = $("#message").val();
				$("#add_button_text").text("Подождите...");
				$.ajax({
					type: "POST",
					url: "api/offer/add_offer",
					data: {
						"freight_id": freight_id,
						"user_id": user_id,
						"price": price,
						"message": message
					},
					success: function(data){
						var offer_id = JSON.parse(data)["offer_id"];
						$("#add_button_text").text("Предложение добавлено!");
						window.open('?id='+freight_id+'&offer='+offer_id,"_self");
					},
					error: function(){
						alert("Ошибка.");
					}
				});
			});
			
			$("#bid_button").click(function() {
				document.getElementById("bid").scrollIntoView(); 
				window.scrollBy(0, -20-$('.header').height());
			});
			
			// Mark offer as accepted
			$(".accept_button").click(function(event) {				
				event.stopPropagation();
				
				var freight_id = "<?php echo $id?>";
				var offer_id = $(this).attr("offer_id");
				var status = 0;				
				
				$.ajax({
					type: "POST",
					url: '../api/offer/set_offer_status',
					data: {
						"freight_id": freight_id,
						"offer_id": offer_id,
						"status": status
					},
					dataType: "json",
					success: function(data){
						alert("Вы согласились с предложением, в скором времени с Вами свяжется перевозчик!");
						location.reload();
					},
					error: function(data){
						alert("Ошибка сервера.");
						alert(JSON.stringify(data));
					}
				});
			});
						
			// Mark offer as declined
			$(".decline_button").click(function(event) {				
				event.stopPropagation();
				
				if (!confirm("Отклонить это предложение?")){
					return;
				}
				
				var offer_id = $(this).attr("offer_id");
				var status = 2;				
				
				$.ajax({
					type: "POST",
					url: '../api/offer/set_offer_status',
					data: {
						"offer_id": offer_id,
						"status": status
					},
					dataType: "json",
					success: function(data){
						location.reload();
					},
					error: function(data){
						alert("Ошибка сервера.");
						alert(JSON.stringify(data));
					}
				});
			});
			
			$(".x-suggestion-main").click(function() {
				toggleDetails($(this));
			});
			
			$(".details_button").click(function(event) {				
				event.stopPropagation();
				
				toggleDetails($(this));
			});	
			
			function toggleDetails(button){				
				var opened = button.find('#details_arrow').getRotateAngle() == 0;
				if (opened){			
					button.find('#details_arrow').rotate({
						angle: 0,
						animateTo: 180,
						center: ["50%", "55%"],
						duration:50,
					});
					button.parent().parent().parent().parent().find(".x-suggestion-title").addClass("opened");
				} else {
					button.find('#details_arrow').rotate({
						angle: 180,
						animateTo: 0,
						center: ["50%", "55%"],
						duration:50,
					});
					button.parent().parent().parent().parent().find(".x-suggestion-title").removeClass("opened");
				}
				if (opened){
					button.parent().parent().parent().parent().find('.details_block').removeClass("hide");
				} else {
					button.parent().parent().parent().parent().find('.details_block').addClass("hide");
				}
			}
			
			$(".message_send_button").click(function(event){			
				var button = $(this);
				var text_field = $(this).parent().parent().find('.message_text');
				
				var message = text_field.val();
				if (message == "") return;
				
				var user_id = "<?php echo $session_user_id ?>";
				var freight_id = "<?php echo $id ?>";
				var offer_id = text_field.attr("offer_id");
				
				button.html("Подождите...");
				
				$.ajax({
					type: "POST",
					url: '../api/message/send_message',
					data: {
						"message": message,
						"freight_id": freight_id,
						"user_id": user_id,
						"offer_id": offer_id
					},
					dataType: "json",
					success: function(data){						
						button.html("Отправить");				
						
						if ('error' in data){
							alert(data["error"]);
						} else {
							text_field.val("");
							var messages_layout = text_field.parent().parent().parent().parent().parent().parent().parent().find(".chat__list");
							messages_layout.append("<div class='chat-message chat-message"+(data['type']==0?'--carrier':'--merchant')+"'><span class='chat-message__time'>"+data["time"]+" </span><div class='chat-message__name'><span class='chat-message__nickname'>"+data["name"]+"</span>"+(data['type']==0? "<span> (перевозчик):</span>" : "") +"</div><span class='chat-message__text'> "+message+"</span></div>");
							messages_layout.scrollTop(messages_layout[0].scrollHeight);
						}
					},
					error: function(data){
						alert("Ошибка отправки сообщения.");
					}
				});
			});
			
			$("#button_delivered").click(function(event){
				if (!confirm("Подтвердить что груз был успешно доставлен?")){
					return;
				}
				
				var button = $(this);
				
				var freight_id = "<?php echo $id?>";
				var status = 2;
				
				button.html("Подождите...");
				
				$.ajax({
					type: "POST",
					url: '../api/freight/set_freight_status',
					data: {
						"freight_id": freight_id,
						"status": status
					},
					dataType: "json",
					success: function(data){			
						location.reload();
					},
					error: function(data){
						alert("Произошла ошибка.");
					}
				});
			});
			
			// Send message when enter is clicked
			$(".message_text").keypress(function (e) {
				var key = e.which;
				if (key == 13){
					$(this).parent().parent().find(".message_send_button")[0].click();
					return false;  
				}
			});
						
			
	
			window.addEventListener('load', function() {
				setInterval(function(){
					refreshMessages();
				}, 10000);
			}, false);
			function refreshMessages(){
				$(".chat__list").each(function(){
					var messages_layout = $(this);
					var visible = $(this).is(":visible");
					if (visible){
						var offer_id = $(this).attr("offer_id");
						var offer_user_id = $(this).attr("offer_user_id");
						var user_id = "<?php echo $session_user_id ?>";
						var mark_seen = false;
						if (user_id !== "" && (user_id=="<?php echo $freight_owner_id ?>" || user_id==offer_user_id)){
							mark_seen = true;
						}
						$.ajax({
							type: "POST",
							url: '../api/message/get_messages',
							data: {
								"offer_id": offer_id,
								"user_id": user_id,
								"mark_seen": mark_seen
							},
							dataType: "json",
							success: function(data){
								var scrolledBottom = false;
								if (messages_layout[0].scrollHeight - messages_layout.scrollTop() == messages_layout.outerHeight()) {
									scrolledBottom = true;
								}
								messages_layout.empty();
								$.each(data, function(i, message) {
									messages_layout.append("<div class='chat-message chat-message"+(message['type']==0?'--carrier':'--merchant')+"'><span class='chat-message__time'>"+message["time"]+" </span><div class='chat-message__name'><span class='chat-message__nickname'>"+message["name"]+"</span>"+(message['type']==0? "<span> (перевозчик):</span>" : "") +"</div><span class='chat-message__text'> "+message["message"]+"</span></div>");
								});
								if (scrolledBottom){
									messages_layout.scrollTop(messages_layout[0].scrollHeight);
								}
								
								refreshUnreadCount();
							},
							error: function(data){
							}
						});
					}					
				});
			}
		</script>
		<?php
			if (ISSET($_GET["offer"])){	
				$offer = $_GET["offer"];
				?>
				<script>
					$(document).ready(function() {					
						document.getElementById("suggestion-<?php echo $offer ?>").scrollIntoView();
					});
				</script>
				<?php
			} else if (ISSET($_GET["open_offer"])){			
				$offer = $_GET["open_offer"];
				?>
				<script>
					$(document).ready(function() {
						$("#suggestion-<?php echo $offer ?> .details_button").click();
						var messages_layout = $("#suggestion-<?php echo $offer ?>").parent().find(".chat__list");
						messages_layout.scrollTop(messages_layout[0].scrollHeight);					
							
						messages_layout[0].scrollIntoView();
						window.scrollBy(0, -300);
						
						refreshMessages();
					});
				</script>
				<?php
			}
			?>
		<div class="x-backdrop modal-backdrop fade in" style="display:none"></div>
		<script type="text/javascript" src="assets/cache/201722/support_dialog.min.js" charset="UTF-8"></script>
		<script type='text/javascript' src="util/jivosite.js"></script>
		<script type="text/javascript" src="assets/cache/201722/drawer.js" charset="UTF-8"></script>
	</body>
	<footer style="margin-top:100px">
		<article class="footer">
			<div class="vv-container">
				<div class="footer__copyright">
					© 2017 Все права на&nbsp;<a class="footer__copyright-link" href="index.html">сайт грузоперевозок «vezemvse.com.ua»</a> принадлежат ООО&nbsp;«Везём Всё»
				</div>
			</div>
		</article>
	</footer>
	<?php
	
	function formatWeight($weight){
		if ($weight < 1000){
			return $weight." кг";
		} else {			
			return str_replace(".", ",", round($weight/1000, 1)." т");
		}
	}
	
	?>
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