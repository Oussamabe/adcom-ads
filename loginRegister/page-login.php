<?php
    include("./HeaderL.php");

    include("../database/connection.php");

    session_start();
    if(isset($_POST['btnLogin'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $req = "SELECT * FROM utilisateur WHERE email = '$email' and password = '$password' ";
        $sql = $con->prepare($req);
        $sql->execute();

        $row= $sql->fetch(PDO::FETCH_ASSOC);

        if(isset($row['email'])== $email  &&  $row['password'] == $password && $row['type'] == 'admin' && $row['isactif'] == "1" ){

            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type']  = $row['type'];

            header("location:../dashboard.php");

        }else if(isset($row['email'])== $email  &&  $row['password'] == $password &&  $row['type'] == 'user'  && $row['isactif'] == "1"){
                
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type']  = $row['type'];

            header("location:../usersection.php");

        }
        
        
        
        else{
          

            $message = "error or accounnt not active";
        }

    }
?>


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form  action="" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" required class="form-control" placeholder="Email" autocomplete="off">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" required name="password" class="form-control" placeholder="Password"  autocomplete="off">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" name="btnLogin" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <div>
                                    <?php
                                        if (empty($message)) {
                                        } else {
                                            echo '<div class="alert alert-danger">username or password invalid or accoupr not</div>';
                                        }
                                    
                                    ?>
                                </div>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="page-register.html"> Sign Up Here</a></p>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include("./FotterL.php");  ?>
