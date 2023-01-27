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
<title>Favorite List</title>
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
        <?php 
include "database.php";
$fix = $_GET['fix'];

if($fix == 'no'){

echo '
     <script>
            window.location="fav.php?fix=Yes"
            </script>';

}


?>
     <!-- header and footer bar go here-->
    <div class="header header-fixed header-auto-show header-logo-app">
        <a href="index.php?fix=no"   class="header-title header-subtitle">Back to Home</a>
        <a href="index.php?fix=no"  class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
 
    </div>
    <div id="footer-bar" class="footer-bar-1  ">
            <a href="index.php?fix=no" ><i class="fa fa-home"></i><span>Home</span></a>
            <a href="food_spot.php?fix=no" class="active-nav"><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#" ><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="notif.php"  ><i class="fa fa-bell"></i><span>notification</span> <div id="noti_number"></div></a>
            <a href="#" data-menu="menu-main"><i class="fa fa-cog"></i><span>Settings</span></a>
            
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
        <div class="page-title page-title-small">
            <h2><a href="index.php?fix=no"  ><i class="fa fa-arrow-left"></i></a>Favorite Lists</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="350">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/user.png"></div>
        </div>
        
<div class="card card-style">
            <div class="content mb-0">
                <h3 class="font-600">My Favorite list</h3>
                <p class="mb-0">
                      A favorite lists   of Establishment or food products  saved by a user   – typically to save a product for a later purchase or as a Place wish to go.
                </p>
                <br>
                <div class="list-group list-custom-large">
 

   
<?php
include "database.php";

$sql = "SELECT DISTINCT image,address,ratings,estab_name,estab_id,user_id FROM my_favorites where user_id ='".$_SESSION['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $star ='';

    $user_ratings = $row["ratings"];

    if($user_ratings == '5'){

        $star ='     
           
            <i class="font-15 fa fa-star color-yellow2-light  mr-0"></i>
            <i class="font-15 fa fa-star color-yellow2-light  mr-2"></i>
            <i class="font-15 fa fa-star color-yellow2-light  mr-2"></i>
            <i class="font-15 fa fa-star color-yellow2-light  mr-2"></i>
            <i class="font-15 fa fa-star color-yellow2-light  mr-2"></i>
             
  ';
    }


if($user_ratings == '4'){

        $star ='  
                          <h6 class="">
            <i class="font-10 fa fa-star color-yellow2-light  mr-0"></i>
            <i class="font-10 fa fa-star color-yellow2-light  mr-2"></i>
            <i class="font-10 fa fa-star color-yellow2-light  mr-2"></i>
            <i class="font-10 fa fa-star color-yellow2-light  mr-2"></i>
           
            </h6>
            ';
    }


    if($user_ratings == '3'){

        $star ='  
                         
                       <h6 class="">
            <i class="font-10 fa fa-star color-yellow2-light  mr-0"></i>
            <i class="font-10 fa fa-star color-yellow2-light  mr-2"></i>
            <i class="font-10 fa fa-star color-yellow2-light  mr-2"></i>
          
            </h6>

            ';
    }

if($user_ratings == '2'){

        $star ='  
                         
                        <h6 class="">
            <i class="font-10 fa fa-star color-yellow2-light  mr-0"></i>
            <i class="font-10 fa fa-star color-yellow2-light  mr-2"></i>
       
            </h6>

            ';
    }


    if($user_ratings == '1'){

        $star ='  
                         
                        <h6 class="">
            <i class="font-10 fa fa-star color-yellow2-light  mr-0"></i>
          
            </h6>

                        ';
    }


    echo '


     <a href="review.php?name='.$row['estab_name'].'&clean=no">
     <img src="./images/establishment/'.$row['image'].'" width="55" height="55" class="rounded-xl owl-lazy shadow-l bg-white">

                        <span> &nbsp; '.$row['estab_name'].'</span>
                        <strong>&nbsp; '.$row['address'].'</strong> 
                        <span class="badge mt-0 mr-n1  ">'.$star.'</span>
                         
                     
                    </a>
               



    ';
  }
} else {
  echo "You dont have any Favorites.";
}
$conn->close();
?>               
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
         data-menu-active="nav-features"
         data-menu-effect="menu-over">  
    </div>
    
   
 

    
 
          
 
    
    
</div>    


<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
