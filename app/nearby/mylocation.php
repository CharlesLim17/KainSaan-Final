 <?php 
include "database.php";
include "dbconfig.php";
 ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Nearby | Kain Saan</title>
<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../fonts/css/fontawesome-all.min.css">    
 

 <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />



    <script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATtRSRV4bWCpLdXQxjkvgALpewmlp2Kjo&callback=initMap&libraries=places"> </script>
</head>
    
<body class="theme-light" data-highlight="blue2" >
   
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
 
    <div id="footer-bar" class="footer-bar-1  ">
            <a href="#" onclick="index()" ><i class="fa fa-home"></i><span>Home</span></a>
            <a href="#" onclick="food_spot()"><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#"   onclick="nearby()" class="active-nav" ><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="#" onclick="notif()" ><i class="fa fa-bell"></i><span>notification</span><div id="noti_number"></div></a>
            <a href="#" data-menu="menu-main"> <i class="fa fa-cog"></i><span>Settings</span></a>
            
    </div>
    
    <div class="page-content">

<script type="text/javascript">

    function nearby() {
     window.location="nearby.php";
    }

    function food_spot() {
     window.location="../food_spot.php?fix=Yes";
    }

    function notif() {
     window.location="../notif.php";
    }

    function index() {
     window.location="../index.php?fix";
    }


 </script>


  <style>
#map {
  height: 100%;
  width: 100%;
}
</style>

 
        <div id="map" class="card header-card shape-rounded" data-card-height="100%"> 
    <div id="map"></div>
  
     </div>
 
    <style>.map {overflow:hidden;background:none!important;height:100%;width:100%;}</style>  
<button data-menu="direction" style="font-size: 20;" href="#" class="btn btn-3d btn-s ml-3 f mt-2 rounded-0 text-uppercase font-900 shadow-s border-blue1-dark bg-blue1-light"><i class="fa fa-directions font-20 "></i></button>

<button data-menu="distance" style="font-size: 20;" href="#" class="btn btn-3d btn-s ml-3 f mt-2 rounded-0 text-uppercase font-900 shadow-s border-blue1-dark bg-blue1-light"><i class="fa fa-road font-20 "></i></button>
 

<div> 
     
<form style="display: none;"   action="route.php" method="get">
 Latitude <input type="text" id="la" name="latitude" value="<?php echo $_GET['latitude']; ?>"> Longitude<input type="text" id="lo" name="longtitude" value="<?php echo $_GET['longtitude']; ?>"><br>
 








 establishment location<br>
Latitude <input type="text" id="la2" name="latitude" value="14.603029608781219"> Longitude<input type="text" id="lo2" name="longitude" value="121.01492501757299">

</form><br>
 
<!-- map api and key -->
 <button style="display: none;" id="get_location" onclick="getLocation()">Try It</button>
 


<?php
 
$sql = "SELECT * FROM establishment where status = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     
     echo '
<div style="display: none;" >
 establishment '.$row['id'].' location<br>
Latitude <input type="text" id="lat'.$row['id'].'" name="latitude" value="'.$row['lat'].'"> 
Longitude<input type="text" id="lng'.$row['id'].'" name="longitude" value="'.$row['lng'].'">
<br>
</div>
     ';

  }
} else {
  echo "0 results";
}
 
?>
 
 
    </div>

 
        <!-- footer and footer card-->
    
    </div>    
    <!-- end of page content-->

     <!---------------->
    <!---------------->
    <!--filter distance-->
    <!---------------->
    <!---------------->
    <div id="distance" class="menu menu-box-modal rounded-m" 
         data-menu-height="250" 
         data-menu-width="310">
        <div class="mr-3 ml-3 mt-3">
              <div id="toast-1" class="toast toast-tiny toast-top bg-blue2-dark" data-delay="30000000" data-autohide="true"><i class="fa fa-sync fa-spin mr-3"></i>Processing...</div>
            <h1 class="font-700 mb-0">Filter Distance</h1>
            <p class="font-11  mt-n1 mb-2">
                Please Select Distance filter below.
            </p>
             <form  method="get" action="calculate.php">
          <input  style="display:none;" type="text" id="my1"  name="lat"  value="<?php echo $_GET['latitude']; ?>" > <input style="display:none;"  type="text"  id="my2"  name="lng" value="<?php echo $_GET['longtitude']; ?>" ><br>
        
 


            <div class="input-style input-style-2 input-required">
                    <span>Distance</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" required name="distance">
                         
                       <option value="5">1-5 km</option>
                        <option value="10">1-10 km</option>
                        <option value="15">1-15 km</option>
                        <option value="20">1-20 km</option>
                        <option value="20">1-25 km</option>
                        <option value="30">1-30 km</option>
                        <option value="30">1-35 km</option>
                        <option value="30">1-40 km</option>
                        <option value="30">1-45 km</option>
                        <option value="30">1-50 km</option>
                     
                    </select>
                </div>
        
            <button type="submit" name="filter" onclick="process1()" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-green1-dark mt-4">Save</button>
                </form>
        </div>
    </div>     
 

 
 
 

  <a href="#" style="display: none;" id="proccessing" data-toast="toast-1">
                        <i class="fa fa-angle-down color-red2-dark"></i>
                        <span>Toast Top Animated</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
 
<script type="text/javascript">
    function process1() {

document.getElementById('proccessing').click();


    }

</script>
    
 
 
 <a href="#" id="confirm" data-menu="menu-confirm">
                        <i class="fa fa-info color-blue2-dark"></i>
                        <span>Confirmation</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
 
    <!---------------->
    <!---------------->
    <!--Menu Confirm-->
    <!---------------->
    <!---------------->
    <div style="display: none;"  id="menu-confirm" class="menu menu-box-bottom menu-box-detached rounded-m"
         data-menu-height="150" 
         data-menu-effect="menu-over">
        <h2 class="text-center font-700 mt-3 pt-1"> </h2>
        <h5 class="boxed-text-xl font-600 mb-4">

           <i class='fa fa-map-marker-alt color-blue2-light'></i> Use Current location ?
        </h5>
        <div class="row mr-3 ml-3 ">
            <div class="col-6">
                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Allow</a>
                <a style="display: none;" href="#" id="fix" class="close-menu  "></a>
            </div>
            <div class="col-6">
                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">Block</a>
            </div>
        </div>
    </div>  
 
         <script type="text/javascript">
      window.onload = function(){
   document.getElementById('confirm').click();
     document.getElementById('fix').click();
   document.getElementById('get_location').click();
 
}
  </script>
   

       <div id="direction" class="menu menu-box-modal rounded-m" 
         data-menu-height="220" 
          data-menu-width="80%"
         data-menu-effect="menu-over">
        <div class="content mb-0">
            <h1 class="font-700 mb-0">Get Directions</h1>
            <p class="font-11  mt-n1 mb-2">
              Please Select Establishment to get directions
            </p>
 <form method="get" action="index.php">
   
            <div class="input-style input-style-1 input-required">
                    <span>Establishment</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" name="direction"  >
                         <?php
 
$sql = "SELECT * FROM establishment where status = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo '

  <option value="'.$row['lat'].', '.$row['lng'].'">'.$row['name'].'</option>

   ';
  }
} else {
  echo "0 results";
}
 
?>
                      
                         
                    </select>
                </div>
 

            

                <div class="input-style input-style-2 input-required">
            
               <button   type="submit"  name="submit" id="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green1-dark text-uppercase font-900">Get Directions</button>  
          <input style="display:none;" type="text" id="mylocation1"  name="lat" value="<?php echo $_GET['latitude']; ?>"> <input style="display:none;" type="text"  id="mylocation2"  name="lng" value="<?php echo $_GET['longtitude']; ?>"><br>
            </form>
        </div>
         </div>
    
 
    
 
   

    
</div>    
 

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported .";
  }
}

function showPosition(position) {
document.getElementById("lat").value = position.coords.latitude;
document.getElementById("lng").value = position.coords.longitude;

 


  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>




<script type="text/javascript">
/**
 *Receiving the value of text box and type done conversion by Number() 
 */

var latitude = Number(document.getElementById("la").value);
var longitude = Number(document.getElementById("lo").value);

var latitude2 = Number(document.getElementById("la2").value);
var longitude2 = Number(document.getElementById("lo2").value);

                         <?php
 
$sql = "SELECT * FROM establishment where status = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo '

var latitude'.$row['id'].' = Number(document.getElementById("lat'.$row['id'].'").value);
var longitude'.$row['id'].' = Number(document.getElementById("lng'.$row['id'].'").value);

   ';
  }
} else {
   
}
 
?>

function initMap() {
  /**
   *Passing the value of variable received from text box
   **/


  var surigao = {
    lat: latitude,
    lng: longitude

  }



 <?php
 
$sql = "SELECT * FROM establishment where status = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo '


var surigao'.$row['id'].' = {
    lat: latitude'.$row['id'].',
    lng: longitude'.$row['id'].'

  }

 

   ';
  }
} else {
   
}
 
?>





   var surigao2 = {
    lat: latitude2,
    lng: longitude2
  };
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: surigao,
     
   mapTypeControl: false,
   streetViewControl: false,
   fullscreenControl: false,
   zoomControl: false,
 
    styles: [
      {
        "featureType": "poi",
        "stylers": [
          { "visibility": "off" }
        ]
      },
       {
      "featureType": "transit",
      "stylers":  [
          { "visibility": "off" }
        ]
      
    }
    ]
 


  });
 


var  marker = new google.maps.Marker({
     
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: surigao,
    icon: {
    labelOrigin: new google.maps.Point(15, 43),
    url: 'blue-dot.png'
            },

             label: { 
        text: "You",
      
        fontWeight: "bold"

            }


  });

 
 



 <?php
 
$sql = "SELECT * FROM establishment where status = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo '


var marker'.$row['id'].' = new google.maps.Marker({
  
      icon: {
    labelOrigin: new google.maps.Point(9, 45),
    url: "yellow-dot.png",
     
     
  },

    map: map,
    draggable: false,
    animation: google.maps.Animation.DROP,
    position: surigao'.$row['id'].',
      label: { 
        text: "'.$row['name'].'",
      
        fontWeight: "bold"

            }
});
 

   ';
  }
} else {
   
}
 
?>




  google.maps.event.addListener(marker, 'dragend',function(marker) {
 document.getElementById("la").value = this.getPosition().lat();
    document.getElementById("lo").value = this.getPosition().lng();
    });


  google.maps.event.addListener(marker, 'dragend',function(marker) {
 document.getElementById("mylocation1").value = this.getPosition().lat();
    document.getElementById("mylocation2").value = this.getPosition().lng();
    });
 


  google.maps.event.addListener(marker, 'dragend',function(marker) {
 document.getElementById("mylocation001").value = this.getPosition().lat();
    document.getElementById("mylocation002").value = this.getPosition().lng();
    });
 




}
</script>
  <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
         data-menu-load="menu-main.php"
         data-menu-active="nav-welcome"
         data-menu-effect="menu-over">  
    </div>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>
 
</body>
