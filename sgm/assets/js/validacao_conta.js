$(document).ready(function() {

/***********************Acao para o Botao Voltar**************************************/
	$("#voltar").click(function(){
		history.back();
	});//fechamento do click do voltar.
/*************************************************************************************/

/*********************Mascaras para os campos ****************************************/
	$('.data').mask("00/00/0000");
	

/*************************************************************************************/

/*****************Regras de validação*************************************************/
	$("#form_conta").validate({
		rules:{
			servico:{required:true},
			id_cliente:{required:true},
			vencimento:{required:true},
                        nr_mensalidades:{required:true},
			valor:{required:true},
			
		},
	
		messages:{
			servico:{required:'Digite o Nome'},
			id_cliente:{required:'Selecione o Cliente'},
			vencimento:{required:'Digite o Vencimento Inicial'},
                        nr_mensalidades:{required:'Digite o Total de Mensalidades'},
			valor:{required:'Digite o valor'},
			
		}
	});//fechamento do validate
        
       
        
        
        
});//fechamento do document.ready
