<?php


class Mensalidade_model extends CI_Model {
    private $id;
    private $vencimento;
    private $valor;
    private $nr_parcela;
    private $id_conta;
    private $quitada;
    private $data_quitacao;
    private $valor_pago;
    
   function __construct() {
        parent::__construct();
    }
    
    public function cadastrar(){
        $dados=array(
           'vencimento'=>  $this->vencimento,
            'valor'=>  $this->valor,
            'id_conta'=>  $this->id_conta,
            
        );
        $this->db->insert('tb_mensalidade',$dados);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();
        }
        return;
    }


    public function set_id($id) {
        $this->id = $id;
    }

    public function set_vencimento($vencimento) {
         if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $vencimento)) //verifica se é formato dd/mm/aaaa
	{
	    $partes=  explode("/", $vencimento);
            $formato_mysql=$partes[2]."-".$partes[1]."-".$partes[0];
            $this->vencimento=$formato_mysql;
            
	}
       else
           $this->vencimento = $vencimento;
    }

    public function set_valor($valor) {
        $this->valor = $valor;
    }

    public function set_nr_parcela($nr_parcela) {
        $this->nr_parcela = $nr_parcela;
    }

    public function set_id_conta($id_conta) {
        $this->id_conta = $id_conta;
    }

    public function set_quitada($quitada) {
        $this->quitada = $quitada;
    }

    public function set_data_quitacao($data_quitacao) {
        $this->data_quitacao = $data_quitacao;
    }

    public function set_valor_pago($valor_pago) {
        $this->valor_pago = $valor_pago;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_vencimento() {
        return $this->vencimento;
    }

    public function get_valor() {
        return $this->valor;
    }

    public function get_nr_parcela() {
        return $this->nr_parcela;
    }

    public function get_id_conta() {
        return $this->id_conta;
    }

    public function is_quitada() {
        return $this->quitada;
    }

    public function get_data_quitacao() {
        return $this->data_quitacao;
    }

    public function get_valor_pago() {
        return $this->valor_pago;
    }


}


