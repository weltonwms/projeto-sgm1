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

    public function cadastrar() {
        $dados = array(
            'vencimento' => $this->vencimento,
            'valor' => $this->valor,
            'id_conta' => $this->id_conta,
        );
        $this->db->insert('tb_mensalidade', $dados);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        return;
    }

    public function gravar_alteracao() {
        $dados = array(
            'vencimento' => $this->vencimento,
            'valor' => $this->valor,
            'id_conta' => $this->id_conta,
        );
        $this->db->where('id', $this->id);
        $this->db->update('tb_mensalidade', $dados);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return;
    }

    public function excluir($id_mensalidade) {
        $this->db->where('id', $id_mensalidade);
        $this->db->delete('tb_mensalidade');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return;
    }

    public function quitar() {
        $dados = array(
            'data_quitacao' => $this->data_quitacao,
            'valor_pago' => $this->valor_pago,
            'quitada' => $this->quitada,
        );
        $this->db->where('id', $this->id);
        $this->db->update('tb_mensalidade', $dados);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_vencimento($vencimento) {
        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $vencimento)) { //verifica se é formato dd/mm/aaaa
            $partes = explode("/", $vencimento);
            $formato_mysql = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
            $this->vencimento = $formato_mysql;
        }
        else
            $this->vencimento = $vencimento;
    }

    /*     * *********************************************************
     * O metodo set_valor recebe o valor com máscara 000.000,00
     * e substitui o '.' por nada, e substitui a ',' por ponto.
     * Isso é necessário para gravar do jeito certo no mysql
     * formato 000000.00 (americano). O reg_match() existe
     * para testar se o valor recebido termina em virgula seguido
     * por 2 numeros.
     */

    public function set_valor($valor) {
        if (preg_match('/,[0-9]{2}$/', $valor)) {
            $valor = str_replace(".", "", $valor);
            $valor = str_replace(",", ".", $valor);
        }
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
        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $data_quitacao)) { //verifica se é formato dd/mm/aaaa
            $partes = explode("/", $data_quitacao);
            $formato_mysql = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
            $this->data_quitacao = $formato_mysql;
        }
        else
            $this->data_quitacao = $data_quitacao;
    }

    public function set_valor_pago($valor_pago) {
        $this->valor_pago = $valor_pago;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_vencimento() {
        if (preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $this->vencimento)) { //verifica se é formato aaaa/mm/dd
            $partes = explode("-", $this->vencimento);
            $formato_brasil = $partes[2] . "/" . $partes[1] . "/" . $partes[0];
            return $formato_brasil;
        }
        else
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
        return date('d/m/Y', strtotime($this->data_quitacao));
    }

    public function get_valor_pago() {
        return $this->valor_pago;
    }

    public function get_status() {
        $data_atual = date('Y-m-d');
        $stamp_atual = strtotime($data_atual);
        $stamp_vencimento = strtotime($this->vencimento);
        if ($stamp_atual > $stamp_vencimento)
            return "Vencida";
    }

    public function is_vencida() {
        $data_atual = date('Y-m-d');
        $stamp_atual = strtotime($data_atual);
        $stamp_vencimento = strtotime($this->vencimento);
        if ($stamp_atual > $stamp_vencimento) {
            return TRUE;
        }
        return FALSE;
    }

}

