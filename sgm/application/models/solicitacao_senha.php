<?php

class Solicitacao_senha extends CI_Model{
    private $id;
    private $nome;
    private $email;
    private $atendido;
    private $data_solicitacao;
    private $id_cliente;
    
    function __construct() {
        parent::__construct();
    }
    
    public function cadastrar(){
        $dados=array(
           'nome'=>  $this->nome,
            'email'=> $this->email,
            'id_cliente'=>  $this->id_cliente,
            'atendido'=>0,
            'data_solicitacao'=>  $this->data_solicitacao
        );
        return $this->db->insert('tb_solicitacao_senha',$dados);
    }
    
    public function atualizar(){
         $dados=array(
           'nome'=>  $this->nome,
            'email'=> $this->email,
            'id_cliente'=>  $this->id_cliente,
             'atendido'=>0,
            'data_solicitacao'=>  $this->data_solicitacao
        );
        return $this->db->update('tb_solicitacao_senha',$dados);
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function is_atendido() {
        return $this->atendido;
    }

    public function set_atendido($atendido) {
        $this->atendido = $atendido;
    }

    public function get_data_solicitacao() {
        return $this->data_solicitacao;
    }

    public function set_data_solicitacao($data_solicitacao) {
        $this->data_solicitacao = $data_solicitacao;
    }
    public function get_nome() {
        return $this->nome;
    }

    public function set_nome($nome) {
        $this->nome = $nome;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function get_id_cliente() {
        return $this->id_cliente;
    }

    public function set_id_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }




}


