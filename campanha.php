<?php
    require_once 'config.php';   

class Usuario{
    private $pdo;
    public $msgErro="";

    public function conectar($dbHost, $dbName, $dbUser, $dbPass) {
        try {
            $this->pdo = new PDO("pgsql:host=$dbHost;dbname=" . $dbName, $dbUser, $dbPass);
            echo "Conexao realizada com sucesso";
        } catch (PDOException $e) {
            $this->msgErro = $e->getMessage();
            echo "Banco não conectado";
        }
    }
public function campanha($nome_campanha, $qde_az_por_colaborador, $saldo_distr, $data_inicio, $hora_inicio, $data_final, $hora_final)
{  
    try
    {
        $sql = $this->pdo->prepare("INSERT INTO campanha (nome_campanha, qde_az_por_colaborador, saldo_distr, data_inicio, hora_inicio, data_final, hora_final) 
        VALUES (:nc , :qz , :sld , :dt1 , :dt2 , :hr1 , :hr2)");
        $sql->bindValue(":nc",$nome_campanha);
        $sql->bindValue(":qz",$qde_az_por_colaborador);
        $sql->bindValue(":sld",$saldo_distr);
        $sql->bindValue(":dt1",$data_inicio);
        $sql->bindValue(":hr1",$hora_inicio);
        $sql->bindValue(":dt2",$data_final);
        $sql->bindValue(":hr2",$hora_final);
        $sql->execute();
        return true;
    }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
}

