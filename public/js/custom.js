/*
 Project Name :Brands Business Theme
 Author Company : themecanyon
 Project Date: 22 September, 2016
 Project Developer: sufyan319@outlook.com
 */
/*=============================================
Table Of Contents
================================================

 1.Screen Height
 2.Banner Mouse
 3.Window Resize
 4.Blog Slider
 5.Accordion Plus Minus
 6.Tooltip
 7.Parallax Image
 8.Progress bar
 9.Pie Chart
 10.Testimonial Slider
 11.Count Function
 12.Count down
 13.Mobile Menu
 14.Portfolios
 
 Table Of Contents end
 ================================================
 */
jQuery(document).ready(function($) {

    "use strict";
    //============================================
    //Screen height
    //=============================================
    $("#main-banner,.screen-height").css({
        'height': window.innerHeight
    });
    //================================================
    //Banner Mouse
    //=================================================
    $(".mouse").css({
        'top': window.innerHeight - 100
    });

    //================================================
    //Blog Slider
    //=================================================
    $("#cont-slider").owlCarousel({

        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination: false

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });
    //================================================
    //Accordion
    //=================================================
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    //================================================
    //Tooltip
    //=================================================
    $('[data-toggle="tooltip"]').tooltip();
    /*--------------------------------------------------
     Parallax
     ---------------------------------------------------*/
    $(window).stellar({
        responsive: true,
        horizontalScrolling: false,
        hideDistantElements: false,
        horizontalOffset: 0,
        verticalOffset: 0
    });
    //================================================
    //Banner Slider
    //=================================================
    $(".carousel-banner").owlCarousel({

        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination: false,
        autoPlay: 6000
    });
    //============================================
    //Smooth Scroll On click anchor
    //=============================================
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
    //================================================
    //Progress Bar
    //=================================================
    $('.skill').each(function() {
        $(this).appear(function() {
            $(this).find('.skill-box').animate({
                width: jQuery(this).attr('data-percent')
            }, 1000);
            $(this).find('span').animate({
                left: jQuery(this).attr('data-percent')
            }, 1000);
        });
    });

    //================================================
    //pie Chart
    //=================================================
    $('.pie-block').each(function() {
        $(this).appear(function() {
            $('.chart').easyPieChart({
                //your options goes here
            });
        });
    });
    //================================================
    //Testimonial Slider
    //=================================================
    $("#testi-slider").owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });

    //===============================================
    // count function
    //===============================================
    $('.count').each(function() {
        jQuery(this).appear(function() {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    });
    //================================================
    // count down
    //================================================
    $('#countdown').countdown('2020/06/4', function(event) {
        $(this).html(event.strftime('<div class="days count-down"><div class="inner"><span class="number">%-D</span><span class="string">%!D:Day,Days;</span></div></div> <div class="hours count-down"><div class="inner"><span class="number">%H</span><span class="string">%!H:Hour,Hours;</span></div> </div><div class="minutes count-down"><div class="inner"><span class="number">%M</span><span class="string">%!M:Minute,Minutes;</span></div> </div><div class="seconds count-down"><div class="inner"><span class="number">%S</span><span class="string">%!S:Second,Seconds;</span></div> </div>'));
    });
    //================================================
    //Mobile Menu
    //=================================================
    var $body = $('body'),
        $wrapper = $('.body-innerwrapper'),
        $toggler = $('.navbar-toggle'),
        $close = $('.close-offcanvas'),
        $offCanvas = $('.offcanvas-menu');

    $toggler.on('click', function(event) {
        event.preventDefault();
        stopBubble(event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event) {
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function() {
        $body.addClass('offcanvas');
        $wrapper.on('click', offCanvasClose);
        $close.on('click', offCanvasClose);
        $offCanvas.on('click', stopBubble);

    };

    var offCanvasClose = function() {
        $body.removeClass('offcanvas');
        $wrapper.off('click', offCanvasClose);
        $close.off('click', offCanvasClose);
        $offCanvas.off('click', stopBubble);
    };

    var stopBubble = function(e) {
        e.stopPropagation();
        return true;
    };
    //================================================
    //Back To Top
    //=================================================
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, scroll_top_duration);
    });

});

//================================================
//Window load function
//portfolio
//=================================================
jQuery(window).load(function() {
    var $gallery = jQuery('.sp-portfolio-items');


    $gallery.isotope({
        // options
        itemSelector: 'li',
        layoutMode: 'fitRows'

    });

    var $filter = jQuery('.sp-portfolio-filter');
    var $selectors = $filter.find('>li>a');

    $filter.find('>li>a').on('click', function() {
        var selector = jQuery(this).attr('data-filter');

        $selectors.removeClass('active');
        jQuery(this).addClass('active');

        $gallery.isotope({ filter: selector });
        return false;
    });

    var $currentURL = '/momentum/brand1/html/brand//index.php';
    var $start = 6; // ajax start from last limit
    var $limit = 2;
    var $totalitem = 10;

    jQuery('.sp-portfolio-loadmore > a').on('click', function(e) {
        var $this = jQuery(this);
        $this.removeClass('done').addClass('loading');
        $.get($currentURL, { moduleID: 119, start: $start, limit: $limit }, function(data) {

            $start += $limit;

            var $newItems = $(data);
            $gallery.isotope('insert', $newItems);

            if ($totalitem <= $start) {
                $this.removeClass('loading').addClass('hide');

                // AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
                if (!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
                    jQuery(function($) {
                        $("a[rel^='lightbox']").slimbox({ /* Put custom options here */ }, null, function(el) {
                            return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
                        });
                    });
                }
                ////

                return false;
            } else {
                $this.removeClass('loading').addClass('done');
                ////

                // AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
                if (!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
                    jQuery(function($) {
                        jQuery("a[rel^='lightbox']").slimbox({ /* Put custom options here */ }, null, function(el) {
                            return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
                        });
                    });
                }

            }

        });

        return false;
    });

});

//================================================
//window resize
//=================================================
jQuery(window).resize(function() {
    jQuery("#main-banner,.screen-height").css({
        'height': window.innerHeight
    });
    jQuery(".mouse").css({
        'top': window.innerHeight - 100
    });
});
