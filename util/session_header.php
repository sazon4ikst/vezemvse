<?php

if(isset($_SESSION['user_id'])){	
	$session_user_id = @$_SESSION['user_id'];
	$type = @$_SESSION['type'];
	
	echo '
	<div class="toolbar" style="padding:0">
		<div class="toolbar">
			<div class="toolbar__content">
				<div class="toolbar__messages toolbar__link " style="margin-right:25px; margin-bottom:2px">
					<div id="unread_count" style="margin-left:5px; border-radius: 10px; background-color: #e84e3c; height:14px; padding: 2px 4px 1px; position: absolute; bottom: 10px; right: -10px; line-height: 1; font-size: 10px; display:none"></div>
				</div>

                <span class="toolbar__name">Здравствуйте, '.$_SESSION['name'].'</span>
				'.($type=="0"?"<a class='toolbar__cabinet toolbar__link' href='poisk' style='text-decoration:none'>Поиск грузов</a>":"").'
				'.($type=="1"?"<a class='toolbar__cabinet toolbar__link' href='booking' style='text-decoration:none'>Разместить запрос</a>":"").'
                <a class="toolbar__cabinet toolbar__link" href="/zaprosy" style="text-decoration:none">'.($type=="0"?"Мои предложения":"Мои запросы").'</a>
                <a class="toolbar__logout toolbar__link" href="/auth/logout" style="text-decoration:none">Выйти<svg class="toolbar__logout-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-296 385 24 23"><path d="M-279 400v4c0 1.7-1.3 3-3 3h-10c-1.7 0-3-1.1-3-3v-15c0-1.7 1.3-3 3-3h10c1.7 0 3 1.3 3 3v4h-2v-4c0-.5-.5-1-1-1h-10c-.6 0-1 .4-1 1v15c0 .6.5 1 1 1h10c.5 0 1-.5 1-1v-4h2z"></path><path d="M-273 396.5l-5-3.5v2.5h-10v2h10v2.5"></path></svg></a>
			</div>
		</div>
	</div>
	';
	
	?>	
	<script src="./assets/scripts/util/jquery.min.js"></script>
	<script src = "./assets/scripts/util/jquery.jrumble.1.3.js"></script>
	<script>
		var message_shaked = false;
	
		window.addEventListener('load', function() {
			refreshUnreadCount();
			setInterval(function(){
				refreshUnreadCount();
			}, 10000);
		}, false);
		
		function refreshUnreadCount() {
			var user_id = "<?php echo $session_user_id ?>";
			$.ajax({
				type: "POST",
				url: "api/message/get_unread_count",
				data: {
					"user_id": user_id
				},
				success: function(data){
					var messages = JSON.parse(data);
					var unread_count = messages.length;
					if (unread_count > 0){
						$("#unread_count").html(unread_count);
						$("#unread_count").show();

						$('#unread_count').parent().css('cursor', 'pointer');

						$('#unread_count').parent().click(function() {
							window.location.href = "./gruz?id="+messages[0]["freight_id"]+"&open_offer="+messages[0]["offer_id"];
						});													
						
						if (!message_shaked){
							message_shaked = true;		
															
							setTimeout(function(){							
								$('#unread_count').parent().jrumble({
									x: 0,
									y: 0,
									rotation: 10,
									speed: 100
								});
								$("#unread_count").parent().trigger('startRumble');

								setTimeout(function(){							
									$('#unread_count').trigger('stopRumble');
								}, 1500);
							}, 2000);
						}
					} else {
						$("#unread_count").hide();
					}
				},
				error: function(){
				}
			});
		}
	</script>
	<?php
}

?>