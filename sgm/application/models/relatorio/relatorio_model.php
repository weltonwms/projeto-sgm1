<?php


class Relatorio_model extends CI_Model{
  private $mensalidades; //lista de Mensalidade_composite
  
  function __construct() {
      parent::__construct();
  }
  
  public function set_mensalidades(array $mensalidades){
      $this->mensalidades=$mensalidades;
  }
  
  public function get_mensalidades(){
      return $this->mensalidades;
  }
  
  public function get_valor_total(){
      $valor=0;
      foreach ($this->mensalidades as $mensalidade):
          $valor+=$mensalidade->get_valor();
      endforeach;
      return $valor;
  }

}

?>
