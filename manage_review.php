<?php
include"dbconfig.php";
 include "database.php";     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Reviews</title>
    
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/pages/fontawesome.css">
<link rel="stylesheet" href="assets/css/pages/datatables.css">
<link rel="stylesheet" href="assets/css/shared/iconly.css">
   

    <script>
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    

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
                                  <li><a class="dropdown-item" href="#">My Account</a></li>
                                  <li><a class="dropdown-item" href="#">Settings</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                                <a href="manage_food.php" class='menu-link'>
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
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Manage Food</span>
                                </a>
                              
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
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                 <i class="bi bi-bell-fill"></i>
                                    <span>Notifications</span>
                                       <div id="noti_count"></div>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                          
                                        
                                        <div id="admin_notif"></div>
                                            
                                        </ul>
                                        
                                        
                                    </div>
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
    <h3>Manage  Reviews</h3>
</div>
<div class="page-content">
    <section class="row">
  <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                 User Feedback
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Fullname</th>
                            <th>Review</th>
                            <th>Ratings</th>
                            <th>Establishment</th>
                            <th>Food</th>
                            <th><center>  Action </center></th>
                        </tr>
                    </thead>
                    <tbody>

<?php
 
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '


                            <tr>
                            <td>'.$row['user_id'].'</td>
                            <td >'.$row['fullname'].'</td>
                            <td width="300"><span class="badge bg-light-success">'.$row['review'].'</span></td>
                            <td>'.$row['ratings'].'</td>
                           
                            <td>'.$row['name_estab'].'</td>
                            <td>'.$row['food'].'</td>
                             <td> <center> 
                              
                                                    &nbsp;
                                            <a href="#del'.$row['id'].'">     <button class="btn icon icon-left btn-danger"  data-bs-toggle="modal"
                                            data-bs-target="#del'.$row['id'].'"><i data-feather="trash-2"></i></button></a></center>
                            </td>
                        </tr>



 


                    <!--delete review  Modal start -->
                                        <div class="modal fade text-left" id="del'.$row['id'].'" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel120" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel120">Confirm Delete Review info
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form  method="post" action="manage_review.php">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="fullname-icon">Fullname</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="fullname"
                                                        placeholder="Fullname" value="'.$row['fullname'].'" id="fullname-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Establishment</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="'.$row['name_estab'].'" name="Estab name" placeholder="Establishment Name"
                                                        id="mobile-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Reviews</label>
                                                <div class="position-relative">
                                                    <textarea type="text" class="form-control"  name="review" placeholder="Review"
                                                        id="email-id-icon"> '.$row['review'].'</textarea>
                                                    <div class="form-control-icon">
                                                      <i class="bi bi-chat-dots"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <input type="hidden" name="review_id" value="'.$row['id'].'">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" name="del" class="btn btn-danger ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"><i data-feather="alert-circle"></i> Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></form>
                                         <!--delete user  Modal end -->












    ';
  }
} else {
  echo "0 results";
}
$conn->close();
?>

                        
                   




                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
                    <!-- Button trigger for info theme modal -->
                                      

                               
                                    </div>
    </section>
</div>
 

  <?php 

include 'database.php';
error_reporting(error_reporting() & ~E_NOTICE);
 
$review_id = $_POST['review_id']; 
if (isset($_POST['del'])) { 
 
$sql = "DELETE FROM  reviews      WHERE id='$review_id' ";

if (mysqli_query($conn, $sql)) {
   echo'<script>alert(" You   Successfully deleted  Review info")
            window.location="manage_review.php"
            </script>';
 
} else {
 
}  

}
 
?>
                                   

                    


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



 
         
           
 
             
                  
                    
                    
                       
                  
           
        
         
 




 
<script src="assets/js/extensions/ui-apexchart.js"></script>
<script src="assets/js/extensions/ui-chartjs.js"></script>
    <script src="assets/js/pages/horizontal-layout.js"></script>
    <script src="assets/js/app.js"></script>
    
<script src="assets/js/pages/dashboard.js"></script>
 
    
<script src="assets/js/extensions/datatables.js"></script>
</body>

</html>