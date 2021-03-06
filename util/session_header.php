<?php

if(isset($_SESSION['user_id'])){	
	
	echo '
	<div class="toolbar" style="padding:0">
		<div class="toolbar">
			<div class="toolbar__content">
				<div class="toolbar__messages toolbar__link " style="margin-right:25px; margin-bottom:2px">
					<div id="unread_count" style="margin-left:5px; border-radius: 10px; background-color: #F44336; height:14px; padding: 2px 4px 1px; position: absolute; bottom: 10px; right: -10px; line-height: 1; font-size: 10px; display:none; font-weight:600"></div>
				</div>

                <span class="toolbar__name">Здравствуйте, '.$_SESSION['name'].'</span>
				'.($type=="0"?"<a class='toolbar__cabinet toolbar__link' href='".(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../")."account/main' style='text-decoration:none'>Личный кабинет<font id='account_counter_header' style='color:#fff; background:#F44336; border-radius:10px; width:14px; height:14px; text-align:center; vertical-align:middle; margin-bottom:1px; padding-top:0.5px; font-size:10px; line-height:11px; font-weight:600; margin-left:5px; display:".(($updated_truck or basename($_SERVER['PHP_SELF'])=="transport.php")?"none":"inline-block")."'>1</font></a>":"").'
				'.($type=="0"?"<a class='toolbar__cabinet toolbar__link' href='".(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../")."poisk' style='text-decoration:none'>Поиск грузов</a>":"").'
				'.($type=="1"?"<a class='toolbar__cabinet toolbar__link' href='".(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../")."booking' style='text-decoration:none'>Разместить запрос</a>":"").'
                <a class="toolbar__cabinet toolbar__link" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'/zaprosy" style="text-decoration:none">'.($type=="0"?"Мои ставки":"Мои запросы").'</a>
                <a class="toolbar__logout toolbar__link" href="'.(substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../").'/auth/logout" style="text-decoration:none">Выйти<svg class="toolbar__logout-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-296 385 24 23"><path d="M-279 400v4c0 1.7-1.3 3-3 3h-10c-1.7 0-3-1.1-3-3v-15c0-1.7 1.3-3 3-3h10c1.7 0 3 1.3 3 3v4h-2v-4c0-.5-.5-1-1-1h-10c-.6 0-1 .4-1 1v15c0 .6.5 1 1 1h10c.5 0 1-.5 1-1v-4h2z"></path><path d="M-273 396.5l-5-3.5v2.5h-10v2h10v2.5"></path></svg></a>
			</div>
		</div>
	</div>
	';
	
	?>	
	<script src="<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>/assets/scripts/util/jquery.min.js"></script>
	<script src = "<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>/assets/scripts/util/jquery.jrumble.1.3.js"></script>
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
				url: "<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>api/v1/message/get_unread_count",
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
							window.location.href = "<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>gruz?id="+messages[0]["freight_id"]+"&open_offer="+messages[0]["offer_id"];
						});

						$('#drawer_new_messages').show();
						$('#messages_counter_drawer').html(unread_count);
						$('#drawer_new_messages_link').attr("href", "<?php echo substr_count($_SERVER['REQUEST_URI'], "/")==1?"":"../" ?>gruz?id="+messages[0]["freight_id"]+"&open_offer="+messages[0]["offer_id"]);
						
						$('#account_counter').show();
						$('#account_counter').html(unread_count+<?php echo $updated_truck == "0" ? 1 : 0 ?>);
						
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
						$('#drawer_new_messages').hide();
						
						var updated_truck = <?php echo $updated_truck ?>;
						if (updated_truck == "1"){
							$('#account_counter').hide();
						}
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