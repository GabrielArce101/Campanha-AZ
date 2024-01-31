<?php
    include_once '../../config/config.php';
    $usuario_logado = 3;
    $nomedatela = "SALDOS";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UT-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldos</title>
    <link rel="stylesheet" href="../../css/usuarios/saldos.css">
</head>
<body>
    <?php include_once("menu.php");
    $sql = "SELECT carteira.saldo_doacao_usuario, carteira.saldo_recebido_feedback, carteira.id_campanha, usuario.nome, campanha.data_final FROM carteira
        JOIN usuario ON carteira.id_usuario = usuario.id_usuario
        JOIN campanha ON carteira.id_campanha = campanha.id_campanha
        WHERE carteira.id_usuario=? LIMIT 20";
    $sth = $conexao->prepare($sql);
    $sth->execute([$usuario_logado]);
    $row = $sth->fetch();
    //https://www.w3schools.com/PHP/php_mysql_select.asp
    //http://localhost/azcoin/views/usuarios/home.php
    ?>
    <!--TELA SALDOS-->
    <div class="main-carteira">

        <div class="azscore">
            <div class="azcoinscore">
                <span id="textscore">AZCoin</span>
                <div class="valores">
                    <svg class="carteira" width="27" height="21" viewBox="0 0 27 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5 1H3.5L2 1.5L1 3V4.5V5.5M1 5.5L3 6.5H5H23L24 7.5L24.5 8V9.5V10M1 5.5V16.5V18L1.5 18.5L2.5 19.5L4 20H21.5H23L24 19L24.5 17.5V16M24.5 10H26V12V16H24.5M24.5 10H20H19L18 10.5L17 11.5L16.5 12.5V14L17.5 15L18.5 16H20H24.5M12.5 13H13M13 13H15.5L10.5 18.5L10 19L5 13H7.5V7.5H12.5H13V13ZM22 4.5H3.5L3 4V3.5L4 3H21H21.5" stroke="#0A2334" stroke-linecap="round"/>
                        <circle cx="19.9502" cy="12.9502" r="0.75" fill="#0A2334"/>
                    </svg>
                    <img class="azcoinzinha" src="../../img/moedaAZ.png">
                    <span><?php echo $row["saldo_doacao_usuario"]; ?></span>
                </div>
            </div>
    
            <div class="azmeritscore">
                <span id="textscore">AZMerit</span>
                <div class="valores">
                    <svg class="carteira" width="27" height="21" viewBox="0 0 27 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5 1H3.5L2 1.5L1 3V4.5V5V5.5M1 5.5L3.5 6.5H22L23.5 7L24.5 8V9.5V10H26V16H24.5V17.5V18.5L22.5 20H4L2 19.5L1 18V5.5ZM24 10H19.5L17.5 11L17 12L16.5 13L17 14.5L18 15.5L19.5 16H24M22 4.5H4L3 4L3.5 3H4H21M15 13.5H13V19H7.5V13.5H5L10 8L15 13.5Z" stroke="#0A2334" stroke-linecap="round"/>
                        <circle cx="19.9502" cy="12.9502" r="0.75" fill="#0A2334"/>
                    </svg>
                    <img class="azcoinzinha" src="../../img/moedaAZ.png">
                    <span><?php echo $row["saldo_recebido_feedback"]; ?></span>
                </div>
            </div>
        </div>
    
        <div class="main-score-history">
            <span>Histórico de Transação</span>
            <div class="div-principal">
                <img class="mr-yellow" src="../../img/mr-yellow.png">
                <div class="div-table">
                    <span>RECEBIDOS</span>
                    <div class="head-tabela">
                        <!--Nome, valor e data-->
                        <span class="span-nome">Nome</span>
                        <span class="span-valor">Valor</span>
                        <span class="span-data">Data</span>
                    </div>
                    <div class="tabela">
                        <?php 
                            $sql = "SELECT f.id_feedback, f.data_validacao as datadia, us1.apelido as remetente, us2.apelido as destinatario, qde_az_enviado as doacao, mensagem FROM feedback as f
                                LEFT JOIN usuario us1
                                    ON f.remetente_usuario = us1.id_usuario
                                LEFT JOIN usuario us2
                                    ON f.destinatario_usuario = us2.id_usuario
                                WHERE destinatario_usuario = ?
                                ORDER BY f.id_feedback";
                            $sth = $conexao->prepare($sql);
                            $sth->execute([$usuario_logado]);
                            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $row){
                                echo "<hr></hr>";
                                echo "<div class='linha-table'>";
                                    echo "<div class="."element-table".">";
                                        echo "<img class="."img-nome"." src="."../../img/transDar.png".">";
                                        echo "<span class="."span-nome".">".$row["remetente"]."</span>";
                                    echo "</div>";
                                    echo "<div class="."element-table".">";
                                        echo "<img class="."azcoin"." src="."../../img/moedaAZ.png".">";
                                        echo "<span class="."span-valor".">".$row["doacao"]."</span>";
                                    echo "</div>";
                                    echo "<div class="."element-table".">";
                                        echo "<span class="."span-data".">".date("d/m/Y", strtotime($row["datadia"]))."</span>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                        <hr></hr>
                    </div>
                </div>
                <hr class="linha-divisoria"></hr>
                <div class="div-table">
                    <span>ENVIADOS</span>
                    <div class="head-tabela">
                        <!--Nome, valor e data-->
                        <span class="span-nome">Nome</span>
                        <span class="span-valor">Valor</span>
                        <span class="span-data">Data</span>
                    </div>
                    <div class="tabela">
                        <?php
                        $sql = "SELECT f.id_feedback, f.data_validacao as datadia, us1.apelido as remetente, us2.apelido as destinatario, qde_az_enviado as doacao, mensagem FROM feedback as f
                            LEFT JOIN usuario us1
                                ON f.remetente_usuario = us1.id_usuario
                            LEFT JOIN usuario us2
                                ON f.destinatario_usuario = us2.id_usuario
                            WHERE remetente_usuario = ?
                            ORDER BY f.id_feedback";
                        $sth = $conexao->prepare($sql);
                        $sth->execute([$usuario_logado]);
                        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rows as $row){
                                echo "<hr></hr>";
                                echo "<div class='linha-table'>";
                                    echo "<div class="."element-table".">";
                                        echo "<img class="."img-nome"." src="."../../img/transReceber.png".">";
                                        echo "<span class="."span-nome".">".$row["remetente"]."</span>";
                                    echo "</div>";
                                    echo "<div class="."element-table".">";
                                        echo "<img class="."azcoin"." src="."../../img/moedaAZ.png".">";
                                        echo "<span class="."span-valor".">".$row["doacao"]."</span>";
                                    echo "</div>";
                                    echo "<div class="."element-table".">";
                                        echo "<span class="."span-data".">".date("d/m/Y", strtotime($row["datadia"]))."</span>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                        <hr></hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>