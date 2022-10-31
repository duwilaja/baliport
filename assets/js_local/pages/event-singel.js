    var owl = $('.owl-carousel');
    owl.owlCarousel({
    animateOut: 'fadeOut',
    dots: false,
    items:1,
    loop:true,
    autoplay:true,
    autoplayTimeout:6000,
    autoHeight:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:true
        },
        1000:{
            items:1,
            nav:true,
            loop:true
        }
    },
    autoplayHoverPause:true
      });
      $('.play').on('click',function(){
          owl.trigger('play.owl.autoplay',[2000])
      })
      $('.stop').on('click',function(){
          owl.trigger('stop.owl.autoplay')
      })