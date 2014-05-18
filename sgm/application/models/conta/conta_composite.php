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
    
    public function get_total_mensalidades_vencidas(){
        $somente_mensalidades_vencidas=array();
        foreach ($this->mensalidades as $mensalidade):
            if(!$mensalidade->is_quitada() && $mensalidade->is_vencida()){
                $somente_mensalidades_vencidas[]=$mensalidade;
            }
        endforeach;
        return count($somente_mensalidades_vencidas);
    }
    
     public function get_total_mensalidades_recebidas(){
        $somente_mensalidades_quitadas=array();
        foreach ($this->mensalidades as $mensalidade):
            if($mensalidade->is_quitada()){
                $somente_mensalidades_quitadas[]=$mensalidade;
            }
        endforeach;
        return count($somente_mensalidades_quitadas);
    }
    
    public function get_mensalidades_receber(){
        $somente_mensalidades_nao_quitadas=array();
        foreach ($this->mensalidades as $mensalidade):
            if(!$mensalidade->is_quitada()){
                $somente_mensalidades_nao_quitadas[]=$mensalidade;
            }
        endforeach;
        return $somente_mensalidades_nao_quitadas;
    }
    
     public function get_mensalidades_recebidas(){
        $somente_mensalidades_quitadas=array();
        foreach ($this->mensalidades as $mensalidade):
            if($mensalidade->is_quitada()){
                $somente_mensalidades_quitadas[]=$mensalidade;
            }
        endforeach;
        return $somente_mensalidades_quitadas;
    }
    
    public function get_total_a_receber(){
        $total=0;
        foreach ($this->mensalidades as $mensalidade):
            if(!$mensalidade->is_quitada()){
               $total+=$mensalidade->get_valor();
            }
        endforeach;
        return $total;
    }
    
    public function get_total_recebido(){
         $total=0;
        foreach ($this->mensalidades as $mensalidade):
            if($mensalidade->is_quitada()){
               $total+=$mensalidade->get_valor_pago();
            }
        endforeach;
        return $total;
    }
    
   
}


