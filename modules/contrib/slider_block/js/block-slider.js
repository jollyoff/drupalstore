(function ($, Drupal) {
    $().ready(function(){
      $('.slick-carousel').slick({
        arrows: true,
        rows: 2,
        slidesPerRow: 3,
        centerPadding: "0px",
        dots: false,
        touchThreshold: 500,
        infinite: false
      });
    });
})(jQuery, Drupal);