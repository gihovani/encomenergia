$(document).ready(function () {
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
