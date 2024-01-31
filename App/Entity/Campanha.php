<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Campanha{
  //Variáveis das colunas da table campanha
  public $id_campanha;
  public $nome_campanha;
  public $data_inicio;
  public $hora_inicio;
  public $data_final;
  public $hora_final;
  public $qde_az_por_colaborador;
  public $saldo_distr;
  public $status_campanha;
  
  public function enviar(){
    //INSERIR A CAMPANHA NO BANCO
    $obDatabase = new Database('Campanha');
    $this->id_campanha = $obDatabase->insert([
      'nome_campanha'             => $this->nome_campanha,
      'qde_az_por_colaborador'    => $this->qde_az_por_colaborador,
      'data_inicio'               => $this->data_inicio,
      'hora_inicio'               => $this->hora_inicio,
      'data_final'                => $this->data_final,
      'hora_final'                => $this->hora_final,
      'saldo_distr'               => $this->saldo_distr,
      'status_campanha'           => $this->status_campanha,
    ]);
    return true;
  }

  public function visualizar() {
    return (new Database('Campanha'))
    ->select()
    ->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
