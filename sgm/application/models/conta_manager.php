<?php

class Conta_manager extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Conta_composite_dao');
    }

    public function get_contas() {
       return $this->Conta_composite_dao->get_contas_composite();
    }
    
     public function get_contas_receber() {
       return $this->Conta_composite_dao->get_contas_receber_composite();
    }
    
    public function get_contas_recebidas(){
       return $this->Conta_composite_dao->get_contas_recebidas_composite(); 
    }

    public function get_conta($id_conta) {
        return $this->Conta_composite_dao->get_conta_composite($id_conta);
    }
    
    public function cadastrar(array $post){
        $this->load->model('Conta_model','conta');
        $this->conta->set_servico($post['servico']);
        $this->conta->set_nr_doc($post['nr_doc']);
        $this->conta->set_id_cliente($post['id_cliente']);
        $this->conta->set_data_cadastro($post['data_cadastro']);
        $id_conta=$this->conta->cadastrar();
        
        $this->load->model('Mensalidade_dao');
        $this->Mensalidade_dao->set_total_mensalidades($post['nr_mensalidades']);
        $this->Mensalidade_dao->set_id_conta($id_conta);
        $this->Mensalidade_dao->set_data_inicial($post['vencimento']);
        $this->Mensalidade_dao->set_valor($post['valor']);
        $total_cadastradas= $this->Mensalidade_dao->cadastrar_mensalidades();
        return count($total_cadastradas);
                
    }
    
    public function gravar_alteracao(array $post){
        $this->load->model('Conta_model','conta');
        $this->conta->set_id($post['id_conta']);
        $this->conta->set_servico($post['servico']);
        $this->conta->set_nr_doc($post['nr_doc']);
        $this->conta->set_id_cliente($post['id_cliente']);
        $this->conta->set_data_cadastro($post['data_cadastro']);
        return $this->conta->gravar_alteracao();
    }
    
    public function excluir($id_conta){
        $this->load->model('Conta_model','conta');
        return $this->conta->excluir($id_conta);
    }

}

