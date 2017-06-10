<?php
	session_start();
	
	require("../util/connectDB.php");
	global $con;
	
	$session_user_id = @$_SESSION['user_id'];
	
	$type = null;
	if ($session_user_id != null){
		// Get user type
		$session_user_query = mysqli_query($con, "SELECT type, updated_truck FROM user WHERE user_id='$session_user_id'");
		$session_user_result = mysqli_fetch_assoc($session_user_query);
		$type = $session_user_result["type"];
		$updated_truck = $session_user_result["updated_truck"];
		
		if ($type !== "0"){
			returnToMain();
		}
	} else {
		returnToMain();
	}
	
	function returnToMain(){
		header('Location: /');
		die();
	}

	$truck_query = mysqli_query($con, "SELECT make, model, type, weight, length, width, height, volume, description FROM truck WHERE user_id='$session_user_id'") or die (mysqli_error($con));
	$truck_result = mysqli_fetch_assoc($truck_query);
	if ($truck_result) {
		$updated_truck = 1;
		$make = $truck_result["make"];
		$model = $truck_result["model"];
		$truck_type = $truck_result["type"];
		$weight = $truck_result["weight"];
		$length = $truck_result["length"];
		$width = $truck_result["width"];
		$height = $truck_result["height"];
		$volume = $truck_result["volume"];
		$description = $truck_result["description"];
	} else {		
		$make = "";
		$model = "";
		$truck_type = "";
		$weight = "";
		$length = "";
		$width = "";
		$height = "";
		$volume = "";
		$description = "";
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
		<link type="text/css" rel="stylesheet" href="../assets/styles/pages/account/carrier/transport-list.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="../assets/styles/pages/account/carrier/my-transport.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="../assets/styles/pages/account/carrier/transport.css" media="screen" />
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
			
			select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
				padding: 4px 6px !important;
			}
			
			.atp-menu li {
				padding-left: 20px !important;
			}
			
			#description {
				width:calc(100% - 250px);
			}
			.my-transport {
				padding-right:40px;
			}
			
			@media (max-width: 767px) {
				.rff3 {
					width: 100%;
				}
				.row {
					width: 100%;
				}			
				#description {
					width: 100%;
				}
				.model_block {
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
        <li class="x-account-menu-main"><a href="main" style="width:100%; display:block">Основные данные</a></li>
        <li class="x-account-menu-transport active pustoi1"><a href="transport" style="width:100%; display:block">Мой транспорт<?php if ($updated_truck == "0"){ ?><font id='account_counter_menu' style='color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:middle; margin-bottom:1px; padding-top:0.5px; font-size:10px; line-height:11px; font-weight:600; display:inline-block; margin-left:5px;     font-family: Arial, Helvetica, sans-serif;'>1</font><?php } ?></a></li>
    </ul>
</div>

            <div class="span9 dop2 my-transport" style="margin-bottom:40px; padding-top:30px">

                <div id="account-add-transport-title" class="rfz3 dn r5">
    <div class="w240">
        <div class="rfl dn"></div>
        <h1 id="transport_title" style="font-weight: bold; font-family: 'PT Sans', sans-serif !important;">
                            Параметры ТС
                    </h1>

        <div class="rfr dn"></div>
    </div>
</div>
<?php if ($updated_truck == "0") { ?>
	<div class="my-transport__alert vv-alerts">
        <div class="vv-alert vv-alert--red">
            <p>Обратите внимание! Чтобы ускорить выбор вашего предложения и стать привлекательнее для заказчиков, необходимо добавить свой транспорт и указать его характеристики.</p>
            <button id="no_truck_button" class="my-transport__alert-button vv-button vv-button--blue x-is-no-transport">У меня нет транспорта</button>
        </div>
	</div>
<?php } ?>
	
<form class="transport x-transport" novalidate="">

    <div id="x-files"></div>

    <div class="transport-optionsBlock">
        <div class="transport-warning x-account-transport-errors"></div>
        <div class="transport-block">

        <div class="x-name transport-block x-carOnly ">
            <p class="transport-label _required">Марка автомобиля</p>
            <select id="make" class="transport-select x-transport-param transport-greyBorder x-carBrand x-multiselect" name="entity[name]">
                                                            <option value="">- Выберите марку автомобиля -</option>
                                                            <option value="Alke">Alke</option>															
                                                                                <option value="Asia">Asia</option>
                                                                                <option value="ASTRA">ASTRA</option>
                                                                                <option value="Avia">Avia</option>
                                                                                <option value="Barkas">Barkas</option>
                                                                                <option value="BAW">BAW</option>
                                                                                <option value="Beifan">Beifan</option>
                                                                                <option value="Berna">Berna</option>
                                                                                <option value="BMC">BMC</option>
                                                                                <option value="CAMC">CAMC</option>
                                                                                <option value="Caterpillar">Caterpillar</option>
                                                                                <option value="Chana">Chana</option>
                                                                                <option value="Changan">Changan</option>
                                                                                <option value="ChangFeng">ChangFeng</option>
                                                                                <option value="Chevrolet">Chevrolet</option>
                                                                                <option value="Citroen">Citroen</option>
                                                                                <option value="Dacia">Dacia</option>
                                                                                <option value="Daewoo">Daewoo</option>
                                                                                <option value="DAF">DAF</option>
                                                                                <option value="Daihatsu">Daihatsu</option>
                                                                                <option value="Dayun">Dayun</option>
                                                                                <option value="DFSK">DFSK</option>
                                                                                <option value="Dodge">Dodge</option>
                                                                                <option value="DongFeng">DongFeng</option>
                                                                                <option value="Doninvest">Doninvest</option>
                                                                                <option value="FAW">FAW</option>
                                                                                <option value="Fiat">Fiat</option>
                                                                                <option value="Ford">Ford</option>
                                                                                <option value="Foton">Foton</option>
                                                                                <option value="Freightliner">Freightliner</option>
                                                                                <option value="GAC Gonow">GAC Gonow</option>
                                                                                <option value="Geely">Geely</option>
                                                                                <option value="GMC">GMC</option>
                                                                                <option value="Golden Dragon">Golden Dragon</option>
                                                                                <option value="Goupil">Goupil</option>
                                                                                <option value="Great Wall">Great Wall</option>
                                                                                <option value="Groz">Groz</option>
                                                                                <option value="Hania">Hania</option>
                                                                                <option value="Hino">Hino</option>
                                                                                <option value="Hoka">Hoka</option>
                                                                                <option value="Howo">Howo</option>
                                                                                <option value="Hyundai">Hyundai</option>
                                                                                <option value="IFA">IFA</option>
                                                                                <option value="International">International</option>
                                                                                <option value="Intrall">Intrall</option>
                                                                                <option value="Isuzu">Isuzu</option>
                                                                                <option value="IVECO">IVECO</option>
                                                                                <option value="IVECO HongYan">IVECO HongYan</option>
                                                                                <option value="IVECO-Ling Ye">IVECO-Ling Ye</option>
                                                                                <option value="Iveco-АМТ">Iveco-АМТ</option>
                                                                                <option value="JAC">JAC</option>
                                                                                <option value="JBC">JBC</option>
                                                                                <option value="Jinbei">Jinbei</option>
                                                                                <option value="JMC">JMC</option>
                                                                                <option value="Kia">Kia</option>
                                                                                <option value="LDV">LDV</option>
                                                                                <option value="Lincoln">Lincoln</option>
                                                                                <option value="Lublin">Lublin</option>
                                                                                <option value="MAN">MAN</option>
                                                                                <option value="Mazda">Mazda</option>
                                                                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                                                                <option value="MG">MG</option>
                                                                                <option value="Mitsubishi">Mitsubishi</option>
                                                                                <option value="Mudan">Mudan</option>
                                                                                <option value="Naveco">Naveco</option>
                                                                                <option value="Nissan">Nissan</option>
                                                                                <option value="North Benz">North Benz</option>
                                                                                <option value="Nysa">Nysa</option>
                                                                                <option value="Opel">Opel</option>
                                                                                <option value="Peterbilt">Peterbilt</option>
                                                                                <option value="Peugeot">Peugeot</option>
                                                                                <option value="Piaggio">Piaggio</option>
                                                                                <option value="Pinzgauer">Pinzgauer</option>
                                                                                <option value="Renault">Renault</option>
                                                                                <option value="Robur">Robur</option>
                                                                                <option value="SAURER">SAURER</option>
                                                                                <option value="Scania">Scania</option>
                                                                                <option value="SEAT">SEAT</option>
                                                                                <option value="Shaanxi-MAN">Shaanxi-MAN</option>
                                                                                <option value="Shacman">Shacman</option>
                                                                                <option value="Shenye">Shenye</option>
                                                                                <option value="Silant">Silant</option>
                                                                                <option value="Skoda">Skoda</option>
                                                                                <option value="Sokon">Sokon</option>
                                                                                <option value="Ssang Yong">Ssang Yong</option>
                                                                                <option value="Star">Star</option>
                                                                                <option value="Sterling">Sterling</option>
                                                                                <option value="Subaru">Subaru</option>
                                                                                <option value="Suzuki">Suzuki</option>
                                                                                <option value="TATA">TATA</option>
                                                                                <option value="TATA Daewoo">TATA Daewoo</option>
                                                                                <option value="Tatra">Tatra</option>
                                                                                <option value="Terberg">Terberg</option>
                                                                                <option value="Tiema">Tiema</option>
                                                                                <option value="Toyota">Toyota</option>
                                                                                <option value="Trabant">Trabant</option>
                                                                                <option value="Vauxhall">Vauxhall</option>
                                                                                <option value="Volkswagen">Volkswagen</option>
                                                                                <option value="Volteco">Volteco</option>
                                                                                <option value="Volvo">Volvo</option>
                                                                                <option value="WAW">WAW</option>
                                                                                <option value="Western Star">Western Star</option>
                                                                                <option value="YoungMan">YoungMan</option>
                                                                                <option value="YueJin">YueJin</option>
                                                                                <option value="Zuk">Zuk</option>
                                                                                <option value="Автомастер">Автомастер</option>
                                                                                <option value="Автотор">Автотор</option>
                                                                                <option value="АМУР">АМУР</option>
                                                                                <option value="БЗКТ">БЗКТ</option>
                                                                                <option value="ВАЗ">ВАЗ</option>
                                                                                <option value="ВЗМ">ВЗМ</option>
                                                                                <option value="ВИС">ВИС</option>
                                                                                <option value="ВМЗ">ВМЗ</option>
                                                                                <option value="ГАЗ">ГАЗ</option>
                                                                                <option value="ГАЗ-САЗ">ГАЗ-САЗ</option>
                                                                                <option value="ГолАЗ">ГолАЗ</option>
                                                                                <option value="Граз">Граз</option>
                                                                                <option value="Гуран">Гуран</option>
                                                                                <option value="ЕРАЗ">ЕРАЗ</option>
                                                                                <option value="ЗАЗ">ЗАЗ</option>
                                                                                <option value="ЗИЛ">ЗИЛ</option>
                                                                                <option value="ЗСА">ЗСА</option>
                                                                                <option value="ИЖ">ИЖ</option>
                                                                                <option value="ИМЯ-М">ИМЯ-М</option>
                                                                                <option value="КАЗ">КАЗ</option>
                                                                                <option value="КамАЗ">КамАЗ</option>
                                                                                <option value="КРАЗ">КРАЗ</option>
                                                                                <option value="МАЗ">МАЗ</option>
                                                                                <option value="МАЗ-МАН">МАЗ-МАН</option>
                                                                                <option value="МЗКТ">МЗКТ</option>
                                                                                <option value="МоАЗ">МоАЗ</option>
                                                                                <option value="Москвич (АЗЛК)">Москвич (АЗЛК)</option>
                                                                                <option value="НефАЗ">НефАЗ</option>
                                                                                <option value="РАФ">РАФ</option>
                                                                                <option value="Русич (КЗКТ)">Русич (КЗКТ)</option>
                                                                                <option value="Самотлор-НН">Самотлор-НН</option>
                                                                                <option value="СЕМАР">СЕМАР</option>
                                                                                <option value="СЗАП">СЗАП</option>
                                                                                <option value="ТагАЗ">ТагАЗ</option>
                                                                                <option value="Техноспас-НН">Техноспас-НН</option>
                                                                                <option value="Тонар">Тонар</option>
                                                                                <option value="УАЗ">УАЗ</option>
                                                                                <option value="Урал">Урал</option>
                                                                                <option value="ЯРОВИТ МОТОРС">ЯРОВИТ МОТОРС</option>
                                                </select>												
												<script>
													$("#make option").each(function() {
														this.selected = (this.text == "<?php echo $make ?>");
													});
												</script>
											</div>

        <div class="x-model_id transport-block x-carOnly model_block">
            <p class="transport-label _required">Модель автомобиля</p>
            <div class="transport-weightWrapper">
                <input id="model" style="width: 320px;" class="x-transport-param transport-input transport-greyBorder x-transport-capacity" type="text" name="entity[weight]" value="<?php echo $model ?>">
            </div>
		</div>

        <div class="x-weight x-account-weight transport-block ">
            <p class="transport-label _required">Грузоподъемность до</p>
            <div class="transport-weightWrapper">
                <input id="weight" class="x-transport-param transport-input transport-greyBorder x-transport-capacity" type="number" min="0" name="entity[weight]" value="<?php echo $weight ?>">
                <span class="transport-unitOfMeasurement">тонн</span>
            </div>
        </div>

        <div class="x-type_id x-trunk-types transport-block  x-carOnly x-railwayOnly x-passengerOnly">
            <p class="transport-label">Тип кузова</p>
            <select id="type" class="x-transport-param transport-select transport-greyBorder x-multiselect x-body-type" name="entity[type_id]">
                                    <option value="">- Выберите тип кузова -</option>
                                    <option value="7">«Катюша»</option>
                                    <option value="8">Автобус</option>
                                    <option value="9">Автовоз</option>
                                    <option value="45">Автотопливозаправщик</option>
                                    <option value="44">Автоцистерна</option>
                                    <option value="57">Битумовоз</option>
                                    <option value="13">Борт</option>
                                    <option value="49">Вакуумная машина</option>
                                    <option value="64">Грузовой эвакуатор</option>
                                    <option value="60">Зерновоз</option>
                                    <option value="15">Изотермический</option>
                                    <option value="62">Коневоз</option>
                                    <option value="65">Контейнеровоз</option>
                                    <option value="42">Легковой автомобиль</option>
                                    <option value="50">Лесовоз</option>
                                    <option value="16">Манипулятор</option>
                                    <option value="23">Микроавтобус</option>
                                    <option value="59">Миксер (бетоновоз)</option>
                                    <option value="61">Муковоз</option>
                                    <option value="54">Мусоровоз</option>
                                    <option value="14">Низкорамный</option>
                                    <option value="55">Опен топ</option>
                                    <option value="63">Панелевоз</option>
                                    <option value="4">Пирамида</option>
                                    <option value="6">Рефрижератор</option>
                                    <option value="29">Самосвал</option>
                                    <option value="47">Скотовоз</option>
                                    <option value="2">Тент</option>
                                    <option value="33">Трал</option>
                                    <option value="3">Фургон</option>
                                    <option value="5">Цельнометаллический</option>
                                    <option value="58">Цементовоз</option>
                                    <option value="18">Шаланда</option>
                                    <option value="46">Шасси</option>
                                    <option value="56">Щеповоз</option>
                                    <option value="41">Эвакуатор</option>
                            </select>											
							<script>
								$("#type option").each(function() {
									this.selected = (this.value == "<?php echo $truck_type ?>");
								});
							</script>
		</div>

        <div class="x-account-properties transport-block ">
            <p class="transport-label">Максимальные габариты груза</p>
            <div class="transport-dimensionsWrapper">
                <div class="x-length transport-inputWithLabel x-group-error">
                    <label for="transport-length" class="transport-inputLabel" style="display:block">
                        Длина
                    </label>
                    <input class="x-transport-param transport-input transport-greyBorder x-transport-length _tiny" id="length" type="number" min="0" name="entity[length]" value="<?php echo !empty($length) ? $length : "" ?>">
                    <span class="transport-unitOfMeasurement">м</span>
                </div>
                <div class="x-width transport-inputWithLabel x-group-error">
                    <label for="transport-width" class="transport-inputLabel" style="display:block">
                        Ширина
                    </label>
                    <input class="x-transport-param transport-input transport-greyBorder x-transport-width _tiny" id="width" type="number" min="0" name="entity[width]" value="<?php echo !empty($width) ? $width : "" ?>">
                    <span class="transport-unitOfMeasurement">м</span>
                </div>
                <div class="x-height transport-inputWithLabel x-group-error">
                    <label for="transport-height" class="transport-inputLabel" style="display:block">
                        Высота
                    </label>
                    <input class="x-transport-param transport-input transport-greyBorder x-transport-height _tiny" id="height" type="number" min="0" name="entity[height]" value="<?php echo !empty($height) ? $height : "" ?>">
                    <span class="transport-unitOfMeasurement">м</span>
                </div>
                <div class="x-volume transport-inputWithLabel">
                    <label for="transport-volume" class="transport-inputLabel" style="display:block">
                        Объём
                    </label>
                    <input class="x-transport-param transport-input transport-greyBorder x-transport-volume" id="volume" type="number" min="0" name="entity[volume]" value="<?php echo !empty($volume) ? $volume : "" ?>">
                    <span class="transport-unitOfMeasurement">м<sup>3</sup></span>
                </div>
            </div>
        </div>

        <div class="x-group-errors"></div>

        <div class="x-description transport-block">
            <p class="transport-label _top">Комментарий</p>
            <textarea id="description" class="x-transport-param transport-textarea transport-greyBorder" name="entity[description]" placeholder="Особенности погрузки, разгрузки, перевозки на этой машине"><?php echo $description ?></textarea>
        </div>
    </div>

    
            <button type="button" class="x-account-add-transport-button transport-addButton">
            Сохранить
        </button>
</form>
            </div>
        </div>
    </div>
</div>
</section>
	<script>
		$(".transport-addButton").click(function(){
			var make = $("#make").val();
			var model = $("#model").val();
			var weight = $("#weight").val();
			var type = $("#type").val();
			var length = $("#length").val();
			var width = $("#width").val();
			var height = $("#height").val();
			var volume = $("#volume").val();
			var description = $("#description").val();
			
			if (!make || make == ""){
				alert("Пожалуйста укажите марку автомобиля.");
				return;
			} else if (!model){
				alert("Пожалуйста укажите модель автомобиля.");
				return;
			} else if (!weight){
				alert("Пожалуйста укажите грузоподъемность.");
				return;
			} else if (length == "0" || width == "0" || height == "0" || volume == "0"){
				alert("Неверное значение числа.");
				return;
			}
			
			$(".transport-addButton").html("Подождите...");
			
			$.ajax({
				type: "POST",
				url: '../api/v1/user/update_truck',
				data: {
					"make": make,
					"model": model,
					"weight": weight,
					"type": type,
					"length": length,
					"width": width,
					"height": height,
					"volume": volume,
					"description": description,
				},
				dataType: "json",
				success: function(data){		
					$("#account_counter").hide();
					$("#account_counter_menu").hide();
					alert("Спасибо, Ваш транспорт успешно сохранён.");
					location.reload();
				},
				error: function(data){
					alert("Ошибка сервера. Пожалуйста напишите в поддержку.");
					$(".transport-addButton").html("Сохранить");
				}
			});
		});
		
		$("#length").on("input", function(){
			calculateVolume();
		});
		$("#width").on("input", function(){
			calculateVolume();
		});
		$("#height").on("input", function(){
			calculateVolume();
		});
		function calculateVolume(){
			var volume = $("#length").val();
			var width = $("#width").val();
			var height = $("#height").val();
			
			if (!volume || !width || !height) return;
			
			$("#volume").val(Math.round(volume*width*height*2)/2);
		}
		
		$("#no_truck_button").click(function(){
			$("#no_truck_button").parent().parent().hide();
			$.ajax({
				type: "POST",
				url: '../api/v1/user/set_no_truck',
				dataType: "json",
				success: function(data){
					$("#account_counter").hide();
					$("#account_counter_menu").hide();
				},
				error: function(data){
					alert("Ошибка сервера. Пожалуйста напишите в поддержку.");
				}
			});
		});
		
		$("#account_counter").hide();
		$("#account_counter_drawer").hide();
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