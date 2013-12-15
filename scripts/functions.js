$(function() {
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

});