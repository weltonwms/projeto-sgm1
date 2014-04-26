$(document).ready(function() {
    
/*********************Mascaras para os campos ****************************************/
	$('.data').mask("00/00/0000");
	$('.money').mask('000.000.000.000.000,00', {reverse: true});

/*************************************************************************************/

/*****************Regras de validação*************************************************/
	$.validator.setDefaults({ ignore: ":hidden:not(select)" }) ;
	$("#form_relatorio").validate({
		rules:{
			tipo:{required:true},
			ordenado_por:{required:true},
			periodo_inicial:{required:true,date:true},
                        periodo_final:{required:true,date:true}
			
		},
	
		messages:{
			tipo:{required:'Digite o Tipo'},
			ordenado_por:{required:'Selecione a Ordem'},
			periodo_inicial:{required:'Digite o Período Inicial'},
                        periodo_final:{required:'Digite o Período Final'}
			
			
		}
	});//fechamento do validate
        
       
        
        
        
});//fechamento do document.ready
