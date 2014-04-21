$(document).ready(function() {
	$("#form_atendimento_solicitacao").validate({
		rules:{
			login:{required:true},
			senha:{required:true}

		},
	
		messages:{
			login:{required:'Digite o Login'},
			senha:{required:'Digite a Senha'}
		}
	});//fechamento do validate
});//fechamento do document.ready
