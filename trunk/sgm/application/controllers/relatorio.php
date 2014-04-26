<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Relatorio extends CI_Controller{
    
    public function __construct(){
	parent::__construct();
            if(!$this->session->userdata('session_id') || !$this->session->userdata('logado') || !$this->session->userdata('adm')){
		redirect("login");
            }
        $this->load->model('relatorio/Relatorio_manager');
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
	$this->load->view('menu_navegacao');
	$this->load->view($view_corpo,$dados);
	$this->load->view('rodape');
	$this->load->view('html_footer');
    }
    
    public function index(){
        
        $this->carrega_view('relatorio');    
		
    }
    
    public function gerar_relatorio(){
        $dados['mensalidades']=  $this->Relatorio_manager->get_relatorio($this->input->post());
        $this->carrega_view('relatorio',$dados); 
    }
    
    
    
}