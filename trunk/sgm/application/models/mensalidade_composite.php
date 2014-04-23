<?php

class Mensalidade_composite extends CI_Model {

    private $mensalidade;
    private $cliente;
    private $conta;
    
    public function set_mensalidade(Mensalidade_model $mensalidade){
        $this->mensalidade=$mensalidade;
    }
    
    public function set_cliente(Cliente_model $cliente){
        $this->cliente=$cliente;
    }
    
    public function set_conta(Conta_model $conta){
        $this->conta=$conta;
    }
    
    public function get_vencimento(){
        return $this->mensalidade->get_vencimento();
    }
    
    public function get_valor(){
        return $this->mensalidade->get_valor();
    }
    
    public function get_devedor(){
        return $this->cliente->get_nome();
    }
    
    public function get_endereco(){
        return $this->cliente->get_endereco();
    }
    
    public function get_nr_doc(){
        return $this->conta->get_nr_doc();
    }

}

