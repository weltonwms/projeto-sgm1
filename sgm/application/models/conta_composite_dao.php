<?php

class Conta_composite_dao extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Conta_composite');
        $this->load->model('Conta_dao');
        $this->load->model('Cliente_dao');
        $this->load->model('Mensalidade_dao');
    }
    
     public function get_contas_composite() {
         $lista = array();
        $this->db->order_by("id", "asc");
        $contas_banco = $this->db->get('tb_conta')->result();
        if (count($contas_banco) > 0) {
           foreach ($contas_banco as $conta) {
                $lista[] = $this->get_conta_composite($conta->id);
            }

           
        }
         return $lista;
    }
    
     public function get_contas_receber_composite() {
         $lista = array();
         $this->db->distinct();
         $this->db->select('c.id');
         $this->db->from('tb_conta c');
         $this->db->join('tb_mensalidade m', 'c.id = m.id_conta','inner');
        $this->db->where('m.quitada',0);
        $contas_banco = $this->db->get()->result();
       
        if (count($contas_banco) > 0) {
           foreach ($contas_banco as $conta) {
                $lista[] = $this->get_conta_composite($conta->id);
            }

           
        }
         return $lista;
    }
    
    public function get_contas_recebidas_composite() {
         $lista = array();
         $this->db->distinct();
         $this->db->select('c.id');
         $this->db->from('tb_conta c');
         $this->db->join('tb_mensalidade m', 'c.id = m.id_conta','inner');
        $this->db->where('m.quitada',1);
        $contas_banco = $this->db->get()->result();
       
        if (count($contas_banco) > 0) {
           foreach ($contas_banco as $conta) {
                $lista[] = $this->get_conta_composite($conta->id);
            }

           
        }
         return $lista;
    }

    public function get_conta_composite($id_conta) {
        $this->db->where('id', $id_conta);
        $conta_banco = $this->db->get('tb_conta')->result();
        if (count($conta_banco) > 0) {
            $conta = new $this->Conta_composite();
            $conta->set_conta($this->Conta_dao->get_conta($conta_banco[0]->id));
            $conta->set_cliente($this->Cliente_dao->get_cliente($conta_banco[0]->id_cliente));
            $conta->set_mensalidades($this->Mensalidade_dao->get_mensalidades($conta_banco[0]->id));
            
            return $conta;
        }
        return;
    }
}


