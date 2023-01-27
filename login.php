<?php
 include "dbconfig.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login  Admin </title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
       <center>   
                <a href="index.html"><img src="logo.png" class="rounded-circle" height="200" alt="Logo"></a>
           </center>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Administration Log in </p>

            <form action="login.php" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control  form-control-xl" name="username" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
        
        </div>
    </div>
    <div class="col-lg-7  d-none d-lg-block">

        <div id="auth-right white">
            <br><br><br><br><br>
<img src="mob.jpg" class="rounded-circle" width="100%"   alt="Logo">
        </div>
    </div>
</div>

    </div>
     <?php
if(isset($_REQUEST['login']))
  {
    
  $username=trim($_REQUEST['username']);
  $password=trim($_REQUEST['password']);
  
  $query="select * from admin where username = '$username' and password='$password'";
  
  $login_data=select($query);
  $n=mysqli_num_rows($login_data);
  if($n==1)
  {
    while($data=mysqli_fetch_array($login_data))
    {
    extract($data);
    
    }
    
    $_SESSION['id']=$id;
    $_SESSION['email']=$email;
    $_SESSION['login']="yes";
    $_SESSION['fullname']=$fullname;
    $_SESSION['unique_id'] = $row['id'];
 
    
     echo'

 <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong>You successfully signed in</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div> 

     <script>
            window.location="index.php"
            </script>';
  }
  else
  {
   echo'incorrect username or password!';
  }
  }
       
        ?>
</body>

</html>
