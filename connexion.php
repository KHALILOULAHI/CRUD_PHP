<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','10htech');
$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME;
// echo'connection reussi';
try{
    $pdo = new PDO($dsn,DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $db->exec("SET NAMES 'utf8'");
    // echo"Connecté avec succès";
}catch(PDOException $e){
    die("ERROR:on peu pas se connecter.".$e->getMessage());
}


 ?>