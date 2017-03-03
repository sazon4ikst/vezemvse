(function($) {

    $.vvPromo = {
        defaults: {
            Time : 500
        }
    };

    $.fn.extend({
        /**
         * Initializes the plugin
         */
        vvPromo: function(settings) {
            return this.each(function(){
                settings = $.extend({},  $.vvPromo.defaults,  settings);
                $.data(this,  "vvPromo",  settings);

                var plugin = this;

                $('.x-blondie').on("click", function(){
                    slidePromoContent.call(this, plugin);
                });

                $('.x-send_mail').on("click", function(){
                    sendMail.call(this, plugin);
                });

                $(".x-promo_form").submit(function() {
                    sendMail.call(this, plugin);
                    return false;
                });

                $('.x-email_close-button').click(function(){
                    pushGaSendCloseButton()
                });
                $('.x-auto_close-button').click(function(){
                    pushGaSaveCloseButton()
                });

            });
        }
    });

    function slidePromoContent(plugin)
    {
        $(".x-promocode").toggleClass("hidden_promo");
        $(".x-alert_error").removeClass("error_empty").removeClass("error_wrong").hide();
        $('#promoemail').css("border-color","#5b51dc");
    };

    function sendMail()
    {
        if($('.x-banner-type').val() == 'email') {
            pushGaSendButton();
        } else {
            pushGaSaveButton();
        }

        $(".x-alert_error").removeClass("error_empty").removeClass("error_wrong").hide();
        if ( $('#promoemail').val() != '' )
        {
            var pattern = /^ *([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if ( pattern.test($('#promoemail').val()) )
            {
                $("#promoemail").prop('disabled', true);
                $('#promoemail').css("border-color","#5b51dc");
                $.ajax({
                    type: "POST",
                    url: "/modules/bonus",
                    dataType:'json',
                    data: {
                        amount: $('.x-bonus_amount').html(),
                        code: $('.x-bonus_code').html(),
                        email: $('.x-bonus_email').val()
                    },
                    success:function(data) {
                        if(data.success) {
                            loaderPromo();
                        }
                        else {
                            alert("Извините, на сервере произошла ошибка, попробуйте ещё раз.");
                        }
                        $("#promoemail").prop('disabled', false);
                    }
                })
            }
            else
            {
                $('#promoemail')
                    .css("outline","0px solid #fe5455")
                    .css("border-color","#fe5455")
                    .animate({"outline-width":"2px"},250)
                    .animate({"outline-width":"0px"},250)
                    .animate({"outline-width":"2px"},250)
                    .animate({"outline-width":"0px"},250 , function()
                    {
                        $(".x-alert_error").addClass("error_wrong").fadeIn(500);
                    }
                );
            }
        }
        else
        {
            $('#promoemail')
                .css("outline","0px solid #fe5455")
                .css("border-color","#fe5455")
                .animate({"outline-width":"2px"},250)
                .animate({"outline-width":"0px"},250)
                .animate({"outline-width":"2px"},250)
                .animate({"outline-width":"0px"},250 , function()
                {
                    $(".x-alert_error").addClass("error_empty").fadeIn(500);
                }
            );
        }
    };

    function loaderPromo()
    {
        $(".x-promo_hide").remove();
        $(".x-promo_text")
            .addClass('testb_pos')
            .html("<span class='promo_code nothing'>Отправляем вам письмо</span>")
            .animate({"opacity":"0.3"},1000)
            .animate({"opacity":"1"},1000)
            .animate({"opacity":"0.3"},1000)
            .animate({"opacity":"1"},1000)
            .animate({"opacity":"0"},1000)
        ;
        var width= ($(".x-promo_loading").width())*1 + 10;
        $(".x-promo_loading").addClass("on");
        $(".x-promo_yellow").animate({"width":width+"px"}, 5000, function()
            {
                $(".x-promo_hide2").remove();
                $(".x-promo_text_4").fadeIn(1000, function(){
                    $(".x-promocode").delay(500).animate({"height":"0px"},2000, function(){
                        $(".x-promocode").remove();
                    });
                });
            }
        );
    };


    function pushGaSendButton()
    {
        if (typeof ga == 'function') {
            var label = $('.x-label').val() == '' ? document.location.pathname : $('.x-label').val();
            ga('send', 'event', {
                'eventCategory': 'promo',
                'eventAction': 'button',
                'eventLabel': label,
                'eventValue': $('.x-bonus_amount').html()
            });
        }
    }

    function pushGaSaveButton()
    {
        if (typeof ga == 'function') {
            var label = $('.x-label').val() == '' ? document.location.pathname : $('.x-label').val();
            ga('send', 'event', {
                'eventCategory': 'promo',
                'eventAction': 'button_save',
                'eventLabel': label,
                'eventValue': $('.x-bonus_amount').html()
            });
        }
    }

    function pushGaSendCloseButton()
    {
        if (typeof ga == 'function') {
            var label = $('.x-label').val() == '' ? document.location.pathname : $('.x-label').val();
            ga('send', 'event', {
                'eventCategory': 'promo',
                'eventAction': 'no_bonus',
                'eventLabel': label,
                'eventValue': $('.x-bonus_amount').html()
            });
        }
    }

    function pushGaSaveCloseButton()
    {
        if (typeof ga == 'function') {
            var label = $('.x-label').val() == '' ? document.location.pathname : $('.x-label').val();
            ga('send', 'event', {
                'eventCategory': 'promo',
                'eventAction': 'button_save_no_bonus',
                'eventLabel': label,
                'eventValue': $('.x-bonus_amount').html()
            });
        }
    }


    function settings(el)
    {
        return $.data(el,  "vvPromo");
    };

})(jQuery);
$(document).ready(function () {
    $('.x-promocode').vvPromo();
});