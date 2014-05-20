<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Home da Sessao do Cliente
class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado') ){
			redirect("login");
		}
                
	}
	
		
	public function index()
	{
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('sessao_cliente/menu_navegacao');
		$this->load->view('conteudo_teste');
		$this->load->view('rodape');
		$this->load->view('html_footer');	
		
	}
        
        public function abrir_alteracao_senha(){
            $this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('sessao_cliente/menu_navegacao');
		$this->load->view('sessao_cliente/alteracao_senha');
		$this->load->view('rodape');
		$this->load->view('html_footer');
        }
        
        public function alterar_senha(){
            $this->load->model('usuario/Usuario_manager');
            $retorno=  $this->Usuario_manager->alterar_senha($this->input->post());
            $this->set_msg($retorno);
            redirect('sessao_cliente/home/abrir_alteracao_senha');
        }
        
        private function set_msg($retorno){
            switch ($retorno){
                case 1: $this->session->set_flashdata('status','success');
                        $this->session->set_flashdata('msg_confirm',
                                'Senha alterada com Sucesso!'); break;
                case -1: $this->session->set_flashdata('status','danger');
                        $this->session->set_flashdata('msg_confirm',
                                'Confirmação de Senha e Senha Nova não conferem!'); break;
                case -2: $this->session->set_flashdata('status','danger');
                        $this->session->set_flashdata('msg_confirm',
                                'Senha Antiga Incorreta!'); break;
            }
        }
        
       
        
        
        
       
	
	
					
}
