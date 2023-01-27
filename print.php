<?php
include"dbconfig.php";
include"database.php";
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
<title>Print Establishment</title>
<link rel="stylesheet" type="text/css" href="app/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="app/styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="app/fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="blue2">


<button style="display:none;" id="print" onclick="window.print()">Print this page</button>
         <script type="text/javascript">
      window.onload = function(){
   document.getElementById('print').click();
 
 
}
  </script>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
 <br>
    <div class="page-content">
        <?php
 
$sql = "SELECT * FROM user  where id='".$_GET['owner_id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
$owner = $row['fullname'];
$phone =$row['phone'];
$email =$row['email'];
$id =$row['id'];


  }
} else {
 
}
 
?>

        <?php
 
$sql = "SELECT * FROM establishment  where id='".$_GET['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
$name = $row['name'];
 $description = $row['establishment_description'];
  $category = $row['category'];
  $cuisine = $row['cuisine_type'];
  $pi = $row['pi'];
$view = $row['view'];
$review = $row['reviews'];
$average_price = $row['average_price'];
$visit = $row['visit'];

 $image = $row['image'];

  }
} else {
 
}
 
?>



        
     
        
        <div class="card card-style">
            <div class="content">
                <div class="d-flex">
                    <div>
                    
                        <h1> <?php echo $owner; ?></h1>
                        <p class="font-600 color-highlight mt-n3">Establishment Owner</p>
                    </div>
                  
                </div>
                <div class="divider mt-3 mb-3"></div>
                <div class="row mb-0">
                    <div class="col-4">
                        <p class="color-theme font-700">Contact #.</p>
                    </div>
                    <div class="col-8">
                        <p class="font-400"><?php echo $phone; ?></p>
                    </div>
                    
                    <div class="col-4">
                        <p class="color-theme font-700">Email</p>
                    </div>
                    <div class="col-8">
                        <p class="font-400"><?php echo $email; ?></p>
                    </div>
                    
                    <div class="col-4">
                        <p class="color-theme font-700">User ID No.</p>
                    </div>
                    <div class="col-8">
                        <p class="font-400"><?php echo $id; ?></p>
                    </div>
                </div>
                
            </div>                        
        </div>
        <div class="card card-style">
            <div class="content">                
                  <div class="ml-auto float-right">
                        <img src="./app/images/establishment/<?php echo $image; ?>" class="rounded-m" width="200">
                    </div>
                <h4 class="mb-n1"><?php echo $name; ?></h4>
                <p>
                   <?php echo $description; ?>
                </p>
                <div class="row mb-0">
                    <div class="col-4"><p class="color-theme font-700">Category</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $category; ?></p></div>
                    
                    <div class="col-4"><p class="color-theme font-700">Cuisine Type</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $cuisine; ?></p></div>
                    
                    <div class="col-4"><p class="color-theme font-700">Parking information</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $pi; ?></p></div>
                    
                    <div class="col-4"><p class="color-theme font-700">View</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $view; ?></p></div>
        
                    <div class="col-4"><p class="color-theme font-700">Reviews</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $review; ?></p></div>        
        
                    <div class="col-4"><p class="color-theme font-700">Average Price</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $average_price; ?></p></div>
        
                    <div class="col-4"><p class="color-theme font-700">Visits</p></div>
                    <div class="col-8"><p class="font-400"><?php echo $visit; ?></p></div>        
                </div>

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


<script type="text/javascript" src="app/scripts/jquery.js"></script>
<script type="text/javascript" src="app/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="app/scripts/custom.js"></script>
</body>
