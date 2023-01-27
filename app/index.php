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
<title>KainSaan</title>
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
    
   
    <div id="footer-bar" class="footer-bar-1  ">
            <a href="index.php?fix=no" class="active-nav"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="food_spot.php?fix=no"><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#" onclick="nearby()" ><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="notif.php"  ><i class="fa fa-bell"></i><span>notification</span><div id="noti_number"></div></a>
            <a href="#" data-menu="menu-main"> <i class="fa fa-cog"></i><span>Settings</span></a>
            
    </div>


<script type="text/javascript">
    
    function nearby(){
         window.location="nearby/nearby.php";
    }

</script>


<?php 
include "database.php";
$fix = $_GET['fix'];

if($fix == 'no'){

echo '
    <script>
        window.location="index.php?fix=Yes"
    </script>';

}


?>



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
        
        <div class="page-title page-title-large">
            <?php
              $query="SELECT * FROM user where id='".$_SESSION['id']."'   ";
            $result=select($query);
          while($r=mysqli_fetch_array($result))
          {
            extract($r);
          ?>
         <h2 data-username="<?=$r[1]?>" class="greeting-text"></h2>
       <?php
          }
          ?>
        
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="140">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
           
        </div>
        
        <div class="content">
            <div class="search-box bg-theme rounded-m shadow-xl bottom-0">
                <i class="fa fa-search"></i>
                <input type="text" class="border-0" placeholder="Looking for a place ?" data-search>
            </div>   
            <div class="search-results disabled-search-list card card-style mx-0 mt-3 px-2">
                <div class="list-group list-custom-large">

 <!-- START Search bar, lalabas yung kainan kung ano yung sinearch mo-->
<?php
include "database.php";
$sql = "SELECT * FROM establishment where status = '1'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $hints = $row['name'];
    $hints2 = strtolower($hints);

   echo '
   
                    <a href="review.php?name='.$row['name'].'&clean=no" data-filter-item data-filter-name="'.$hints2.'">
                        <img src="images/establishment/'.$row["image"].'" class="rounded-m  " alt="logo" width="10%" height="10%" >
                        <span>&nbsp;'.$row["name"].'</span>
                        <strong> &nbsp;'.$row["address"].'</strong>

                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                ';
  }
} else {
  echo "0 results";
}
 
?>
<!-- END Search bar, lalabas yung kainan kung ano yung sinearch mo-->


 <!-- START Search bar, lalabas yung kainan kung ano yung sinearch mo-->
<?php
include "database.php";
$sql = "SELECT * FROM food ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $hintsf = $row['food_name'];
    $hints3 = strtolower($hintsf);

   echo '
   
                    <a href="review.php?name='.$row['estab_name'].'&clean=no" data-filter-item data-filter-name="'.$hints3.'">
                        <img src="images/establishment/'.$row["image"].'" class="rounded-m  " alt="logo" width="10%" height="10%" >
                        
                        <span>&nbsp; '.$row["estab_name"].' -  '.$row["food_name"].' </span>
                        <strong> ₱ &nbsp;'.$row["price"].'  '.$row["estab_name"].' </strong>

                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                ';
  }
} else {
  echo "0 results";
}
 
?>
<!-- END Search bar, lalabas yung kainan kung ano yung sinearch mo-->



                     
                </div>
            </div>
        </div>  
        
                
        <div class="single-slider owl-no-dots owl-carousel mt-n4">
            
<!--home slider start-->
<?php
include "database.php";
$sql = "SELECT * FROM establishment where status = '1' order by visit DESC limit 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

      
$star = $row['ratings'];

 
 if($star == 'NaN'){

  $rate =' <h5 class="color-yellow1-dark mb-0"> No Ratings </h5>' ;


 }

  if($star == 1){


     $rate ='  <i class="fa fa-star color-yellow1-dark"></i>' ;


 }
 
 
 

  if($star == 2){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
     <i class="fa fa-star color-yellow1-dark"></i>' ;


 }



  if($star == 3){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>' ;


 }


   if($star == 4){


     $rate ='  <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                
                
                ' ;


 }


    if($star == 5){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
              <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>
             <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>' ;


 }


 
   echo '
         <div class="content">

                <div class="card rounded-l shadow-xl   mb-3" data-card-height="320">
                <img src="images/establishment/'.$row["image"].'" class="rounded-m shadow-xl" alt="logo">
                    <div class="card-top mt-3 mr-3">
                        <a href="#" class="icon icon-s rounded-l shadow-xl bg-red2-dark color-white float-right ml-2 mr-2"><i class="fa fa-heart"></i></a>
                       
                    </div>
                    <div class="card-bottom mb-3">
                        <div class="content mb-0">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-n1 font-600 color-highlight">'.$row["type"].'</p>

                                    <h1 class="font-700 mb-0">'.$row["name"].'</h1>
                                   <h4 class="bg-highlight color-white rounded-sm shadow-l font-12 font-600 p-1 px-2 mt-0 mb-3">Most Visited</h4>
                                </div>
                                <div class="ml-auto">
                                    <h1>₱ '.$row["average_price"].' </h1>
                                    <span class="badge   color-white   text-uppercase d-block">  <div class="flex-grow-1">
                       
                     
                   '.$rate.'  
                       
                    </div></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-overlay bg-gradient-fade rounded-l"></div>
                    <div class="card-overlay"></div>
                </div>
            </div>
                ';
  }
} else {
  echo "0 results";
}
 
?>



      
         
          <!--home slider start end-->
        </div>
                
        <div class="content mb-3">
            <h5 class="float-left font-16 font-500">Trending Now!</h5>
                <a class="float-right font-12 color-highlight mt-n1" href="food_spot.php?fix=no">View All</a>
            <div class="clearfix"></div>
        </div>
        
        <div class="double-slider owl-carousel owl-no-dots">

<!--Trening now ! start-->
<?php
include "database.php";
$sql = "SELECT * FROM establishment where status = '1' and ratings NOT LIKE 'NaN' order by ratings DESC limit 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


$star = $row['ratings'];

 
 if($star == 'NaN'){

  $rate ='No Ratings' ;


 }

  if($star == 1){


     $rate ='  <i class="fa fa-star color-yellow1-dark"></i>' ;


 }
 
 
 

  if($star == 2){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
     <i class="fa fa-star color-yellow1-dark"></i>' ;


 }



  if($star == 3){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>' ;


 }


   if($star == 4){


     $rate ='  <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                
                
                ' ;


 }


    if($star == 5){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
              <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>
             <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>' ;


 }




 echo '
     <div class="item bg-theme pb-3 rounded-m shadow-l">
                <div data-card-height="200" class="card mb-3 ">
                <img src="images/establishment/'.$row["image"].'" class="rounded-m  " height="100%" width="100%"   alt="logo">
                    <div class="card-bottom">

                      
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
                <div class="d-flex px-3">
                    <div>
                     <h5 class="color-highlight text-center mb-0">'.$row["name"].'</h5>
                    
                        <h3 class="mb-0">₱ '.$row["average_price"].'</h3>
                    
                        <p class="mb-0 color-yellow1-dark">
                           '.$rate.'
                        </p>
                        
                     
                    </div>
                </div>
            </div>


 ';
  }
} else {
  echo "0 results";
}
 
?>

       
         <!--Trening now ! end-->
       
           
        </div>

        <div class="divider divider-margins mt-4"></div>
        
        <div class="card preload-img" data-src="images/pictures/20s.jpg">
            <div class="card-body">
                <h4 class="color-white font-600">Why our app?</h4>
                <p class="color-white opacity-80">
                    Our app guarantees the delicious food in all it's customers
                </p>
                <div class="card card-style ml-0 mr-0 bg-white">
                    <div class="row mt-3 pt-1 mb-3">
                        <div class="col-6">
                            <i class="float-left ml-3 mr-3" 
                               data-feather="globe" 
                               data-feather-line="1" 
                               data-feather-size="35" 
                               data-feather-color="blue2-dark" 
                               data-feather-bg="blue2-fade-light">
                            </i>
                            <h5 class="color-black float-left font-13 font-500 line-height-s pb-3 mb-3">Locate GPS<br>find nearby</h5>
                        </div>
                        <div class="col-6 pl-0">
                            <i class="float-left ml-3 mr-3" 
                               data-feather="smartphone" 
                               data-feather-line="1" 
                               data-feather-size="35" 
                               data-feather-color="dark2-dark" 
                               data-feather-bg="dark2-fade-light">
                            </i>
                            <h5 class="color-black float-left font-13 font-500 line-height-s pb-3 mb-3">24/7<br>Support</h5>
                        </div>
                        <div class="col-6">
                            <i class="float-left ml-3 mr-3" 
                               data-feather="star" 
                               data-feather-line="1" 
                               data-feather-size="35" 
                               data-feather-color="yellow1-dark" 
                               data-feather-bg="yellow1-fade-light">
                            </i>
                            <h5 class="color-black float-left font-13 font-500 line-height-s">5.0<br>Rating</h5>
                        </div>
                        <div class="col-6 pl-0">
                            <i class="float-left ml-3 mr-3" 
                               data-feather="truck" 
                               data-feather-line="1" 
                               data-feather-size="33" 
                               data-feather-color="green1-dark" 
                               data-feather-bg="green1-fade-light">
                            </i>
                            <h5 class="color-black float-left font-13 font-500 line-height-s">Free<br>Delivery (Soon)</h5>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
        </div>
        
        
        <div class="divider divider-margins mt-4"></div>
        
        <div class="content mb-3">
            <h5 class="float-left font-16 font-500">Based on Your Favorites</h5>
                <a class="float-right font-12 color-highlight mt-n1" href="#">View All</a>
            <div class="clearfix"></div>
        </div>
        
        <div class="double-slider owl-carousel owl-no-dots">
         
            <!-- Based on Your Favorites start-->
        <?php
include "database.php";

$sql = "SELECT * FROM establishment where status = '1' order by id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

      $star = $row['ratings'];

 
 if($star == 'NaN'){

  $rate ='No Ratings' ;


 }

  if($star == 1){


     $rate ='  <i class="fa fa-star color-yellow1-dark"></i>' ;


 }
 
 
 

  if($star == 2){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
     <i class="fa fa-star color-yellow1-dark"></i>' ;


 }



  if($star == 3){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>' ;


 }


   if($star == 4){


     $rate ='  <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>
                
                
                ' ;


 }


    if($star == 5){


     $rate ='   <i class="fa fa-star color-yellow1-dark"></i>
              <i class="fa fa-star color-yellow1-dark"></i>
                 <i class="fa fa-star color-yellow1-dark"></i>
             <i class="fa fa-star color-yellow1-dark"></i>
                <i class="fa fa-star color-yellow1-dark"></i>' ;


 }



    echo '

 <div class="item bg-theme pb-3 rounded-m shadow-l">
                <div data-card-height="200" class="card mb-3 ">
                <img src="images/establishment/'.$row["image"].'" class="rounded-m  "   alt="logo">
                    <div class="card-bottom">

                        <h5 class="color-white text-center pr-2 pb-2">'.$row["food"].'</h5>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
                <div class="d-flex px-3">
                    <div>
                     <h5 class="color-highlight text-center mb-0">'.$row["name"].'</h5>
                  
                        <h3 class="mb-n1">₱ '.$row["average_price"].'</h3>
                    
                        <p class="mb-0 color-yellow1-dark">
                         '.$rate.'
                        </p>
                           
                    </div>
                </div>
            </div>


    ';
  }
} else {
  echo "0 results";
}
 
?>
           

 <!-- Based on Your Favorites end-->
        </div>

        
        <div class="divider divider-margins mt-4"></div>

        
        <div class="card mt-4 preload-img" data-src="images/pictures/20s.jpg">
            <div class="card-body">
                <h3 class="color-white font-600">Best Priced Pack</h3>
                <p class="color-white opacity-80">
                    The best value food pack you can purchase for your needs created especially to suit you.
                </p>

                <div class="card rounded-m shadow-xl mb-0">
                    <div class="content">
                       

                       <?php
include "database.php";
$sql = "SELECT * FROM food  where status = '1' order by price ASC limit 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '


           <div class="d-flex pb-3">
                            <div class="pr-3">
                                <h5 class="font-14 font-600 opacity-80 pb-2">'.$row["food"].'</h5>
                                <h1 class="font-24 font-700 ">₱ '.$row["price"].'<sup class="font-15 opacity-50">.99</sup></h1>
                            </div>
                            <div class="ml-auto">
                                <img src="images/establishment/'.$row["food_image"].'" class="rounded-m shadow-xl" width="90">
                            </div>
                        </div>

                        <div class="divider mb-4"></div>


    ';
  }
} else {
  echo "0 results";
}
$conn->close();
?>

                 

                        
 
                        
                    </div>
                </div>  
            </div>
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
        </div>
        
        <div class="divider divider-margins"></div>
        
        <div class="content mb-3">
            <h5 class="float-left font-16 font-500">Browse Our Categories</h5>
                <a class="float-right font-12 color-highlight mt-n1" href="food_spot.php">View All</a>
            <div class="clearfix"></div>
        </div>
        
        <a href="food_spot_advance.php?category=Fast Food&fix=no" data-card-height="80" class="card card-style mb-3">
            <div class="card-center">
                <h5 class="pl-3">Fast Food</h5>
                <p class="pl-3 mt-n2 font-12 color-highlight mb-0">Food that can be prepared and served quickly</p>
            </div>
            <div class="card-center opacity-30">
                <i class="fa fa-arrow-right opacity-50 float-right color-theme pr-3"></i>
            </div>
        </a>
        <a href="food_spot_advance.php?category=Cafe&fix=no" data-card-height="80" class="card card-style mb-3">
            <div class="card-center">
                <h5 class="pl-3">Cafe</h5>
                <p class="pl-3 mt-n2 font-12 color-highlight mb-0"> a restaurant that does not offer table service</p>
            </div>
            <div class="card-center opacity-30">
                <i class="fa fa-arrow-right opacity-50 float-right color-theme pr-3"></i>
            </div>
        </a>
        <a href="food_spot_advance.php?category=Fast Park&fix=no" data-card-height="80" class="card card-style mb-4">
            <div class="card-center">
                <h5 class="pl-3">Food Park</h5>
                <p class="pl-3 mt-n2 font-12 color-highlight mb-0">food parks feature a collection of food kiosks within an outdoor compound.</p>
            </div>
            <div class="card-center opacity-30">
                <i class="fa fa-arrow-right opacity-50 float-right color-theme pr-3"></i>
            </div>
        </a>
        
             <a href="food_spot_advance.php?category=Family Style Restaurant&fix=no" data-card-height="80" class="card card-style mb-4">
            <div class="card-center">
                <h5 class="pl-3">Family Style Restaurant</h5>
                <p class="pl-3 mt-n2 font-12 color-highlight mb-0">Family Style Restaurant.</p>
            </div>
            <div class="card-center opacity-30">
                <i class="fa fa-arrow-right opacity-50 float-right color-theme pr-3"></i>
            </div>
        </a>


        <div class="divider divider-margins"></div>
               
        <!-- footer and footer card-->
 
    </div>    
    <!-- end of page content-->
    

    
     
    
  
    
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
