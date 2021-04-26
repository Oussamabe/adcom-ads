<?php
session_start();
$aa = $_SESSION['email'];
include_once("../includes/Header.php");

  
   
?>

<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="../dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">gestion utilisateur</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>utilisateurs</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="../loginRegister/creationcompte.php">Creation compte</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="../loginRegister/listeComptes.php">liste utilisateur</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">gestion annonce</h3><!-- /.menu-title -->


                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>annonces</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="addannonce.php">ajouter annonces</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="listeAnnonces.php">listes des annonces </a></li>
                    </ul>
                </li>

                <h3 class="menu-title">gestion categorie</h3><!-- /.menu-title -->


                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>categorie</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="../CategorieSection/addcategorie.php">ajouter categorie</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="../CategorieSection/listecategorie.php">listes des categories</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="../CategorieSection/addannonceVeh.php">ajouter annonce vehicule</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="../CategorieSection/addannonceImo.php">ajouter annonce immobiler</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                    <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                    <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="../images/admin.jpg" alt="User Avatar">
                        <p><?php echo $aa ?></p>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                        <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-3" style="width: 60%;">
        <?php
              include("../database/connection.php");

                //get id url pas idimo !!!!!!
              if($idimo=$_GET['id']){
                $select = $con->prepare("SELECT * FROM annonceimobilier  WHERE idimo=$idimo");
                $select->execute();
                $row = $select->fetch(PDO::FETCH_ASSOC);

                $libelle = $row['libelle'];
                $surface = $row['surface'];
                $nbchambre = $row['nbchambre'];
                $etage = $row['etage'];
            }else{
                header("location:index.php");
            }

            if(isset($_POST['btnSubmit'])){

                $libelle = $_POST['libelle'];
                $surface = $_POST['surface'];
                $nbchambre = $_POST['nbchambre'];
                $etage = $_POST['etage'];

                $req = "UPDATE annonceimobilier set libelle=:libelle, surface=:surface, nbchambre=:nbchambre, etage=:etage
                where idimo=$idimo";
                $val = $con->prepare($req);

                $val->bindParam(":libelle",$libelle);
                $val->bindParam(":surface",$surface);
                $val->bindParam(":nbchambre",$nbchambre);
                $val->bindParam(":etage",$etage);


                if($val->execute()){
                    echo "c bonn";
                }else{
                    echo "probleme a 3chiri";
                }


            }


          
            
            
            
              
 

        ?>
        <div class="card">
            <div class="card-header"><strong>ajouter annonce immobilier</strong><small> Form</small></div>
            <div class="card-body card-block">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="libelle" class=" form-control-label">libelle</label>
                        <input type="text" name="libelle" value="<?php echo $libelle; ?>" placeholder="Entrer libelle" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="surface" class=" form-control-label">surface</label>
                        <input type="text" name="surface" value="<?php echo $surface;  ?>" placeholder="Enter surface" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="nbchambre" class=" form-control-label">nb chambre</label>
                        <input type="text" name="nbchambre" value="<?php echo $nbchambre; ?>" placeholder="Enter nbchambre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="etage" class=" form-control-label">etage</label>
                        <input type="text" name="etage" value="<?php echo $etage; ?>" placeholder="Enter etage" class="form-control">
                    </div>

                    <button type="submit" name="btnSubmit" class="btn btn-success">update annonce</button>
                </form>

            </div>
        </div>

    </div>


</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include_once("../includes/Footer.php") ?>