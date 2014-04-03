<?php


class Conta_composite extends CI_Model{
    private $conta;
    private $cliente;
    private $mensalidades;
    
    public function set_conta(Conta_model $conta){
        $this->conta=$conta;
    }
    
    public function set_cliente(Cliente_model $cliente){
        $this->cliente=$cliente;
    }
    
    public function set_mensalidades(array $mensalidades){
        $this->mensalidades=$mensalidades;
    }
    
    public function get_id(){
        return $this->conta->get_id();
    }
    
    public function get_id_cliente(){
        return $this->conta->get_id_cliente();
    }
    
    public function get_nome_cliente(){
        return $this->cliente->get_nome();
    }
    
    public function get_nr_doc(){
        return $this->conta->get_nr_doc();
    }
    
    public function get_servico(){
        return $this->conta->get_servico();
    }
    
    public function get_data_cadastro(){
        return $this->conta->get_data_cadastro();
    }
    
    public function get_total_mensalidades(){
        return count($this->mensalidades);
    }
    
    public function get_mensalidades(){
        return $this->mensalidades;
    }
    
    public function get_mensalidade($n){
        $n--;
        if(array_key_exists($n, $this->mensalidades)){
            return $this->mensalidades[$n];
        }
    }
    
    public function get_endereco_cliente(){
        /*
        return "Rua: ".$this->cliente->get_rua()." QD: ".$this->cliente->get_quadra().
            " Casa: ".$this->cliente->get_casa();/*
        */
        return $this->cliente->get_endereco();
    }


    public function get_total_mensalidades_receber(){
        $somente_mensalidades_nao_quitadas=array();
        foreach ($this->mensalidades as $mensalidade):
            if(!$mensalidade->is_quitada()){
                $somente_mensalidades_nao_quitadas[]=$mensalidade;
            }
        endforeach;
        return count($somente_mensalidades_nao_quitadas);
    }
    
    public function ordenar_mensalidades_por_vencimento(){
        
    }
}


