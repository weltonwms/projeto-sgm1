<?php
/*
 * Esta Classe é a classe entrada do Model. Responsável por intermediar com o
 * Controler. Ela utiliza as outras Classes Model que ajudam a realizar todo o 
 * trabalho com o Usuário.
 */

class Usuario_manager extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->model('usuario/Usuario_dao');
        $this->load->model('usuario/Usuario_model');
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
    
    public function alterar_senha(array $post){
        $id_usuario=  $this->session->userdata('id_usuario');
        if($post['senha_nova']==$post['senha_confirmacao']){
            return $this->Usuario_model->alterar_senha($id_usuario, $post['senha_antiga'],
                                                        $post['senha_nova']);
        }
        return -1;
    }
}


