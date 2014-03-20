<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Mensalidade extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado') || !$this->session->userdata('adm')) {
            redirect("login");
        }
        
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
    
    public function manter($id_conta){
        echo "farei a manutenção da mensalidade depois $id_conta";
    }
}

