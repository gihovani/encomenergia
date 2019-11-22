$(document).ready(function () {
	var showService = function(service) {
		// $('.collapse').removeClass('show');
		$(service.replace('#', '#h-')).trigger('click');
	};

	$(window).on('hashchange', function (e) {
		showService(location.hash);
	}).trigger('hashchange');

	if (!$.fn.slick) {
		return;
	}

	$('.slick-banner').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slidesToShow: 1,
		slidesToSroll: 1,
	});
});
