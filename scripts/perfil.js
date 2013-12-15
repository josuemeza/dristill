$(function() {
	$(document).ready(function() {
		// Reglas de validación
		var rules = {
			nombre: { required: true, minlength: 3, maxlength: 100 },
			direccion: { required: true, minlength: 3, maxlength: 100 },
			fecha: { valid_date: true },
			file_data: { file_type: ['image'] }
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
			},
			file_data: {
				file_type: 'Solo puede agregar imagenes.'
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
				setTimeout(function() {
					$('#error-alert').fadeOut('slow');
				}, 3000);
			}
		});

		// Limpieza de formulario por reset
		$('#clean').click(function() {
			$('span.error').remove();
			$('div.has-error').removeClass('has-error');
		});

		// Activacion y evento de datepicker
		$('#datepicker').datepicker().on('changeDate', function(e) {
			if(e.viewMode=='days'){
				$('#date input').val($(this).data('date'));
				$('#fecha').val($(this).data('date'));
				if(validator.element('#fecha')) {
					if($('#date input').parent().hasClass('has-error'))
						$('#date input').parent().removeClass('has-error');	
				} else {	
					$('#date input').parent().addClass('has-error');
				}
				$('#datepicker').datepicker('hide');
			}
		});
		var today = new Date();
		var strToday = today.getDate() + '-' + (today.getMonth()+1) + '-' + today.getFullYear();
		$('#datepicker').prop('data-date', strToday);

		// Manejo de input file
		$('#file-select').click(function() { $('#file_data').trigger('click'); });
		$('#file_data').change(function() { 
			$('#file-label').val($(this).val());
			if(validator.element('#file_data')) {
				if($('#file-label').parent().hasClass('has-error'))
					$('#file-label').parent().removeClass('has-error');	
			} else {	
				$('#file-label').parent().addClass('has-error');
			}
		});

		// Navegación interna
		$('#inner-nav a').click(function(event) {
			event.preventDefault();
			if(!$(this).parent().hasClass('active')) {
				$('#' + $('#inner-nav .active a').data('view')).hide();
				$('#inner-nav .active').removeClass('active');
				$(this).parent().addClass('active');
				$('#' + $(this).data('view')).show();
				if($(this).data('view')=='lista_eventos') $('#my-events').fixedHeaderTable({height: '22em'});
			}
		});

		// Editar datos de usuario
		$('#editar_datos').click(function() {
			$(this).hide();
			$('#form-editar .buttons').show();
			$('#form-editar input').prop('disabled', false);
		});
		$('#form-editar input').prop('disabled', true);
	});
});