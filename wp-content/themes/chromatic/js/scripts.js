// Switches out the main site nav#access with a select box
// Minimizes nav#access on mobile devices
// Now lets load the JS when the DOM is ready
jQuery(document).ready(function($){

    // Menu interactions
    $(".menu li:has(ul)").addClass("parent").append('<span><b class="caret"></b></span>');
    $('.menu .sub-menu').hide();
    $('.menu span').click(function() {
        $(this).prev(".sub-menu").slideToggle('fast');
    });

	$('.sidebar-toggle').click(function() {
		$('body').toggleClass('sidebar-hidden');
	});

	$('#widgets-toggle .toggle-icon').click(function() {
		$('#footer-widgets').slideToggle('fast');
		$('#widgets-toggle .genericon').toggleClass('genericon-collapse genericon-expand');
	});

	$('#widgets-toggle .toggle-icon').hover(function() {
		$('#widgets-toggle-info').fadeToggle(100);
	});

    // Zebra stipes for tables
    $(".half:nth-child(2n+2)").addClass("end");
    $(".third:nth-child(3n+3)").addClass("end");
    $("td:odd").addClass("odd");

    // Generic show and hide wrapper class
    $(".wrap").hover(function(){
      $(".hide", this).fadeTo(300, 1.0); // This sets 100% on hover
      $(".fade", this).fadeTo(300, 0.7); // This sets 70% on hover
      $(".show", this).fadeTo(300, 0.2); // This sets 100% on hover
    },function(){
      $(".hide", this).fadeTo(300, 0); // This should set the opacity back to 0% on mouseout
      $(".fade", this).fadeTo(300, 1.0); // This sets 80% on hover
      $(".show", this).fadeTo(300, 1.0); // This should set the opacity back to 0% on mouseout
    });

    // Zebra stipes for tables
    $(".half:nth-child(2n+2)").addClass("end");
    $(".third:nth-child(3n+3)").addClass("end");
    $("td:odd").addClass("odd");

    // FitVids
    $(".post-format-content").fitVids();

    // Opacity Effects
    var $SingleItem = $('.post-format-content');
    $SingleItem.hover(function(){
    	//$(this).find('.img-entry').stop(true, true).animate({opacity: 0.6},200); //custom Andrew/Dakota code - removed opacity change
    }, function(){
    	$(this).find('.img-entry').stop(true, true).animate({opacity: 1},200);
    });

    // Like Icons
    if($('.like-count').length) {
    	$('.like-count').click(function() {
    		var id = $(this).attr('id');
    		id = id.split('like-');
    		$.ajax({
    			url: chromatic.ajaxurl,
    			type: "POST",
    			dataType: 'json',
    			data: { action : 'chromatic_liked_ajax', id : id[1] },
    			success:function(data) {
    				if(true==data.success) {
    					$('#like-'+data.postID).text(data.count);
    					$('#like-'+data.postID).addClass('active');
    				}
    			}
    		});
    		return false;
    	});
    }

	// Like Active Class
	$('.like-count').each(function() {
	    var $like_count = 0;
		var $like_count = $(this).text();
		if($like_count != 0) {
	        $(this).addClass('active');
	    }
	});

    // Like Active Class
    $('.like-count').each(function() {
        var $like_count = 0;
        var $like_count = $(this).text();
        if($like_count != 0) {
            $(this).addClass('active');
        }
    });

     // View mode
    /*
// Checks cookie, sets proper display
    if ( $.cookie('mode') == 'grid' ) {  //custom change for Dakota
       grid_update();
    } else {
        list_update();
    }
*/
list_update();

    // updates cookie on click
    $('#show_list').click(
        function(){
            $.cookie('mode',null);
            $.cookie('mode','list', { expires: 7, path: '/' });
            list();
        }
    );

    // updates cookie on click
    $('#show_grid').click(
        function(){
            $.cookie('mode',null);
            $.cookie('mode','grid', { expires: 7, path: '/' });
            grid();
        }
    );

    function list(){
        $('#show_grid').removeClass('active');
        $('#show_list').addClass('active');
        $('.portfolios')
            .fadeOut('fast', function(){
                list_update();
                $(this).fadeIn('fast');
            })
        ;
    }

    function grid(){
        $('#show_list').removeClass('active');
        $('#show_grid').addClass('active');
        $('.portfolios')
            .fadeOut('fast', function(){
                grid_update();
                $(this).fadeIn('fast');
            })
        ;
    }

    function list_update(){
        $('#show_list').addClass('active');
        $('.portfolios').addClass('list').removeClass('grid').fadeIn();
        $('.portfolio').css({'width': '100%'});
        $('.list .entry-content').unbind('mouseenter mouseleave');
        $('.hide, .entry-summary, .entry-meta').show();
        $.cookie('mode', 'list', { expires: 7, path: '/' });
    }

    function grid_update(){
        $('#show_grid').addClass('active');
        $('.portfolios').addClass('grid').removeClass('list').fadeIn();
        $('.three-columns .portfolio').css({'width': '31%'});
        $('.two-columns .portfolio').css({'width': '48%'});
        $('.four-columns .portfolio').css({'width': '22.3%'});
        $('.portfolios .entry-summary, .hide, .portfolios').hide();  //custom Dakota - dont hide entry meta
        $('.portfolios.grid .entry-content').hover(function(){
            $(this).find('.hide, .entry-meta, .remove-lightbox').show();
/*             $(this).find("img").stop(true, true).fadeTo(200,0.2); */
			$(this).find('.entry-title').animate({
				top: '0',
				opacity: 1
			}, 100 );
			$(this).find('.entry-meta').animate({
				bottom: '0',
				opacity: 1
			}, 100 );
        }/*
,function(){
            $(this).find('.hide, .entry-meta, .remove-lightbox').hide();
            $(this).find("img").stop(true, true).fadeTo(200,1.0);
			$(this).find('.entry-title').stop().animate({
				top: '-40',
				opacity: 0
			}, 100 );
			$(this).find('.entry-meta').stop().animate({
				bottom: '-40',
				opacity: 0
			}, 100 );
        }
*/);
        $.cookie('mode','grid', { expires: 7, path: '/' });
    }
	
	
	$('.portfolios.grid .entry-content').ready(function(){
        $(this).find('.hide, .entry-meta, .remove-lightbox').show();
        //$(this).find(".portfolios.grid .entry-content img").stop(true, true).fadeTo(200,0.6); //custom Andrew/Dakota code - changed css selector to only apply opacity change to portfolio grid - also raised opacity
		$(this).find('.entry-title').animate({
			top: '0',
			opacity: 1
		}, 100 );
		$(this).find('.entry-meta').animate({
			bottom: '0',
			opacity: 1
		}, 100 );
    }/*
,function(){
        $(this).find('.hide, .entry-meta, .remove-lightbox').hide();
        $(this).find("img").stop(true, true).fadeTo(200,1.0);
		$(this).find('.entry-title').stop().animate({
			top: '-40',
			opacity: 0
		}, 100 );
		$(this).find('.entry-meta').stop().animate({
			bottom: '-40',
			opacity: 0
		}, 100 );
    }
*/);



	$('#twitter').sharrre({
	        share: {
	            twitter: true
	        },
	        template: '<a class="share" href="#"><div class="genericon genericon-twitter"></div></a>',
	        enableHover: false,
	        click: function(api, options){
	            api.simulateClick();
	            api.openPopup('twitter');
	        }
	    });

	    $('#facebook').sharrre({
	        share: {
	            facebook: true
	        },
	        template: '<a class="share" href="#"><div class="genericon genericon-facebook"></div></a>',
	        enableHover: false,
	        click: function(api, options){
	            api.simulateClick();
	            api.openPopup('facebook');
	        }
		});

	//Slideshow page template auto resize
	window.onload = function () {
		var windowHeight = $( window ).height();
		var sliderHeight = $('#primary.page-slideshow .slides').height();

		if ( sliderHeight > windowHeight ) {

			var footerHeight = $('#colophon').outerHeight();
			var primaryHeight = windowHeight - footerHeight;

			$('#primary.page-slideshow, #primary.page-slideshow .home-slider').height(primaryHeight).css('overflow', 'hidden').css('max-height', primaryHeight);
		}
	}

	$(window).resize(function() {
		var windowHeight = $( window ).height();
		var sliderHeight = $('#primary.page-slideshow .slides').height();

		if ( sliderHeight > windowHeight ) {

			var footerHeight = $('#colophon').outerHeight();
			var primaryHeight = windowHeight - footerHeight;

			$('#primary.page-slideshow, #primary.page-slideshow .home-slider').height(primaryHeight).css('overflow', 'hidden').css('max-height', primaryHeight);

		} else {
			$('#primary.page-slideshow, #primary.page-slideshow .home-slider').height(sliderHeight);
		}
	});


	// Flexslider fullscreen mode
	$('.flex-full-screen').each(function() {

		var flexslider = $(this).parents('.flexslider');

		var id = flexslider.attr( "id");

		var elem = document.getElementById(id);

		$(this).on("click", function(){

			var flexslider = $(this).parents('.flexslider');

			$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange',remove_fs_class);

			function remove_fs_class(){

				if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement){
					flexslider.removeClass('flexslider-fullscreen');
				}
			}

			if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {

				if (document.documentElement.requestFullscreen) {
					fullScreenApi.requestFullScreen(elem);
					flexslider.addClass('flexslider-fullscreen');
				} else if (document.documentElement.mozRequestFullScreen) {
					fullScreenApi.requestFullScreen(elem);
					flexslider.addClass('flexslider-fullscreen');
			    } else if (document.documentElement.webkitRequestFullscreen) {
					fullScreenApi.requestFullScreen(elem);
					flexslider.addClass('flexslider-fullscreen');
				}
			} else {
				if (document.cancelFullScreen) {
					document.cancelFullScreen();
				} else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if (document.webkitCancelFullScreen) {
					document.webkitCancelFullScreen();
				}
			}
		});
	});


	$('.flexslider-grid .portfolio').on("click", function(){

		var flexslider = $(this).parents('.flexslider');

		var id = flexslider.attr( "id");

		var elem = document.getElementById(id);

		flexslider.find('.slides, .flexslider-grid, .flex-direction-nav, .flex-control-nav, .flex-full-screen').show();

		$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange',remove_fs_class_grid);

		function remove_fs_class_grid(){

			if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement){
				flexslider.removeClass('flexslider-fullscreen');
				if( flexslider.hasClass('flexslider-grid-view') ) {
					flexslider.find('.slides, .flex-direction-nav, .flex-control-nav, .flex-full-screen').hide();
				}
			}
		}

		if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {

			if (document.documentElement.requestFullscreen) {
				fullScreenApi.requestFullScreen(elem);
				flexslider.addClass('flexslider-fullscreen');
			} else if (document.documentElement.mozRequestFullScreen) {
				fullScreenApi.requestFullScreen(elem);
				flexslider.addClass('flexslider-fullscreen');
		    } else if (document.documentElement.webkitRequestFullscreen) {
				fullScreenApi.requestFullScreen(elem);
				flexslider.addClass('flexslider-fullscreen');
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			}
		}
	});

	//Flexslider grid/slideshow view
	$('.flex-grid-view').on("click", function(){

		var flexslider = $(this).parents('.flexslider');

		flexslider.find('.slides, .flexslider-grid, .flex-direction-nav, .flex-control-nav, .flex-full-screen').fadeToggle();
		flexslider.find('.flex-grid-view').toggleClass('flex-grid-view-active');
		flexslider.toggleClass('flexslider-grid-view');

	});


	// Sell Media fullscreen mode
	$('.sm-fullscreen').on("click", function(){

		var image = $(this).prev();
		//var sm_image = $(this).parents().find('#sell-media-single-image img.wp-post-image');
		image.attr("id","single-sell-media-image-fs");
		var id = image.attr( "id");
		var elem = document.getElementById(id);

		$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange',remove_fs_class_sm);

		function remove_fs_class_sm(){

			if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement){
				image.removeClass('fullscreen');
			}
		}

		if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {

			if (document.documentElement.requestFullscreen) {
				fullScreenApi.requestFullScreen(elem);
				image.addClass('fullscreen');
			} else if (document.documentElement.mozRequestFullScreen) {
				fullScreenApi.requestFullScreen(elem);
				image.addClass('fullscreen');
		    } else if (document.documentElement.webkitRequestFullscreen) {
				fullScreenApi.requestFullScreen(elem);
				image.addClass('fullscreen');
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			}
		}
	});

	// Parallax background
	function chromatic_parallax_bg(){
		var scrolled = $(window).scrollTop();
		$('.parallax-bg').css('top', -(scrolled * 0.2) + 'px');
	}

	$(window).scroll(function(e){
		chromatic_parallax_bg();
	});

});

jQuery(window).bind('load', function($) {

	$c = 1;

	jQuery(".flexslider").each(function(){

		// Get control nav
		$nav_menu = jQuery(this).find("ul.flexslider-grid");

		// Add unique control nav class
		new_menu = "flexslider-grid-"+$c;
		$nav_menu.addClass(new_menu);
		new_menu_item = "." + new_menu + " li";

		jQuery(this).flexslider({
	        controlNav: true,
	        smoothHeight: true,
			directionNav: true,
	        slideshow: false,
			manualControls: new_menu_item,
			prevText: "",
			nextText: "",
			start: function(){
				jQuery('.flex-caption .home-slide-title').animate({
					opacity: 1,
					left: "0"
				});
				jQuery('.flex-caption .slider-caption').stop().delay(400).animate({
					opacity: 1,
					right: "0"
				});
				jQuery('.flex-caption').stop().stop().animate({
					opacity: 1,
				}, 100 );
			},
			after: function(){
				jQuery('.flex-caption .home-slide-title').animate({
					opacity: 1,
					left: "0"
				});
				jQuery('.flex-caption .slider-caption').stop().delay(400).animate({
					opacity: 1,
					right: "0"
				});
				jQuery('.flex-caption').stop().stop().animate({
					opacity: 1,
				}, 100 );
			},
			before: function(){
				jQuery('.flex-caption').stop().animate({
					opacity: 0
				}, 100 );
				jQuery('.flex-caption .home-slide-title').stop().animate({
					opacity: 0,
					left: "-=50"
				}, 100 );
				jQuery('.flex-caption .slider-caption').stop().animate({
					opacity: 0,
					right: "-=50"
				}, 100 );
			},
		});
		$c++;
	});

});