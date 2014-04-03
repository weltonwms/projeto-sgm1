$(document).ready(function() {
    
    $('.meu_chosen').chosen();

/***********************Acao para o Botao Voltar**************************************/
	$("#voltar").click(function(){
		history.back();
	});//fechamento do click do voltar.
/*************************************************************************************/

/*********************Mascaras para os campos ****************************************/
	$('.data').mask("00/00/0000");
	$('.money').mask('000.000.000.000.000,00', {reverse: true});

/*************************************************************************************/

/*****************Regras de validação*************************************************/
	$.validator.setDefaults({ ignore: ":hidden:not(select)" }) 
	$("#form_conta").validate({
		rules:{
			servico:{required:true},
			id_cliente:{required:true},
			vencimento:{required:true,dateSuperior:true},
                        nr_mensalidades:{required:true,number:true},
			valor:{required:true},
                        data_cadastro:{date:true}
			
		},
	
		messages:{
			servico:{required:'Digite o Nome'},
			id_cliente:{required:'Selecione o Cliente'},
			vencimento:{required:'Digite o Vencimento Inicial'},
                        nr_mensalidades:{required:'Digite o Total de Mensalidades',
                                            number:'Digite somente números'},
			valor:{required:'Digite o valor'}
			
		}
	});//fechamento do validate
        
       
        
        
        
});//fechamento do document.ready
