/*
 * Provides messaging between users around an order
 *
 */
(function($) {

	$.vvRecordTraffic = {
		defaults: {
            canvas: true,
            screen_resolution: true
        }
	};

	$.fn.extend({
		/**
		 * Initializes the plugin
		 */
		vvRecordTraffic: function(settings) {
			return this.each(function(){
				settings = $.extend({}, $.vvRecordTraffic.defaults, settings);
				$.data(this, "vvRecordTraffic", settings);

				var self = this;

                init.call(self);
			});
		}
	});

    function init()
    {
        var fingerprint = new Fingerprint(settings(this)).get();

        $.ajax({
            url: '/action/record_traffic',
            type: 'POST',
            dataType: 'json',
            data: {
                fingerprint: fingerprint,
				referrer: document.referrer
            }
        });
    }

	/**
	 * provides the options of the plugin
	 *
	 * @param HTMLNode el element the options are saved for
	 * @return array
	 */
	function settings(el)
	{
		return $.data(el, "vvRecordTraffic");
	}

})(jQuery);

$(document).ready(function(){
    $(document).vvRecordTraffic();
});