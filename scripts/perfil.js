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

		// Manejo de input file
		$('#file-select').click(function() { $('#file-data').trigger('click'); });
		$('#file-data').change(function() { $('#file-label').val($(this).val()); });

		// Reglas de validación
		var rules = {
			nombre: { required: true, minlength: 3, maxlength: 100 },
			direccion: { required: true, minlength: 3, maxlength: 100 }
		}
		// Mensajes de validación
		var messages = {
			nombre: {
				required: 'Nombre requerido.',
				minlength: 'Debe tener al menos 3 caracteres.',
				maxlength: 'Debe tener máximo 100 caracteres.'
			},
			direccion: {
				required: 'Dirección requerida.',
				minlength: 'Debe tener al menos 3 caracteres.',
				maxlength: 'Debe tener máximo 100 caracteres.'
			}
		}

		// Validación
		var validator = $('#nuevo-evento').validate({
			rules: rules,
			messages: messages,
			onkeyup: false,
			errorElement: 'span',
			errorClass: 'error',
			onsubmit: false,
			onfocusout: function(e) { 
				if(validator.element('#'+e.id)) {
					if($('#'+e.id).parent().hasClass('has-error')) 
						$('#'+e.id).parent().removeClass('has-error');
				} else {
					$('#'+e.id).parent().addClass('has-error');
				}
			}
		});

		// Validación de formulario previo a submit
		$('#nuevo-evento').submit(function(event) {
			$('#error-alert span').text('');
			$('#error-alert').hide();
			if(!$('#nuevo-evento').valid()) {
				event.preventDefault();
				var errorFields = [];
				$('#nuevo-evento input, #nuevo-evento select').each(function() {
					if(validator.element('#'+$(this).prop('id'))) {
						if($('#'+$(this).prop('id')).parent().hasClass('has-error')) 
							$('#'+$(this).prop('id')).parent().removeClass('has-error');
					} else {
						$('#'+$(this).prop('id')).parent().addClass('has-error');
						errorFields.push($(this).data('label'));
					}
				});
				var strErrors = errorFields.join(', ');
				$('#error-alert span').text(strErrors);
				$('#error-alert').fadeIn('slow');
			}
		});

		// Limpieza de formulario por reset
		$('#clean').click(function() {
			$('span.error').remove();
			$('div.has-error').removeClass('has-error');
		});
	});
});