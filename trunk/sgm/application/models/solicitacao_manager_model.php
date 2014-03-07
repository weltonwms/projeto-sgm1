<?php


class Solicitacao_manager_model extends CI_Model{
    private $is_cliente_valido;
    private $is_solicitacao_cadastrada;
    private $is_solicitacao_em_atendimento;
    private $status_solicitacao;
    /*
     * status0= Cliente inválido
     * status1= Solicitacao em Atendimento
     * status3= Solicitacao Realizada com Sucesso
     * status4= Erro ao Realizar a Solicitacao
     */
    
    function __construct() {
        parent::__construct();
          $this->load->model('Solicitacao_senha','solicitacao_model');
        
    }

    public function solicitar_senha(array $post ){
        $this->inicializar($post);
        if($this->is_cliente_valido){
            if($this->is_solicitacao_cadastrada){
                if($this->is_solicitacao_em_atendimento){
                    $this->status_solicitacao=1;
                }
                else{
                    if($this->solicitacao_model->atualizar())
                        $this->status_solicitacao=3;
                    else
                        $this->status_solicitacao=4;
                }
                    
            }
            else{
                if( $this->solicitacao_model->cadastrar())
                    $this->status_solicitacao=3;
                else
                    $this->status_solicitacao=4;
                
            }
        }
        else
            $this->status_solicitacao=0;
        
        
        
        return $this->status_solicitacao;
        
                
    }
    
    private function inicializar(array $post){
        $this->is_cliente_valido=$this->validacao($post['nome'], $post['email']);
        $this->db->where('id_cliente',  $this->is_cliente_valido);
        $retorno=$this->db->get('tb_solicitacao_senha')->result();
        if(count($retorno)>0){
            $this->is_solicitacao_cadastrada=TRUE;
            $this->is_solicitacao_em_atendimento=!$retorno[0]->atendido;
        }
        else{
            $this->is_solicitacao_cadastrada=FALSE;
            $this->is_solicitacao_em_atendimento=FALSE;
        }
    }


    private function validacao($nome,$email){
        $this->db->where('nome',$nome);
        $this->db->where('email',$email);
        $retorno=$this->db->get('tb_cliente')->result();
        if(count($retorno)==1){
            $this->solicitacao_model->set_id_cliente($retorno[0]->id);
            $this->solicitacao_model->set_email($retorno[0]->email);
            $this->solicitacao_model->set_nome($retorno[0]->nome);
            $this->solicitacao_model->set_data_solicitacao(date('Y-m-d H:i:s'));
            return $retorno[0]->id;
        }
            
        else
            return FALSE;
    }
    
   
}


