<?php
	session_start();
	
	require("../util/connectDB.php");
	global $con;
	
	$session_user_id = @$_SESSION['user_id'];
	
	$type = null;
	if ($session_user_id != null){
		// Get user type
		$session_user_query = mysqli_query($con, "SELECT type, name, email, phone FROM user WHERE user_id='$session_user_id'");
		$session_user_result = mysqli_fetch_assoc($session_user_query);
		$type = $session_user_result["type"];
		$name = $session_user_result["name"];
		$email = $session_user_result["email"];
		$phone = $session_user_result["phone"];
		
		if ($type !== "0"){
			returnToMain();
		}
	} else {
		returnToMain();
	}
	
	function returnToMain(){
		header('Location: /auth/login');
		die();
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
		<link rel="shortcut icon" href="../assets/styles/images/favicon.ico">
		<meta property="og:title" content="Гуру Груза - онлайн-сервис по грузоперевозкам." />
		<meta property="og:description" content="Узнайте стоимость своей перевозки и сэкономьте до 70%. Перевозим Всё, Везде, Всегда." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="account/main.php" />
		<meta property="og:image" content="./assets/images/other/social_logo.jpg" />
		<meta property="og:site_name" content="gurugruza.com.ua" />
		<meta itemprop="name" content="Гуру Груза - онлайн-сервис по грузоперевозкам." />
		<meta itemprop="description" content="Узнайте стоимость своей перевозки и сэкономьте до 70%. Перевозим Всё, Везде, Всегда." />
		<meta itemprop="image" content="assets/images/other/social_logo.jpg" />
		<meta itemprop="address" content="02000, Киев, Днепровская Наебержная 14Б, 1603" />
		<meta itemprop="telephone" content="+38-095-029-29-03" />
		<title>Личный кабинет - онлайн-аукцион сайт грузоперевозок по Украине «Гуру Груза»</title>
		<link type="text/css" rel="stylesheet" href="../listing/assets/main.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="../assets/cache/201722/home_v42017222331.min.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="../assets/cache/201722/common.min.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://yandex.st/bootstrap/2.3.2/css/bootstrap-responsive.min.css" media="screen" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel="stylesheet" href="../booking/assets/main.css">
		<link type="text/css" rel="stylesheet" href="../assets/styles/pages/account/carrier/common.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="../assets/styles/pages/account/carrier/main.css" media="screen" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400,300&amp;subset=latin,cyrillic" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:700,400,300&amp;subset=latin,cyrillic" media="screen" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&amp;subset=latin,cyrillic,latin-ext" media="screen" />
		
		<style type="text/css" data-ymaps="css-modules">
			#content_body {
				padding: 30px 0 40px 0;
			}

			@media (max-width: 767px) {
				#content_body {
					padding: 30px 0 10px 0;
				}
				.vv-alert--red {
					background: #F7DDD9 !important;
					padding: 20px;
				}
			}
			#forgot_password {
				margin-left: 30px;
			}
			@media (max-width: 767px) {
				#forgot_password {
					display:block;
					margin-top: 20px;
					margin-left: 0;
					border-bottom: none !important;
				}
			}
			
			select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
				padding: 4px 6px !important;
			}
			
			.atp-menu li {
				padding-left: 20px !important;
			}
			
			@media (max-width: 767px) {
				.save-changes {
					margin-left:0 !important;
					width: 100% !important;
				}
				#save_button {
					width: calc(100% - 18px) !important;
				}
				.rff3 {
					width: 100%;
				}
				.row {
					width: 100%;
				}
				#account_counter_menu {
					padding-top:2px !important;
				}
			}
		</style>

	<?php
	require_once("../util/analytics.php");
	
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
	<body style="background:#f9f8f3; padding:0">
		<?php require("../util/support_dialog.html") ?>
		<div id="content_body" style="min-height:calc(100% + 70px); position:relative;">
			<?php require("../util/header.php") ?>
			
			
			<section id="content">
    <div class="sub-content">
    <div class="container" style="padding:0">
    <div class="row">
                <div class="span12 dop">
            <div class="tac">Личный кабинет</div>
        </div>
    </div>
</div></div>
<div class="sub-content x-transport">
    <div class="container" style="padding:0">
        <div class="row rff3">
            <div class="span3 lk3" style="margin-left:0">
				<ul class="atp-menu" style="-webkit-padding-start:0">
					<li class="x-account-menu-main active pustoi1"><a href="main" style="width:100%; display:block">Основные данные</a></li>
					<li class="x-account-menu-transport"><a href="transport" style="width:100%; display:block">Мой транспорт<?php if ($updated_truck == "0"){ ?><font id='account_counter_menu' style='color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:middle; margin-bottom:1px; padding-top:0.5px; font-size:10px; line-height:11px; font-weight:600; display:inline-block; margin-left:5px;     font-family: Arial, Helvetica, sans-serif;'>1</font><?php } ?></a></li>
				</ul>
			</div>

            <div class="span9 dop2" style="margin-bottom:40px; padding-top:10px; padding-right:40px">
                    <div class="tail_default ocen_tail x-detail-account-main-tip" data-id="814090" style="display:none;">
        <span class="close">Close</span>
        <div>
            <p>Здесь указаны Ваши основные данные – имя и фамилия, e-mail, контактный телефон. Также на этой странице Вы можете изменить свой пароль для входа на «Везёт Всем».</p>
        </div>
        <div class="button">
            <button class="prodoljit_tail"></button>
        </div>
    </div>
                <div class="atpd">
                    <strong>Профиль:</strong>

                    <div class="pustoi1"><?php echo $name ?></div>
                </div>
                <div class="atpd">
                    <strong>Электронная почта:</strong>

                    <div class="pustoi1"><?php echo $email ?></div>
                </div>
                <div class="atpd">
                    <strong>Основной телефон:</strong>

                    <div class="pustoi1"><?php echo $phone ?></div>
                </div>
                <div class="rfz3 dn r4">
                    <div class="w240">
                        <div class="rfl dn"></div>
                        <h1 style="font-weight: bold; font-family: 'PT Sans', sans-serif !important;">Смена пароля</h1>

                        <div class="rfr dn"></div>
                    </div>
                </div>
                <form >
                    <div class="f2">
                        <div class="pustoi1 x-account-old-password">
                            <div class="pustoi6 x-account-error-message"></div>
                            <span>Старый пароль:</span>
                            <div class="pustoi8" style="height:50px; width:210px">
                                <input type="password" id="password" style="padding:0">
                            </div>

                            <div class="pustoi2" id="forgot_password"><a href="/auth/reset_password">Я забыл пароль</a></div>
                        </div>
                        <div class="pustoi4 x-account-password">
                            <div class="pustoi6 x-account-error-message"></div>
                            <span>Новый пароль:</span>
                            <div class="pustoi8" style="height:50px; width:210px">
                                <input type="password" id="new_password" style="padding:0">
                            </div>

                            <div class="pustoi3"></div>
                        </div>
                    </div>
                    <div class="linia7"></div>
                    <div class="save-changes">
                        <button type="submit" class="activ-tel ml190 x-account-change-pass-button" id="save_button">Сохранить изменения</button>
                    </div>
                    <div id="x-account-success-save" class="hover2 dn ha" style="display: none;">
                    	<div class="hover-img2">
                            <div class="triangle"><div class="hover-img2__triangle-figure"></div></div>
                            <div class="hover-img__text">Изменения внесены</div>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
</section>
	<script>
		$("#save_button").click(function(ev){
			ev.preventDefault();
			
			var password = $("#password").val();
			var new_password = $("#new_password").val();
			
			if (!password || !new_password){
				alert("Пожалуйста заполните все поля.");
				return;
			} else if (new_password.length < 6){				
				alert("Введите не менее 6 символов для нового пароля.");
				return;
			}
			
			$("#save_button").html("Подождите...");		
			
			$.ajax({
				type: "POST",
				url: '../api/v1/user/update_password',
				data: {
					"password": password,
					"new_password": new_password
				},
				dataType: "json",
				success: function(data){
					if ('error' in data){
						alert(data["error"]);
						$("#save_button").html("Сохранить изменения");
					} else {
						alert("Ваш пароль успешно обновлён.");
						location.reload();
					}
				},
				error: function(data){
					alert("Ошибка сервера. Пожалуйста напишите в поддержку.");
					$("#save_button").html("Сохранить изменения");
				}
			});
		});
		
		$("#account_counter").hide();
		$("#account_counter_drawer").hide();
		$("#account_counter_header").hide();
		
	</script>
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
		<script type="text/javascript" src="../assets/cache/201722/support_dialog.min.js" charset="UTF-8"></script>
		<script type='text/javascript' src="../util/jivosite.js"></script>
		<script type="text/javascript" src="../assets/cache/201722/drawer.js" charset="UTF-8"></script>
		</body>
</html>