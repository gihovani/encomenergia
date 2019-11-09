// init Isotope
var $grid = $('.grid .row').isotope({
	itemSelector: '.element-item',
	layoutMode: 'fitRows'
});

// bind filter button click
$('#filters').on( 'click', 'button', function() {
	var filterValue = $( this ).attr('data-filter');
	// use filterFn if matches value
	$grid.isotope({ filter: filterValue });
});


