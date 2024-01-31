<?php
$dbName = 'AZMerit';
$dbHost = 'localhost';
$dbUser = 'postgres';
$dbPass = '1234';

class Usuario{
    private $pdo;
    public $msgErro="";

    public function conectar($dbHost,$dbName,$dbUser,$dbPass)
    {
        global $pdo;
        try{
            $pdo = new PDO("pgsql:host=$dbHost;dbname=".$dbName, $dbUser, $dbPass);
            echo "conexao relizada com sucesso";
        }catch(PDOException $e){
            echo "banco não conectado" . " " .$msgErro = $e->getMessage();
        }
    }
}
?>