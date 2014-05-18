<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Pendencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
            redirect("login");
        }
        $this->load->model('conta/Conta_manager');
    }
        
     /***************************************************************************
     * O metodo carrega_view() carrega os arquivos php que estao na passta view
     * e representa o layout. Recebe como parâmetro obrigatório o nome do arquivo
     * do corpo que será carregado e opcionamente um array de dados para 
     * introduzir na visão do corpo
     * *************************************************************************
     */
    
    public function carrega_view($view_corpo, $dados=null){
        $this->load->view('html_header');
	$this->load->view('cabecalho');
	$this->load->view('sessao_cliente/menu_navegacao');
	$this->load->view($view_corpo,$dados);
	$this->load->view('rodape');
	$this->load->view('html_footer');
    
    }
    
    public function abrir_contas_pendentes(){
        $dados['contas_pendentes'] = $this->Conta_manager->get_contas_pendentes();
        $this->carrega_view('sessao_cliente/contas_pendentes',$dados);
    }
    
    public function detalhar_conta_pendente($id_conta){
        $dados['conta']= $this->Conta_manager->get_conta($id_conta);
        $this->carrega_view('sessao_cliente/detalhe_conta_pendente', $dados);
    }
    
    

}

