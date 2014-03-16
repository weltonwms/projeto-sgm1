<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado') || !$this->session->userdata('adm')) {
            redirect("login");
        }
        $this->load->model('Conta_manager');
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
        $dados['contas'] = $this->Conta_manager->get_contas();
        $this->carrega_view('manter_contas', $dados);
    }
    
    
    public function nova_conta(){
        $this->load->model('Cliente_manager');
        $dados['clientes']= $this->Cliente_manager->get_clientes();
        $this->carrega_view('nova_conta', $dados);
    }
    
    public function cadastrar(){
        $this->Conta_manager->cadastrar($this->input->post());
        redirect('conta');
    }
    
    public function editar($id_conta){
        $this->load->model('Cliente_manager');
        $this->load->model('Conta_manager');
        $dados['clientes']= $this->Cliente_manager->get_clientes();
        $dados['conta']= $this->Conta_manager->get_conta($id_conta);
        $this->carrega_view('conta_alteracao', $dados);
    }


    public function gravar_alteracao(){
        $this->Conta_manager->gravar_alteracao($this->input->post());
        redirect('conta');
    }
    
    public function excluir($id_conta){
        $this->Conta_manager->excluir($id_conta);
        redirect('conta');
    }

    public function testar(){
        $this->load->model('Mensalidade_dao','men');
        $this->men->cadastrar_mensalidades(8,'09/02/2012',20,1);
        
        //$this->incrementa_data('09/08/2015', 30);
        //$this->load->model('Conta_composite_dao','cont');
        //echo "<pre>";print_r($this->cont->get_conta_composite(1));
       // print_r($expression);
    }
    
       

}

