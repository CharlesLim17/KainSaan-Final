<?php
include"dbconfig.php";
include "database.php";
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
<title>Notifications</title>
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
        <a href="index.php?fix=no"  class="header-title header-subtitle">Back to Home</a>
        <a href="index.php?fix=no" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
 
    </div>
    <div id="footer-bar" class="footer-bar-1  ">
            <a href="index.php?fix=no" ><i class="fa fa-home"></i><span>Home</span></a>
            <a href="food_spot.php?fix=no" ><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#" onclick="nearby()"><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="notif.php" class="active-nav"   ><i class="fa fa-bell"></i><span>notification</span><em class="badge bg-blue2-dark"></em>



            </a>
            <a href="#" data-menu="menu-main" ><i class="fa fa-cog"></i><span>Settings</span></a>
            
    </div>

    <!-- function to redirect to nearby page -->
    <script type="text/javascript">    
        function nearby(){
            window.location="nearby/nearby.php";
        }
    </script>
    
    <div class="page-content" style="min-height:60vh!important">
        <div class="page-title page-title-small">
            <h2><a href="index.php?fix=no" ><i class="fa fa-arrow-left"></i></a>Notifications</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="image1.png"></div>
        </div>
        

    

<?php
 
 
$sql = "UPDATE notif SET seen = '1'  WHERE user_id ='".$_SESSION['id']."'";

if (mysqli_query($conn, $sql)) {
 
} else {
 
}


?>
        
        
 


        <div class="card card-style">
            <div class="content mb-1">
                <h3>Notifications</h3>
                <p>
                    Received Notifications
                </p>


                <div class="list-group list-boxes">
<?php
 
$sql = "SELECT * FROM notif where user_id= '".$_SESSION['id']."' or owner_id='".$_SESSION['id']."' order by id DESC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $body = $row['body'];
    $user_id = $row['user_id'];
    $owner_id =$row['owner_id'];
    $title = $row['title'];
    $user = $row['user_fullname'];
    $owner = $_SESSION['id'];
    

    if($body == 'body1'){

     $alert = '

                    <a href="#" class="border border-yellow2-dark rounded-s shadow-s">
                        <img src="./images/establishment/'.$row['image'].'" width="40" height="40" class="rounded-xl owl-lazy shadow-l ml-2 bg-white">
                  
                        <span>'.$row['title'].'</span>
                        <strong>Your Request is waiting for admin approval</strong>
                        <u class="color-yellow2-light">Pending</u>
                        <i class="fa fa-exclamation-triangle color-yellow2-light"></i>
                    </a> 
                ';
    }

    if($body == 'body2'){

     $alert = '

                    <a href="#" class="border border-green2-dark rounded-s shadow-s">
                        <img src="./images/establishment/'.$row['image'].'" width="40" height="40" class="rounded-xl owl-lazy shadow-l ml-2 bg-white">
                  
                        <span>'.$row['title'].'</span>
                        <strong>Request Approved</strong>
                        <u class="color-green1-light">Approved</u>
                        <i class="fa fa-check-circle color-green1-light"></i>
                    </a> 
                ';
    }


    if($owner_id == $owner){

     $alert = '

                    <a href="#" class="border border-blue2-dark rounded-s shadow-s">
                        <i class="fa fa-walking font-20"></i>
                  
                        <span>'.$row['title'].'</span>
                        <strong>User  '.$user.'  Successfully Visited your '.$title.' establishment</strong>
                        <u class="color-blue1-light">Visit</u>
                        <i class="fa fa-check-circle color-blue1-light"></i>
                    </a> 
                ';
    
    }

        if($body == 'user_visit'){

     $alert = '

                    <a href="#" class="border border-blue2-dark rounded-s shadow-s">
                        <i class="fa fa-walking font-20"></i>
                  
                        <span>'.$row['title'].'</span>
                        <strong>You Successfully Visited '.$title.' establishment</strong>
                        <u class="color-blue1-light">Visit</u>
                        <i class="fa fa-check-circle color-blue1-light"></i>
                    </a> 
                ';
    }

        if($owner_id == $owner){

     $alert = '

                    <a href="#" class="border border-blue2-dark rounded-s shadow-s">
                        <i class="fa fa-walking font-20"></i>
                  
                        <span>'.$row['title'].'</span>
                        <strong>User  '.$user.' Visited your '.$title.' establishment</strong>
                        <u class="color-blue1-light">Visit</u>
                        <i class="fa fa-check-circle color-blue1-light"></i>
                    </a> 
                ';
    
    }


 




echo ' '.$alert.' ';

 
  }
} else {
  echo "0 Notifications";
}
 
?>
       
                         
                </div>


            </div>  
        </div>


    
    </div>    
    <!-- end of page content-->
    
 
 
    
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
