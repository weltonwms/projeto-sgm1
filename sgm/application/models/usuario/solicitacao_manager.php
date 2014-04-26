<?php

class Solicitacao_manager extends CI_Model {

    private $is_cliente_valido;
    private $is_solicitacao_cadastrada;
    private $is_solicitacao_em_atendimento;
    private $is_solicitacao_rejeitada;
    private $status_solicitacao;

    /*
     * status0= Cliente inválido
     * status1= Solicitacao em Atendimento
     * status2= Solicitação Enviada Com Sucesso
     * status3= Nova Solicitação Enviada Com Sucesso
     * status4= Solicitação Bloqueada por Administrador;
     * status5= Erro na Requisição;
     */

    function __construct() {
        parent::__construct();
        $this->load->model('usuario/Solicitacao_senha', 'solicitacao_model');
    }

    public function solicitar_senha(array $post) {
        $this->inicializar($post);
        if ($this->is_cliente_valido) {
            $this->processar_solicitacao_de_cliente_valido();
        } else {
            $this->status_solicitacao = 0;
        }
        return $this->status_solicitacao;
    }

    private function processar_solicitacao_de_cliente_valido() {
        if ($this->is_solicitacao_cadastrada) {
            $this->processar_solicitacao_cadastrada();
        } else {
            $retorno = $this->solicitacao_model->cadastrar();
            $this->status_solicitacao = $retorno ? 2 : 5;
        }
    }

    private function processar_solicitacao_cadastrada() {
        if ($this->is_solicitacao_em_atendimento) {
            $this->status_solicitacao = 1;
        } 
        else {
            $this->processar_solicitacao_atendida();
        }
    }
    
    private function processar_solicitacao_atendida(){
        if($this->is_solicitacao_rejeitada){
            $this->status_solicitacao = 4;
        }
        else{
            $retorno=$this->solicitacao_model->atualizar();
            $this->status_solicitacao = $retorno ? 3 : 5;
        }
    }

    private function inicializar(array $post) {
        $this->is_cliente_valido = $this->validacao_cliente($post['nome'], $post['email']);
        $this->db->where('id_cliente', $this->is_cliente_valido);
        $retorno = $this->db->get('tb_solicitacao_senha')->result();
        if (count($retorno) > 0) {
            $this->solicitacao_model->set_id($retorno[0]->id);
            $this->is_solicitacao_cadastrada = TRUE;
            $this->is_solicitacao_em_atendimento = !$retorno[0]->atendida;
            $this->is_solicitacao_rejeitada = $retorno[0]->rejeitada;
        } else {
            $this->is_solicitacao_cadastrada = FALSE;
            $this->is_solicitacao_em_atendimento = FALSE;
        }
    }

    private function validacao_cliente($nome, $email) {
        $this->db->where('nome', $nome);
        $this->db->where('email', $email);
        $retorno = $this->db->get('tb_cliente')->result();
        if (count($retorno) == 1) {
            $this->solicitacao_model->set_id_cliente($retorno[0]->id);
            $this->solicitacao_model->set_data_solicitacao(date('Y-m-d H:i:s'));
            return $retorno[0]->id;
        }
        else
            return FALSE;
    }

    public function atender_solicitacao_usuario(array $post) {
        $this->load->model('usuario/Usuario_model');
        $this->Usuario_model->set_login($post['login']);
        $this->Usuario_model->set_senha($post['senha']);
        $this->Usuario_model->set_adm(0);
        $this->Usuario_model->set_id_cliente($post['id_cliente']);
        if ($post['id_usuario'] == null) {
            $retorno = $this->Usuario_model->cadastrar();
        } else {
            $this->Usuario_model->set_id($post['id_usuario']);
            $retorno = $this->Usuario_model->gravar_alteracao();
        }

        $this->load->model('usuario/Solicitacao_senha');
        $retorno+=$this->Solicitacao_senha->registrar_atendimento($post['id_solicitacao']);
        return $retorno;
    }

    public function rejeitar_solicitacao_usuario($id_solicitacao) {
        $this->load->model('usuario/Solicitacao_senha');
        $retorno = $this->Solicitacao_senha->registrar_rejeicao_solicitacao($id_solicitacao);
        return $retorno;
    }

    public function get_solicitacoes_recuperacao_senha() {
        $lista = array();
        $this->db->where('rejeitada', 0);
        $this->db->where('atendida', 0);
        $consulta_banco = $this->db->get('tb_solicitacao_senha')->result();
        foreach ($consulta_banco as $consulta):
            $lista[] = $this->get_solicitacao($consulta->id);
        endforeach;
        return $lista;
    }

    public function get_solicitacao($id_solicitacao) {
        $this->load->model('usuario/Solicitacao_senha');
        $this->db->where('id', $id_solicitacao);
        $solicitacao_banco = $this->db->get('tb_solicitacao_senha')->result();
        if (count($solicitacao_banco) == 1):
            $solicitacao = new $this->Solicitacao_senha();
            $solicitacao->set_id($solicitacao_banco[0]->id);
            $solicitacao->set_id_cliente($solicitacao_banco[0]->id_cliente);
            $solicitacao->set_usuario($solicitacao_banco[0]->id_cliente);
            $solicitacao->set_atendida($solicitacao_banco[0]->atendida);
            $solicitacao->set_rejeitada($solicitacao_banco[0]->rejeitada);
            $solicitacao->set_data_solicitacao($solicitacao_banco[0]->data_solicitacao);
            return $solicitacao;
        endif;
        return;
    }

}

