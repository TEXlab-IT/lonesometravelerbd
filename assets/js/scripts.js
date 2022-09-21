// /* global google  */
window.TLtrap = (function (window, document, $, undefined) {
	'use strict';

	var app = {
		init: function () {
			//console.log('Working');
			$(window).on('scroll', app.handleSticky);
			$('.copy-url-btn').on('click', app.copyToClipboard);
			app.initSliderCarousel('#homeSliderCarousel');
			app.initMainSlider('#slider');
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

		initSliderCarousel: function ($selector) {
			$($selector).owlCarousel({
				loop: true,
				autoplay: true,
				autoHeight: false,
				autoplayTimeout: 5000,
				nav: true,
				dots: false,
				navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
				responsiveClass: true,
				responsive: {
					0: {
						items: 2
					},
					600: {
						items: 3
					},
					1000: {
						items: 5
					}
				}
			});
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
		}
	};

	$(document).ready(app.init);
	return app;
})(window, document, jQuery);
