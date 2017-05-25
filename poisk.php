<?php
	session_start();
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
					padding: 45px 0 10px 0;
				}
			}

			@media (max-width: 767px) {
				.torg_green {
					display: none;
				}
			}
			
			.torg_green_phone {
				display: none !important;
			}

			@media (max-width: 767px) {
				.torg_green_phone {
					display: block !important;
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
	<!-- Yandex.Metrika counter -->
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
							<div class="orders_title" style="font-weight:400">
								Последние добавленные заказы</span>
							</div>
							<div class="orders_inner" style="padding:0">
							<?php
								require("util/connectDB.php");
								global $con;
								$freight_query = mysqli_query($con, "SELECT freight_id AS freightid, title, address_from, address_to, distance, weight, volume, price, start_time, status, (SELECT price FROM offer WHERE offer.freight_id=freightid) AS last_offer FROM freight ORDER BY posted_time DESC") or die (mysqli_error($con));
								while ($freight_result = mysqli_fetch_assoc($freight_query)){?>
								<div class="orders_inner_item">
									<a href="gruz?id=<?php echo $freight_result["freightid"] ?>" class="orders_inner_item_link"></a>
									<table>
										<colgroup>
											<col width="4%">
											<col width="26.5%">
											<col width="15%">
											<col width="11%">
											<col width="19%">
											<col width="25%">
										</colgroup>
										<tbody>
											<tr>
												<td>
													<span>														
													<?php if ($freight_result["start_time"]!=null){
															$date = new DateTime("@".$freight_result["start_time"]);
															echo $date->format('d.m');
														} else {
															echo "—&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
														}
													?></span>
												</td>
												<td>
													<span><?php echo $freight_result["title"] ?></span>
												</td>
												<td>
													<span><?php echo $freight_result["address_from"] ?> </span>                        
												</td>
												<td>
													<span class="blue-arrow"><?php echo $freight_result["distance"]." км" ?></span>
												</td>
												<td>
													<span><?php echo $freight_result["address_to"] ?></span>                               
												</td>												
												<td>
												<?php if ($freight_result["status"] == "2") { ?>
													<p class="torg_green" style="background: #00b911; color: #fff; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 14px; padding: 5px 15px; border-radius: 30px; width:150px; text-align:center; float:right; margin-top:10px">Заказ выполнен</p>
												<?php } else { ?>									
													Последнее предложение:			
													<?php if(!empty($freight_result["last_offer"])){ ?>
														<span><?php echo number_format($freight_result["last_offer"], 0, ".", " ") ?> грн</span>
													<?php } else if(!empty($freight_result["price"])){ ?>
														<span><?php echo number_format($freight_result["price"], 0, ".", " ") ?> грн</span>
													<?php } else { ?>
														<span style="margin-right: 2px">—</span>
													<?php }
												} ?>
												
												<?php if ($freight_result["status"] == "2") { ?>
													<span class="torg_green_phone">Заказ выполнен</span>
												<?php } ?>
												</td>
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
	</body>
</html>