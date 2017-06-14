<?php
	session_start();
	$session_user_id = @$_SESSION['user_id'];
	$search_address_from = @$_SESSION['search_address_from'];
	$search_address_to = @$_SESSION['search_address_to'];
	$search_from_lat = @$_SESSION['search_from_lat'];
	$search_from_lng = @$_SESSION['search_from_lng'];
	$search_to_lat = @$_SESSION['search_to_lat'];
	$search_to_lng = @$_SESSION['search_to_lng'];
	$search_weight_min = @$_SESSION['search_weight_min'];
	$search_weight_max = @$_SESSION['search_weight_max'];
	
	require("util/connectDB.php");
	global $con;
	
	$type = null;
	if ($session_user_id != null){
		// Get user type
		$session_user_query = mysqli_query($con, "SELECT type FROM user WHERE user_id='$session_user_id'");
		$session_user_result = mysqli_fetch_assoc($session_user_query);
		$type = $session_user_result["type"];
	}	
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta lang="ru">
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<meta name="googlebot"   content="noarchive">
		<meta name="keywords"    content="грузовые перевозки, информационная система грузоперевозок, компании грузоперевозок, онлайн грузоперевозки, онлайн-сервис грузоперевозок, сайт грузоперевозок, сайт перевозки грузов">
		<meta name="description" content="Грузоперевозки в Киеве, организация грузовых перевозок с помощью информационной системы Гуру Груза. Каталог компаний">
		<meta name="author" content="Dmytro Sheiko">
		<link rel="shortcut icon" href="assets/styles/images/favicon.ico">
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
		<meta itemprop="telephone" content="+38-095-029-29-03" />
		<title>Доставка груза по Украине. Стоимость доставки груза - онлайн-аукцион сайт грузоперевозок по Украине «Гуру Груза»</title>
		<link type="text/css" rel="stylesheet" href="listing/assets/main.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="assets/cache/201722/home_v42017222331.min.css" media="screen" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel="stylesheet" href="/booking/assets/main.css">
		<link type="text/css" rel="stylesheet" href="/assets/styles/pages/landing/v2/landing_for_transit.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="/assets/styles/pages/landing/v2/landing_for_transit_v2.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="/assets/styles/pages/landing/v2/landing_for_transit_v3.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400,300&amp;subset=latin,cyrillic" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:700,400,300&amp;subset=latin,cyrillic" media="screen" />
		
		<style type="text/css" data-ymaps="css-modules">
			.container {
				width: 1250px;
			}

			@media (max-width: 767px) {
				.container {
					width: 100%;
				}
			}
			
			#content_body {
				padding: 30px 0 40px 0;
			}

			@media (max-width: 767px) {
				#content_body {
					padding: 10px 0 10px 0;
				}
			}

			@media (max-width: 767px) {
				.torg_green {
					display: none;
				}
			}
			
			.torg_green_phone {
				display: none !important;
				font-size:12px !important;
				color: #00b911 !important;
			}

			@media (max-width: 767px) {
				.torg_green_phone {
					display: block !important;
				}
				.title {
					font-weight: 600 !important;					
					font-size: 16px;
				}
				.date {
					font-weight: 400 !important;
					color: #666 !important;
				}
			}
		</style>

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
	<body style="background:#f9f8f3">
		<?php require("./util/support_dialog.html") ?>
		<div id="content_body" style="min-height:calc(100% + 70px); position:relative;">
			<?php require("./util/header.php") ?>
			<div class="orders" style="padding-top:0">
				<div class="container">
					<div class="row">
						<div class="span12">
							<div class="orders_search">
								<div id="orders_search_block_from" style="display:inline-block">
									<p class="orders_search_title">Откуда</p>
									<input id="address_from" placeholder="Область загрузки" value="<?php echo $search_address_from ?>"></input>
								</div>
								<div id="orders_search_block_to" style="display:inline-block">
									<p class="orders_search_title">Куда</p>
									<input id="address_to" placeholder="Область разгрузки" value="<?php echo $search_address_to ?>"></input>
								</div>
								<div id="orders_search_block_weight" style="display:inline-block">
									<p class="orders_search_title">Масса</p>
									<select id="weight_min">
										<option selected>0</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
										<option>13</option>
										<option>14</option>
										<option>15</option>
										<option>16</option>
										<option>17</option>
										<option>18</option>
										<option>19</option>
										<option>20</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
									</select>
									<script>
										$("#weight_min option").each(function() {
											this.selected = (this.text == <?php echo $search_weight_min ?>);
										});
									</script>
									–
									<select id="weight_max">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
										<option>13</option>
										<option>14</option>
										<option>15</option>
										<option>16</option>
										<option>17</option>
										<option>18</option>
										<option>19</option>
										<option>20</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
										<option selected>30</option>
									</select>
									<script>
										$("#weight_max option").each(function() {
											this.selected = (this.text == <?php echo $search_weight_max ?>);
										});
									</script>
									<font style="margin-left:2px">т</font>
								</div>
								<a id="search_button" class="inquiry__button vv-button vv-button--gold vv-button--big">Подобрать груз</a>
							</div>
							<?php
							
							
								$distance_from_query = "";
								$having_from = "";
								$search = false;
								if (!empty($search_from_lat) and !empty($search_from_lng)){
									$distance_from_query = "(
										  6373 * acos (
										  cos ( radians( '".$search_from_lat."' ) )
										  * cos( radians( X(address_from_point) ) )
										  * cos( radians( Y(address_from_point) ) - radians( '".$search_from_lng."' ) )
										  + sin ( radians( '".$search_from_lat."' ) )
										  * sin( radians( X(address_from_point) ) )
										)
									) AS distance_from,";
									$having_from = "HAVING distance_from < 100";
									
									$search = true;
								}
								
								$distance_to_query = "";
								$having_to = "";
								if (!empty($search_to_lat) and !empty($search_to_lng)){
									$distance_to_query = "(
										  6373 * acos (
										  cos ( radians( '".$search_to_lat."' ) )
										  * cos( radians( X(address_to_point) ) )
										  * cos( radians( Y(address_to_point) ) - radians( '".$search_to_lng."' ) )
										  + sin ( radians( '".$search_to_lat."' ) )
										  * sin( radians( X(address_to_point) ) )
										)
									) AS distance_to,";
									$having_to = (empty($having_from)?"HAVING":" AND ")." distance_to < 100";
									
									$search = true;
								}
								$where_weight_min = "";
								if (!empty($search_weight_min)) {
									$where_weight_min = "AND (weight>=".($search_weight_min*1000)." OR weight IS NULL OR weight='')";
									
									if ($search_weight_min != "0"){
										$search = true;
									}
								}
								$where_weight_max = "";
								if (!empty($search_weight_max)) {
									$where_weight_max = "AND (weight<=".($search_weight_max*1000)." OR weight IS NULL OR weight='')";

									if ($search_weight_max != "30"){
										$search = true;
									}						
								}
							
								$freight_query = mysqli_query($con, "SELECT $distance_from_query $distance_to_query user_id, freight_id AS freightid, title, address_from, address_to, distance, weight, volume, price, start_time, status, (SELECT price FROM offer WHERE offer.freight_id=freightid ORDER BY price ASC LIMIT 1) AS last_offer, (SELECT status FROM offer WHERE offer.freight_id=freightid ORDER BY status ASC LIMIT 1) AS offer_status FROM freight WHERE fake='0' $where_weight_min $where_weight_max $having_from $having_to ORDER BY posted_time DESC") or die (mysqli_error($con));
							
							?>
							<div class="orders_title" style="font-weight:400">
								<?php if (mysqli_num_rows($freight_query) == 0) {
									echo "Заказов не найдено :(";
								} else if ($search) {
									echo "Найденные заказы";
								} else {
									echo "Последние добавленные заказы";
								} ?></span>
							</div>
							<div class="orders_inner" style="padding:0">
							<?php
								while ($freight_result = mysqli_fetch_assoc($freight_query)){?>
								<div class="orders_inner_item">
									<a href="gruz?id=<?php echo $freight_result["freightid"] ?>" class="orders_inner_item_link"></a>
									<table>
										<colgroup>
											<col width="4%">
											<col width="26.5%">
											<col width="15%">
											<col width="11%">
											<?php if ($type=="2") { ?>	
												<col width="18%">
												<col width="10%">		
												<col width="30%">
											<?php } else { ?>											
												<col width="19%">
												<col width="25%">
											<?php } ?>
										</colgroup>
										<tbody>
											<tr>
												<td>
													<span class="date">														
													<?php if ($freight_result["start_time"]!=null){
															$date = new DateTime("@".$freight_result["start_time"]);
															echo $date->format('d.m');
														} else {
															echo "—&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
														}
													?></span>
												</td>
												<td>
													<span class="title"><?php echo $freight_result["title"] ?></span>
												</td>
												<td>
													<span><?php echo str_replace(", город Киев", "", $freight_result["address_from"]) ?> </span>                        
												</td>
												<td>
													<span class="blue-arrow"><?php echo $freight_result["distance"]." км" ?></span>
												</td>
												<td>
													<span><?php echo str_replace(", город Киев", "", $freight_result["address_to"]) ?></span>                               
												</td>												
												<td>
												<?php if ($freight_result["status"] == "2") { ?>
													<p class="torg_green" style="background: #00b911; color: #fff; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 14px; padding: 5px 15px; border-radius: 30px; width:155px; text-align:center; float:right; margin-top:10px">Заказ выполнен</p>
												<?php } else if ($freight_result["offer_status"] == "0") { ?>
													<p class="torg_green" style="background: #00b911; color: #fff; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 14px; padding: 5px 15px; border-radius: 30px; width:155px; text-align:center; float:right; margin-top:10px">Выполняется</p>
												<?php } else { ?>
													Последнее предложение:			
													<?php if(!empty($freight_result["last_offer"])){ ?>
														<span style="font-size: 18px;font-weight: 700;"><?php echo number_format($freight_result["last_offer"], 0, ".", " ") ?> грн</span>
													<?php } else if(!empty($freight_result["price"])){ ?>
														<span style="font-size: 18px;font-weight: 700;"><?php echo number_format($freight_result["price"], 0, ".", " ") ?> грн</span>
													<?php } else { ?>
														<span style="font-size: 18px;font-weight: 700; margin-right: 2px">—</span>
													<?php }
												} ?>
												
												<?php if ($freight_result["status"] == "2") { ?>
													<span class="torg_green_phone">Заказ выполнен</span>
												<?php } else if ($freight_result["offer_status"] == "0") { ?>
													<span class="torg_green_phone">Выполняется</span>
												<?php } ?>
												</td>
																			
												<?php if ($type=="2") {
													
													$owner_id = $freight_result["user_id"];
												
												$owner_query = mysqli_query($con, "SELECT name, phone FROM user WHERE user_id='$owner_id'") or die (mysqli_error($con));
												$owner_result = mysqli_fetch_assoc($owner_query);												
													
												?>				
												<td>
													<?php echo $owner_result["name"] ?>
													<span>☎ <?php echo str_replace("+38", "", $owner_result["phone"]) ?></span>
												</td>
												<?php } ?>
											</tr>
										</tbody>
									</table>
								</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<article class="footer" style="padding:20px">
					<div class="vv-container">
						<div class="footer__copyright">
							© 2017 Все права на&nbsp;<a class="footer__copyright-link" href="index.html">сайт грузоперевозок «gurugruza.com.ua»</a> принадлежат ООО&nbsp;«Гуру Груза»
						</div>
					</div>
				</article>
			</footer>
		</div>
		<div class="x-backdrop modal-backdrop fade in" style="display:none"></div>
		<script type="text/javascript" src="assets/cache/201722/support_dialog.min.js" charset="UTF-8"></script>
		<script type='text/javascript' src="util/jivosite.js"></script>
		<script type="text/javascript" src="assets/cache/201722/drawer.js" charset="UTF-8"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL5UB6urkL0ni5h-_R9WqLBIJxWdgZl2w&libraries=places&callback=initAutocomplete&language=ru&region=ua" async defer></script>
		<script>
			var search_from_lat = "<?php echo $search_from_lat ?>";
			var search_from_lng = "<?php echo $search_from_lng ?>";
			var search_to_lat = "<?php echo $search_to_lat ?>";
			var search_to_lng = "<?php echo $search_to_lng ?>";
			var weight_min = "<?php echo $search_weight_min ?>";
			var weight_max = "<?php echo $search_weight_max ?>";
			
			function initAutocomplete() {
				var options = {
					types: ['(regions)']
				};
				
				var input_from = document.getElementById('address_from');
				var autocomplete_from = new google.maps.places.Autocomplete(input_from, options);
				var input_to = document.getElementById('address_to');
				var autocomplete_to = new google.maps.places.Autocomplete(input_to, options);
				google.maps.event.addListener(autocomplete_from, 'place_changed', function() {
					result = autocomplete_from.getPlace();
					if (typeof result.address_components !== 'undefined') {
						search_from_lat = result.geometry.location.lat();
						search_from_lng = result.geometry.location.lng();
					} else {
						search_from_lat = null;
						search_from_lng = null;
					}
				});
				google.maps.event.addListener(autocomplete_to, 'place_changed', function() {
					result = autocomplete_to.getPlace();
					if (typeof result.address_components !== 'undefined') {
						search_to_lat = result.geometry.location.lat();
						search_to_lng = result.geometry.location.lng();						
					} else {
						search_to_lat = null;
						search_to_lng = null;
					}
				});
				$("#address_from").on('input', function() {
					search_from_lat = null;
					search_from_lng = null;
				});
				$("#address_to").on('input', function() {
					search_to_lat = null;
					search_to_lng = null;
				});
			}
			
			$("#search_button").click(function(){				
				try{						
					ga('send', 'event', {
						eventCategory: 'Заказ',
						eventAction: 'Фильтр',							
					});
				} catch(err){}
				
				if (parseInt($("#weight_max").val()) < parseInt($("#weight_min").val())){
					alert("Выбран неправильный вес.");
					return;
				}
				
				var button = $(this);
				
				button.html("Подождите...");
				
				$.ajax({
					type: "POST",
					url: '../api/v1/search/save_search',
					data: {
						"address_from": $("#address_from").val(),
						"address_to": $("#address_to").val(),
						"from_lat": search_from_lat,
						"from_lng": search_from_lng,
						"to_lat": search_to_lat,
						"to_lng": search_to_lng,
						"weight_min": $("#weight_min").val(),
						"weight_max": $("#weight_max").val(),
					},
					success: function(data){					
						location.reload();
					},
					error: function(data){
						alert("Произошла ошибка.");
					}
				});
			});
		</script>
		</body>
</html>