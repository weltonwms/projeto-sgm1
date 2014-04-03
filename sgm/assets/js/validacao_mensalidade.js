$(document).ready(function() {

/*********************Mascaras para os campos ****************************************/
	$('.data').mask("00/00/0000");
	$('.money').mask('000.000.000.000.000,00', {reverse: true});

/*************************************************************************************/
        $("#form_mensalidade").validate({
		rules:{
			vencimento:{required:true,date:true},
                        valor:{required:true}
                        
			
		},
	
		messages:{
			vencimento:{required:'Digite o Vencimento'},
                       	valor:{required:'Digite o valor'}
			
		}
	});//fechamento do validate









});//fechamento do ready