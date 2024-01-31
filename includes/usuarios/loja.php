<?php 
    $nomedatela = "LOJA";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="../../css/usuarios/loja.css">
</head>
<body class="home">
    <?php include_once("menu.php") ?>
    <!--Meu Conteudo(Loja)-->
    <div class="loja">
    
        <div class="carousel">
            <div class="carousel-container">
                <a href="descricao.html">
                <img class="carousel-item carousel-item-1" src="../../img/garrafa_termica.jpg" alt="Imagem 1" >
                </a>
                <a href="descricao.html">
                <img class="carousel-item carousel-item-2" src= "../../img/caneca_branca.jpg" alt="Imagem 2">
                </a>
                <a href="descricao.html">
                <img class="carousel-item carousel-item-3" src="../../img/camiseta_laranja.jpg" alt="Imagem 3">
                </a>
                <a href="descricao.html">
                <img class="carousel-item carousel-item-4" src="../../img/caneta_dourada.jpg" alt="Imagem 4">
                </a>
                <a href="descricao.html">
                <img class="carousel-item carousel-item-5" src="../../img/mochila_convoy.jpg" alt="Imagem 5">
                </a>
                <a href="descricao.html">
                <img class="carousel-item carousel-item-6" src="../../img/mouse_gamer.jpg" alt="Imagem 6">
                </a>
                <div class="carousel-controls"></div>
            </div>
               
        </div>

        <div class="container">
            <div class="img-card">
                <img class="imagem" src="../../img/garrafa_stanley.jpg" alt="imagem_1">
            </div>
            <div class="img-card">
                <img class="imagem" src="../../img/caneta_montblanc.jpg" alt="imagem_2">
            </div>
            <div class="img-card">
                <img class="imagem" src="../../img/caneca_mug.jpg" alt="imagem_3">
            </div>
            <div class="img-card">
                <img class="imagem" src="../../img/snitch_dourada.jpg" alt="imagem_4">
            </div>
        </div>

    </div>
</body>
<!--SCRIPT-->
<script src="../../js/loja.js"></script>
</html>