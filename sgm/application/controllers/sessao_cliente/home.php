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
        
       
        
        
        
       
	
	
					
}
