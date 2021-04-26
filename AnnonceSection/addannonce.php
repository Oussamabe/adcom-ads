<?php
session_start();
$aa = $_SESSION['email'];
include_once("../includes/Header.php");

include('../database/connection.php');
//image  cannot recupere value width  $_post
if (isset($_POST['btnSubmit'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $etat = $_POST['etat'];
    $prix = $_POST['prix'];
    $telephone = $_POST['telephone'];
    $datePublication = $_POST['datePublication'];
    $iduser = $_POST['iduser'];
    $idville = $_POST['idville'];
    $idcat  = $_POST['idcat'];
    $idtype    = $_POST['idtype'];

    $req = "INSERT into annonce(titre,image,description,etat,prix,telephone,datePublication,iduser,idville,idcat,idtype)
    values (:titre,:image,:description,:etat,:prix,:telephone,:datePublication,:iduser,:idville,:idcat,:idtype)";

    $val = $con->prepare($req);

    $image = !empty($_FILES["image"]["name"])
                    ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
                    : "";

    $val->bindparam(":titre", $titre);
    $val->bindparam(":image", $image);
    $val->bindparam(":description", $description);
    $val->bindparam(":etat", $etat);
    $val->bindparam(":prix", $prix);
    $val->bindparam(":telephone", $telephone);
    $val->bindparam(":datePublication", $datePublication);
    $val->bindparam(":iduser", $iduser);
    $val->bindparam(":idville", $idville);
    $val->bindparam(":idcat", $idcat);
    $val->bindparam(":idtype", $idtype);


    if ($val->execute()) {
        echo "c bonnn";

        if ($image) {

            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // error message is empty
            $file_upload_error_messages = "";

            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                // submitted file is an image
            } else {
                $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types = array("jpg", "jpeg", "png", "gif");
            if (!in_array($file_type, $allowed_file_types)) {
                $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            // make sure file does not exist
            if (file_exists($target_file)) {
                $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
            }

            // make sure submitted file is not too large, can't be larger than 1 MB
            if ($_FILES['image']['size'] > (1024000)) {
                $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
            }

            // make sure the 'uploads' folder exists
            // if not, create it
            if (!is_dir($target_directory)) {
                mkdir($target_directory, 0777, true);
            }

            // if $file_upload_error_messages is still empty
            if (empty($file_upload_error_messages)) {
                // it means there are no errors, so try to upload the file
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // it means photo was uploaded
                } else {
                    echo "<div class='alert alert-danger'>";
                    echo "<div>Unable to upload photo.</div>";
                    echo "<div>Update the record to upload photo.</div>";
                    echo "</div>";
                }
            }

            // if $file_upload_error_messages is NOT empty
            else {
                // it means there are some errors, so show them to user
                echo "<div class='alert alert-danger'>";
                echo "<div>{$file_upload_error_messages}</div>";
                echo "<div>Update the record to upload photo.</div>";
                echo "</div>";
            }
        }


    } else {
        echo "hhhhhhhhh";
    }
}






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

        <div class="card">
            <div class="card-header"><strong>ajouter annonce</strong><small> Form</small></div>
            <div class="card-body card-block">
                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="titre" class=" form-control-label">titre</label>
                        <input type="text" name="titre" placeholder="Entrer titre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image" class=" form-control-label">image</label>
                        <input type="file" name="image" placeholder="Enter image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description" class=" form-control-label">description</label>
                        <textarea name="description" placeholder="Enter description" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="etat" class=" form-control-label">etat</label>
                        <input type="text" name="etat" placeholder="Enter etat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="prix" class=" form-control-label">prix</label>
                        <input type="text" name="prix" placeholder="Enter prix" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="telephone" class=" form-control-label">telephone</label>
                        <input type="text" name="telephone" placeholder="Enter telephone" class="form-control">
                    </div>



                    <div class="form-group">
                        <label for="datePublication" class=" form-control-label">datePublication</label>
                        <input type="text" name="datePublication" placeholder="Enter datePublication" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">id utilisateur</label>
                        <select name="iduser" class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">ville</label>
                        <select name="idville" class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">categorie</label>
                        <select name="idcat" class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">type</label>
                        <select name="idtype" class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>

                    <button type="submit" name="btnSubmit" class="btn btn-success">creer annonce</button>
                </form>

            </div>
        </div>

    </div>


</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include_once("../includes/Footer.php") ?>