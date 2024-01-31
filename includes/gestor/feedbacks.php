<?php include '../../config/config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/gestor/feedbacks.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tomorrow">
</head>
<?php include_once 'menu.php'; ?>
<body class="bari">
        <!--MODAIS-->
        <div class="joinha">
            <div id="modal-like" class="modal-feed">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <header class="container-feed-like" id="header-cont-feed-like">
                            <a href="#" class="closebtn-feed"><sup>x</sup></a>
                            <h2>Aprovadíssimo!!!</h2>
                        </header>
                        <div class="container-feed-dislike" id="cont-feed-like">
                            <a href="#positivo"><img src="../../img/Boneco Positivo.png" alt="Carregando..." id="positivo"></a>
                        </div>
                        <footer class="container-feed-like" id="header-cont-feed-like">
                            <p>Thank you!!!</p>
                        </footer>
                    </div>
                </div>
            </div>

            <div id="modal-dislike" class="modal-feed">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <header class="container-feed-dislike" id="header-cont-feed-dislike">
                            <a href="#" class="closebtn-feed"><sup>x</sup></a>
                            <h2>Refletir!!!</h2>
                        </header>
                        <div class="container-feed-dislike" id="cont-feed-dislike">
                            <a href="#negativo"><img src="../../img/Boneco Negativo.png" alt="Carregando..." id="negativo"></a>
                            <p id="aviso-dislike">Por favor digite a sua resposta</p>
                        </div>
                        <footer class="container-feed-dislike" id="footer-cont-feed-dislike">
                            <div class="justify-modal">
                                <form action="/action_page.php" id="justify-form1">
                                    Justificativa: <textarea name="comment" rows="6" cols="35" placeholder="Digite aqui a sua justificativa."></textarea>
                                    <input type="submit" value="Enviar" id="btn-enviar">
                                </form>
                            </div>                            
                        </footer>
                    </div>
                </div>
            </div>
        </div>



        <div class='caixa-geral-feedbak-colaborador-1'>    
            <div class='conteudo-feedbacks-colaborador-1'>
                <!-- Outro card para teste 1--> 
                <div class="container-card-1"> 
                    <div class="card-1">
                        <div class="card-frente-1">
                            <div class="card-frente-conteudo-1">
                                <img src="../../img/az-coin.png" alt="icone moeda" class="icone-azcoin-adicionada-1" id="moeda"><!--Trocar pela imagem da moeda pequena-->
                                <h2 class="valor-azcoin-historico-1">999.999,99</h2> <!--Trocar pela quantia da moeda-->
                            </div>
                            <img src="../../img/HommerSimpson.png" alt="" class="img-feed-frente-1" id="imgfeedfrente"> <!--Trocar pela imagem do destinatário-->
                        </div>
                        <div class="card-tras-1">
                            <div class="card-tras-conteudo-1">
                                <div class="carde-cabecalho-1">
                                    <img src="../../img/George-Jetson.png" alt="remetente.png" class="imagem-envio-1 remetente-1"><!--Trocar pela imagem do Remetente-->
                                    <div class="seta-1" id="arrowAnim-1"> <!-- animacao das setas no verso do card -->
                                        <div class="arrowSliding-1">
                                            <div class="arrow-1"></div>
                                        </div>
                                            <div class="arrowSliding-1 delay1-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                            <div class="arrowSliding-1 delay2-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                            <div class="arrowSliding-1 delay3-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                    </div>
                                    <img src="../../img/HommerSimpson.png" alt="destinatario.png" class="imagem-envio-1 destinatario-1"><!--Trocar pela imagem do destinatário-->
                                </div>
                                <div class="carde-feedback-1">
                                    <div class="identificacao-feedback-1">
                                        <p class="nome-remetente-1">George Jetson</p><!--Trocar pelo apelido do remetente-->
                                        <p class="nome-destinatario-1">Hommer Simpson</p><!--Trocar pelo apelido do destinatario-->
                                    </div>
                                    <h3 class="feedback-titulo-1">Feedback</h3>
                                    <p class="feedback-enviado-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur pariatur vel libero dolores veritatis similique asperiores, delectus error aabaacaaxi voluptates nisi eius sunt perferendis dolorum nulla officia odio, beatae harum atque.</p> <!--Trocar pela mensagem colocada no feedback-->
                                </div>
                                
                                <a href="#modal-like">
                                    <svg id="like" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="35" cy="35" r="33.5" fill="#D9D9D9" /><!--stroke="#EF4E23" stroke-width="3"-->
                                        <path d="M19.7534 29.6646C19.6611 30.4029 19.5996 31.1535 19.5996 31.9164C19.5996 38.6224 23.2726 44.461 28.7112 47.5556L29.7264 45.4146V30.7905L28.6005 29.6646H19.7534ZM51.0996 30.7905C51.0996 29.6646 49.9737 28.5387 48.8479 28.5387H39.847C40.4068 26.287 40.9729 24.0414 40.9729 22.9155C40.9729 20.6637 39.847 18.4181 39.2871 17.8521C39.2748 17.8398 38.7272 17.2922 37.6014 17.2922C35.9156 17.2922 35.9156 18.978 35.9156 18.978C35.9156 19.0087 35.3558 21.7896 35.3558 22.9155C35.3558 24.0414 33.104 28.5387 31.9781 29.6646L30.8522 30.2245V45.9745L31.9781 46.5343H44.3505C46.6022 46.5343 47.7281 45.4084 47.7281 44.2826C47.7281 43.1567 46.6022 42.0308 45.4764 42.0308C47.7281 42.0308 48.854 40.9049 48.854 39.7791C48.854 38.6532 47.7281 37.5273 46.6022 37.5273C48.854 37.5273 49.9799 36.4014 49.9799 35.2755C49.9799 34.1497 48.854 33.0238 47.7281 33.0238C49.9737 33.0422 51.0996 31.9164 51.0996 30.7905Z" fill="#EF4E23"/>
                                    </svg>       
                                </a>
                                
                                <a href="#modal-dislike">
                                    <svg id="dislike" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="40" cy="40" r="38.5" fill="#D9D9D9" /><!--stroke="#EF4E23" stroke-width="3"-->
                                        <path id="dislike" d="M22.5762 43.6977C22.4707 42.8539 22.4004 41.9961 22.4004 41.1242C22.4004 33.4602 26.598 26.7875 32.8137 23.2508L33.9738 25.6977V42.411L32.6871 43.6977H22.5762ZM58.4004 42.411C58.4004 43.6977 57.1137 44.9844 55.827 44.9844H45.5402C46.1801 47.5578 46.827 50.1242 46.827 51.411C46.827 53.9844 45.5402 56.5508 44.9004 57.1977C44.8863 57.2117 44.2605 57.8375 42.9738 57.8375C41.0473 57.8375 41.0473 55.911 41.0473 55.911C41.0473 55.8758 40.4074 52.6977 40.4074 51.411C40.4074 50.1242 37.834 44.9844 36.5473 43.6977L35.2605 43.0578V25.0578L36.5473 24.418H50.6871C53.2605 24.418 54.5473 25.7047 54.5473 26.9914C54.5473 28.2781 53.2605 29.5649 51.9738 29.5649C54.5473 29.5649 55.834 30.8516 55.834 32.1383C55.834 33.425 54.5473 34.7117 53.2605 34.7117C55.834 34.7117 57.1207 35.9985 57.1207 37.2852C57.1207 38.5719 55.834 39.8586 54.5473 39.8586C57.1137 39.8375 58.4004 41.1242 58.4004 42.411Z" fill="#EF4E23"/>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Outro card para teste 2--> 
                <div class="container-card-1"> 
                    <div class="card-1">
                        <div class="card-frente-1">
                            <div class="card-frente-conteudo-1">
                                <img src="../../img/az-coin.png" alt="icone moeda" class="icone-azcoin-adicionada-1" id="moeda"><!--Trocar pela imagem da moeda pequena-->
                                <h2 class="valor-azcoin-historico-1">999.999,99</h2> <!--Trocar pela quantia da moeda-->
                            </div>
                            <img src="../../img/HommerSimpson.png" alt="" class="img-feed-frente-1" id="imgfeedfrente"> <!--Trocar pela imagem do destinatário-->
                        </div>
                        <div class="card-tras-1">
                            <div class="card-tras-conteudo-1">
                                <div class="carde-cabecalho-1">
                                    <img src="../../img/George-Jetson.png" alt="remetente.png" class="imagem-envio-1 remetente-1"><!--Trocar pela imagem do Remetente-->
                                    <div class="seta-1" id="arrowAnim-1"> <!-- animacao das setas no verso do card -->
                                        <div class="arrowSliding-1">
                                            <div class="arrow-1"></div>
                                        </div>
                                            <div class="arrowSliding-1 delay1-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                            <div class="arrowSliding-1 delay2-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                            <div class="arrowSliding-1 delay3-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                    </div>
                                    <img src="../../img/HommerSimpson.png" alt="destinatario.png" class="imagem-envio-1 destinatario-1"><!--Trocar pela imagem do destinatário-->
                                </div>
                                <div class="carde-feedback-1">
                                    <div class="identificacao-feedback-1">
                                        <p class="nome-remetente-1">George Jetson</p><!--Trocar pelo apelido do remetente-->
                                        <p class="nome-destinatario-1">Hommer Simpson</p><!--Trocar pelo apelido do destinatario-->
                                    </div>
                                    <h3 class="feedback-titulo-1">Feedback</h3>
                                    <p class="feedback-enviado-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur pariatur vel libero dolores veritatis similique asperiores, delectus error aabaacaaxi voluptates nisi eius sunt perferendis dolorum nulla officia odio, beatae harum atque.</p> <!--Trocar pela mensagem colocada no feedback-->
                                </div>
                                
                                <a href="#modal-like">
                                    <svg id="like" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="35" cy="35" r="33.5" fill="#D9D9D9" /><!--stroke="#EF4E23" stroke-width="3"-->
                                        <path d="M19.7534 29.6646C19.6611 30.4029 19.5996 31.1535 19.5996 31.9164C19.5996 38.6224 23.2726 44.461 28.7112 47.5556L29.7264 45.4146V30.7905L28.6005 29.6646H19.7534ZM51.0996 30.7905C51.0996 29.6646 49.9737 28.5387 48.8479 28.5387H39.847C40.4068 26.287 40.9729 24.0414 40.9729 22.9155C40.9729 20.6637 39.847 18.4181 39.2871 17.8521C39.2748 17.8398 38.7272 17.2922 37.6014 17.2922C35.9156 17.2922 35.9156 18.978 35.9156 18.978C35.9156 19.0087 35.3558 21.7896 35.3558 22.9155C35.3558 24.0414 33.104 28.5387 31.9781 29.6646L30.8522 30.2245V45.9745L31.9781 46.5343H44.3505C46.6022 46.5343 47.7281 45.4084 47.7281 44.2826C47.7281 43.1567 46.6022 42.0308 45.4764 42.0308C47.7281 42.0308 48.854 40.9049 48.854 39.7791C48.854 38.6532 47.7281 37.5273 46.6022 37.5273C48.854 37.5273 49.9799 36.4014 49.9799 35.2755C49.9799 34.1497 48.854 33.0238 47.7281 33.0238C49.9737 33.0422 51.0996 31.9164 51.0996 30.7905Z" fill="#EF4E23"/>
                                    </svg>       
                                </a>
                                
                                <a href="#modal-dislike">
                                    <svg id="dislike" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="40" cy="40" r="38.5" fill="#D9D9D9" /><!--stroke="#EF4E23" stroke-width="3"-->
                                        <path id="dislike" d="M22.5762 43.6977C22.4707 42.8539 22.4004 41.9961 22.4004 41.1242C22.4004 33.4602 26.598 26.7875 32.8137 23.2508L33.9738 25.6977V42.411L32.6871 43.6977H22.5762ZM58.4004 42.411C58.4004 43.6977 57.1137 44.9844 55.827 44.9844H45.5402C46.1801 47.5578 46.827 50.1242 46.827 51.411C46.827 53.9844 45.5402 56.5508 44.9004 57.1977C44.8863 57.2117 44.2605 57.8375 42.9738 57.8375C41.0473 57.8375 41.0473 55.911 41.0473 55.911C41.0473 55.8758 40.4074 52.6977 40.4074 51.411C40.4074 50.1242 37.834 44.9844 36.5473 43.6977L35.2605 43.0578V25.0578L36.5473 24.418H50.6871C53.2605 24.418 54.5473 25.7047 54.5473 26.9914C54.5473 28.2781 53.2605 29.5649 51.9738 29.5649C54.5473 29.5649 55.834 30.8516 55.834 32.1383C55.834 33.425 54.5473 34.7117 53.2605 34.7117C55.834 34.7117 57.1207 35.9985 57.1207 37.2852C57.1207 38.5719 55.834 39.8586 54.5473 39.8586C57.1137 39.8375 58.4004 41.1242 58.4004 42.411Z" fill="#EF4E23"/>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Outro card para teste 3--> 
                <div class="container-card-1"> 
                    <div class="card-1">
                        <div class="card-frente-1">
                            <div class="card-frente-conteudo-1">
                                <img src="../../img/az-coin.png" alt="icone moeda" class="icone-azcoin-adicionada-1" id="moeda"><!--Trocar pela imagem da moeda pequena-->
                                <h2 class="valor-azcoin-historico-1">999.999,99</h2> <!--Trocar pela quantia da moeda-->
                            </div>
                            <img src="../../img/HommerSimpson.png" alt="" class="img-feed-frente-1" id="imgfeedfrente"> <!--Trocar pela imagem do destinatário-->
                        </div>
                        <div class="card-tras-1">
                            <div class="card-tras-conteudo-1">
                                <div class="carde-cabecalho-1">
                                    <img src="../../img/George-Jetson.png" alt="remetente.png" class="imagem-envio-1 remetente-1"><!--Trocar pela imagem do Remetente-->
                                    <div class="seta-1" id="arrowAnim-1"> <!-- animacao das setas no verso do card -->
                                        <div class="arrowSliding-1">
                                            <div class="arrow-1"></div>
                                        </div>
                                            <div class="arrowSliding-1 delay1-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                            <div class="arrowSliding-1 delay2-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                            <div class="arrowSliding-1 delay3-1">
                                                <div class="arrow-1"></div>
                                            </div>
                                    </div>
                                    <img src="../../img/HommerSimpson.png" alt="destinatario.png" class="imagem-envio-1 destinatario-1"><!--Trocar pela imagem do destinatário-->
                                </div>
                                <div class="carde-feedback-1">
                                    <div class="identificacao-feedback-1">
                                        <p class="nome-remetente-1">George Jetson</p><!--Trocar pelo apelido do remetente-->
                                        <p class="nome-destinatario-1">Hommer Simpson</p><!--Trocar pelo apelido do destinatario-->
                                    </div>
                                    <h3 class="feedback-titulo-1">Feedback</h3>
                                    <p class="feedback-enviado-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur pariatur vel libero dolores veritatis similique asperiores, delectus error aabaacaaxi voluptates nisi eius sunt perferendis dolorum nulla officia odio, beatae harum atque.</p> <!--Trocar pela mensagem colocada no feedback-->
                                </div>
                                
                                <a href="#modal-like">
                                    <svg id="like" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="35" cy="35" r="33.5" fill="#D9D9D9" /><!--stroke="#EF4E23" stroke-width="3"-->
                                        <path d="M19.7534 29.6646C19.6611 30.4029 19.5996 31.1535 19.5996 31.9164C19.5996 38.6224 23.2726 44.461 28.7112 47.5556L29.7264 45.4146V30.7905L28.6005 29.6646H19.7534ZM51.0996 30.7905C51.0996 29.6646 49.9737 28.5387 48.8479 28.5387H39.847C40.4068 26.287 40.9729 24.0414 40.9729 22.9155C40.9729 20.6637 39.847 18.4181 39.2871 17.8521C39.2748 17.8398 38.7272 17.2922 37.6014 17.2922C35.9156 17.2922 35.9156 18.978 35.9156 18.978C35.9156 19.0087 35.3558 21.7896 35.3558 22.9155C35.3558 24.0414 33.104 28.5387 31.9781 29.6646L30.8522 30.2245V45.9745L31.9781 46.5343H44.3505C46.6022 46.5343 47.7281 45.4084 47.7281 44.2826C47.7281 43.1567 46.6022 42.0308 45.4764 42.0308C47.7281 42.0308 48.854 40.9049 48.854 39.7791C48.854 38.6532 47.7281 37.5273 46.6022 37.5273C48.854 37.5273 49.9799 36.4014 49.9799 35.2755C49.9799 34.1497 48.854 33.0238 47.7281 33.0238C49.9737 33.0422 51.0996 31.9164 51.0996 30.7905Z" fill="#EF4E23"/>
                                    </svg>       
                                </a>
                                
                                <a href="#modal-dislike">
                                    <svg id="dislike" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="40" cy="40" r="38.5" fill="#D9D9D9" /><!--stroke="#EF4E23" stroke-width="3"-->
                                        <path id="dislike" d="M22.5762 43.6977C22.4707 42.8539 22.4004 41.9961 22.4004 41.1242C22.4004 33.4602 26.598 26.7875 32.8137 23.2508L33.9738 25.6977V42.411L32.6871 43.6977H22.5762ZM58.4004 42.411C58.4004 43.6977 57.1137 44.9844 55.827 44.9844H45.5402C46.1801 47.5578 46.827 50.1242 46.827 51.411C46.827 53.9844 45.5402 56.5508 44.9004 57.1977C44.8863 57.2117 44.2605 57.8375 42.9738 57.8375C41.0473 57.8375 41.0473 55.911 41.0473 55.911C41.0473 55.8758 40.4074 52.6977 40.4074 51.411C40.4074 50.1242 37.834 44.9844 36.5473 43.6977L35.2605 43.0578V25.0578L36.5473 24.418H50.6871C53.2605 24.418 54.5473 25.7047 54.5473 26.9914C54.5473 28.2781 53.2605 29.5649 51.9738 29.5649C54.5473 29.5649 55.834 30.8516 55.834 32.1383C55.834 33.425 54.5473 34.7117 53.2605 34.7117C55.834 34.7117 57.1207 35.9985 57.1207 37.2852C57.1207 38.5719 55.834 39.8586 54.5473 39.8586C57.1137 39.8375 58.4004 41.1242 58.4004 42.411Z" fill="#EF4E23"/>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
    