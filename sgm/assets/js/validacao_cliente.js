$(document).ready(function() {

/***********************Acao para o Botao Voltar**************************************/
	$("#voltar").click(function(){
		history.back();
	});//fechamento do click do voltar.
/*************************************************************************************/

/*********************Mascaras para os campos ****************************************/
	$('#cpf').mask("000.000.000-00");
	$('.telefone').mask("(00) 0000-0000");

/*************************************************************************************/

/*****************Regras de validação*************************************************/
	$("#form_cliente").validate({
		rules:{
			nome:{required:true},
			rg:{required:true},
			cpf:{required:true,verificaCPF:true},
                        email:{email:true},
			quadra:{required:true,number:true},
			rua:{required:true},
			cidade:{required:true},
			casa:{required:true,number:true},
			bairro:{required:true},
			telefone1:{required:true}

		},
	
		messages:{
			nome:{required:'Digite o Nome'},
			rg:{required:'Digite o RG'},
			cpf:{required:'Digite o CPF'},
                        email:{email:'O Email está incorreto'},
			quadra:{required:'Digite a Quadra',number:"Digite somente números"},
			rua:{required:'Digite a Rua'},
			cidade:{required:'Digite a Cidade'},
			casa:{required:'Digite a Casa',number:"Digite somente números"},
			bairro:{required:'Digite o Bairro'},
			telefone1:{required:'Digite o Telefone'}
		}
	});//fechamento do validate
        
        $("#form_solicitacao_senha").validate({
		rules:{
			nome:{required:true},
			email:{required:true}
		},
	
		messages:{
			nome:{required:'Digite o Nome'},
			email:{required:'Digite o Email'}
		}
	});//fechamento do validate
        
        
        
});//fechamento do document.ready
