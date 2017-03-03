$('.x-items-carousel').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><svg class="slick-arrow-icon" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg"><path class="slick-arrow-svg" d="M.843 7.207L.136 6.5 6.5.136 7.914 1.55 2.964 6.5l4.95 4.95L6.5 12.864.843 7.207z" fill="#fff"/></svg></button>',
  nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><svg class="slick-arrow-icon" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg"><path class="slick-arrow-svg" d="M.843 7.207L.136 6.5 6.5.136 7.914 1.55 2.964 6.5l4.95 4.95L6.5 12.864.843 7.207z" fill="#fff"/></svg></button>',
  variableWidth: true,
  responsive: [
    {
      breakpoint: 979,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
