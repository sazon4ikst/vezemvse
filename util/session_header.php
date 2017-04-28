<?php

if(isset($_SESSION['user_id'])){
	echo '
	<div class="toolbar" style="padding:0">
		<div class="toolbar">
			<div class="toolbar__content">
				<div class="toolbar__messages toolbar__link " style="margin-right:15px; margin-bottom:2px">
                    <a class="toolbar__messages-link" href="/account"></a>
                </div>

                <!--<a class="toolbar__balance toolbar__link" href="/accountv2/billing" title="Баланс">0</a>-->
                <!--<a class="toolbar__faq toolbar__link" href="/help" title="Помощь для заказчика"></a>-->
                <span class="toolbar__name">Здравствуйте, <a href="/account" style="text-decoration:none">'.parseFirstName($_SESSION['name']).'</a></span>
                <a class="toolbar__cabinet toolbar__link" href="/account" style="text-decoration:none">Мои запросы</a>
                <a class="toolbar__logout toolbar__link" href="/auth/logout" style="text-decoration:none">Выйти<svg class="toolbar__logout-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-296 385 24 23"><path d="M-279 400v4c0 1.7-1.3 3-3 3h-10c-1.7 0-3-1.1-3-3v-15c0-1.7 1.3-3 3-3h10c1.7 0 3 1.3 3 3v4h-2v-4c0-.5-.5-1-1-1h-10c-.6 0-1 .4-1 1v15c0 .6.5 1 1 1h10c.5 0 1-.5 1-1v-4h2z"></path><path d="M-273 396.5l-5-3.5v2.5h-10v2h10v2.5"></path></svg></a>
			</div>
		</div>
	</div>
	';
}

function parseFirstName($name){
	$nameParts = explode(" ", $name);
	return $nameParts[0];
}

?>