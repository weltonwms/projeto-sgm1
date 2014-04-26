<?php

class Conta_dao extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('conta/Conta_model');
    }

    public function get_contas() {
        $lista = array();
        $this->db->order_by("id", "asc");
        $contas_banco = $this->db->get('tb_conta')->result();
        if (count($contas_banco) > 0) {
            foreach ($contas_banco as $conta) {
                $lista[] = $this->get_conta($conta->id);
            }
        }
        return $lista;
    }

    public function get_conta($id_conta) {
        $this->db->where('id', $id_conta);
        $conta_banco = $this->db->get('tb_conta')->result();
        if (count($conta_banco) > 0) {
            $conta = new $this->Conta_model();
            $conta->set_id($conta_banco[0]->id);
            $conta->set_servico($conta_banco[0]->servico);
            $conta->set_nr_doc($conta_banco[0]->nr_doc);
            $conta->set_id_cliente($conta_banco[0]->id_cliente);
            $conta->set_nr_mensalidade($conta_banco[0]->nr_mensalidade);
            $conta->set_data_cadastro($conta_banco[0]->data_cadastro);
            return $conta;
        }
        return;
    }

}

