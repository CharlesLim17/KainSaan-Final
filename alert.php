<?php
include"dbconfig.php";
 include "database.php";     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Establishment</title>
    
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
                                        <h6 class="user-dropdown-name">Alexander Jan</h6>
                                        <p class="user-dropdown-status text-sm text-muted">Admin</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">My Account</a></li>
                                  <li><a class="dropdown-item" href="#">Settings</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="auth-login.html">Logout</a></li>
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
                                                <a href="#"
                                                    class='submenu-link'>Category</a>

                                                
                                            </li>


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
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Manage Food</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Category</a>

                                         
                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="approved.php"
                                                    class='submenu-link'>Approved</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Pending</a>

                                          
                                                
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
                                                <a href="#"
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
                                                class="submenu-item  has-sub">
                                                <a href="#"
                                                    class='submenu-link'>Manage Admins</a>

                                                
                                             
                                                
                                            </li>
                                            
                                        
                                        
                              
                                        
                                        
                                     
                                        
                                    </div>
                                </div>
                            </li>
                               <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-life-preserver"></i>
                                    <span>About Kain Saan</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Documentation</a>

                                                
                                            </li>
                                            
                                        
                                        
                                    
                                            
                                  
                                            
                                        
                                    </div>
                                </div>
                            </li>
                            
                            
                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                 <i class="bi bi-bell-fill"></i>
                                    <span>Notifications</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                          
                                        
                                        
                                
                                            
                                        
                                        
                                         
                      
                                            
                                        
                                         
                                            
                                        
                                        
                                            <li
                                                class="submenu-item" width="100%">
                                                <a href="#"
                                                    class='submenu-link'>Test Establishment</a>

                                                
                                            </li>
                                            
                                        </ul>
                                        
                                        
                                    </div>
                                </div>
                            </li>
                            
                            
                            
                         
                            
                            
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">
               
<div class="page-heading">
    <h3>Pending Establishment</h3>
</div>
<div class="page-content">
    <section class="row">
  <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Food Establishment list
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Owner Fullname</th>
                            <th>Category</th>
                            <th>Cuisine Type</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th><center>  Action </center></th>
                        </tr>
                    </thead>
                    <tbody>

<?php
 $id = $_GET['id']; 
$sql = "SELECT * FROM establishment where status = '0' and owner_id ='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '


                            <tr>
                            <td> <img src="../images/establishment/'.$row['image'].'" width="50" class="rounded-circle"></td>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td  >'.$row['owner_fullname'].'</td>
                            <td>'.$row['category'].'</td>
                            <td>'.$row['cuisine_type'].'</td>
                           
                            <td>'.$row['address'].'</td>
                            <td > <span class="badge bg-warning">Pending</span></td>
                             <td > <center> 
                                <a href="#">    <button class="btn icon icon-left btn-info"   data-bs-toggle="modal"
                                            data-bs-target="#view'.$row['id'].' "> <i data-feather="eye"></i> </button></a>
                                                    &nbsp;
                                            <a href="#del'.$row['id'].'">     <button class="btn icon icon-left btn-danger"  data-bs-toggle="modal"
                                            data-bs-target="#del'.$row['id'].'"><i data-feather="trash-2"></i></button></a></center>
                            </td>
                        </tr>




                                     



                    <!--delete user  Modal start -->
                                        <div class="modal fade text-left" id="del'.$row['id'].'" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel120" aria-hidden="true">
                                            <div class="modal-dialog modal-xs modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel120">Confirm delete establishment ?
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form  method="post" action="approved.php">
                           <center>  <img src="../images/establishment/'.$row['image'].'" width="50" class="rounded-circle">
                           <input type="hidden" name="id" value="'.$row['id'].'" >
                         &nbsp;  '.$row['id'].'
                            '.$row['name'].' </center>
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



        <!--Extra Large Modal -->
                                <div class="modal fade text-left w-100" id="view'.$row['id'].'" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel16" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel16"> <ul class="nav nav-tabs" id="myTab'.$row['id'].'" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home'.$row['id'].'" role="tab"
                                    aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile'.$row['id'].'" role="tab"
                                    aria-controls="profile" aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact'.$row['id'].'" role="tab"
                                    aria-controls="contact" aria-selected="false">Owner info</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#permit'.$row['id'].'" role="tab"
                                    aria-controls="permit" aria-selected="false">Permit</a>
                            </li>


                      

                        </ul></h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                 <section class="section">

        
            
                 
                   
                    
                       
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home'.$row['id'].'" role="tabpanel" aria-labelledby="home-tab">
                              

  <center> 
                    
                      
                <div class="card">
                    <div class="card-content">
                        <img class=" rounded-circle  " src="../images/establishment/'.$row['image'].'" width="30%" height="30%" alt="logo"
                              />
                        <div class="card-body">
                            <h2 class="">'.$row['name'].'</h2>
                         
                            <p class="card-text">
                               '.$row['establishment_description'].'
                            </p>
                            
                        </div>
                    </div>
                </div>
            
             
</center>

                            </div>
                            <div class="tab-pane fade" id="profile'.$row['id'].'" role="tabpanel" aria-labelledby="profile-tab">
                                          <p>
                                
                            </p>
                            <div class="list-group">


                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 ">Category</h5>
                                         
                                    </div>
                                    <p class="mb-1">
                                      '.$row['type'].'
                                    </p>
                                   
                                </a>


                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Cuisine Type</h5>
                                       
                                    </div>
                                    <p class="mb-1">
                                     '.$row['cuisine_type'].'
                                    </p>
                                   
                                </a>



                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Address</h5>
                           
                                    </div>
                                    <p class="mb-1">
                                       '.$row['address'].'
                                    </p>
                                 
                                </a>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="contact'.$row['id'].'" role="tabpanel" aria-labelledby="contact-tab">
                               



                            <div class="card">
                    <div class="card-content">
                      <center>  <img src="user.png" class=" "width="30%"
                            alt="owner">
                        <div class="card-body mb-n2">
                            <h5 class="card-title">'.$row['owner_fullname'].'</h5>
                       
                        </div>  </center> 
                    </div>
                    <ul class="list-group  list-group-flush">
                        <li class="list-group-item"><i class="bi bi-at"></i> '.$row['owner_email'].'</li>
                        <li class="list-group-item"><i class="bi bi-phone"></i> '.$row['owner_phone'].'</li>
                        <li class="list-group-item">User ID :  '.$row['owner_id'].'</li>
                        <li class="list-group-item">  </li>
                    </ul>
                </div>


                            </div>

                             <div class="tab-pane fade" id="permit'.$row['id'].'" role="tabpanel" aria-labelledby="permit-tab">
                               
 


                            <div class="card">
                    <div class="card-content">
                      <center>  <img src="../images/establishment/'.$row['permit'].'" class="mb-3 "width="80%"
                            alt="owner">
                              <h5 class="card-title">Business Permit</h5>
                         </center> 
                    </div>
                 
                </div>


                            </div>



    </div>
    </section>
    <form action="pending.php" method="post">
    <input type="hidden" name="id" value="'.$row['id'].'"> 
    <input type="hidden" name="owner_id" value="'.$row['owner_id'].'"> 
    <input type="hidden" name="email" value="'.$row['owner_email'].'"> 
    <input type="hidden" name="fullname" value="'.$row['owner_fullname'].'"> 
    <input type="hidden" name="image" value="'.$row['image'].'"> 
    <input type="hidden" name="name" value="'.$row['name'].'"> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>

                                                <button type="submit" name="approve" class="btn btn-info">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block"><i data-feather="check-square"></i> Approve </span>
                                                </button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Extra Large Modal -->
                 








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
$fullname = $_POST['fullname']; 
$email = $_POST['email'];
$phone = $_POST['phone']; 
$user_id = $_POST['user_id']; 
if (isset($_POST['update'])) { 
 
$sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone ='$phone' WHERE id='$user_id' ";

if (mysqli_query($conn, $sql)) {
   echo'<script>alert(" You   Successfully Updated  a user info")
            window.location="../admin/manage_user.php"
            </script>';
 
} else {
 
}  

}
 
?>


  <?php 



error_reporting(error_reporting() & ~E_NOTICE);
 
$id = $_POST['id']; 
if (isset($_POST['del'])) { 
 
$sql = "DELETE FROM  establishment      WHERE id='$id' ";

if (mysqli_query($conn, $sql)) {
   echo'<script>alert(" You   Successfully Deleted the establishment")
            window.location="../admin/approved.php"
            </script>';
 
} else {
 
}  

}
 
?>






  <?php 
include 'database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 require 'PHPMailer/src/Exception.php';
 require 'PHPMailer/src/PHPMailer.php';
 require 'PHPMailer/src/SMTP.php';
include "database.php";
 
error_reporting(error_reporting() & ~E_NOTICE);
 
$id = $_POST['id']; 
$email = $_POST['email']; 
$fullname = $_POST['fullname']; 
$name = $_POST['name']; 
$image = $_POST['image']; 
$owner_id = $_POST['owner_id']; 
if (isset($_POST['approve'])) { 


 $mail = new PHPMailer(true);

    $mail->isSMTP();   
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'projectkainsaan@gmail.com';                 // SMTP username
    $mail->Password = 'sydwtmydvtqntptu';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl`  
    $mail->Port = 465;  

    $mail->setFrom('projectkainsaan@gmail.com', 'Kain Saan');
    $mail->addAddress(''.$email.'');
    $mail->isHTML(true);

    $mail->Subject = 'Request Approved';
    $mail->Body = 'Hoorayy ! '.$fullname.' Your  Establishment is now Approved by Admin';
if(!$mail->send()) {
                
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
        
            }






 
$sql = "UPDATE establishment SET status='1'  WHERE id='$id' ";

if (mysqli_query($conn, $sql)) {
   echo'<script>alert(" You   Successfully Approved the  establishment")
            window.location="../admin/pending.php"
            </script>';
 
} else {
 
}

$sql = "INSERT INTO `notif` (`user_id`, `title`, `body`, `image`) VALUES ('$owner_id', '$name', 'body2', '$image')";

if (mysqli_query($conn, $sql)) {
 
} else {
 
}



}
 
?>


                                   





<?php
 
 $alertid = $_GET['alertid']; 
$sql = "UPDATE notif SET status = '1'  WHERE user_id ='$alertid'";

if (mysqli_query($conn, $sql)) {
 
} else {
 
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