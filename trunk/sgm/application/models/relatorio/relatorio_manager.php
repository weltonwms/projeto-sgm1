<?php

class Relatorio_manager extends CI_Model {
   
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('util');
        $this->load->model('mensalidade/Mensalidade_composite');
        $this->load->model('mensalidade/Mensalidade_model');
        $this->load->model('cliente/Cliente_model');
        $this->load->model('conta/Conta_model');
        $this->load->model('relatorio/Relatorio_model');
    }

    public function get_relatorio(array $post) {
        $query = $this->executar_query($post);
        $lista = array();

        foreach ($query as $valor):
            $composite = new $this->Mensalidade_composite();
            $cliente = new $this->Cliente_model();
            $cliente->set_nome($valor->nome);
            $cliente->set_rua($valor->rua);
            $cliente->set_quadra($valor->quadra);
            $cliente->set_casa($valor->casa);
            $composite->set_cliente($cliente);
            $conta = new $this->Conta_model();
            $conta->set_nr_doc($valor->nr_doc);
            $composite->set_conta($conta);
            $mensalidade = new $this->Mensalidade_model();
            $mensalidade->set_vencimento($valor->vencimento);
            $mensalidade->set_valor($valor->valor);
            $mensalidade->set_id_conta($valor->id_conta);
            $composite->set_mensalidade($mensalidade);
            $lista[]=$composite;
            
        endforeach;
       $this->Relatorio_model->set_mensalidades($lista);
       return $this->Relatorio_model;
    }

    private function executar_query(array $post) {
        $periodo_inicial = formatar_data_to_mysql($post['periodo_inicial']);
        $periodo_final = formatar_data_to_mysql($post['periodo_final']);
        $tipo = $post['tipo'];
        $ordem = array('rua' => 'cli.rua', 'quadra' => 'cli.quadra', 'nr_doc' => 'c.nr_doc',
            'vencimento' => 'm.vencimento', 'cliente' => 'cli.nome');

        $this->db->select('m.vencimento, m.valor, m.id_conta, cli.nome, c.nr_doc, cli.rua, cli.quadra, cli.casa');
        $this->db->from('tb_mensalidade m');
        $this->db->join('tb_conta c', 'm.id_conta= c.id', 'inner');
        $this->db->join('tb_cliente cli', 'c.id_cliente=cli.id', 'inner');
        $this->db->where('m.vencimento >=', $periodo_inicial);
        $this->db->where('m.vencimento <=', $periodo_final);
        $this->db->where('m.quitada', $tipo);
        $this->db->order_by($ordem[$post['ordenado_por']]);
        $resultado = $this->db->get()->result();
        return $resultado;
    }
    
    

}

