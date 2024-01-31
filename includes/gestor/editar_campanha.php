<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Criar Campanha</title>
    <link rel="stylesheet" href="css\gestor\campanha.css">  
</head>
<body class="campanha">
    <div class="tudo">
        <img class="boneco" src="img/Boneco.png" alt="Carregando...">
        <form class="form" method="post">
            <div class="primeira-div">
                <div class="posicao-input">
                    <div id="caracteristicas" class="caixa-input">
                        <input required="" name="nome_camp" type="text" class="input" id="nome_camp">
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
                        <svg class="visualizar" id="open-modal" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                        <hr class="linha-input">
                    </div>

                    <span id="usuarios">
                        <?php
                            include_once 'App\Entity\Usuario.php';
                            use \App\Entity\Usuario;
                            $obUsuarios = new Usuario;
                            $qtd = $obUsuarios->getQuantidadeUsuarios('id_status_user !=2');
                        ?>
                    </span>

                    <div class="caixa-input2">
                        <input onchange="multiplicar()" required="" type="number" class="input" name="input-quantidade" id="input-quantidade">
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
                        <hr class="linha-input">
                    </div>

                </div> 
                    <div class="saldo-distribuido">
                        <img class="moeda" src="img/image 66.png" alt="">
                        <span  class="valor">R$:<var name="saldo_distr" id="saldo_distr"></var></span>
                    </div>                            
            </div>
            
            <div class="posicao-data">
                <div class = "input-data">
                    <input name="data1" type="date" id="data_inicio" class="infos data1">
                    <input name="hora1" type="time" id="hora_inicio" class="infos hora1">  
                </div>
                
                <div class ="input-data">   
                    <input name="data2" type="date" id="data_final" class="infos data2">
                    <input name="hora2" type="time" id="hora_final" class="infos hora2">
                </div>
            </div>
            
            <div class="botoes">
                <button type="submit" name="cancelar" id="letra-botao" class="custom-btn-2 btn-2">Cancelar</button>
                <button type="submit" value="salvar" name="salvar" id="letra-botao" class="custom-btn btn-1">Enviar</button>
            </div>
        </form>
    </div> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function multiplicar() {
        var valorUm = parseInt(document.getElementById("input-quantidade").value)

        if(isNaN(valorUm)){
        valorUm = 0
    }
    $.ajax({
        url: 'index.php',
        type: 'POST',
        success: function(data){
            console.log('Dados recebidos:', data); 
            var valorDois = parseInt(document.getElementById("usuarios").value);

            if (isNaN(valorDois)) {
                valorDois = <?=$qtd ?>;
            }


            var saldo_distr = valorUm * valorDois;

            var saldo_distr_texto = document.getElementById("saldo_distr").innerText = saldo_distr;
            var saldo_distr = parseInt(saldo_distr_texto, 10);
        },
        error: function() {
            console.error('Error fetching saldo_distr value');
        }
    });
}
</script>
   
</body>
</html>

