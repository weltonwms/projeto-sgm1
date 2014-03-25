<?php


class Mensalidade_manager extends CI_Model {
     function __construct() {
        parent::__construct();
        $this->load->model('Mensalidade_dao');
    }
    
    public function get_mensalidades($id_conta){
        return $this->Mensalidade_dao->get_mensalidades($id_conta);
    }
}

?>
