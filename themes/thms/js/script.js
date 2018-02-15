
jQuery(document).ready(function ($) {


// Scroll to top
// $('html, body').animate({ scrollTop: 0 }, 0);



    $('.grid').isotope({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            // use element for option
            columnWidth: '.grid-sizer'
        }
    });


    $('.scrolldown').click(function () {

        var $stickit = $('.stick-it').offset().top;
        $('html, body').animate({scrollTop: $stickit}, 1000, 'easeInOutCubic');


    });


    function sticky_menu() {


        var menu = $('.site-header');

        var scrollTop = $(window).scrollTop();

        var elementTop = $('.stick-it').offset().top;

        if (scrollTop < 301) {
            $(menu).removeClass('sticky');

        }
        if (scrollTop > 300) {
            $(menu).addClass('sticky');

        }
        if (scrollTop < elementTop) {

            $(menu).removeClass('stick');

        }

        if (scrollTop > elementTop) {
            $(menu).addClass('stick');

        }

    }


    function darken() {


        var $image = $('.top-image');

        var NavTop = Math.floor($('.stick-it').offset().top - $(document).scrollTop());
        var NavScroll = NavTop / $image.height();

        var para = $(document).scrollTop();

        $image.css('opacity', NavScroll);
       // $image.css('transform','translateY(-'+ $(document).scrollTop()/0.5 +'px)');
        //$image.css('transform','scale('+ (1 + (NavScroll)) +')');
        // $('.big-top').css('opacity',NavScroll);


        //var scrollNum = $(document).scrollTop();
        //scrollNum = scrollNum/1000;

        //$('.top-image').css('opacity',NavScroll);

    }


    $(window).scroll(function (e) {
        sticky_menu();
        darken();


    });
/*
    $.stellar({
        horizontalOffset: 0,
        verticalOffset: 0
    });
*/

// MENU SLIDING

    var header = $('.site-header');

    $('.menu-toggle').click(function () {
        $(header).toggleClass('toggled');

    });

// ACCORDION


    $(".acc-group").find(".acc-head").click(function () {

        $(".acc-group").not($(this).parent()).removeClass("opened");
        $(this).parent().toggleClass("opened");
        $(this).next().slideToggle("fast");

        $(".acc-content").not($(this).next()).slideUp('fast');


    });


// PARALLAX




// OWL CAROUSEL

    $("#slider-news").owlCarousel({


        // Most important owl features
        items: 3,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: false,
        itemsTablet: false,
        itemsTabletSmall: false,
        itemsMobile: [700, 1],
        singleItem: false,
        itemsScaleUp: false,

        //Basic Speeds
        slideSpeed: 800,
        paginationSpeed: 800,
        rewindSpeed: 1000,

        //Autoplay
        autoPlay: false,
        stopOnHover: false,

        // Navigation
        navigation: true,
        navigationText: ["", ""],
        rewindNav: true,
        scrollPerPage: true,

        //Pagination
        pagination: true,
        paginationNumbers: false,

        // Responsive
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,

        // CSS Styles
        baseClass: "owl-carousel",
        theme: "owl-theme",

        //Lazy load
        lazyLoad: false,
        lazyFollow: true,
        lazyEffect: "fade",

        //Auto height
        autoHeight: false,

        //JSON
        jsonPath: false,
        jsonSuccess: false,

        //Mouse Events
        dragBeforeAnimFinish: true,
        mouseDrag: true,
        touchDrag: true,

        //Transitions
        transitionStyle: false,

        // Other
        addClassActive: false,

        //Callbacks
        beforeUpdate: false,
        afterUpdate: false,
        beforeInit: false,
        afterInit: false,
        beforeMove: false,
        afterMove: false,
        afterAction: false,
        startDragging: false,
        afterLazyLoad: false

    });


});