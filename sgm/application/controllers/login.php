<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
       
    }
    
    public function index(){
        $this->load->view('html_header');
	$this->load->view('login');
	$this->load->view('html_footer');
    }

    

    public function logar(){
              	$usuario=$this->input->post('usuario');
	      	$senha=md5($this->input->post('senha'));
		$this->db->where('login',$usuario);
		$this->db->where('senha',$senha);
		$this->db->where('adm',1);
		$usuario= $this->db->get('tb_usuario')->result();
		if(count($usuario)===1){
			$dados=array('login'=>$usuario[0]->login,'logado'=>TRUE,'adm'=>TRUE);
			$this->session->set_userdata($dados);
			redirect("home");
		}
		else {
			$this->session->set_flashdata('msg', 'Acesso Não Autorizado.  Usuário ou Senha Incorretos!');
			redirect("login");
		}
		
        
    }
    
    public function deslogar(){
       		$this->session->sess_destroy();
		redirect("login");
        
    }
    
    public function solicitar_recuperacao_senha(){
        $this->load->view('html_header');
	$this->load->view('recuperacao_senha');
	$this->load->view('html_footer');
    }
    
    public function recuperar_senha(){
        $this->load->model('usuario/Solicitacao_manager','solicitacao');
        $status=$this->solicitacao->solicitar_senha($this->input->post());
        $this->session->set_flashdata('msg',$this->enviar_msg($status) );
	redirect("login/solicitar_recuperacao_senha");
       
    }
    
    public function enviar_msg($status){
        $mensagem=array(
            0=>"Cliente Inválido. Esse email e Nome não Constam na Base de Dados!",
            1=>"A solicitação já foi registrada. Aguarde a Análise de Seu pedido.",
            2=>"Solicitação Enviada com Sucesso! <br>
                Caso a solicitação seja aprovada, em torno de 48h Você receberá uma nova Senha por email",
            3=>"Nova Solicitação Enviada com Sucesso! <br>
                Caso a solicitação seja aprovada, em torno de 48h Você receberá uma nova Senha por email",
            4=>"Solicitação Rejeitada e Bloqueada por Administrador",
            5=>"Ocorreu Algum Erro na Requisição"
        );
        return $mensagem[$status];
    }
}

?>
