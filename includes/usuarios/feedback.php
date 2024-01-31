<?php
    include '../../config/config.php';
    $titulo = 'Enviados';
    $nomedatela = "FEEDBACKS";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
          <meta charset="utf-8">
          <title>Feedback</title>
          <link rel="stylesheet" href="../../css/usuarios/feedbacks.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tomorrow">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
    </head>
<body class="home">
    <!--TELA JV-->
    <?php
    include_once ("menu.php");
    // Recupere os valores dos campos de entrada ocultos ou defina valores padrão
    $fil1 = isset($_POST['fil1']) ? $_POST['fil1'] : "seleciona-feed-colaborador";
    $fil2 = isset($_POST['fil2']) ? $_POST['fil2'] : "seleciona-feed-colaborador principal-texto-opcao";
    $fil3 = isset($_POST['fil3']) ? $_POST['fil3'] : "seleciona-feed-colaborador";
    $ret = isset($_POST['ret']) ? $_POST['ret'] : "test";
    $des = isset($_POST['des']) ? $_POST['des'] : "test principal";
    $cor1 = isset($_POST['cor1']) ? $_POST['cor1'] : "muda-tela";
    $cor2 = isset($_POST['cor2']) ? $_POST['cor2'] : "muda-tela focado";
    $filtro_Env_Rec = isset($_POST['filtro_Env_Rec']) ? $_POST['filtro_Env_Rec'] : "WHERE destinatario_usuario = ";
    $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : 'ORDER BY data_validacao DESC,hora_validacao DESC;';
    $tor1 = isset($_POST['tor1']) ? $_POST['tor1'] : 'texto-opcao-feedback-colaborador';
    $tor2 = isset($_POST['tor2']) ? $_POST['tor2'] : 'texto-opcao-feedback-colaborador focado';
    $tor3 = isset($_POST['tor3']) ? $_POST['tor3'] : 'texto-opcao-feedback-colaborador';



    // Verifique qual botão foi clicado
    if (isset($_POST['recebido'])) { 
        $des = "test principal";
        $ret = "test";
        $filtro_Env_Rec = "WHERE destinatario_usuario = ";
        $cor1 = 'muda-tela';
        $cor2 = 'muda-tela focado';

    } elseif (isset($_POST['enviado'])) {
        $ret = "test principal";
        $des = "test";
        $filtro_Env_Rec = "WHERE usuario.id_usuario = ";
        $cor1 = 'muda-tela focado';
        $cor2 = 'muda-tela';
    } elseif (isset($_POST['recente'])) {
        $filtro=' ORDER BY data_validacao DESC,hora_validacao DESC;';
        $fil1="seleciona-feed-colaborador";
        $fil2="seleciona-feed-colaborador principal-texto-opcao";
        $fil3="seleciona-feed-colaborador";
        $tor1 = 'texto-opcao-feedback-colaborador';
        $tor2 = 'texto-opcao-feedback-colaborador focado';
        $tor3 = 'texto-opcao-feedback-colaborador';

    } elseif (isset($_POST['antigo'])) {
        $filtro = ' ORDER BY data_validacao, hora_validacao;';
        $fil1="seleciona-feed-colaborador";
        $fil3="seleciona-feed-colaborador principal-texto-opcao";
        $fil2="seleciona-feed-colaborador";
        $tor1 = 'texto-opcao-feedback-colaborador';
        $tor2 = 'texto-opcao-feedback-colaborador';
        $tor3 = 'texto-opcao-feedback-colaborador focado';

    } elseif (isset($_POST['geral'])) {
        $filtro = ';';
        $fil3="seleciona-feed-colaborador";
        $fil1="seleciona-feed-colaborador principal-texto-opcao";
        $fil2="seleciona-feed-colaborador";
        $tor1 = 'texto-opcao-feedback-colaborador focado';
        $tor2 = 'texto-opcao-feedback-colaborador';
        $tor3 = 'texto-opcao-feedback-colaborador';
    }
    ?>

    <div class='caixa-geral-feedbak-colaborador'>
        <div class="borda">
            <form method="POST" class="formula">
                <!-- Campos de entrada ocultos -->
                <input type="hidden" name="fil1" value="<?= $fil1 ?>">
                <input type="hidden" name="fil2" value="<?= $fil2 ?>">
                <input type="hidden" name="fil3" value="<?= $fil3 ?>">
                <input type="hidden" name="ret" value="<?= $ret ?>">
                <input type="hidden" name="des" value="<?= $des ?>">
                <input type="hidden" name="filtro_Env_Rec" value="<?= $filtro_Env_Rec ?>">
                <input type="hidden" name="cor1" value="<?= $cor1 ?>">
                <input type="hidden" name="cor2" value="<?= $cor2 ?>">
                <input type="hidden" name="filtro" value="<?= $filtro ?>">
                <input type="hidden" name="tor1" value="<?= $tor1 ?>">
                <input type="hidden" name="tor2" value="<?= $tor2 ?>">
                <input type="hidden" name="tor3" value="<?= $tor3 ?>">
                
                <div class="filtro-dest">    
                    <div class="<?= $ret ?>">
                        <input type='submit' class='<?= $cor1 ?>' name='enviado' value='Enviados'></input>
                    </div>
                    <div class="<?= $des ?>">
                        <input type='submit' class='<?= $cor2 ?>' name='recebido' value='Recebidos'></input>
                    </div>
                </div>
                <div class="filtros">
                    <div class='<?= $fil1 ?>'>    
                        <input type='submit' class='<?=$tor1?>' id='todos-filtro' name='geral' value='Todos'></input>
                    </div>
                    <div class='<?= $fil2 ?>'>
                        <input type='submit' class='<?=$tor2?>' id='recente-filtro' name='recente' value='Recentes'></input>
                    </div>
                    <div class='<?= $fil3 ?>'>
                        <input type='submit' class='<?=$tor3?>' id='antigo-filtro' name='antigo' value='Antigos'></input>
                    </div>
                </div>
            </form>
        </div>


        <div class='conteudo-feedbacks-colaborador'>
        <?php

        $feedback = array();
        $usuario = 2;
        $sql = "SELECT apelido, imagem, qde_az_enviado, mensagem,
        (SELECT apelido FROM usuario WHERE id_usuario = destinatario_usuario) AS destinatario,
        (SELECT imagem FROM usuario WHERE id_usuario = destinatario_usuario) AS imagem_dest
        FROM usuario JOIN feedback ON feedback.id_usuario = usuario.id_usuario "." ".$filtro_Env_Rec." ".$usuario." ".$filtro;
        
        try {
            $stmt = $conexao->prepare($sql);
            
            if ($stmt->execute()) {
                $feedback = $stmt->fetchAll();
                
                
            } else {
                die("Falha ao executar a SQL..");
            }
        } catch (PDOException $e) { 
            die($e->getMessage());
        }
        foreach ($feedback as $elemento) {
            $remetente_imagem = $elemento['imagem'];
            $destinatario_imagem = ($elemento['imagem_dest']);
            $azcoin_enviada = $elemento['qde_az_enviado'];
            $remetente= $elemento['apelido'];
            $destinatario= $elemento['destinatario'];
            $mensagem= $elemento['mensagem'];
        ?>
            <div class="container-card">
                <div class="card">
                    <div class="card-frente">
                        <div class="card-frente-conteudo">
                            <img src="../../img/Icone-Recebido (1).svg" alt="icone.png" class="icone-azcoin-adicionada">
                            <h2 class="valor-azcoin-historico"><?=$azcoin_enviada?></h2>
                        </div>
                        <img src="<?= $destinatario_imagem?>" alt="" class="img-feed-frente">
                    </div>
                    <div class="card-tras">
                        <div class="card-tras-conteudo">
                            <div class="carde-cabecalho">
                                <img src="<?= $remetente_imagem ?>" alt="remetente.png" class="imagem-envio remetente">
                                <div class="seta" id="arrowAnim">
                                    <div class="arrowSliding">
                                        <div class="arrow"></div>
                                    </div>
                                        <div class="arrowSliding delay1">
                                            <div class="arrow"></div>
                                        </div>
                                        <div class="arrowSliding delay2">
                                            <div class="arrow"></div>
                                        </div>
                                        <div class="arrowSliding delay3">
                                            <div class="arrow"></div>
                                        </div>
                                </div>
                                <img src="<?= $destinatario_imagem ?>" alt="destinatario.png" class="imagem-envio destinatario">
                            </div>
                            <div class="carde-feedback">
                                <div class="identificacao-feedback">
                                    <p class="nome-remetente"><?=$remetente?></p>
                                    <p class="nome-destinatario"><?=$destinatario?></p>
                                </div>
                                <h3 class="feedback-titulo">Feedback</h3>
                                <p class="feedback-enviado"><?=$mensagem?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</body>
</html>