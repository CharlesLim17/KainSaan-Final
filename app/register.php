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
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="yellow1">
    <style>img[alt="www.000webhost.com"]{display:none};</style>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
 
 
    
    <div class="page-content bg-warning">
        <br> 
         
       
           <form action="login.php" method="post">
        <div class="card card-style bg-light">
   
 


            <div class="content mb-0 mt-1">
                <br>
                 <center> <img src="image1.png" alt="logo" class="shadow-xl rounded-xl" width="95%" height="95%" > </center>
                <br>
                 <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-user color-theme"></i>
                    <span>Fullname</span>
                    <em>(required)</em>
                    <input type="name" name="fullname" placeholder="Fullname">
                </div> 


                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-user color-theme"></i>
                    <span>Username</span>
                    <em>(required)</em>
                    <input type="name" name="username" placeholder="Username">
                </div> 
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-at color-theme"></i>
                    <span>Email</span>
                    <em>(required)</em>
                    <input type="email" name="email" placeholder="Email">
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-phone color-theme"></i>
                    <span>Contact #.</span>
                    <em>(required)</em>
                    <input type="text" name="phone" placeholder="Contact #.">
                </div> 


                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-lock color-theme"></i>
                    <span>Password</span>
                    <em>(required)</em>
                    <input type="password" name="password" placeholder="Choose a Password">
                </div> 
                <div class="input-style has-icon input-style-1 input-required mb-4">
                    <i class="input-icon fa fa-lock color-theme"></i>
                    <span>Password</span>
                    <em>(required)</em>
                    <input type="password" placeholder="Confirm your Password">
                </div> 

                <a href="#" onclick="register()" class="btn btn-m btn-full rounded-sm shadow-l bg-green1-dark text-uppercase font-900">Create account</a>
<button style="display:none;" type="submit" name="submit" id="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green1-dark text-uppercase font-900">aaa</button>
                <div class="divider"></div>

                <p class="text-center">
                    <a href="login.php" class="color-highlight opacity-80 font-12">Already Registered? Sign in Here</a>
                </p>

               <script>
function register() {
$("#submit").click();
 
}
</script>
  <input type="hidden" name="years" id="years"  placeholder="years">

<input type="hidden" name="months" id="months"  placeholder="months">
<input type="hidden" name="time" id="time"  placeholder="time">
<input type="hidden" name="date" id="date"  placeholder="date">
</form>

            </div>
        </div>

       
 
    </div>    
    <!-- end of page content-->
    
 
    
    <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
         data-menu-load="menu-main.html"
         data-menu-active="nav-pages"
         data-menu-effect="menu-over">  
    </div>
    
    
</div>    
<script src="jquery.min.js"></script>
<script type="text/javascript">


 

  $(document).ready(function(){
var today = new Date();
var time =  $("#time").val(today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds());
var time =  $("#date").val(today.getDate() );

    var currentDate = new Date();
    $("#years").val(currentDate.getFullYear());

 
    var currentMonth;
    switch(currentDate.getMonth()){

          case 0: currentMonth = "Jan";
          break;

          case 1: currentMonth = "Feb";
          break;

          case 2: currentMonth = "Mar";
          break;

          case 3: currentMonth = "Apr";
          break;

          case 4: currentMonth = "May";
          break;

          case 5: currentMonth = "Jun";
          break;

          case 6: currentMonth = "July";
          break;

          case 7: currentMonth = "Aug";
          break;

          case 8: currentMonth = "Sep";
          break;

          case 9: currentMonth = "Oct";
          break;

          case 10: currentMonth = "Nov";
          break;

          case 11: currentMonth = "Dec";
          break;

    }



$("#months").val(currentMonth);

  });



</script>

<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
