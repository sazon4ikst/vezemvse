<?php
	session_start();
	$session_user_id = @$_SESSION['user_id'];
	$type = @$_SESSION['type'];
?>

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
					padding: 75px 0 10px 0;
				}
			}
		</style>
	</head>
	<body style="background:#f9f8f3">
		<?php require("./util/support_dialog.html") ?>
		<div id="content_body" style="min-height:calc(100% + 70px); position:relative">
			<?php require("./util/header.php") ?>
			<div class="orders" style="padding-top:0">
				<div class="container" style="width: 1250px;">
					<div class="row">
						<div class="span12">
							<div class="orders_title" style="font-weight:400">
								<?php echo $type=="0"?"Мои предложения":"Мои запросы" ?></span>
							</div>
							<div class="orders_inner" style="padding:0">
							<?php
								require("util/connectDB.php");
								global $con;
								if ($type=="0"){
									$freight_query = mysqli_query($con, "SELECT freight_id, title, address_from, address_to, distance, weight, volume, price, start_time FROM freight WHERE freight_id IN (SELECT freight_id FROM offer WHERE user_id='$session_user_id') ORDER BY posted_time DESC") or die (mysqli_error($con));
								} else {
									$freight_query = mysqli_query($con, "SELECT freight_id, title, address_from, address_to, distance, weight, volume, price, start_time FROM freight WHERE user_id='$session_user_id' ORDER BY posted_time DESC") or die (mysqli_error($con));
								}
								while ($freight_result = mysqli_fetch_assoc($freight_query)){?>
								<div class="orders_inner_item">
									<a href="gruz?id=<?php echo $freight_result["freight_id"] ?>" class="orders_inner_item_link"></a>
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
													<?php
													if ($freight_result["start_time"]!=null){
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
													<span class="blue-arrow"><?php echo $freight_result["distance"] ?></span>
												</td>
												<td>
													<span><?php echo $freight_result["address_to"] ?></span>                               
												</td>												
												<td>
													Последнее предложение:
													<?php if(!empty($freight_result["price"])){ ?>
														<span><?php echo number_format($freight_result["price"], 0, ".", " ") ?> грн</span>
													<?php } else { ?>
														<span style="margin-right: 2px">—</span>
													<?php } ?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<?php
								}
								
								if (mysqli_num_rows($freight_query) == 0){
									if ($type=="0"){
									?>
									<a style="margin-top:40px; margin-left:auto; margin-right:auto; display:block; width:300px" class="billboard__button vv-button vv-button--gold vv-button--big" href="poisk">
										Найти первый груз
									</a>
									<?php
									} else {
									?>
									<a style="margin-top:40px; margin-left:auto; margin-right:auto; display:block; width:400px" class="billboard__button vv-button vv-button--gold vv-button--big" href="booking">
										Разместить первый запрос
									</a>
									<?php
									}
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<article class="footer">
					<div class="vv-container">
						<div class="footer__copyright">
							© 2017 Все права на&nbsp;<a class="footer__copyright-link" href="index.html">сайт грузоперевозок «vezemvse.com.ua»</a> принадлежат ООО&nbsp;«Везём Всё»
						</div>
					</div>
				</article>
			</footer>
		</div>
		<div class="x-backdrop modal-backdrop fade in" style="display:none"></div>
		<script type="text/javascript" src="assets/cache/201722/support_dialog.min.js" charset="UTF-8"></script>
	</body>
	<script>
		$(".table_item").click(function(){
			if ($(this).hasClass("table_row")){
				$(this).addClass("table_row_selected");
				$(this).removeClass("table_row");
				$(this).closest('tr').next('tr').show();
			} else {			
				$(this).addClass("table_row");
				$(this).removeClass("table_row_selected");
				$(this).closest('tr').next('tr').hide();
			}
		});
	</script>
</html>