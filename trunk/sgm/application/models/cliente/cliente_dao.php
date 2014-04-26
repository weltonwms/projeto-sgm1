<?php

class cliente_dao extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->model('cliente/Cliente_model','Cliente_model');
    }
    
    public function get_clientes(){
         $this->db->order_by("nome", "asc"); 
         $clientes_banco=$this->db->get('tb_cliente')->result();
         if(count($clientes_banco)>0){
             $lista=array();
             foreach ($clientes_banco as $pessoa){
                 $lista[]=  $this->get_cliente($pessoa->id);
             }
             
             return $lista;
         }
         return;
    }
    
    public function get_cliente($id_cliente){
        $this->db->where('id',$id_cliente);
        $cliente_banco=$this->db->get('tb_cliente')->result();
        if(count($cliente_banco)==1){
            $cliente=  new $this->Cliente_model();
            $cliente->set_id($cliente_banco[0]->id);
            $cliente->set_nome($cliente_banco[0]->nome);
            $cliente->set_cpf($cliente_banco[0]->cpf);
            $cliente->set_rg($cliente_banco[0]->rg);
            $cliente->set_quadra($cliente_banco[0]->quadra);
            $cliente->set_rua($cliente_banco[0]->rua);
            $cliente->set_casa($cliente_banco[0]->casa);
            $cliente->set_bairro($cliente_banco[0]->bairro);
            $cliente->set_cidade($cliente_banco[0]->cidade);
            $cliente->set_telefone1($cliente_banco[0]->telefone1);
            $cliente->set_telefone2($cliente_banco[0]->telefone2);
            $cliente->set_email($cliente_banco[0]->email);
            $cliente->set_data_cadastro($cliente_banco[0]->data_cadastro);
            return $cliente;
        }
        return;
    }
    
    
}

?>
