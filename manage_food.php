<?php
include"dbconfig.php";
 include "database.php";     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Food</title>
    
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
    <h3>Manage Food</h3>
</div>
<div class="page-content">
    <section class="row">
  <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                 Food menu list 
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>

                            <th></th>
                            <th>Establishment ID</th>
                            <th>Establishment Name</th>
                            <th>Food name</th>
                            <th>Category</th>
                            <th>Price</th>
                            
                            <th><center>  Action </center></th>
                        </tr>
                    </thead>
                    <tbody>

<?php
 
$sql = "SELECT * FROM food";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '


                            <tr>
                            <td> <img src="./app/images/establishment/'.$row['image'].'" width="50"   class="rounded"></td>
                            <td>'.$row['estab_id'].'</td>
                            <td>'.$row['estab_name'].'</td>
                            <td>'.$row['food_name'].'</td>
                            <td>'.$row['food_category'].'</td>
                           
                            <td>'.$row['price'].'</td>
                             <td> <center> 


                             <a href="print_food/index.php?id='.$row['id'].'" target="_blank">    <button class="btn mr-2 icon icon-left btn-success" > <i data-feather="printer"></i> </button></a>

  &nbsp;
                                <a href="#id'.$row['id'].'">    <button class="btn icon icon-left btn-info"  data-bs-toggle="modal"
                                            data-bs-target="#id'.$row['id'].'"> <i data-feather="edit"></i> </button></a>
                                                    &nbsp;
                                            <a href="#del'.$row['id'].'">     <button class="btn icon icon-left btn-danger"  data-bs-toggle="modal"
                                            data-bs-target="#del'.$row['id'].'"><i data-feather="trash-2"></i></button></a></center>
                            </td>
                        </tr>




                                         <!--edit food  Modal -->
                                        <div class="modal fade text-left" id="id'.$row['id'].'" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel130" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title white" id="myModalLabel130">Update Food information
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                     
                            <form  method="post" action="manage_food.php">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="fullname-icon">Food Name</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="food_name"
                                                        placeholder="Food Name" value="'.$row['food_name'].'" id="fullname-icon">
                                                    <div class="form-control-icon">
                                                     <i class="bi bi-info-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group  ">
                                              
                    <span>Food Category</span>
                
                    <select class="form-control" name="food_category">
                        <option value="Appetizer">Appetizer</option>
                        <option value="Main Dish">Main Dish</option>
                        <option value="Side Dish">Side Dish</option>
                        <option value="Drink">Drink</option>
                        <option value="Dessert">Dessert</option>
                    </select>
                 
                                            </div>
                                        </div>


                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Price</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="'.$row['price'].'" name="price" placeholder="Price"
                                                        id="email-id-icon">
                                                    <div class="form-control-icon">
                                                       <i class="bi bi-tag"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                   <input type="hidden" name="id" value="'.$row['id'].'">
                                    
                                    
                                    </div>
                                </div>
                            
    
 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" name="update" class="btn btn-info ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"><i data-feather="check-circle"></i> Update</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

</form>





                    <!--delete food  Modal start -->
                                        <div class="modal fade text-left" id="del'.$row['id'].'" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel120" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel120">Confirm Delete Food menu in
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form  method="post" action="manage_food.php">
                                <div class="form-body">
                                    <div class="row">
                                        
                                     
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="username-icon">Fullname</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="username"
                                                        placeholder="food_name" value="'.$row['food_name'].'" id="username-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Email</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="'.$row['food_category'].'" name="food_category" placeholder="Category"
                                                       >
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Mobile</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="'.$row['price'].'" name="price" placeholder="Price"
                                                        id="mobile-id-icon">
                                                    <div class="form-control-icon">
                                                       <i class="bi bi-tag"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="'.$row['id'].'">
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
                                         <!--delete food  Modal end -->












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
$food_name = $_POST['food_name']; 
$food_category = $_POST['food_category'];
$price = $_POST['price']; 
$id = $_POST['id']; 
if (isset($_POST['update'])) { 
 
$sql = "UPDATE food SET food_name = '$food_name', food_category = '$food_category', price ='$price' WHERE id='$id' ";

if (mysqli_query($conn, $sql)) {
   echo'<script>alert(" You   Successfully Updated  a food info")
            window.location="manage_food.php"
            </script>';
 
} else {
 
}  

}
 
?>


  <?php 

include 'database.php';
error_reporting(error_reporting() & ~E_NOTICE);
 
$id = $_POST['id']; 
if (isset($_POST['del'])) { 
 
$sql = "DELETE FROM  food      WHERE id='$id' ";

if (mysqli_query($conn, $sql)) {
   echo'<script>alert(" You   Successfully deleted  a Food menu")
            window.location="manage_food.php"
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