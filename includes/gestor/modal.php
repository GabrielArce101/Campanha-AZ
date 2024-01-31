<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Criar Campanha</title>
    <link rel="stylesheet" href="css\gestor\campanha.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <form method="GET">
    <div id="fade" class="hide"></div>
            <div id="modal" class="hide">
                <div class="cabeçalho-modal">
                    <h2 class="titulo-modal">Campanhas:</h2>
                </div>
                <div class="modal-body">
                    <div class="conteudo-modal">
                        <?php
                            use \App\Entity\Campanha;
                            $obModal = new Campanha;
                            $info = $obModal->visualizar();
                            foreach ($info as $campanha){
                                ?>
                                <div class="container-campanha">
                                    <div class="conteudo-campanha">
                                        <div class="campanha-texto">
                                            <!--<h3 class="nome-campanha">//$campanha['nome_campanha']</h3>-->
                                            <div class="conjunto-nome">
                                                <h3 class="apresenta-nome">Nome da Campanha:</h3>
                                            <h3 class="nome-campanha"><?=$campanha['nome_campanha']?></h3>
                                            <!--<h3 class="nome-campanha">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur cupiditate corporis ipsam nisi9 </h3>-->
                                            </div>
                                            <div class="conjunto-datas">
                                                <div class="inicio-conjunto">
                                                    <h3 class="apresenta-data">Data Início:</h3>
                                                    <h3 class="inicio-campanha"><?=date("d/m/Y", strtotime($campanha['data_inicio']))?></h3>
                                                </div>
                                                <h2 class="separa-data">-</h2>
                                                <div class="final-conjunto">
                                                    <h3 class="apresenta-data">Data Término:</h3>
                                                    <h3 class="termino-campanha"><?=date("d/m/Y", strtotime($campanha['data_final']))?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="campanha-edit" id="editar" href="includes/gestor/editar_campanha.php?id=<?=$campanha['id_campanha']?>">
                                            <svg width="40" height="40" viewBox="0 0 302 302" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M263.447 163.088V250.904C263.447 257.833 257.83 263.45 250.902 263.45H50.178C43.2495 263.45 37.6328 257.833 37.6328 250.904V50.181C37.6328 43.2524 43.2495 37.6357 50.178 37.6357H137.995" stroke="white" stroke-width="25.0904" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M87.8125 167.604V213.269H133.71L263.446 83.4766L217.625 37.6357L87.8125 167.604Z" stroke="white" stroke-width="25.0904" stroke-linejoin="round"/>
                                            </svg>
                                        </a>

                                    </div>

                                </div>

                           <?php };

                        ?>
                    </div>
                    <div class="botao-fecha">
                        <button id="close-modal" class="custom-btn btn-1">Fechar</button>
                    </div>                 
                </div>
            </div>
<script src="./js/modal.js"></script>
</body>
</html>