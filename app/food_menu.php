<?php
include"dbconfig.php";
   if($_SESSION['login']=="yes")                          
{
 
}
else
{

 echo '
     <script>
            window.location="login.php"
            </script>';
}      
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Food Menu</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="yellow2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
     <!-- header and footer bar go here-->
    <div class="header header-fixed header-auto-show header-logo-app">
        <a href="#" data-back-button class="header-title header-subtitle">Back to Home</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
 
    </div>
    <div id="footer-bar" class="footer-bar-1  ">
            <a href="index.php" ><i class="fa fa-home"></i><span>Home</span></a>
            <a href="food_spot.php" class="active-nav"><i class="fa fa-map-marker-alt"></i><span>Food Menu</span></a>
            <a href="#" ><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="#"  ><i class="fa fa-bell"></i><span>notification</span><div id="noti_number"></div></a>
            <a href="#"><i class="fa fa-cog"></i><span>Settings</span></a>
            
    </div>
        <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "notif_ajax.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>
    <div class="page-content">
        
        <div class="page-title page-title-small ">
            <h2><a href="index.php"  ><i class="fa fa-arrow-left"></i></a>Food menu</h2>
          <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
        </div>
 
        <div class="card header-card shape-rounded bg-17" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay light-mode-tint"></div>
           
        </div>
      
<br>
                <div class="card card-style ">
            <div class="content">
            <center>    
                <h1 class="font-30 font-700 color-highlight ">Mang Kainan sa kanto</h1>

              
                            <p class="mb-2">  
                            <i class="fa fa-star color-yellow1-dark"></i>
                            <i class="fa fa-star color-yellow1-dark"></i>
                            <i class="fa fa-star color-yellow1-dark"></i>
                            <i class="fa fa-star color-yellow1-dark"></i>
                            <i class="fa fa-star color-yellow1-dark"></i>
                            </p> 
        
                       <p class="text-uppercase font-15 color-highlight   font-800">We are always happy to serve you.</p>
                <div class="row mb-0">
                    <div class="col-6 text-left"><h6 class="font-600">Total</h6></div>
                    <div class="col-6 text-right"><h6 class="font-600">$1998<sup>.98</sup></h6></div>
                    <div class="col-6 text-left"><h6 class="font-600">Taxes</h6></div>
                    <div class="col-6 text-right"><h6 class="font-600">$136<sup>.98</sup></h6></div>
                    <div class="col-6 text-left"><h6 class="font-600">Shipping</h6></div>
                    <div class="col-6 text-right"><h6 class="font-600 color-green1-dark">$0<sup>.00</sup></h6></div>
                    <div class="col-12"><div class="divider mt-3"></div></div>
                    <div class="col-6 text-left"><h4>Ratings </h4></div>
                    <div class="col-6 text-right"><h4>$2133<sup>.98</sup></h4></div>
                </div>
                </center>
                <div class="divider mt-4"></div>
                
             
                <div class="d-flex pb-2">
                    <div class="mr-auto">
                        <img src="images/pictures/2s.jpg" class="rounded-m shadow-xl" width="110">
                      
                    </div>
                    <div class="ml-auto w-100 pl-3">
                        <h5 class="font-14 font-600 opacity-80 pb-2">Your awesome product description long or short. </h5>

                        <div class="clearfix"></div>
                        <h1 class="font-23 font-700 float-left pt-2 ">$199<sup class="font-15 opacity-50">.99</sup></h1>
                         

                        <div class="float-right">
                            
                    </div>
                </div>
                                    
            
          
      
             
            </div>
        </div>
             </div>           
 
    </div>    
    <!-- end of page content-->
    
    
    
    <div id="menu-share" 
         class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-load="menu-share.html"
         data-menu-height="420" 
         data-menu-effect="menu-over">
    </div>    
    
 
    
    <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
         data-menu-load="menu-main.php"
         data-menu-active="nav-pages"
         data-menu-effect="menu-over">  
    </div>
    

    
</div>    


<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
