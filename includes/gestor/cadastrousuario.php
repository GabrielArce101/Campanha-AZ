<?php
global $perfil;
session_start();
include '../../config/config.php';

if(isset($_POST['Btn_CadasUsuario'])){

    $arquivo = $_FILES['fotoUsuario'];

    if($arquivo['error']) die('Falha ao enviar o arquivo1');

    //definindo o caminho que a foto será salva
    $pasta = 'C:\xampp\htdocs\Fabrica275\Projeto\img\usuarios'; //mudar o caminho
    //recebendo o nome do arquivo
    $nome_arquivo = $arquivo['name'];
    //gera um novo nome para a foto
    $new_name = uniqid();
    //extrai a extensao do arquivo
    $extensao = strtolower(pathinfo($nome_arquivo,PATHINFO_EXTENSION));

    if($extensao != 'png' && $extensao != 'jpeg' && $extensao != 'jpg' ) die("Falha ao enviar o arquivo!2");
    //concatena o caminho da pasta mais o novo nome e a extensao
    $caminho = $pasta . $new_name . "." . $extensao;
    $foto = move_uploaded_file($arquivo['tmp_name'],$caminho);
   
    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $apelido =$_POST['apeUsuario'];
    $senha = $_POST['senha'];
    if(isset($_POST['radioUsuario'])){
        $cargo = $_POST['radioUsuario'];
        
        if($cargo === 'colaborador'){
            $perfil = 3;
        }
        else{
            $perfil = 2;
        }
    }  

    $sql = ("INSERT INTO usuario(nome,email,senha,imagem,apelido,id_perfil_usuario,id_status_user) VALUES (:nmUsu,:emaUsu,:senhaUsu,:imgUsu,:apeUsu,:perUsu, 1)");

    $result_usuario = $conexao->prepare($sql);
    $result_usuario->bindParam(':nmUsu', $nome);   
    $result_usuario->bindParam(':emaUsu', $email);
    $result_usuario->bindParam(':senhaUsu', $senha);
    $result_usuario->bindParam(':imgUsu', $caminho);
    $result_usuario->bindParam(':apeUsu', $apelido);
    $result_usuario->bindParam(':perUsu', $perfil);

    if ($result_usuario->execute()) {
        header("Location: cadastrousuario.php");
    } else {
        // Verifique os erros de execução da consulta
        echo "Erro: " . implode(" - ", $result_usuario->errorInfo());
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
    <!--TELA DE CADASTROS-->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="caduser">
            <div class="caixa-input">
                <input required="" type="text" class="input" name="nomeUsuario">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">N</span>
                    <span class="label-letra" style="--index: 1">O</span>
                    <span class="label-letra" style="--index: 2">M</span>
                    <span class="label-letra" style="--index: 3">E</span>
                </label>
            </div>

            <div class="caixa-input">
                <input required="" type="text" class="input" name="apeUsuario">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">A</span>
                    <span class="label-letra" style="--index: 1">P</span>
                    <span class="label-letra" style="--index: 2">E</span>
                    <span class="label-letra" style="--index: 3">L</span>
                    <span class="label-letra" style="--index: 3">I</span>
                    <span class="label-letra" style="--index: 3">D</span>
                    <span class="label-letra" style="--index: 3">O</span>
                </label>
            </div>

            <div class="caixa-input">
                <input required="" type="text" class="input" name="emailUsuario">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">E</span>
                    <span class="label-letra" style="--index: 1">-</span>
                    <span class="label-letra" style="--index: 2">M</span>
                    <span class="label-letra" style="--index: 3">A</span>
                    <span class="label-letra" style="--index: 4">I</span>
                    <span class="label-letra" style="--index: 5">L</span>
                </label>
            </div>
            <div class="caixa-input">
                <input required="" type="text" class="input" name="senha">
                <span class="barra"></span>
                <label class="label">
                    <span class="label-letra" style="--index: 0">S</span>
                    <span class="label-letra" style="--index: 1">E</span>
                    <span class="label-letra" style="--index: 2">N</span>
                    <span class="label-letra" style="--index: 3">H</span>
                    <span class="label-letra" style="--index: 4">A</span>
                </label>
            </div>

            <div class="foto">
                <span class="sfoto">Inserir imagem</span>
                <div class="pre-view">
                    <input type='file' accept='image/*' onchange='openFile(event)' name="fotoUsuario"><br>
                    <img id='output'>

                </div>

            </div>

            <div class="radio-button">
                <input class="option1" type="radio" name="radioUsuario" value="colaborador">
                <span class="radio"></span>
                <span class="textoradio">Colaborador</span>
            </div>

            <div class="radio-button">
                <input class="option2" type="radio" name="radioUsuario" value="gestor">
                <span class="radio"></span>
                <span class="textoradio">Gestor</span>
            </div>




            <div class=botaop>
                <input class="btncads" type="submit" value="Cadastrar" name="Btn_CadasUsuario">
                <input class="btncads" type="submit" value="Cancelar">
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