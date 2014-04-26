<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado') || !$this->session->userdata('adm')) {
            redirect("login");
        }
        $this->load->model('conta/Conta_manager');
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

    public function index() {
        $dados['contas_receber'] = $this->Conta_manager->get_contas_receber();
        $this->carrega_view('manter_contas', $dados);
    }
    
    public function abrir_contas_recebidas(){
        $dados['contas_recebidas'] = $this->Conta_manager->get_contas_recebidas();
        $this->carrega_view('contas_recebidas', $dados);
    }
    
    public function nova_conta(){
        $this->load->model('cliente/Cliente_manager');
        $dados['clientes']= $this->Cliente_manager->get_clientes();
        $this->carrega_view('nova_conta', $dados);
    }
    
    public function cadastrar(){
        $retorno=$this->Conta_manager->cadastrar($this->input->post());
        if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Conta Cadastrada com Sucesso!<br>'.
                                            $retorno.' mensalidades incluídas na Conta.');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Não foi possível Cadastrar a Conta!');
        }
        redirect('conta');
    }
    
    public function editar($id_conta){
        $this->load->model('cliente/Cliente_manager');
        $this->load->model('conta/Conta_manager');
        $dados['clientes']= $this->Cliente_manager->get_clientes();
        $dados['conta']= $this->Conta_manager->get_conta($id_conta);
        $this->carrega_view('conta_alteracao', $dados);
    }


    public function gravar_alteracao(){
        $retorno=$this->Conta_manager->gravar_alteracao($this->input->post());
         if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Conta Alterada com Sucesso!');
        }
       
        redirect('conta');
    }
    
    public function excluir($id_conta){
        $retorno=$this->Conta_manager->excluir($id_conta);
        if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Conta junto com Mensalidades
                                            Excluída com Sucesso!');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Não foi possível excluir a Conta!');
        }
        redirect('conta');
    }

   
    
       

}

