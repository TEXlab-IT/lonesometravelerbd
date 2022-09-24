// /* global google  */
window.TLtrap = (function (window, document, $, undefined) {
	'use strict';

	var app = {
		init: function () {
			//console.log('Working');
			$(window).on('scroll', app.handleSticky);
			$('.copy-url-btn').on('click', app.copyToClipboard);
			app.initMainSlider('#mainSlider');
			app.initContentSlider('.content-slider');
			 $('.dropdown-menu > li > .dropdown-menu').parent().addClass('dropdown-submenu').find(' > .dropdown-item').attr('href', '').addClass('dropdown-toggle');

			$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
				e.preventDefault();
				if (!$(this).next().hasClass('show')) {
					$(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
				}
				var $subMenu = $(this).next('.dropdown-menu');
				$subMenu.toggleClass('show');


				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
					e.preventDefault();
					$('.dropdown-submenu .show').removeClass('show');
				});

				return false;
			});
		},
		handleSticky: function () {
			if ($(window).scrollTop() > 400) {
				$('#wrapper-navbar').addClass('sticky-header');
			} else if ($(window).scrollTop() < 200) {
				$('#wrapper-navbar').removeClass('sticky-header');
			}
		},
		//Copy To Clipboard
		copyToClipboard:function(e) {
			e.preventDefault();

			var elem = $(this).attr('data-url');

			var $temp = $('<input id="copyToClip">');
			$('body').append($temp);
			$temp.val(elem).select();

			try {
				document.execCommand('copy');
				$temp.remove();
				window.alert('Copied current URL to clipboard!');
			} catch (err) {
				window.alert('unable to copy text');
			}
		},

		initMainSlider: function ($selector) {
			$($selector).nivoSlider({
				effect: 'fade',
				animSpeed: 500,
				pauseTime: 4000,
				startSlide: 0,
				directionNav: false,
				controlNav: false,
				controlNavThumbs: false,
				pauseOnHover: false
			});
		},
		initContentSlider: function ($selector) {
			$($selector).nivoSlider({
				effect: 'fold',
				animSpeed: 500,
				pauseTime: 4000,
				startSlide: 0,
				directionNav: false,
				controlNav: false,
				controlNavThumbs: false,
				pauseOnHover: false
			});
		}
	};

	$(document).ready(app.init);
	return app;
})(window, document, jQuery);
