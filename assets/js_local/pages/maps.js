$("#testimonial-slides .owl-dots").removeClass('disabled');
$('.owl-carousel').owlCarousel({
loop:false,
margin: 2,
autoHeight : true,
dots:true,
nav:true,
responsive:{
    0:{
        items:2
    },
    600:{
        items:4
    },
    1000:{
        items:6
    }
}


});