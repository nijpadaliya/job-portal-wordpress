(function ($) {
    "use strict";

    var $window = $(window);
    var $body = $('body');
	
	// Apply theme immediately before DOM is ready
const savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
    document.documentElement.setAttribute("data-theme", "dark");
}


    // Testimonials Slider
    $('.testimonials').slick({
        infinite: true,
        dots: false,
        arrows: false,
        autoplay: true,
        slidesToShow: 2.7,
        slidesToScroll: 1,
        centerMode: false,
        responsive: [
            { breakpoint: 991, settings: { slidesToShow: 1.7 } },
            { breakpoint: 767, settings: { slidesToShow: 1 } }
        ]
    });

        $('.featured-jobs-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            responsive: [

                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
                    }
                },

                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }

            ]
        });
    

})(jQuery);
