<?php


class Cliente_model extends CI_Model{
    private $id;
    private $nome;
    private $cpf;
    private $rg;
    private $quadra;
    private $rua;
    private $casa;
    private $bairro;
    private $cidade;
    private $data_cadastro;
    private $telefone1;
    private $telefone2;
    private $email;
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_nome() {
        return $this->nome;
    }

    public function set_nome($nome) {
        $this->nome = $nome;
    }

    public function get_cpf() {
        return $this->cpf;
    }

    public function set_cpf($cpf) {
        $this->cpf = $cpf;
    }

    public function get_rg() {
        return $this->rg;
    }

    public function set_rg($rg) {
        $this->rg = $rg;
    }

    public function get_quadra() {
        return $this->quadra;
    }

    public function set_quadra($quadra) {
        $this->quadra = $quadra;
    }

    public function get_rua() {
        return $this->rua;
    }

    public function set_rua($rua) {
        $this->rua = $rua;
    }

    public function get_casa() {
        return $this->casa;
    }

    public function set_casa($casa) {
        $this->casa = $casa;
    }

    public function get_bairro() {
        return $this->bairro;
    }

    public function set_bairro($bairro) {
        $this->bairro = $bairro;
    }

    public function get_cidade() {
        return $this->cidade;
    }

    public function set_cidade($cidade) {
        $this->cidade = $cidade;
    }

    public function get_data_cadastro() {
        return $this->data_cadastro;
    }

    public function set_data_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    public function get_telefone1() {
        return $this->telefone1;
    }

    public function set_telefone1($telefone1) {
        $this->telefone1 = $telefone1;
    }

    public function get_telefone2() {
        return $this->telefone2;
    }

    public function set_telefone2($telefone2) {
        $this->telefone2 = $telefone2;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }
    
    public function get_endereco(){
        return "Rua ".$this->rua. " Qd ".$this->quadra. "  Casa ". $this->casa;
    }
    
    public function cadastrar(){
        $dados=array(
            'nome'=>  $this->nome,
            'rg'=>  $this->rg,
            'cpf'=>$this->cpf,
            'cidade'=>  $this->cidade,
            'quadra'=> $this->quadra,
            'rua'=>  $this->rua,
            'bairro'=>  $this->bairro,
            'casa'=> $this->casa,
            'telefone1'=>  $this->telefone1,
            'telefone2'=>  $this->telefone2,
            'email'=> $this->email,
            'data_cadastro'=> date("Y-m-d H:i:s")
            
        );
        $this->db->insert('tb_cliente',$dados);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();
        }
        return;
    }
    
    public function excluir($id_cliente){
        $this->db->where('id',$id_cliente);
        $this->db->delete('tb_cliente');
        if($this->db->affected_rows()>0){
            return TRUE;
        }
        return;
    }
    
    public function gravar_alteracao(){
         $dados=array(
            'nome'=>  $this->nome,
            'rg'=>  $this->rg,
            'cpf'=>$this->cpf,
            'cidade'=>  $this->cidade,
            'quadra'=> $this->quadra,
            'rua'=>  $this->rua,
            'bairro'=>  $this->bairro,
            'casa'=> $this->casa,
            'telefone1'=>  $this->telefone1,
            'telefone2'=>  $this->telefone2,
            'email'=> $this->email
        );
        $this->db->where('id',  $this->id);
        $this->db->update('tb_cliente',$dados);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
        return;
    
    }


    
}


