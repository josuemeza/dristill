$(function() {
	$(document).ready(function() {
		// Reglas de validación
		var userdata_rules = {
			run_input: { required: true, rut: true },
			correo: { required: true, email: true, mail_extension: ['com', 'cl'], maxlength: 30 },
			password: { required: true, digits: true, minlength: 6, maxlength: 12, mail_name: '#correo' },
			confirmacion: { required: true, digits: true, minlength: 6, maxlength: 12, confirmation: '#password' }
		}
		var event_rules = {
			nombre: { required: true, minlength: 3, maxlength: 100 },
			direccion: { required: true, minlength: 3, maxlength: 100 },
			fecha: { required: true, valid_date: true },
			file_data: { file_type: ['image'] }
		}

		// Mensajes de validación
		var userdata_messages = {
			run_input: { 
				required: 'Campo obligatorio. Use 12.345.678-9', 
				rut: 'RUN no válido. Use 12.345.678-9' 
			},
			correo: { 
				required: 'Correo requerído. Use a@b.c', 
				email: 'Correo no válido. Use a@b.c',
				mail_extension: 'Extensión no válidas: Use com, cl.',
				maxlength: 'Máximo 30 caracteres.'
			},
			password: {
				required: 'Contraseña requerida.',
				digits: 'Solo debe contener números.',
				minlength: 'Debe contener mínimo 6 caracteres.',
				maxlength: 'Debe contener máximo 12 caracteres.',
				mail_name: 'No puede usar el nombre del correo.'
			},
			confirmacion: {
				required: 'Confirmación requerida',
				digits: 'Solo debe contener números.',
				minlength: 'Debe contener mínimo 6 caracteres.',
				maxlength: 'Debe contener máximo 12 caracteres.',
				confirmation: 'Las contraseñas no coinciden.'
			}
		}
		var event_messages = {
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
			fecha: {
				required: 'Fecha requerida.'
			},
			file_data: {
				file_type: 'Solo puede agregar imagenes.'
			}
		}

		// Formato de rut
		$('#run_input').Rut({
			format: true,
			format_on: 'keyup'
		});

		// Validadores
		var userdata_validator = $('#form-editar').validate({
			rules: userdata_rules,
			messages: userdata_messages,
			onkeyup: false,
			errorElement: 'span',
			errorClass: 'error',
			onsubmit: false,
			onfocusout: function(e) { 
				if(userdata_validator.element('#'+e.id)) {
					if($('#'+e.id).parent().hasClass('has-error')) 
						$('#'+e.id).parent().removeClass('has-error');
				} else {
					$('#'+e.id).parent().addClass('has-error');
				}
			}
		});
		var event_validator = $('#nuevo-evento').validate({
			rules: event_rules,
			messages: event_messages,
			onkeyup: false,
			errorElement: 'span',
			errorClass: 'error',
			onsubmit: false,
			onfocusout: function(e) { 
				if(event_validator.element('#'+e.id)) {
					if($('#'+e.id).parent().hasClass('has-error')) 
						$('#'+e.id).parent().removeClass('has-error');
				} else {
					$('#'+e.id).parent().addClass('has-error');
				}
			}
		});

		// Validación de correo disponible
		$('#correo').focusout(function() {
			if(userdata_validator.element('#correo')) {
				$('#correo-loader img').show();
				$.ajax({url: '../app/procesar.php', data: {'valorCaja1': $(this).val()}, type: 'POST', success: function(response) {
					if(response=='Usuario registrado') {
						$('#correo-loader span').text('Correo registrado');
						if(!$('#correo-loader').parent().parent().hasClass('has-error')) $('#correo-loader').parent().parent().addClass('has-error');
					} else {
						$('#correo-loader span').text('');
						if($('#correo-loader').parent().parent().hasClass('has-error')) $('#correo-loader').parent().parent().removeClass('has-error');
					}
					$('#correo-loader img').hide();
				}});
			} else {
				$('#correo-loader').text('');
			}
		});

		// Validaciones de formulario previo a submit
		$('#form-editar').submit(function(event) {
			$('#error-alert span').text('');
			if(!$('#form-registro').valid() || $('#correo-loader span').text()!='') {
				event.preventDefault();
				var errorFields = [];
				$('#form-registro input').each(function() {
					if(userdata_validator.element('#'+$(this).prop('id'))) {
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
		$('#nuevo-evento').submit(function(event) {
			$('#error-alert span').text('');
			if(!$('#nuevo-evento').valid()) {
				event.preventDefault();
				var errorFields = [];
				$('#nuevo-evento input, #nuevo-evento select').each(function() {
					if(event_validator.element('#'+$(this).prop('id'))) {
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
		$('.clean').click(function() {
			$('span.error').remove();
			$('div.has-error').removeClass('has-error');
		});

		// Activacion y evento de datepicker
		$('#datepicker').datepicker().on('changeDate', function(e) {
			if(e.viewMode=='days'){
				$('#date input').val($(this).data('date'));
				$('#fecha').val($(this).data('date'));
				if(event_validator.element('#fecha')) {
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
			if(event_validator.element('#file_data')) {
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