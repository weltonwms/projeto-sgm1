<?php

class Usuario_model extends CI_Model{
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
        $this->senha = $senha;
    }

    public function set_id_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function set_adm($adm) {
        $this->adm = $adm;
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


    
    
}


