<?php
/*
 * Esta Classe é a classe entrada do Model. Responsável por intermediar com o
 * Controler. Ela utiliza as outras Classes Model que ajudam a realizar todo o 
 * trabalho com  a Mensalidade.
 */

class Mensalidade_manager extends CI_Model {
     function __construct() {
        parent::__construct();
        $this->load->model('mensalidade/Mensalidade_dao');
        $this->load->model('mensalidade/Mensalidade_model');
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
    
    public function quitar(array $post){
        $this->Mensalidade_model->set_id($post['id_mensalidade']);
        $this->Mensalidade_model->set_id_conta($post['id_conta']);
        $this->Mensalidade_model->set_data_quitacao($post['data_quitacao']);
        $this->Mensalidade_model->set_valor_pago($post['valor_pago']);
        $this->Mensalidade_model->set_quitada(1);
        return $this->Mensalidade_model->quitar();
    }
}

?>
