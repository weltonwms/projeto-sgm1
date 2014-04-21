$(document).ready(function() {
    
    $('.meu_chosen').chosen();
    
    
    $('#perfil').change(function(){ 
		if($(this).val()==='0'){
			$('.meu_chosen').removeAttr('disabled');
			$('.meu_chosen').trigger("chosen:updated");
		
		}
		else{
			$('.meu_chosen').val('');
			$('.meu_chosen').attr('disabled', 'disabled');
			$('.meu_chosen').trigger("chosen:updated");
		}
		

	});
        $.validator.setDefaults({ ignore: ":hidden:not(select)" }) 
	$("#form_usuario").validate({
		rules:{
                        senha_cadastro:{required:true},
			login:{required:true},
			perfil:{required:true},
                        id_cliente:{required:true}

		},
	
		messages:{
                        senha_cadastro:{required:'Digite a Senha'},
			login:{required:'Digite o Login'},
			perfil:{required:'Selecione o Perfil'},
                        id_cliente:{required:'Selecione o Cliente'}
		}
	});//fechamento do validate
        
       $('#perfil').trigger('change');
});//fechamento do document.ready
