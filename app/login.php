<?php
 include "dbconfig.php";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>login</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="yellow1">
    <style>img[alt="www.000webhost.com"]{display:none};</style>
    
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status">
        </div>
    </div>

    <div id="page">
        <div class="page-content bg-warning" >
            <br>
             <div class="card card-style bg-light">
                 <form action="login.php" method="post">
                       <br>
                    <center> <img src="image1.png" alt="logo" class="shadow-xl rounded-xl " width="90%" height="90%" > </center>
                    <div class="content mt-2 mb-0">
                        <?php
                            if(isset($_REQUEST['login'])){
                                $username=trim($_REQUEST['username']);
                                $password=trim($_REQUEST['password']);
                                $query="select * from user where username = '$username' and password='$password'";
                                $login_data=select($query);
                                $n=mysqli_num_rows($login_data);
                                
                                if($n==1){

                                    while($data=mysqli_fetch_array($login_data)){
                                        extract($data);
                                    }

                                    $_SESSION['id']=$id;
                                    $_SESSION['email']=$email;
                                    $_SESSION['login']="yes";
                                    $_SESSION['fullname']=$fullname;
                                    $_SESSION['phone'] = $row['phone'];
                                
                                    echo'
                                    <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
                                        <span><i class="fa fa-check"></i></span>
                                        <strong>You successfully signed in</strong>
                                        <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
                                    </div> 

                                    <script>
                                        window.location="index.php?fix=no"
                                    </script>';
                                }
                                else{
                                    echo'
                                        <div class="text-danger">
                                            Invalid email or password!
                                        </div>';
                                }
                            }
                        ?>

                        <?php
                            if(isset($_REQUEST['submit'])){
                                extract($_REQUEST);
                                $n=iud("INSERT INTO `user`( `fullname`,`username`,`email`,`password`, `phone`, `months`, `date`, `years`, `time` ) 
                                VALUES ('$fullname' , '$username', '$email',  '$password', '$phone', '$months', '$date', '$years', '$time' )");
                                if($n==1){
                                    echo'
                                        <br>
                                        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
                                            <span><i class="fa fa-check"></i></span>
                                            <strong>You Successfully Created Account</strong>
                                            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
                                        </div>';
                                }
                            }
                        ?>

                        <div class="content mt-2 mb-0">
                            <div class="input-style has-icon input-style-1 input-required pb-1">
                                <i class="input-icon fa fa-user color-theme"></i>
                                <span>Username</span>
                                <em>(required)</em>
                                <input type="name" name="username" placeholder="Username">
                            </div> 

                            <div class="input-style has-icon input-style-1 input-required pb-1">
                                <i class="input-icon fa fa-lock color-theme"></i>
                                <span>Password</span>
                                <em>(required)</em>
                                <input type="password" name="password" placeholder="Password">
                            </div> 

                            <a href="#" onclick="login()" id="b" class="btn btn-m mt-2 mb-4 btn-full bg-green1-dark rounded-sm text-uppercase font-900">Login</a>

                            <div class="divider"></div>
    
                            <button style="display:none;" type="submit" name="login" id="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green1-dark text-uppercase font-900">aaa</button> <br>            
    
                            <script>
                            function login() {
                            $("#submit").click();
                            
                            }
                            </script>
    
                    </form>

                    <div class="d-flex">
                        <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-left"><a href="register.php" class="color-theme">Create Account</a></div>
                        <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-right"><a href="#" class="color-theme">Forgot Credentials</a></div>
                    </div>

                </div>
            </div>
        </div>     
    </div>    

    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    
</body>
