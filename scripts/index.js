$(function() {
	$(document).ready(function() {

		$('#slider-recientes').liquidSlider({
			autoSlide: true,
			slideEaseFunction: 'easeInOutSine',
			autoSlideInterval: 9000,
			dynamicTabsPosition: 'bottom',
			includeTitle: false,
			dynamicTabsAlign: 'center'
		});

	});
});