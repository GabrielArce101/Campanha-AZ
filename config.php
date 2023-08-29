<?php
$dbHost = 'localhost';
$dbName = 'AZMerit';// Mudar para AZMerit !!
$dbUser = 'postgres';
$dbPass = '************';   /*Mudar senha depois*/

try{
    $conexao = new PDO("pgsql:host=$dbHost;dbname=" . $dbName, $dbUser, $dbPass);
    echo "conexao relizada com sucesso";
}catch(PDOException $err){
    echo "banco não conectado" . " " .$err->getMessage();
}
