<!-- insert  -->


<?php 

    // liste 

    $req = "select * from categorie";
    $val = $con->prepare($req);
    $val->execute();

    while($row = $val->fetch(PDO::FETCH_OBJ)){
        echo "{$row->non}"; 
    }



   include("../database/connection.php");

    if(isset($_POST['btnSubmit'])){
        $modele= $_POST['modele'];
        $kilometrage= $_POST['kilometrage'];
        $annoncemodele= $_POST['annoncemodele'];
        $nbporte= $_POST['nbPorte'];
        $puissance= $_POST['puissance'];
        $main= $_POST['main'];
        $boiteVitesse= $_POST['boiteVitesse'];
        
        

        $req = "INSERT into annoncevehicule(modele,kilometrage,annoncemodele,nbPorte,puissance,main,boiteVitesse)
        values(:modele,:kilometrage,:annoncemodele,:nbPorte,:puissance,:main,:boiteVitesse)";

        $val= $con->prepare($req);
        							

        $val->bindParam(":modele",$modele);
        $val->bindParam(":kilometrage",$kilometrage);
        $val->bindParam(":annoncemodele",$annoncemodele);
        $val->bindParam(":nbPorte",$nbporte);
        $val->bindParam(":puissance",$puissance);
        $val->bindParam(":main",$main);
        $val->bindParam(":boiteVitesse",$boiteVitesse);


        if($val->execute()){
            echo "c bon";
        }else{
            echo "wa mochkila hadiiii";
        }
    
  
    }


    ///////////////

    // makhamch 

    include("../database/connection.php");

    
    if(isset($_POST['btnsubmit'])){
        $modele = $_POST['modele'];
        $kilometrage = $_POST['kilometrage'];
        $annoncemodele = $_POST['annoncemodele'];
        $nbPorte = $_POST['nbPorte'];
        $puissance = $_POST['puissance'];
        $main = $_POST['main'];
        $boiteVitesse = $_POST['boiteVitesse'];

        $req = "INSERT into annoncevehicule(modele,kilometrage,annoncemodele,nbPorte,puissance,main,boiteVitesse)
        values(:modele,:kilometrage,:annoncemodele,:nbPorte,:puissance,:main,:boiteVitesse)";

        $val = $con->prepare($req);

        $val->bindParam(":modele",$modele);
        $val->bindParam(":kilometrage",$kilometrage);
        $val->bindParam(":annoncemodele",$annoncemodele);
        $val->bindParam(":nbPorte",$nbPorte);
        $val->bindParam(":puissance",$puissance);
        $val->bindParam(":main",$main);
        $val->bindParam(":boiteVitesse",$boiteVitesse);

        if($val->execute()){
            echo "bon";
        }else{
            echo "shiiiit";
        }
    }



    // modifier 

    if(isset($_POST['btnSubmit'])){
        $nom = $_post['nom'];
        $prenom = $_POST['prenom'];

        $select = "select * from client where id='$id'";
        $val = $con->prepare($select);
        $select->execute();
    }



?>