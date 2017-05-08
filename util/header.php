<script src="./assets/scripts/util/jquery.min.js"></script>
<header class="layout__header _fixed">
   <div class="layout__drawer-button x-drawer-button"></div>
   <div class="layout__header-row _viewport_mobile">
      <div class="layout__title header_mobile">
		<a href="/"><img class="layout__logo" src="assets/images/home_v4/logo-mobile.png" alt="Везет Всем — онлайн-сервис грузоперевозок" /></a>
      </div>
   </div>
   <div class="layout__header-row _viewport_desktop">
      <div class="header">
         <?php require("util/session_header.php") ?>
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
               <a class="header__support-phone" style="cursor:pointer">info@vezemvse.com.ua</a><br/>
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