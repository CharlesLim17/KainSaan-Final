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
            window.location="login.php"
            </script>';
}      
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Print Food</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
 

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

 
</head>

<body>
    <script type="text/javascript">
      window.onload = function(){
   document.getElementById('print').click();
 
 
}
  </script>
 
 
  <main id="main">

    <section id="menu" class="menu">
     
       <?php
 $id = $_GET['id'];
$sql = "SELECT * FROM food where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $estab_name = $row['estab_name'];
    $food_name = $row['food_name'];
    $price = $row['price'];
    $food_category = $row['food_category'];
    $image = $row['image'];
    
  }
} else {
 
}
 
?>
<button style="display:none;" id="print" onclick="window.print()">Print this page</button>


        <div class="section-header">
         <p> <?php echo $estab_name; ?></span></p>
          <h2>Check Our <span style="color:blue;">Food Menu</h2>
        </div>
 
   <center>
 
              <img <img src="../app/images/establishment/<?php echo $image; ?>" width="300"   class="rounded">
              <br><br>
                <h3><?php echo $food_name; ?></h3>
                <h4><?php echo $food_category; ?></h4>
                <h1 style="color:blue;">
                 ₱ <?php echo $price; ?>
                </h1>
         

     </center>





      

     
    </section><!-- End Menu Section -->

 
 
  

  </main><!-- End #main -->

 
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>