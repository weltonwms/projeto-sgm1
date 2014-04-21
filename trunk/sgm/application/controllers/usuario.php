<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado') || !$this->session->userdata('adm')) {
            redirect("login");
        }
        $this->load->model('Usuario_manager');
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

        $dados['usuarios'] = $this->Usuario_manager->get_usuarios();
        $this->carrega_view('manter_usuarios', $dados);
    }

    public function abrir_recuperacao_senha() {
        $this->load->model('Solicitacao_manager');
        $dados['solicitacoes'] = $this->Solicitacao_manager->get_solicitacoes_recuperacao_senha();
        $this->carrega_view('manter_recuperacao_senha', $dados);
    }

    public function abrir_solicitacao_usuario($id_solicitacao) {
        $this->load->model('Solicitacao_manager');
        $dados['solicitacao'] = $this->Solicitacao_manager->get_solicitacao($id_solicitacao);
        $html = $this->load->view('atendimento_solicitacao_senha', $dados, true);
        echo $html;
    }

    public function atender_solicitacao_usuario() {
        $this->load->model('Solicitacao_manager');
        $retorno = $this->Solicitacao_manager->atender_solicitacao_usuario($this->input->post());
        if ($retorno) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg_confirm', 'Solicitação Atendida com Sucesso!');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg_confirm', 'Não foi Possível Atender Solicitação!');
        }
        redirect('usuario/abrir_recuperacao_senha');
    }

    public function rejeitar_solicitacao($id_solicitacao) {
        $this->load->model('Solicitacao_manager');
        $retorno = $this->Solicitacao_manager->rejeitar_solicitacao_usuario($id_solicitacao);
        if ($retorno) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg_confirm', 'Solicitação Rejeitada com Sucesso!');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg_confirm', 'Solicitação Não Rejeitada!');
        }
        redirect('usuario/abrir_recuperacao_senha');
    }
    
    public function abrir_cadastro_usuario(){
        $this->load->model('Cliente_manager');
        $dados['clientes']=  $this->Cliente_manager->get_clientes();
        $this->carrega_view('novo_usuario',$dados);
    }
    
    public function editar($id_usuario){
        $this->load->model('Cliente_manager');
        $dados['clientes']=  $this->Cliente_manager->get_clientes();
        $dados['usuario']=  $this->Usuario_manager->get_usuario($id_usuario);
        $this->carrega_view('usuario_alteracao',$dados);
    }
    
    public function cadastrar(){
        $retorno=$this->Usuario_manager->cadastrar($this->input->post());
        if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Usuário Cadastrado com Sucesso!');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Usuário não Cadastrado!');
        }
        redirect('usuario');
    }
    
    
    
    public function gravar_alteracao(){
        $retorno=$this->Usuario_manager->gravar_alteracao($this->input->post());
         if ($retorno) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg_confirm', 'Usuário Alterado com Sucesso!');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg_confirm', 'Nenhuma Alteração Realizada!');
        }
        redirect('usuario');
    }
    
    public function excluir($id_usuario){
        $retorno=$this->Usuario_manager->excluir($id_usuario);
        if($retorno){
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('msg_confirm','Usuário Excluído com Sucesso!');
        }
        else{
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('msg_confirm','Usuário não Excluído!');
        }
        redirect('usuario');
    }

}

