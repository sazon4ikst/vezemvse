<?php


$session_user_id = @$_SESSION['user_id'];
$type = @$_SESSION['type'];

$updated_truck = null;
if (ISSET($session_user_id)){
	require (substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../")."util/connectDB.php";
	
	$session_user_query = mysqli_query($con, "SELECT type, updated_truck FROM user WHERE user_id='$session_user_id'");
	$session_user_result = mysqli_fetch_assoc($session_user_query);
	if ($session_user_result){
		$updated_truck = $session_user_result["updated_truck"];
	}
	$truck_query = mysqli_query($con, "SELECT truck_id FROM truck WHERE user_id='$session_user_id'") or die (mysqli_error($con));
	$truck_result = mysqli_fetch_assoc($truck_query);
	if ($truck_result) {
		$updated_truck = 1;
	}
	if ($session_user_result["type"]!=="0"){
		$updated_truck = 1;
	}
	
	// Set last seen
	mysqli_query($con, "UPDATE user SET last_seen=NOW() WHERE user_id='$session_user_id'") or die (mysqli_error($con));
}

?>

<script src="<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>/assets/scripts/util/jquery.min.js"></script>
<header class="layout__header _fixed">
   <div class="layout__drawer-button x-drawer-button"></div>
   <div class="layout__header-row _viewport_mobile">
      <div class="layout__title header_mobile">
		<a href="/"><img class="layout__logo" src="<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>assets/images/home_v4/logo-mobile.png" alt="Везет Всем — онлайн-сервис грузоперевозок" /></a>
		
			<font id='account_counter' style='display:<?php echo $updated_truck=="0" ? "block" : "none" ?> !important; position:absolute; right:30px; top: 5px; color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:middle; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block; margin-left:5px;     font-family: Arial, Helvetica, sans-serif;'>1</font>
	  </div>
   </div>
   <div class="layout__header-row _viewport_desktop">
      <div class="header">
	  
         <?php require("session_header.php") ?>
         <div class="header__content">
            <div class="header__item header__title">
               <a href="/">
               <img class="header__title-logo" src="<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>assets/images/home_v4/logo-white.png" alt="Сайт грузоперевозок «Везет Всем»">
               <img class="header__title-logo _blue" src="<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>assets/images/home_v4/logo-blue.png" alt="Сайт грузоперевозок «Везет Всем»">
               </a>
               <a class="header__title-link" href="#">Онлайн-сервис перевозок</a>
            </div>
            <div class="header__support header__item">
               <span class="header__support-link contact x-open-support-box">Служба поддержки</span><br>
               <a class="header__support-phone" style="cursor:pointer">info@gurugruza.com.ua</a><br/>
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
	  
		<script>
			$('#content_body').css('padding', ($('.header').height()+$('.header_mobile').height()+parseInt(jQuery('#content_body').css('padding-top'), 10))+"px 0 "+parseInt(jQuery('#content_body').css('padding-bottom'), 10)+"px 0");
		</script>
   </div>
</header>
<div class="layout__drawer x-drawer">
	<div class="drawer__close"></div>
	<div class="drawer">
		<div class="drawer__login">
			<span class="x-hori" data-key="d89fd3d5ae09d3ce4eb131aaef56df7e"></span> <span class="x-hori" data-key="5fad0b1810e3a2b87f6bdad937571a48"></span> </div>
			
		<?php if(!isset($_SESSION['user_id'])){ ?>
			<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="booking" style="margin:0 10px 0 10px; width:calc(100% - 20px)">Узнать стоимость своей перевозки</a>
			<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="kak_rabotat" style="margin:10px 10px 0 10px; width:calc(100% - 20px)">Вы водитель? Присоединяйтесь</a>
			
			<a href="/auth/choice" class="header__link header__register" style="color:#333; margin:20px 10px 0 10px; display:block; text-decoration:underline; text-align:left">Регистрация</a>
			<br>
			<a href="/auth/login" class="header__link header__register" style="color:#333; margin:0 10px 20px 10px; display:block; text-decoration:underline; text-align:left">Войти</a>
		<?php } else { ?>
		<?php if ($type=="0") {
				echo '<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'poisk" style="margin:10px 10px 0 10px; width:calc(100% - 20px); height:auto; padding:15px 0 15px 0">Поиск груза</a>';
				echo '<div id="drawer_new_messages" style="display:none"><a id="drawer_new_messages_link" class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="color:#333; margin:20px 10px 0 10px; display:inline-block; text-decoration:underline">Новые сообщения</a><font id="messages_counter_drawer" style="color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:bottom; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block">1</font></div>';
				echo '<a class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'account/main" style="color:#333; margin:20px 10px 0 10px; display:inline-block; text-decoration:underline">Личный кабинет</a>'.($updated_truck == "0" ? '<font id="account_counter_drawer" style="color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:bottom; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block">1</font>':'').'<br>';
				echo '<a class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="color:#333; margin:20px 10px 0 10px; display:block; text-decoration:underline">Мои ставки</a>';
			}  else {
				echo '<a class="vv-button vv-button--gold vv-button--medium drawer__action" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="margin:10px 10px 0 10px; width:calc(100% - 20px); height:auto; padding:15px 0 15px 0">Мои запросы</a>';
				echo '<div id="drawer_new_messages" style="display:none"><a id="drawer_new_messages_link" class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'zaprosy" style="color:#333; margin:20px 10px 0 10px; display:inline-block; text-decoration:underline">Новые сообщения</a><font id="messages_counter_drawer" style="color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:bottom; margin-bottom:1px; padding-top:1px; font-size:10px; line-height:11px; font-weight:600; display:inline-block">1</font></div>';
			}
			echo '<a class="header__link header__register" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'auth/logout" style="color:#333; margin:20px 10px 20px 10px; display:block; text-decoration:underline">Выйти</a>';
		} ?>
		
		<div class="drawer__support" style="padding-left:10px;">
			<span class="drawer__support-link">Служба поддержки</span>
			<a class="drawer__support-phone">info@gurugruza.com.ua</a>
			<span>Работаем круглосуточно</span>
		</div>
		<div class="drawer__buttons">
			<span class="x-hori" data-key="72088cf0c122072528987c85c7b0b62e"></span>
			<span class="x-hori" data-key="996d7e8d2c9b99cfb25ab9f418df21fb"></span> </div>
	</div>
</div>
<div class="layout__drawer-backdrop x-drawer-backdrop"></div>