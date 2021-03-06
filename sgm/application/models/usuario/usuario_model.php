<?php

class Usuario_model extends CI_Model {

    private $id;
    private $login;
    private $senha;
    private $id_cliente;
    private $adm;

    function __construct() {
        parent::__construct();
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_login($login) {
        $this->login = $login;
    }

    public function set_senha($senha) {
        $this->senha = trim($senha);
    }

    public function set_id_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function set_adm($adm) {
        $this->adm = $adm;
    }

    public function cadastrar() {
        if ($this->is_cadastrado()) {
            return -1;
        } else {
            $dados = array(
                'login' => $this->login,
                'adm' => $this->adm,
                'id_cliente' => $this->id_cliente
            );
            $dados['senha'] = md5($this->senha);
            $this->db->insert('tb_usuario', $dados);

            if ($this->db->affected_rows() > 0) {
                return $this->db->insert_id();
            }
        }
        return;
    }

    public function gravar_alteracao() {

        $dados = array(
            'login' => $this->login,
            'adm' => $this->adm,
            'id_cliente' => $this->id_cliente
        );
        if (!empty($this->senha)) {
            $dados['senha'] = md5($this->senha);
        }

        $this->db->where('id', $this->id);
        $this->db->update('tb_usuario', $dados);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return;
    }

    public function excluir($id_usuario) {
        $this->db->where('id', $id_usuario);
        $this->db->delete('tb_usuario');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return;
    }

    public function alterar_senha($id_usuario, $senha_antiga, $senha_nova) {
        $this->db->where('id', $id_usuario);
        $resultado = $this->db->get('tb_usuario')->result();

        if ($resultado[0]->senha == md5($senha_antiga)) {
            $dados['senha'] = md5($senha_nova);
            $this->db->where('id', $id_usuario);
            $this->db->update('tb_usuario', $dados);
            return $this->db->affected_rows();
        }
        return -2;
    }

    private function is_cadastrado() {
        if ($this->id_cliente != NULL):
            $this->db->where('id_cliente', $this->id_cliente);
            $resultado = $this->db->get('tb_usuario')->result();
            if (count($resultado) > 0){
                return TRUE;
            }
        endif;
        return;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_login() {
        return $this->login;
    }

    public function get_senha() {
        return $this->senha;
    }

    public function get_id_cliente() {
        return $this->id_cliente;
    }

    public function get_adm() {
        return $this->adm;
    }

    public function get_perfil() {
        $perfis = array('Cliente', 'Adm');
        return $perfis[$this->adm];
    }

    public function get_descricao_cliente() {
        if ($this->id_cliente != null) {
            $this->db->where('id', $this->id_cliente);
            $cliente = $this->db->get('tb_cliente')->result();
            $string = "{$cliente[0]->nome} ({$this->id_cliente})";
            return $string;
        }
        return;
    }

}

