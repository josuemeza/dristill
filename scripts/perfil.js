$(function() {
	$(document).ready(function() {
		// Activacion y evento de datepicker
		$('#datepicker').datepicker().on('changeDate', function(e) {
			if(e.viewMode=='days'){
				$('#date input').val($(this).data('date'));
				$('#datepicker').datepicker('hide');
			}
		});
		var today = new Date();
		var strToday = today.getDate() + '-' + (today.getMonth()+1) + '-' + today.getFullYear();
		$('#datepicker').prop('data-date', strToday);
	});
});