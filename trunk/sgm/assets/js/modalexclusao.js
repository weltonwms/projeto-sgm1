$(document).ready(function() {

	$(".confirm").confirm({
		text : "Deseja realmente excluir este Cliente?",
		title : "  Exclusão de Cliente",
		confirmButton : " Excluir",
		cancelButton : " Cancelar"
	});
        
        $(".confirm_conta").confirm({
		text : "Deseja realmente excluir esta Conta? <br>\n\
                        Todas as Mensalidades desta Conta serão excluídas também!",
		title : "  Exclusão de Conta",
		confirmButton : " Excluir",
		cancelButton : " Cancelar"
	});
        
        $(".confirm_mensalidade").confirm({
		text : "Deseja realmente excluir esta Mensalidade?",
		title : "  Exclusão de Mensalidade",
		confirmButton : " Excluir",
		cancelButton : " Cancelar"
	});
        
         $(".confirm_mensalidade_recebida").confirm({
		text : "Deseja realmente excluir esta Mensalidade?<br>\n\
                        A conta perderá essa informação.",
		title : "  Exclusão de Mensalidade Recebida",
		confirmButton : " Excluir",
		cancelButton : " Cancelar"
	});
});
