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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kain Saan Admin Dashboard</title>
    
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    
<link rel="stylesheet" href="assets/css/shared/iconly.css">
   

    <script>
      window.Promise ||
        document.write(
          '<script src="polyfill.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="classList.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="findindex_polyfill_mdn.js"><\/script>'
        )
    </script>

    
    <script src="apexcharts.js"></script>
    

    <script>
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b
      var _seed = 42;
      Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
      };
    </script>
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                            <a href="index.php"><img src="logo.png" alt="Logo"  height="50px" class="rounded-circle"  > Kain Saan</a>
                        
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown"  >
                                    <div class="avatar avatar-md2" >
                                        <img src="user.png" alt="Avatar">
                                    </div>
                                    <div class="text">
                                                                     <?php
              $query="SELECT * FROM admin where id='".$_SESSION['id']."'   ";
            $result=select($query);
          while($r=mysqli_fetch_array($result))
          {
            extract($r);
          ?>
                                    
                                             <h6 class="user-dropdown-name">  <?=$r['fullname']?></h6>
 <?php
          }
          ?>
                                        <p class="user-dropdown-status text-sm text-muted">Admin</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                              
                                  
                                  <li><a class="dropdown-item has-icon" href="logout.php"><i class="fa fa-sign-out"  ></i>  Logout</a></li>
                                </ul>
                            </div>








                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            
                            
                            
                            <li
                                class="menu-item  ">
                                <a href="index.php" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            
                            
                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Users</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="manage_user.php"
                                                    class='submenu-link'>Manage Users</a>

                                                
                                            </li>
                                            
                                        
                                         
                                            
                                        </ul>
                                        
                                        
                                        
                                         
                            
                            
                            
                            <li
                                class="menu-item active has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Food Establishment</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            

                                              


                                            <li
                                                class="submenu-item  ">
                                                <a href="approved.php"
                                                    class='submenu-link'>Approved</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="pending.php"
                                                    class='submenu-link'>Pending</a>

                                                
                                            </li>
                                            
                                        
                                        
                                          
                                            
                                        
                                         
                                        
                                     
                                        
                                    </div>
                                </div>
                            </li>
                            
                            
                            
                           <li
                                class="menu-item">
                                <a href="manage_food.php" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Manage Food</span>
                                </a>
                              
                            </li>
                            
                            
                            
                            



            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-funnel-fill"></i>
                                    <span>Manage Filter</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'> Filter Distance</a>

                                                
                                            </li>
                                         
                                    </div>
                                </div>
                            </li>




















                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-chat-heart-fill"></i>
                                    <span>Reviews</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="manage_review.php"
                                                    class='submenu-link'>Manage Reviews</a>

                                                
                                            </li>
                                            
                                        
                                        
                                          
                                            
                                        
                                        
                                        
                                            
                                        
                                    </div>
                                </div>
                            </li>
                            
                            
                            
                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-person-circle"></i>
                                    <span>Admins</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="manage_admin.php"
                                                    class='submenu-link'>Manage Admins</a>

                                                
                                             
                                                
                                            </li>
                                            
                                        
                                        
                              
                                        
                                        
                                     
                                        
                                    </div>
                                </div>
                            </li>
                           
                            
                            
                            <li
                                class=" menu-item  ">
                                <a href="#" class='menu-link'>
                                 <i class="bi bi-bell-fill"></i>
                                    <span class="">Notifications </span>

                                  <div id="noti_count"></div>
                                    
                                </a>
                                <div class="submenu ">       
                                        <ul class="submenu-group">

                                        <div id="admin_notif"></div>

                                            
                                            
                                        </ul>
                                        
                                        
                                  
                                </div>
                            </li>
                            
                            
<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_count").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "noti_count.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>


<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("admin_notif").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "admin_notif.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>


                         
                            
                            
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">
                
<div class="page-heading">
    <h3>Kain Saan Admin Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Views</h6>
                                    <?php
$results = mysqli_query($conn, "SELECT sum(view) FROM establishment") or die(mysqli_error());
while($rows = mysqli_fetch_array($results))
    {?>
  <?php $sum =  $rows['sum(view)']; }
?>
                                    <h6 class="font-extrabold mb-0"><?php echo $sum; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Registered User</h6>
                                      
              <?php
            $sql = "SELECT * from user ";
                if ($result = mysqli_query($conn, $sql)) {
                    $registered = mysqli_num_rows( $result );

                        }
                        ?>



                                    <h6 class="font-extrabold mb-0"><?php echo $registered;?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Admin</h6>
                                        <?php
            $sql = "SELECT * from admin ";
                if ($result = mysqli_query($conn, $sql)) {
                    $admin = mysqli_num_rows( $result );

                        }
                        ?>
                                    <h6 class="font-extrabold mb-0"><?php echo $admin;?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldHome"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Establishment</h6>
                                         <?php
            $sql = "SELECT * from establishment ";
                if ($result = mysqli_query($conn, $sql)) {
                    $estab = mysqli_num_rows( $result );

                        }
                        ?>


                                    <h6 class="font-extrabold mb-0"><?php echo $estab;?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    
 
 

   
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Monthly Registered User </h4>
                        </div>
                        <div class="card-body">
                             <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Reviews</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Reviews</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Establishment</th>
                                        </tr>
                                    </thead>
                                    <tbody>


<?php
 
$sql = "SELECT * FROM reviews order by id DESC limit 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $currentDateTime = $row["time"];
 
$newDateTime = date('h:i A', strtotime($currentDateTime));


  echo '
    

                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="user.png">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">'.$row['fullname'].'</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">'.$row['review'].'</p>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">' . $row["months"]. ' ' . $row["date"]. ', ' . $row["years"]. '</p>
                                            </td>
                                              <td class="col-auto">
                                                <p class=" mb-0">'.$newDateTime.'</p>
                                            </td>
                                             <td class="col-auto">
                                                <p class=" mb-0">'.$row['name_estab'].'</p>
                                            </td>
                                        </tr>
                                  



  ';
  }
} else {
  echo "0 results";
}
 
?>


                           




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Pending Establishment</h4>
                        </div>
                        <div class="card-body">
                   
                       <?php
  include "database.php";   
$sql = "SELECT * FROM establishment where status = '0'  order by id DESC limit 5 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo '

                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="./app/images/establishment/'.$row['image'].'">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">'.$row['name'].'</h5>
                            <h6 class="text-muted yellow mb-0"><span class="badge bg-warning">Pending</span> </h6>
                        </div>
                    </div>
                


  ';
  }
} else {
  echo "0 results";
}
 
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
               <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldTicket-Star"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Food</h6>
                                       <?php
            $sql = "SELECT * from food ";
                if ($result = mysqli_query($conn, $sql)) {
                    $food = mysqli_num_rows( $result );

                        }
                        ?>
                                    <h6 class="font-extrabold mb-0"><?php echo $food;?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Registered User</h4>
                </div>
                <div class="card-content pb-4 ">


                    <?php
 
$sql = "SELECT * FROM user order by id DESC limit 3 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo '

                    <div class="recent-message d-flex px-4 py-3 ">
                        <div class="avatar avatar-lg">
                            <img src="user.png">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">'.$row['fullname'].'</h5>
                            <h6 style="font-size:12px;" class="text-muted mb-0 font-5   ">'.$row['email'].'</h6>
                        </div>
                    </div>
                


  ';
  }
} else {
  echo "0 results";
}
$conn->close();
?>

              <br><br>
                                 <script type="text/javascript">
    
    function view_all(){
         window.location="manage_user.php";
    }

</script>
                    <div class="px-4">
                        <button onclick="view_all()" class='btn btn-block btn-xl btn-light-primary font-bold mt-1'>View All</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Establishment Approved</h4>
                </div>
                <div class="card-body">
                             <?php
  include "database.php";   
$sql = "SELECT * FROM establishment where status = '1'  order by id DESC limit 5 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo '

                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="./app/images/establishment/'.$row['image'].'">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">'.$row['name'].'</h5>
                            <h6 class="text-muted text-info mb-0"> <span class="badge bg-success">Approved</span></h6>
                        </div>
                    </div>
                


  ';
  }
} else {
  echo "0 results";
}
 
?>
                </div>
            </div>
        </div>
    </section>
</div>
  <div id="chart3"></div>
            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; Kain Saan</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="#">Alexander Jan</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>




<?php 
 
  $query = $conn->query("
    SELECT 
        months,
        SUM(amount) as amount
    FROM user
    GROUP BY months
  ");

  foreach($query as $data)
  {
    $months[] = $data['months'];
    $amount[] = $data['amount'];
  }

?>

 
 
 





     <script>
        var options = {
          series: [{
          name: 'Registered User this month',
          data: <?php echo json_encode($amount)?>
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: <?php echo json_encode($months) ?>,
        },
        zaxis: {
          title: {
            text: 'User'
          }
        },
        fill: {
          opacity: 1
        },
      
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    </script>
 


 <?php 
 
  $query = $conn->query("
    SELECT 
        name,
        status    FROM establishment where status = '1' GROUP BY name
  ");

  foreach($query as $data)
  {
    $name[] = $data['name'];
    $status[] = $data['status'];
  }

?>




 
<script src="assets/js/extensions/ui-apexchart.js"></script>
<script src="assets/js/extensions/ui-chartjs.js"></script>
    <script src="assets/js/pages/horizontal-layout.js"></script>
    <script src="assets/js/app.js"></script>
    
<script src="assets/js/pages/dashboard.js"></script>
</body>

</html>
