<?php    
    require_once 'config.php'; 
    include_once 'campanha.php'; 
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
        <h1 class="Titulo">Cadastro de campanha</h1>
        <form action="" method="post">
            <input type="text" name="nome_campanha" id="nome_campanha" placeholder="Nome Completo">
            <input type="number" name="qde_az_por_colaborador" id="qde_az_por_colaborador" placeholder="qde_az_por_colaborador">
            <input type="number" name="saldo_distr" id="saldo_distr" placeholder="saldo_distr">
            <input type="date" name="data_inicio" id="data_inicio" placeholder="data_inicio ">
            <input type="time" name="hora_inicio" id="hora_inicio" placeholder="hora_inicio">
            <input type="date" name="data_final" id="data_final" placeholder="data_final">
            <input type="time" name="hora_final" id="hora_final" placeholder="hora_final">
            <input type="submit" value="CADASTRAR">
            <a href="Envio.php">VOLTAR</a>
        </form>
    </section>
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
            {
                if($data_inicio!=$data_final)
                {
                    if($usuario->campanha($nome_campanha, $qde_az_por_colaborador, $saldo_distr, $data_inicio, $hora_inicio, $data_final, $hora_final))
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

        }
    }
    
    ?>
</body>
</html>