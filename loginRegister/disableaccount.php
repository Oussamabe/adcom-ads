<?php
 include_once'../database/connection.php';
 session_start();
//  if($_SESSION['role']!=="Admin"){
//    header('location:index.php');
//  }

$delete = $con->prepare("UPDATE utilisateur set isactif = 0 where iduser = '".$_GET['id']."'");
if($delete->execute()){

    header('location:listeComptes.php');
}else{
    echo "error";
}