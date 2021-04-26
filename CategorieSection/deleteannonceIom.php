<?php
 include_once'../database/connection.php';
 session_start();
//  if($_SESSION['role']!=="Admin"){
//    header('location:index.php');
//  }

$delete = $con->prepare("DELETE FROM annonceimobilier WHERE idimo = '".$_GET['id']." '");
if($delete->execute()){
    header('location:listeAnonceimo.php');
    echo "bien";
}else{
    echo "error";
}
