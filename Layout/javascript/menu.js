(function($) {

    /*
        Responsive Flat Menu
        http://cssmenumaker.com/menu/responsive-flat-menu
    */

    $.fn.menumaker = function(options) {

        var cssmenu = $(this),
            settings = $.extend({
                title: "Menu",
                format: "dropdown",
                sticky: false
            }, options);

        return this.each(function() {
            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            $(this).find("#menu-button").on('click', function() {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.hide().removeClass('open');
                } else {
                    mainmenu.show().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });

            cssmenu.find('li ul').parent().addClass('has-sub');

            multiTg = function() {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').hide();
                    } else {
                        $(this).siblings('ul').addClass('open').show();
                    }
                });
            };

            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');

            if (settings.sticky === true) cssmenu.css('position', 'fixed');

            resizeFix = function() {
                if ($(window).width() > 768) {
                    cssmenu.find('ul').show();
                }

                if ($(window).width() <= 768) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);

        });
    };
})(jQuery);

/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

;
(function($, window, document, undefined) {
    $.fn.doubleTapToGo = function(params) {
        if (!('ontouchstart' in window) &&
            !navigator.msMaxTouchPoints &&
            !navigator.userAgent.toLowerCase().match(/windows phone os 7/i)) return false;

        this.each(function() {
            // var curItem = false;
            //
            // $(this).on('click', function(e) {
            //     var item = $(this);
            //     if (item[0] != curItem[0]) {
            //         e.preventDefault();
            //         curItem = item;
            //     }
            // });

            $(document).on('click touchstart MSPointerDown', function(e) {
                var resetItem = true,
                    parents = $(e.target).parents();

                for (var i = 0; i < parents.length; i++)
                    if (parents[i] == curItem[0])
                        resetItem = false;

                if (resetItem)
                    curItem = false;
            });
        });
        return this;
    };
})(jQuery, window, document);

/**
 * doubleTapToGoDecorator
 * Adds the ability to remove the need for a second tap
 * when in the mobile view
 *
 * @param {function} f - doubleTapToGo
 */
function doubleTapToGoDecorator(f) {
    return function() {

        this.each(function() {
            $(this).on('click', function(e) {

                // If mobile menu view
                if ($('#menu-button').css('display') == 'block') {

                    // If this is not a submenu button
                    if (!$(e.target).hasClass('submenu-button')) {

                        // Remove the need for a second tap
                        window.location.href = $(e.target).attr('href');
                    }
                }

            });
        });

        return f.apply(this);
    }
}

// Add decorator to the doubleTapToGo plugin
jQuery.fn.doubleTapToGo = doubleTapToGoDecorator(jQuery.fn.doubleTapToGo);

/**
 * jQuery
 */
(function($) {
    $(document).ready(function() {

        $("#cssmenu").menumaker({
            title: "Menu",
            format: "multitoggle"
        });

        $('#cssmenu li:has(ul)').doubleTapToGo();

    });
})(jQuery);