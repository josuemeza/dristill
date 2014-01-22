$(function() {
	$(document).ready(function() {
		// Reglas de validación
		var rules = {
			run_input: { required: true, rut: true },
			correo: { required: true, email: true, mail_extension: ['com', 'cl'], maxlength: 30 },
			password: { required: true, digits: true, minlength: 6, maxlength: 12, mail_name: '#correo' },
			confirmacion: { required: true, digits: true, minlength: 6, maxlength: 12, confirmation: '#password' }
		}

		// Mensajes de validacion
		var messages = {
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

		// Formato de rut
		$('#run_input').Rut({
			format: true,
			format_on: 'keyup'
		});

		// Validación de formulario
		var validator = $('#form-registro').validate({
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

		// Validación de correo disponible
		$('#correo').focusout(function() {
			if(validator.element('#correo')) {
				$('#correo-loader img').show();
				$.ajax({url: '../controller/UserController.php', data: {'action': 'validarCorreo', 'mail': $(this).val()}, type: 'POST', success: function(response) {
					if(response=='invalid') {
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

		// Validación de formulario previo a submit
		$('#form-registro').submit(function(event) {
			$('#error-alert span').text('');
			if(!$('#form-registro').valid() || $('#correo-loader span').text()!='') {
				event.preventDefault();
				var errorFields = [];
				$('#form-registro input').each(function() {
					if($(this).prop('id') && validator.element('#'+$(this).prop('id'))) {
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
		
	});
});