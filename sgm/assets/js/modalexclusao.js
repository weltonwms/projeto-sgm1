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
});
