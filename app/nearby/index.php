<?php
include"../dbconfig.php";
include"../database.php";
   if($_SESSION['login']=="yes")                          
{
 
}
else
{

 echo '
     <script>
            window.location="../login.php"
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
<title>Get Directions</title>
<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="../_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
 
</head>
    
<body class="theme-light" data-highlight="blue2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
 
     <div id="footer-bar" class="footer-bar-1  ">
            <a href="#" onclick="index()" ><i class="fa fa-home"></i><span>Home</span></a>
            <a href="#" onclick="food_spot()"><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#" onclick="nearby()" class="active-nav" ><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="#"  onclick="notif()" ><i class="fa fa-bell"></i><span>notification</span><div id="noti_number"></div></a>
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

     <script type="text/javascript">
      window.onload = function(){
   document.getElementById('now').click();
 
   document.getElementById('confirm').click();
    document.getElementById('display').click();
     document.getElementById('fix').click();
       document.getElementById('cal').click();
 
}
  </script>

   
              
                



 
<div id="output" class="result-table mr-2 mb-n5">  </div>
<button  data-menu='arrive-confirm'    href='#' class='btn btn-3d btn-xs ml-2 f mt-n4 rounded-0 distance   font-900 shadow-s border-blue1-dark bg-blue1-light'><i class='fa fa-user-check  '></i>  </button>





    <div class="container2" style="display:none;"  >
        <form action="route.php" method="get">
            <!-- Location 1 -->
            <div class="row">
                <div class="location-label">
                    <label>Origin: </label>                                    
                </div>
                <div class="location-input">
                    <input type="text" id="location-1" name="origin" value="<?php echo $_GET['lat']; ?>, <?php echo $_GET['lng']; ?> " placeholder="Enter a start location..."> 
                </div>
            </div>
            <!-- Location 2 -->
            <div class="row">
                <div class="location-label">
                    <label>Destination: </label>
                </div>
                <div class="location-input">
                    <input type="text" id="location-2" value="<?php echo $_GET['direction']; ?>" name="destination" placeholder="Enter a last location...">
                </div>
            </div>

            <!-- Submit button -->
            <div class="row">
                <button class="button" type="button" onclick="clearRoute();">Clear</button>
                <button id="now" class="button" type="button" onclick="calcRoute();">Submit</button>
                 <button class="button" type="button" id="display"  onclick="cad();">Display</button>
            </div>      
            
            <!-- Stats table -->                
 
        
       </form>

       
    </div>

     <style>
#google-map {
  height: 100%;
  width: 100%;
}
</style>

 <div id="google-map" class="card header-card shape-rounded" data-card-height="100%"> 
 
  
     </div>
 
    <style>.google-map {overflow:hidden;background:none!important;height:100%;width:100%;}</style> 






         
      
 

 <style> 
 .result-table{
    font-size: 1.6rem;
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    height: 10rem;    

    /* Animation */
    animation-name: moveIn;
    animation-duration: 1s;
    animation-timing-function: ease-out;
}</style>


        <!-- footer and footer card-->

       
    </div>    
    <!-- end of page content-->
    
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
 

    
  
    
    <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
         data-menu-load="menu-main.php"
         data-menu-active="nav-features"
         data-menu-effect="menu-over">  
    </div>
    
     

         <!---------------->
    <!---------------->
    <!--Menu Confirm-->
    <!---------------->
    <!---------------->
    <div id="arrive-confirm" class="menu menu-box-bottom menu-box-detached rounded-m"
         data-menu-height="200" 
         data-menu-effect="menu-over">
        <h2 class="text-center font-700 mt-3 pt-1">Are you sure?</h2>
        <p class="boxed-text-l">
           Do you arrived at this location?<br>Please Confirm
        </p>
        <div class="row mr-3 ml-3">
            <div class="col-6">
                <a href="#" onclick="yes()" class="btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Yes</a>
            </div>
            <div class="col-6">
                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">REJECT</a>
            </div>
        </div>


        <form style="display:none;" action="index.php" method="post"> 
            <input type="text" name="user_id" value="<?php echo $_SESSION['id'] ?>">
            <input type="text" name="fullname" value="<?php echo $_SESSION['fullname'] ?>">
            



<?php
 
$sql = "SELECT * FROM establishment where locator = '". $_GET['direction']."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '

      <input type="text" name="estab_name" value="'.$row['name'].'">
      <input type="text" name="estab_id" value="'.$row['id'].'">
      <input type="text" name="owner_id" value="'.$row['owner_id'].'">

    ';
  }
} else {
  echo "";
}
 
?>




<input type="text" name="years" id="years"  placeholder="years">

<input type="text" name="months" id="months"  placeholder="months">
<input type="text" name="time" id="time"  placeholder="time">
<input type="text" name="date" id="date"  placeholder="date">

<button type="submit" id="yess" name="confirm">confirm</button>

        </form>

    </div>  
 
        
 <?php 

include 'database.php';

    if (isset($_POST['confirm'])){ 
 
$user_id = $_POST['user_id'];
$owner_id = $_POST['owner_id'];
$fullname = $_POST['fullname'];
$estab_name = $_POST['estab_name'];
$months = $_POST['months'];
$date = $_POST['date'];
$years = $_POST['years'];
$time = $_POST['time'];
  $sql = "INSERT INTO visit (user_id, fullname, estab_name, months, date, years, time)
VALUES ('$user_id', '$fullname', '$estab_name', '$months', '$date', '$years', '$time')";

if ($conn->query($sql) === TRUE) {


 echo '
     <script>
            window.location="../review.php?name='.$estab_name.'&clean=Yes"
            </script>';



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
    


 
$sql = "INSERT INTO `notif` (`owner_id`, `user_id`, `user_fullname`, `title`, `body`) VALUES ('$owner_id','$user_id', '$fullname', '$estab_name', 'user_visit')";

if (mysqli_query($conn, $sql)) {
 
} else {
 
}




}

?>
          
<script type="text/javascript">

    function yes() {
     document.getElementById('yess').click();
    }

 
</script>
    
    
       <script src="../jquery.min.js"></script>
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
 

    
    
</div>    


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATtRSRV4bWCpLdXQxjkvgALpewmlp2Kjo&libraries=places"></script>
 
    <script src="js/main.js"></script>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>
</body>
</html>