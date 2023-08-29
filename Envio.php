<?php    
    require_once 'config.php';   
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Criar Campanha</title>
    <link rel="stylesheet" href="Campanha.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
</head>
<body class="home">
    <?php include_once 'menu.php'; ?>
 
    <div class="tudo">
        <div class="painel-principal">

            <img class="moeda" src="img/0099.png" alt="">
            <h1 class="multiplicador">Total: 99999</h1>
            <img class="boneco" src="img/Boneco.png" alt="Carregando...">

            <div class="caixa-input">
                <input required="" name="nome_campanha" id="input-nome" type="text" class="input">
                <label class="label">
                    <span class="label-letra" style="--index: 0">N</span>
                    <span class="label-letra" style="--index: 1">o</span>
                    <span class="label-letra" style="--index: 2">m</span>
                    <span class="label-letra" style="--index: 3">e</span>
                    <span class="label-letra" style="--index: 4" id="espaco">_</span>
                    <span class="label-letra" style="--index: 5">D</span>
                    <span class="label-letra" style="--index: 6">a</span>
                    <span class="label-letra" style="--index: 7" id="espaco">_</span>
                    <span class="label-letra" style="--index: 8">C</span>
                    <span class="label-letra" style="--index: 9">a</span>
                    <span class="label-letra" style="--index: 10">m</span>
                    <span class="label-letra" style="--index: 11">p</span>
                    <span class="label-letra" style="--index: 12">a</span>
                    <span class="label-letra" style="--index: 13">n</span>
                    <span class="label-letra" style="--index: 14">h</span>
                    <span class="label-letra" style="--index: 15">a:</span>
                </label>
                <svg class="visualizar" id="open-modal" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 
                    376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </div>

            <hr class="linha1">

            <div class="caixa-input2">
                <input required="" type="text" class="input" name="Quantidade_AZMerits" id="input-quantidade">
                <label class="label">
                    <span class="label-letra" style="--index: 1">A</span>
                    <span class="label-letra" style="--index: 2">Z</span>
                    <span class="label-letra" style="--index: 3">m</span>
                    <span class="label-letra" style="--index: 4">e</span>
                    <span class="label-letra" style="--index: 5">r</span>
                    <span class="label-letra" style="--index: 6">i</span>
                    <span class="label-letra" style="--index: 7">t</span>
                    <span class="label-letra" style="--index: 8" id="espaco">_</span>
                    <span class="label-letra" style="--index: 9">P</span>
                    <span class="label-letra" style="--index: 10">o</span>
                    <span class="label-letra" style="--index: 11">r</span>
                    <span class="label-letra" style="--index: 12" id="espaco">_</span>
                    <span class="label-letra" style="--index: 13">C</span>
                    <span class="label-letra" style="--index: 14">o</span>
                    <span class="label-letra" style="--index: 15">l</span>
                    <span class="label-letra" style="--index: 16">a</span>
                    <span class="label-letra" style="--index: 17">b</span>
                    <span class="label-letra" style="--index: 18">o</span>
                    <span class="label-letra" style="--index: 19">r</span>
                    <span class="label-letra" style="--index: 20">a</span>
                    <span class="label-letra" style="--index: 21">d</span>
                    <span class="label-letra" style="--index: 22">o</span>
                    <span class="label-letra" style="--index: 23">r</span>
                    <span class="label-letra" style="--index: 24">:</span>
                </label>  
            </div>

            <hr class="linha2">
            
            <div class="posicao-data">
                <form class="data">
                    <label for="data" class="lb">Data de início:</label>
                    <input name="data_inicio" id="data" type="date" class="infos">       
                </form>
                <form class="data">
                    <label for="data" class="lb">Data de término:</label>
                    <input name="data_fim" id="data" type="date" class="infos">       
                </form>
            </div>

            <div class="botoes">                  
                <button type="submit" name="iniciar" id="interior-botao" class="custom-btn btn-1"><a href=Envio.php class="letra-botao" method="POST">Iniciar Campanha</button>
                <button type="submit" name="cancelar" id="interior-botao" class="custom-btn btn-1"><a class="letra-botao">Cancelar</button>
                <!--Modal do editar-->
                <div id="fade" class="hide"></div>

                <div id="modal" class="hide">

                    <div class="cabeçalho-modal">
                        <h2 class="titulo-modal">Campanhas:</h2>  
                        <hr class="linha3"> 
                    </div>

                    <div class="modal-body"> 
                        
                        <nav class="interior">
                            <p class="conteudo-modal">
                                Primavera verão
                            </p>
                            <a id="editar" href="Envio.php"><i class="fa-regular fa-pen-to-square"></i></i></a>
                        </nav>                
                        <nav class="interior">
                            <p class="conteudo-modal">
                                Outono e inverno 
                            </p>
                            <a id="editar" href="Envio.php"><i class="fa-regular fa-pen-to-square"></i></a>
                        </nav>
                        <nav class="interior">
                            <p class="conteudo-modal">
                                Natal Feliz 
                            </p>
                            <a id="editar" href="Envio.php"><i  class="fa-regular fa-pen-to-square"></i></a>
                        </nav>
                    </div>

                    <button id="close-modal" class="custom-btn btn-1">Fechar</button>

                </div>

            </div>
            
        </div>            
    </div>


    <script src="script.js"></script>
    <script src="modal.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>

<?php
    if(isset($_POST['nome_campanha']))
    {
        $nome_campanha = addslashes($_POST['nome_campanha']);
        $qde_az_por_colaborador = addslashes($_POST['qde_az_por_colaborador']);
        $saldo_distr = addslashes($_POST['saldo_distr']);
        $data_inicio = addslashes($_POST['data_inicio']);
        $hora_inicio = addslashes($_POST['hora_inicio']);                
        $data_final = addslashes($_POST['data_final']);        
        $hora_final = addslashes($_POST['hora_final']);        
        if(!empty($nome_campanha)&& !empty($qde_az_por_colaborador)&& !empty($saldo_distr)&& !empty($data_inicio)&& !empty($hora_inicio)&& !empty($data_final)&& !empty($hora_final))
        {           
            $Usuario->conectar("AZMerit","localhost","postgres","1234");
            echo "Conectou";
            if($Usuario->$msgErro=="") //Deu tudo certo
            {
                if($data_inicio!=$data_final)
                {
                    if($Usuario->campanha($nome_campanha, $qde_az_por_colaborador, $saldo_distr, $data_inicio, $hora_inicio, $data_final, $hora_final))
                    {
                        ?>
                            <div>
                                <p> Campanha Cadastrada com sucesso</p>
                                <a href="Envio.php">Iniciar</a>
                            </div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div>
                                <p> Campanha já Cadastrada</p>
                                <a href="Envio.php"></a>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div>
                            <p>Data inicial e Datal final são iguais, por favor selecione datas diferentes.</p>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div>
                        <?php echo "Erro:".$Usuario->$msgErro; ?>
                    </div>
                <?php
            }
        }
    }
    
    ?>
</body>
</html>
