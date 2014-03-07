<?php


class Conta_model extends CI_Model{
    private $id;
    private $servico;
    private $nr_doc;
    private $id_cliente;
    private $nr_mensalidade;
    private $data_cadastro;
    
    function __construct() {
        parent::__construct();
    }
    
    public function set_id($id) {
        $this->id = $id;
    }

    public function set_servico($servico) {
        $this->servico = $servico;
    }

    public function set_nr_doc($nr_doc) {
        $this->nr_doc = $nr_doc;
    }

    public function set_id_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function set_nr_mensalidade($nr_mensalidade) {
        $this->nr_mensalidade = $nr_mensalidade;
    }

    public function set_data_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }
    
    public function get_id() {
        return $this->id;
    }

    public function get_servico() {
        return $this->servico;
    }

    public function get_nr_doc() {
        return $this->nr_doc;
    }

    public function get_id_cliente() {
        return $this->id_cliente;
    }

    public function get_nr_mensalidade() {
        return $this->nr_mensalidade;
    }

    public function get_data_cadastro() {
        return $this->data_cadastro;
    }





}


