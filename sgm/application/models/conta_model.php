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
    
    
    public function cadastrar(){
        $dados=array(
           'servico'=>  $this->servico,
            'nr_doc'=>  $this->nr_doc,
            'id_cliente'=>  $this->id_cliente,
            'data_cadastro'=>  $this->data_cadastro
        );
        $this->db->insert('tb_conta',$dados);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();
        }
        return;
    }
    
    
    public function gravar_alteracao(){
         $dados=array(
            'servico'=>  $this->servico,
            'nr_doc'=>  $this->nr_doc,
            'id_cliente'=>  $this->id_cliente,
            'data_cadastro'=>  $this->data_cadastro
        );
        $this->db->where('id',  $this->id);
        $this->db->update('tb_conta',$dados);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
        return;
    }
    
    public function excluir($id_conta){
        $this->db->where('id',$id_conta);
        $this->db->delete('tb_conta');
        if($this->db->affected_rows()>0){
            return TRUE;
        }
        return;
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
        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $data_cadastro)) //verifica se é formato dd/mm/aaaa
	{
	    $partes=  explode("/", $data_cadastro);
            $formato_mysql=$partes[2]."-".$partes[1]."-".$partes[0];
            $this->data_cadastro=$formato_mysql;
            
	}
        elseif($data_cadastro==null){
            $this->data_cadastro=date('Y-m-d');
        }
        else
            $this->data_cadastro=$data_cadastro;
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
         if (preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $this->data_cadastro)){ //verifica se é formato aaaa/mm/dd
            $partes=  explode("-", $this->data_cadastro);
            $formato_brasil=$partes[2]."/".$partes[1]."/".$partes[0];
            return $formato_brasil;
        }
        else
            return $this->data_cadastro;
    }





}


