<?php
session_start();
include '../../config/config.php';

if(isset($_POST['Btn_CadasProduto'])){
    
    $arquivo = $_FILES['foto'];

    if($arquivo['error']) die('Falha ao enviar o arquivo');

    //definindo o caminho que a foto será salva
    $pasta = 'C:\xampp\htdocs\Fabrica275\Projeto\img\produtos';//mudar o caminho
    //recebendo o nome do arquivo
    $nome_arquivo = $arquivo['name'];
    //gera um novo nome para a foto
    $new_name = uniqid();
    //extrai a extensao do arquivo
    $extensao = strtolower(pathinfo($nome_arquivo,PATHINFO_EXTENSION));

    if($extensao != 'png' && $extensao != 'jpeg' && $extensao != 'jpg' ) die("Falha ao enviar o arquivo!");
    //concatena o caminho da pasta mais o novo nome e a extensao
    $caminho = $pasta . $new_name . "." . $extensao;

    $foto = move_uploaded_file($arquivo['tmp_name'],$caminho);
    

    $nome = $_POST['nome'];
    $descricao = $_POST[ 'descricao'];
    $qtdade = $_POST ['quantidade'];
    $valor = $_POST[ 'valor'];
    

    $sql = ("INSERT INTO produto(nome,imagem, descricao,qde_produto, valor_produto, id_status_produto) VALUES (:nmProd,:imgProd,:desProd,:qtdProd,:valorProd, 1)");

    $result_produto = $conexao->prepare($sql);
    $result_produto->bindParam(':nmProd', $nome);
    $result_produto->bindParam(':imgProd', $caminho);
    $result_produto->bindParam(':desProd', $descricao);
    $result_produto->bindParam(':qtdProd', $qtdade);
    $result_produto->bindParam(':valorProd', $valor);
    
    if($result_produto->execute()){
        header("Location:cadastrodeproduto.php");
        }

         
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="../../css/gestor/cadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tomorrow">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
</head>

<body class="home">
    <?php include_once 'menu.php'; ?>
    <!--TELA CADASTRO PRODUTO-->
    <form method="POST" action="" name="imagem" enctype="multipart/form-data">
        <div class="caduser">
            <div class="caixa-input">
                <input required="" type="text" name="nome" class=" input">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">N</span>
                    <span class="label-letra" style="--index: 1">O</span>
                    <span class="label-letra" style="--index: 2">M</span>
                    <span class="label-letra" style="--index: 3">E</span>
                </label>
            </div>
            <div class="caixa-input">
                <input required="" type="text" name="descricao" class="input">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">D</span>
                    <span class="label-letra" style="--index: 1">E</span>
                    <span class="label-letra" style="--index: 2">S</span>
                    <span class="label-letra" style="--index: 3">C</span>
                    <span class="label-letra" style="--index: 4">R</span>
                    <span class="label-letra" style="--index: 5">I</span>
                    <span class="label-letra" style="--index: 6">Ç</span>
                    <span class="label-letra" style="--index: 7">Ã</span>
                    <span class="label-letra" style="--index: 8">O</span>
                </label>
            </div>
            <div class="caixa-input">
                <input required="" type="text" name="quantidade" class="input">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">Q</span>
                    <span class="label-letra" style="--index: 1">U</span>
                    <span class="label-letra" style="--index: 2">A</span>
                    <span class="label-letra" style="--index: 3">N</span>
                    <span class="label-letra" style="--index: 4">T</span>
                    <span class="label-letra" style="--index: 5">I</span>
                    <span class="label-letra" style="--index: 6">D</span>
                    <span class="label-letra" style="--index: 7">A</span>
                    <span class="label-letra" style="--index: 8">D</span>
                    <span class="label-letra" style="--index: 8">E</span>
                </label>
            </div>
            <div class="caixa-input">
                <input required="" type="text" name="valor" class="input">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">V</span>
                    <span class="label-letra" style="--index: 1">A</span>
                    <span class="label-letra" style="--index: 2">L</span>
                    <span class="label-letra" style="--index: 3">O</span>
                    <span class="label-letra" style="--index: 4">R</span>
                </label>
            </div>

            <div class="foto">
                <span class="sfoto">Inserir imagem</span>
                <div class="pre-view">
                    <input type='file' accept='image/*' onchange='openFile(event)' name="foto"><br>
                    <img id='output'>
                </div>

            </div>
            <input class="check" type="checkbox" id="checkbox_toggle">

            <div class=botaop>
                <button onclick="produto.cadastrar()" class="btncads" name="Btn_CadasProduto">Cadastrar</button>
                <button onclick="produto.cancelar()" class="btncads" name="Btn_CanProduto">Cancelar</button>

            </div>
        </div>
        </div>

    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    var openFile = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('output');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    };
    </script>
</body>

</html>