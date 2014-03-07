$(document).ready(function() {
	$("#form_login").validate({
		rules:{
			usuario:{required:true, minlength:4},
			senha:{required:true, minlength:4}

		},
	
		messages:{
			usuario:{required:'Campo Usuario Obrigatório',minlength: "Nome curto demais"},
			senha:{required:'Campo Senha Obrigatório',minlength: "Digite senha maior que 3 digitos"}
		}
	});//fechamento do validate
});//fechamento do document.ready
