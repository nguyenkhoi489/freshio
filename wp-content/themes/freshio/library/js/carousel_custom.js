jQuery(document).ready(function ($) {
  $(".owl-carousel.block-product").owlCarousel({
    loop: false,
    margin: 30,
    responsiveClass: true,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      600: {
        items: 3,
        nav: false,
      },
      800: {
        items: 5,
      },
      1200: {
        items: 6,
      },
    },
  });

});
