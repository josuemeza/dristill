$(function() {

	$(document).ready(function() {
		// Cierre de sesión
		if($('#navbtn-logout').length>0 )$('#navbtn-logout').click(function(event) {
			event.preventDefault();
			$('#form-logout').submit();
		});
	});

	// Asignacion de reglas de validación
	function rut_validation(value, element, param) {
	    return value!='' ? $.Rut.validar(value) : true;
	}
	$.validator.addMethod("rut", rut_validation, "RUT no válido");
	
	function mail_extension_validation(value, element, param) {
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,}))$/;
    	if(re.test(value) && param instanceof Array) {
    		var ext = value.split('.')[1];
    		for(var v in param) if(ext==param[v]) return true;
    		return false;
    	}
    	return true;
	}
	$.validator.addMethod("mail_extension", mail_extension_validation, "Extensión no válida");

	function mail_name(value, element, param) { 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,}))$/;
	    if($(param).length>0 && re.test($(param).val())) return $(param).val().split('@')[0]!=value;
	    return true;
	}
	$.validator.addMethod("mail_name", mail_name, "Contraseña no válida");

	function confirmation(value, element, param) {
	    if($(param).length>0) return value==$(param).val();
	    return true;
	}
	$.validator.addMethod("confirmation", confirmation, "Los campos no coinciden");

	function valid_date(value, element, param) {
	    if(value!='' && value.split('-').length==3) {
	    	var dat = value.split('-');
	    	if(!isNaN(parseInt(dat[0])) && !isNaN(parseInt(dat[1])) && !isNaN(parseInt(dat[2]))) {
	    		var today = new Date();
	    		today = new Date(today.getFullYear(), today.getMonth(), today.getDate());
	    		var input = new Date(dat[0], dat[1]-1, dat[2]);
	    		if(input>=today) return true;
	    		return false;
	    	}
	    	return true;
	    }
	    return true;
	}
	$.validator.addMethod("valid_date", valid_date, "La fecha está fuera de rango.");

	function file_type(value, element, param) {
	    if(element.files[0] && param instanceof Array) {
	    	for(var i in param) if(param[i]==element.files[0].type.split('/')[0]) return true;
	    	return false;
	    }
	    return true;
	}
	$.validator.addMethod("file_type", file_type, "El tipo de archivo no es válido.");

});