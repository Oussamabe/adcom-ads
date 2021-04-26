<?php

$hostname = "localhost";
$databaseName = "adsplatform";
$username = "root";
$password = "";

try{
    $con = new PDO("mysql:host=$hostname;dbname=$databaseName",$username,$password);
    echo "connection sucess";
}catch(PDOException $exeption){
    echo "error". $exeption->getMessage();
}


?>