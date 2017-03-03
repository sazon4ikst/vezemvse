$(document).ready(function(){
    // feedback slider
    $('#x-feedback-slider').anythingSlider({
        mode: 'f',
        expand: false,
        enableArrows: true,
        enableNavigation: false,
        enableStartStop: false,
        enableKeyboard: false,
        buildNavigation: false,
        toggleControls: false,
        buildArrows: true,
        buildStartStop: false,
        resizeContents: false,
        hashTags: false
    });


    var owl = $('#x-last-win-orders');
    owl.owlCarousel({
        pagination: false,
        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
    });
    // Custom Navigation Events
    $(".x-similar-next").click(function(){
        owl.trigger('owl.next');
    });
    $(".x-similar-prev").click(function(){
        owl.trigger('owl.prev');
    });

});