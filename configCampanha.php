<?php

require __DIR__.'\vendor\autoload.php';


use \App\Entity\Campanha;
$obCampanha = new Campanha;

if(isset($_POST['nome_camp'], $_POST['input-quantidade'], $_POST['data1'], $_POST['hora1'], $_POST['data2'], $_POST['hora2'],)){
    $obCampanha->nome_campanha = addslashes($_POST['nome_camp']);
    $obCampanha->qde_az_por_colaborador = addslashes($_POST['input-quantidade']);
    $obCampanha->data_inicio = addslashes($_POST['data1']);
    $obCampanha->hora_inicio = addslashes($_POST['hora1']);
    $obCampanha->data_final = addslashes($_POST['data2']);
    $obCampanha->hora_final = addslashes($_POST['hora2']); 
    $data_inicio = DateTime::createFromFormat('Y-m-d H:i', $obCampanha->data_inicio . ' ' . $obCampanha->hora_inicio);
    $data_final = DateTime::createFromFormat('Y-m-d H:i', $obCampanha->data_final . ' ' . $obCampanha->hora_final);

    
    if ($data_inicio < $data_final) {
        $status_campanha = 1;   
    } else {
        $status_campanha = 0;
    }
    $obCampanha->status_campanha = $status_campanha;
    $obCampanha->enviar();
}
?>