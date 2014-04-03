<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Mensalidade extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado') || !$this->session->userdata('adm')) {
            redirect("login");
        }
        $this->load->model('Mensalidade_manager');
        
    }

    /*     * *************************************************************************
     * O metodo carrega_view() carrega os arquivos php que estao na passta view
     * e representa o layout. Recebe como parâmetro obrigatório o nome do arquivo
     * do corpo que será carregado e opcionamente um array de dados para 
     * introduzir na visão do corpo
     * *************************************************************************
     */

    public function carrega_view($view_corpo, $dados = null) {
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('menu_navegacao');
        $this->load->view($view_corpo, $dados);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }
    
       
    public function gerenciar($id_conta){
        $this->load->model('Conta_manager');
        $dados['conta']= $this->Conta_manager->get_conta($id_conta);
        $this->carrega_view('manter_mensalidades', $dados);
    }
    
    public function manter(){
        if($this->input->post('id_mensalidade')) 
            $this->gravar_alteracao ();
        else
            $this->adicionar ();
    }
    
    private function adicionar(){
        $retorno=$this->Mensalidade_manager->adicionar($this->input->post());
         if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Mensalidade Adicionada à Conta com Sucesso!');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Não foi possível Adicionar Mensalidade!');
        }
        $url="mensalidade/gerenciar/".$this->input->post('id_conta');
        redirect($url);
    }
    
    private function gravar_alteracao(){
        $retorno=$this->Mensalidade_manager->gravar_alteracao($this->input->post());
         if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Mensalidade Alterada com Sucesso!');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Não foi possível Alterar Mensalidade!');
        }
        $url="mensalidade/gerenciar/".$this->input->post('id_conta');
        redirect($url);
    }


    public function excluir($id_mensalidade, $id_conta){
        $retorno=  $this->Mensalidade_manager->excluir($id_mensalidade);
        echo $id_mensalidade;
        if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Mensalidade Excluída da Conta com Sucesso!');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Não foi possível Excluir Mensalidade!');
        }
        $url="mensalidade/gerenciar/".$id_conta;
        redirect($url);
    }
}

