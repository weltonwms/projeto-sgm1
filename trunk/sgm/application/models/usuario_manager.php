<?php


class Usuario_manager extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_dao');
        $this->load->model('Usuario_model');
    }
    
    public function get_usuarios(){
        return $this->Usuario_dao->get_usuarios();
    }
    
    public function get_usuario($id_usuario){
        return $this->Usuario_dao->get_usuario($id_usuario);
    }
    
    public function gravar_alteracao(array $post){
        $this->Usuario_model->set_id($post['id_usuario']);
        $this->Usuario_model->set_login($post['login']);
        $this->Usuario_model->set_senha($post['senha']);
        $this->Usuario_model->set_adm($post['perfil']);
        $this->Usuario_model->set_id_cliente(isset($post['id_cliente'])?$post['id_cliente']:null);
        return $this->Usuario_model->gravar_alteracao();
    }
    
    public function cadastrar(array $post){
        $this->Usuario_model->set_login($post['login']);
        $this->Usuario_model->set_senha($post['senha_cadastro']);
        $this->Usuario_model->set_adm($post['perfil']);
        $this->Usuario_model->set_id_cliente(isset($post['id_cliente'])?$post['id_cliente']:null);
        return $this->Usuario_model->cadastrar();
    }
    
    public function excluir($id_usuario){
       return $this->Usuario_model->excluir($id_usuario);
    }
}


