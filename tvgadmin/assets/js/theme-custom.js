$(document).ready(function (){

    $('.hero_slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots: false,
        autoplayTimeout:4000,
        autoplay:true,
        lazyLoad:true,
        smartSpeed: 1000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });


    $('.partner-slider').owlCarousel({
        loop:true, 
        nav:true, 
        dots:false, 
        autoplay:true, 
        margin: 30, 
        rewind:false, 
        smartSpeed:1000, 
        autoplayTimeout:5000,
        responsive: {0:{items: 1 }, 480:{items: 2 }, 576:{items: 3 }, 768:{items: 4 }, 1024:{items: 4 } } 
    });

});