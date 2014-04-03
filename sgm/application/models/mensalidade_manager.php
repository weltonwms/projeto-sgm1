<?php


class Mensalidade_manager extends CI_Model {
     function __construct() {
        parent::__construct();
        $this->load->model('Mensalidade_dao');
        $this->load->model('Mensalidade_model');
    }
    
    public function get_mensalidades($id_conta){
        return $this->Mensalidade_dao->get_mensalidades($id_conta);
    }
    
    public function adicionar(array $post){
        $this->Mensalidade_model->set_id_conta($post['id_conta']);
        $this->Mensalidade_model->set_vencimento($post['vencimento']);
        $this->Mensalidade_model->set_valor($post['valor']);
        return $this->Mensalidade_model->cadastrar();
    }
    
    public function gravar_alteracao(array $post){
        $this->Mensalidade_model->set_id($post['id_mensalidade']);
        $this->Mensalidade_model->set_id_conta($post['id_conta']);
        $this->Mensalidade_model->set_vencimento($post['vencimento']);
        $this->Mensalidade_model->set_valor($post['valor']);
        return $this->Mensalidade_model->gravar_alteracao();
    }
    
    public function excluir($id_mensalidade){
        return $this->Mensalidade_model->excluir($id_mensalidade);
    }
}

?>
