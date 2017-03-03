(function($){
    $(document).ready(function(){
        if($(".transporters_slider").length){
            $(".transporters_slider").owlCarousel({
                items: 1,
                singleItem: true,
                autoPlay: 7000,
                autoHeight: false
            });
        }
    });
})(jQuery)
