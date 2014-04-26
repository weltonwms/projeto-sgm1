<?php


class Mensalidade_dao  extends CI_Model{
    private $total_mensalidades; //atributos usados na hora de cadastro multiplo
    private $data_inicial;
    private $valor;
    private $id_conta;
    
     function __construct() {
        parent::__construct();
        $this->load->model('mensalidade/Mensalidade_model');
    }

    public function get_mensalidades($id_conta) {
        $lista = array();
        $this->db->where('id_conta', $id_conta);
        $this->db->order_by("vencimento", "asc"); 
        $mensalidades_banco = $this->db->get('tb_mensalidade')->result();
        if (count($mensalidades_banco) > 0) {
            $nr_parcela=0;
           foreach ($mensalidades_banco as $mensalidade) {
               $nr_parcela++;
               $obj_model_mensalidade= $this->get_mensalidade($mensalidade->id);
               $obj_model_mensalidade->set_nr_parcela($nr_parcela);
               $lista[]= $obj_model_mensalidade;
            }
        }
        return $lista;
    }

    public function get_mensalidade($id_mensalidade) {
        $this->db->where('id', $id_mensalidade);
        $mensalidade_banco = $this->db->get('tb_mensalidade')->result();
        if (count($mensalidade_banco) > 0) {
            $mensalidade = new $this->Mensalidade_model();
            $mensalidade->set_id($mensalidade_banco[0]->id);
            $mensalidade->set_id_conta($mensalidade_banco[0]->id_conta);
            $mensalidade->set_quitada($mensalidade_banco[0]->quitada);
            $mensalidade->set_vencimento($mensalidade_banco[0]->vencimento);
            $mensalidade->set_valor($mensalidade_banco[0]->valor);
            $mensalidade->set_nr_parcela($mensalidade_banco[0]->nr_parcela);
            $mensalidade->set_data_quitacao($mensalidade_banco[0]->data_quitacao);
            $mensalidade->set_valor_pago($mensalidade_banco[0]->valor_pago);
            return $mensalidade;
        }
        return;
    }
    
    public function cadastrar_mensalidades(){
        $lista=array();
         for($i=0;$i<  $this->total_mensalidades;$i++):
             $mensalidade=new $this->Mensalidade_model();
             $mensalidade->set_valor($this->valor);
             $mensalidade->set_id_conta($this->id_conta);
             $mensalidade->set_vencimento($this->incrementa_data($this->data_inicial, $i));
             $id_mensalidade=$mensalidade->cadastrar();
             if($id_mensalidade){
                $mensalidade->set_id($id_mensalidade);
                $lista[]=$mensalidade;
             }
         endfor;
        
        return $lista;
        
    }
    
        
    public function incrementa_data($data,$nr_meses){
        $array_data=  explode('/', $data);
        $timestamp=mktime(0,0,0,$array_data[1],$array_data[0],$array_data[2]);
        return date('d/m/Y',strtotime("+ $nr_meses month",$timestamp));
       
    }
    
    public function set_total_mensalidades($total_mensalidades) {
        $this->total_mensalidades = $total_mensalidades;
    }

    public function set_data_inicial($data_inicial) {
        $this->data_inicial = $data_inicial;
    }

    public function set_valor($valor) {
        $this->valor = $valor;
    }

    public function set_id_conta($id_conta) {
        $this->id_conta = $id_conta;
    }


}


