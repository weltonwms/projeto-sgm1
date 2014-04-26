<?php

class Solicitacao_senha extends CI_Model{
    private $id;
    private $atendida;
    private $rejeitada;
    private $data_solicitacao;
    private $id_cliente;
    private $cliente; // Objeto do tipo Cliente_model
    private $usuario; // Objeto do tipo Usuario_model
    
    function __construct() {
        parent::__construct();
    }
    
    public function cadastrar(){
        $dados=array(
            'id_cliente'=>  $this->id_cliente,
            'atendida'=>0,
            'rejeitada'=>0,
            'data_solicitacao'=>  $this->data_solicitacao
        );
        return $this->db->insert('tb_solicitacao_senha',$dados);
    }
    
    public function atualizar(){
         $dados=array(
            'id_cliente'=>  $this->id_cliente,
             'atendida'=>0,
            'data_solicitacao'=>  $this->data_solicitacao
        );
        $this->db->where('id',  $this->id);
        return $this->db->update('tb_solicitacao_senha',$dados);
    }
    
    public function registrar_atendimento($id_solicitacao){
        $dados=array(
           'rejeitada' =>0,
            'atendida'=>1
        );
        $this->db->where('id',  $id_solicitacao);
       return $this->db->update('tb_solicitacao_senha',$dados);
    }
    
    public function registrar_rejeicao_solicitacao($id_solicitacao){
        $dados=array(
           'rejeitada' =>1,
            'atendida'=>1
        );
        $this->db->where('id',  $id_solicitacao);
       return $this->db->update('tb_solicitacao_senha',$dados);
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function is_atendida() {
        return $this->atendida;
    }

    public function set_atendida($atendida) {
        $this->atendida = $atendida;
    }
    
    public function set_rejeitada($rejeitada) {
        $this->rejeitada = $rejeitada;
    }

    public function get_data_solicitacao() {
        return $this->data_solicitacao;
    }
    
    public function get_data_solicitacao_formatada(){
        $data=  $this->data_solicitacao;
        $date= \DateTime::createFromFormat("Y-m-d H:i:s", $data);
        return $date->format("d/m/Y (H\h i\m\i\\n)");
    }

    public function set_data_solicitacao($data_solicitacao) {
        $this->data_solicitacao = $data_solicitacao;
    }
   

    public function get_id_cliente() {
        return $this->id_cliente;
    }

    public function set_id_cliente($id_cliente) {
         if($id_cliente !=null):
            $this->id_cliente = $id_cliente;
            $this->load->model('cliente/Cliente_dao');
            $this->cliente=  $this->Cliente_dao->get_cliente($id_cliente);
        endif;
       
    }
    
    public function set_usuario($id_cliente){
        $this->load->model('usuario/Usuario_dao');
        $usuario=  $this->Usuario_dao->get_usuario(null,$id_cliente);
        if($usuario){
            $this->usuario=$usuario;
        }
                
    }
    
    /******************************************************************
     * Os métodos abaixo refere-se ao cliente incorporado nesta classe
     * *****************************************************************
     */
    
    public function get_nome_cliente(){
        return $this->cliente->get_nome();
    }
    public function get_email(){
        return $this->cliente->get_email();
    }
    
    public function get_cpf(){
        return $this->cliente->get_cpf();
    }
    
    public function get_endereco(){
        return $this->cliente->get_endereco();
    }
    
    /******************************************************************
     * Os métodos abaixo refere-se ao usuario incorporado nesta classe
     * *****************************************************************
     */
    public function get_login(){
        if($this->usuario!=null){
            return $this->usuario->get_login();
        }
        return;
    }
    
     public function get_senha(){
        if($this->usuario!=null){
            return $this->usuario->get_senha();
        }
        return;
    }
    
    public function get_id_usuario(){
       if($this->usuario!=null){
            return $this->usuario->get_id();
        }
        return; 
    }
    
    




}


