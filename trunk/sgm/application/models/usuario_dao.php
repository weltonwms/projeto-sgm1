<?php


class Usuario_dao extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
    }
    
    public function get_usuarios(){
         $usuarios_banco=$this->db->get('tb_usuario')->result();
         if(count($usuarios_banco)>0){
             $lista=array();
             foreach ($usuarios_banco as $pessoa){
                 $lista[]=  $this->get_usuario($pessoa->id);
             }
             
             return $lista;
         }
         return;
    }
    
    public function get_usuario($id_usuario,$id_cliente=null){
        if($id_cliente==null)
            $this->db->where('id',$id_usuario);
         else
            $this->db->where('id_cliente',$id_cliente);
        $usuario_banco=$this->db->get('tb_usuario')->result();
        if(count($usuario_banco)==1){
            $usuario=  new $this->Usuario_model();
            $usuario->set_id($usuario_banco[0]->id);
            $usuario->set_login($usuario_banco[0]->login);
            $usuario->set_senha($usuario_banco[0]->senha);
            $usuario->set_adm($usuario_banco[0]->adm);
            $usuario->set_id_cliente($usuario_banco[0]->id_cliente);
                 
            return $usuario;
        }
        return;
    }
}


