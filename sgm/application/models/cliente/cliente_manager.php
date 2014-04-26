<?php
/*
 * Esta Classe é a classe entrada do Model. Responsável por intermediar com o
 * Controler. Ela utiliza as outras Classes Model que ajudam a realizar todo o 
 * trabalho com  o Cliente.
 */
class cliente_manager extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->model('cliente/Cliente_dao','Cliente_dao');
        $this->load->model('cliente/Cliente_model','Cliente_model');
    }
    
    public function get_clientes(){
        return $this->Cliente_dao->get_clientes();
    }
    
    public function get_cliente($id_cliente){
       return $this->Cliente_dao->get_cliente($id_cliente);
    }
    
    public function cadastrar(array $post){
        $this->Cliente_model->set_nome($post['nome']);
        $this->Cliente_model->set_rg($post['rg']);
        $this->Cliente_model->set_cpf($post['cpf']);
        $this->Cliente_model->set_cidade($post['cidade']);
        $this->Cliente_model->set_quadra($post['quadra']);
        $this->Cliente_model->set_bairro($post['bairro']);
        $this->Cliente_model->set_rua($post['rua']);
        $this->Cliente_model->set_casa($post['casa']);
        $this->Cliente_model->set_telefone1($post['telefone1']);
        $this->Cliente_model->set_telefone2($post['telefone2']);
        $this->Cliente_model->set_email($post['email']);
       
       return $this->Cliente_model->cadastrar();
    }
    
    public function excluir($id_cliente){
        if($this->Cliente_model->is_relacionado_a_tabela($id_cliente)){
            return FALSE;
        }
        else
            return $this->Cliente_model->excluir($id_cliente);
    }
    
    public function gravar_alteracao(array $post){
        $this->Cliente_model->set_id($post['id_cliente']);
        $this->Cliente_model->set_nome($post['nome']);
        $this->Cliente_model->set_rg($post['rg']);
        $this->Cliente_model->set_cpf($post['cpf']);
        $this->Cliente_model->set_cidade($post['cidade']);
        $this->Cliente_model->set_quadra($post['quadra']);
        $this->Cliente_model->set_bairro($post['bairro']);
        $this->Cliente_model->set_rua($post['rua']);
        $this->Cliente_model->set_casa($post['casa']);
        $this->Cliente_model->set_telefone1($post['telefone1']);
        $this->Cliente_model->set_telefone2($post['telefone2']);
        $this->Cliente_model->set_email($post['email']);
              
        return $this->Cliente_model->gravar_alteracao();
    }
    
}

?>
