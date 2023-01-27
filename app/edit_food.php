<?php
error_reporting(error_reporting() & ~E_NOTICE);
include "dbconfig.php";
include "database.php";
if ($_SESSION['login'] == "yes") {
} else {

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
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATtRSRV4bWCpLdXQxjkvgALpewmlp2Kjo&callback=initMap&libraries=places"> </script>
</head>

<body class="theme-light" data-highlight="yellow2">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <!-- header and footer bar go here-->
        <div class="header header-fixed header-auto-show header-logo-app">
            <a href="index.php?fix=no" class="header-title header-subtitle">Back to Home</a>
            <a href="index.php?fix=no" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>

        </div>
        <div id="footer-bar" class="footer-bar-1  ">
            <a href="index.php?fix=no"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="food_spot.php?fix=no"><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#" onclick="nearby()"><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="notif.php"><i class="fa fa-bell"></i><span>notification</span>

                <!-- function to redirect to nearby page -->
                <script type="text/javascript">
                    function nearby() {
                        window.location = "nearby/nearby.php";
                    }
                </script>

                <div id="noti_number"></div>




            </a>
            <a href="#" data-menu="menu-main" class="active-nav"><i class="fa fa-cog"></i><span>Settings</span></a>

        </div>

        <div class="page-content">

            <div class="page-title page-title-small">
                <h2><a href="index.php?fix=no"><i class="fa fa-arrow-left"></i></a>Update Foods</h2>
                <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
            </div>
            <div class="card header-card shape-rounded" data-card-height="200">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="image1.png"></div>
            </div>



            <script type="text/javascript">
                function loadDoc() {


                    setInterval(function() {

                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("noti_number").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "notif_ajax.php", true);
                        xhttp.send();

                    }, 1000);


                }
                loadDoc();
            </script>





            <?php

            include 'database.php';
            error_reporting(error_reporting() & ~E_NOTICE);
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if (isset($_POST['update'])) {

                $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone ='$phone' WHERE id='" . $_SESSION['id'] . "' ";

                if (mysqli_query($conn, $sql)) {
                    echo ' <div class="alert mr-3 ml-3 mt-n3 rounded-s bg-green1-dark" role="alert">
            <span class="alert-icon"><i class="fa fa-check-circle font-18"></i></span>
            <h4 class="text-uppercase color-white">Update Success</h4>
            <strong class="alert-icon-text">Your Personal information updated</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
            </div> ';
                } else {
                }
            }


            ?>





            <?php
            error_reporting(error_reporting() & ~E_NOTICE);
            include "database.php";
            $fix = $_GET['fix'];

            if ($fix == 'no') {

                echo '
     <script>
            window.location="profile.php?fix=Yes"
            </script>';
            }


            ?>








            <?php

            include 'database.php';

            if (isset($_POST['upload'])) {


                $owner_id = $_POST['owner_id'];

                $cuisine_type = $_POST['cuisine_type'];
                $lat = $_POST['lat'];
                $lng = $_POST['lng'];

                $owner_fullname = $_POST['owner_fullname'];
                $owner_email = $_POST['owner_email'];
                $owner_phone = $_POST['owner_phone'];
                $name = $_POST['name'];
                $establishment_description = $_POST['establishment_description'];
                $address = $_POST['address'];
                $category = $_POST['category'];
                $location = "images/establishment/";
                $file_new_name = date("dmy") . time() . $_FILES["file"]["name"];
                $file_name = $_FILES["file"]["name"];

                $file_temp = $_FILES["file"]["tmp_name"];
                $file_size = $_FILES["file"]["size"];

                /*
permit
    */

                $file_name2 = $_FILES["file2"]["name"];

                $file_temp2 = $_FILES["file2"]["tmp_name"];
                $file_size2 = $_FILES["file2"]["size"];





                $sql = "INSERT INTO `establishment` (`owner_id`, `owner_fullname`, `owner_email`, `owner_phone`, `permit`, `name`, `establishment_description`, `category`, `address`, `cuisine_type`, `image`, `lat`, `lng`, `locator`)
    VALUES ('$owner_id', '$owner_fullname', '$owner_email', '$owner_phone', '$file_name2', '$name', '$establishment_description', '$category', '$address', '$cuisine_type',  '$file_name', '$lat', '$lng', '$lat, $lng')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    move_uploaded_file($file_temp, $location . $file_name);
                    move_uploaded_file($file_temp2, $location . $file_name2);

                    echo '
 
                <div class="alert mr-3 ml-3 mt-n3 rounded-s bg-yellow1-dark" role="alert">
            <span class="alert-icon"><i class="fa fa-exclamation-triangle font-18"></i></span>
            <h4 class="text-uppercase color-white">Pending request</h4>
            <strong class="alert-icon-text">Your request is under process</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div> 

       

        ';
                } else {
                    echo "<script>alert('Try Again! Something wong went.')</script>";
                }
            }

            ?>




            <?php

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';
            include "database.php";


            if (isset($_POST['upload'])) {

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'projectkainsaan@gmail.com';                 // SMTP username
                $mail->Password = 'sydwtmydvtqntptu';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl`  
                $mail->Port = 465;

                $mail->setFrom('projectkainsaan@gmail.com', 'Kain Saan');
                $mail->addAddress('' . $_SESSION['email'] . '');
                $mail->isHTML(true);

                $mail->Subject = 'Pending Request';
                $mail->Body = 'Thank you for Registering your "' . $name . '"  Establishment, Admin is check your Request Please wait for a while :)';
                if (!$mail->send()) {

                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                }





                $owner_id = $_POST['owner_id'];
                $file_name = $_FILES["file"]["name"];
                $name = $_POST['name'];

                $sql = "INSERT INTO `notif` (`user_id`, `title`, `body`, `image`) VALUES ('$owner_id', '$name', 'body1', '$file_name')";

                if (mysqli_query($conn, $sql)) {
                } else {
                }
            }


            ?>








            <?php

            include 'database.php';
            if (isset($_POST['edit_food'])) {

                $estab_id = $_POST['estab_id'];
                $estab_name = $_POST['estab_name'];
                $food_name = $_POST['food_name'];
                $food_category = $_POST['food_category'];
                $food_price = $_POST['food_price'];
                $fullname = $_SESSION['fullname'];
                $owner_id = $_SESSION['id'];
                //food image
                $location = "../images/establishment/";
                $file_name3 = $_FILES["file3"]["name"];
                $file_temp3 = $_FILES["file3"]["tmp_name"];
                $file_size3 = $_FILES["file3"]["size"];
                //food image
                $sql = " UPDATE food SET food_name='$food_name', price='$food_price', food_category = '$food_category', image='$file_name3' where estab_id = '$estab_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {

                    move_uploaded_file($file_temp3, $location . $file_name3);
                    echo '
     <script>
            window.location="profile.php"
            </script>';
                    echo '
                <div class="alert mr-3 ml-3 mt-n3 rounded-s bg-green1-dark" role="alert">
            <span class="alert-icon"><i class="fa fa-exclamation-triangle font-18"></i></span>
            <h4 class="text-uppercase color-white">Successfully Updated Food info</h4>
            <strong class="alert-icon-text">Your add food menu request is under process</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
                </div> 

                ';
                } else {
                    echo "<script>alert('Try Again! Something wong went.')</script>";
                }
            }

            ?>





            <?php
            if (isset($_REQUEST['dele'])) {
                $estab_id = $_POST['estab_id'];
                extract($_REQUEST);
                $n = iud("DELETE FROM  food WHERE estab_id= '$estab_id' ");

                if ($n == 1) {
                }
            }


            ?>

























            <?php

            $sql = "SELECT * FROM user where id='" . $_SESSION['id'] . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $phone = $row['phone'];
                    echo ' 

        <div class="card card-style">
            <div class="content">
                <h3 class="font-600 ">' . $row['fullname'] . '</h3>
                <p class="font-12 mt-n2 color-highlight">User ID : ' . $row['id'] . '</p>
                
                <div class="float-left">
                    <p class="font-12 opacity-80 mb-n1"><i class="fas fa-phone"></i> ' . $row['phone'] . ' 
                 <i class="ml-4 far fa-user"></i> ' . $row['username'] . '</p>
                    <p class="font-12 opacity-80"><i class="fas fa-envelope"></i> ' . $row['email'] . '</p>
                </div>
   <a    class="icon float-right icon-s mt-2 mr-2 rounded-m bg-blue2-dark color-white ml-1" href="#"  data-menu="menu-edit" >
   <i class="fa fa-edit"></i></a>
    
    <a data-menu="add_estab" class="icon icon-s mt-2 float-right  rounded-m bg-highlight color-white" href="#">
    <i class="fa fa-plus"></i></a>

     
            </div>
        </div>


    ';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>











            <?php
            include "database.php";
            $sql = "SELECT * FROM food where estab_id ='" . $_GET['estab_id'] . "'  ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '



<style>
     .bg-' . $row['id'] . '{background-image:url(images/establishment/' . $row['image'] . ')}
 </style>





        <div class="card card-style">
            <div class="d-flex content mb-0">
       
                <div class="flex-grow-1">
                    <h1 class="font-700">' . $row['food_name'] . '</h1>
                    <p class="mb-2">
                        Establishment :  <strong class="color-theme ">' . $row['estab_name'] . '</strong><br>
                        Category :  <strong class="color-theme ">' . $row['food_category'] . '</strong><br>
                        Price :  <strong class="color-theme mb-2 ">  ₱ ' . $row['price'] . '</strong>
                    </p>
                 
                </div>
              

               
                <img src="images/empty.png" data-src="images/establishment/' . $row['image'] . '" width="115" class="bg-highlight  rounded-m mt-3 shadow-xl preload-img">
            </div>
            <!-- follow buttons-->
            <div class="content">
                <div class="row mb-0 float-left">
                    
                      <a href="#" onclick="edit_food' . $row['id'] . '()" data-menu="edit_food" class="float-right mr-2 ml-3 btn btn-s bg-blue2-dark rounded-xl shadow-xl text-uppercase     mt-2"><i class="  fa fa-edit"></i></a>
                   
                     
                       <a href="#" onclick="del' . $row['id'] . '()" data-menu="del-confirm" class="float-right mr-4 btn btn-s bg-red2-dark rounded-xl shadow-xl text-uppercase     mt-2"><i class="  fa fa-trash"></i></a>
                     
                </div>
            </div>
        </div>



             <script> 
            function edit_food' . $row['id'] . '() {
                document.getElementById("food_name").value = "' . $row['food_name'] . '";
                document.getElementById("food_price").value = "' . $row['price'] . '";
                document.getElementById("e_id").value = "' . $row['estab_id'] . '";
     
 
                }
            </script>



              <script> 
            function del' . $row['id'] . '() {
                document.getElementById("estab_id2").value = "' . $row['estab_id'] . '";
                
     
 
                }
            </script>

   ';
                }
            } else {
                echo "";
            }

            ?>








        </div>


    </div>
    <!-- end of page content-->












    <!---------------->
    <!---------------->
    <!--Menu Confirm delete-->
    <!---------------->
    <!---------------->
    <div id="del-confirm" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="200" data-menu-effect="menu-over">
        <h2 class="text-center font-700 mt-3 pt-1">Are you sure?</h2>
        <p class="boxed-text-l">
            Delete this food on menu.<br>Please Confirm

        <form style="display: none;" method="get" action="edit_food.php">
            <input name="estab_id" type="text" id="estab_id2">
            <button type="submit" name="dele" id="a4">select</button>

        </form>

        </p>
        <div class="row mr-3 ml-3">
            <div class="col-6">
                <a href="#" onclick="del()" class=" btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Accept</a>
            </div>
            <div class="col-6">
                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">REJECT</a>
            </div>
        </div>
    </div>










    <script>
        function del() {
            document.getElementById('a4').click();
        }
    </script>





    <!---------------->
    <!---------------->
    <!--Menu Edit -->
    <!---------------->
    <!---------------->
    <div id="menu-edit" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="370" data-menu-effect="menu-over">
        <div class="content mb-0">
            <h1 class="font-700 mb-0">Update User info</h1>
            <p class="font-11  mt-n1 mb-0">
                Edit User information below
            </p>
            <form method="post" action="profile.php">
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-user font-11"></i>
                    <span>Fullname</span>
                    <em>(required)</em>
                    <input type="name" name="fullname" placeholder="Fullname">
                </div>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-at"></i>
                    <span>Email</span>
                    <em>(required)</em>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-lock font-11"></i>
                    <span>Contact #.</span>
                    <em>(required)</em>
                    <input type="name" name="phone" placeholder="Contact #.">
                </div>

                <a href="#" onclick="up()" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-blue2-dark mt-4">Save</a>
                <button type="submit" id="upd" style="display:none;" name="update" class="btn btn-primary"><i class="fa fa-upload color-success"></i> Update Now</button>
            </form>

            <script>
                function up() {
                    $("#upd").click();

                }
            </script>

            </form>
        </div>
    </div>





    <!---------------->
    <!---------------->
    <!--Menu Sign Up-->
    <!---------------->
    <!---------------->

    <div id="add_estab" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="95%" data-menu-effect="menu-over">
        <div class="content mb-0">
            <div id="toast-1" class="toast toast-tiny toast-top bg-blue2-dark" data-delay="300000" data-autohide="true"><i class="fa fa-sync fa-spin mr-3"></i>Processing...</div>
            <h1 class="font-700 mb-0">Register</h1>
            <p class="font-11  mt-n1 mb-1">
                Request of establishment registration? Register below.
            </p>




            <form action="profile.php" method="post" enctype="multipart/form-data">
                <h3 class="font-700 color-blue2-dark  mb-2">Upload image</h3>
                <input name="file" id="file" required type="file" />
                <input type="hidden" name="owner_id" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" name="owner_fullname" value="<?php echo $_SESSION['fullname']; ?>">
                <input type="hidden" name="owner_email" value="<?php echo $_SESSION['email']; ?>">
                <input type="hidden" name="owner_phone" value="<?php echo $phone; ?>">
                <br>
                <div class="input-style mt-2 has-icon input-style-1 input-required">
                    <i class="input-icon fa  fa-info-circle color-blue2-dark "></i>
                    <span>Name of Establishment</span>
                    <em>(required)</em>
                    <input type="name" name="name" id="name2" required placeholder="Name of Establishment">
                </div>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-info-circle color-blue2-dark"></i>
                    <span>Description</span>
                    <em>(required)</em>
                    <input type="name" name="establishment_description" required placeholder="Description">
                </div>

                <style>
                    #map {
                        height: 200px;
                        width: 100%;
                    }
                </style>
                <h3 class="font-700 color-blue2-dark mt-0  mb-2">Map Address Location</h3>
                <input style="display:none;" type="text" id="la" name="lat" value="14.598253721915198"> <input style="display:none;" type="text" id="lo" name="lng" value="121.01262904665623">

                <div id="map"></div>

                <div class="input-style input-style-1 input-required">
                    <span>Category</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" required name="category">
                        <option disabled selected>Select Category</option>
                        <option value="Fast Food">Fast Food</option>
                        <option value="Family Style Restaurant">Family Style Restaurant</option>
                        <option value="Food Park">Food Park</option>
                        <option value="Cafe">Cafe</option>
                    </select>
                </div>



                <div class="input-style input-style-1 input-required">
                    <span>Type of cuisine</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" required name="cuisine_type">
                        <option disabled selected>Select Cuisine Type</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Italian">Italian</option>
                        <option value="Korean">Korean</option>
                        <option value="Japanese">Japanese</option>
                    </select>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-info-circle color-blue2-dark"></i>
                    <span>Tags</span>
                    <em>(required)</em>
                    <input type="name" name="tags" required placeholder="Search hints, food, place etc.">
                </div>

                <h3 class="font-700 color-blue2-dark mt-4 mb-2">Upload Business Permit</h3>
                <input name="file2" multiple required type="file" />


                <a href="#" data-toast="toast-1" onclick="success();" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-blue2-dark float-bottom mb-3  mt-3">Register</a>
                <button type="submit" id="request" style="display:none;" name="upload" class="btn btn-primary"><i class="fa fa-upload color-success"></i> Upload Now</button>
            </form>

            <script>
                function success() {
                    $("#request").click();

                }
            </script>




        </div>
    </div>


    <!---------------->
    <!---------------->
    <!--add food-->
    <!---------------->
    <!---------------->
    <div id="edit_food" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="420" data-menu-effect="menu-over">
        <div class="content mb-0">
            <div id="toast-1" class="toast toast-tiny toast-top bg-blue2-dark" data-delay="300000" data-autohide="true"><i class="fa fa-sync fa-spin mr-3"></i>Processing...</div>
            <h1 class="font-700 mb-0">Update Food</h1>
            <p class="font-11  mt-n1 mb-0">
                Update Food Info
            </p>
            <form action="edit_food.php" method="post" enctype="multipart/form-data">
                <h3 class="font-700 color-blue2-dark mt-1 mb-1">Food image</h3>
                <input name="file3" multiple required type="file" />
                <input name="estab_name" type="hidden" id="selected_estab">
                <input name="estab_id" type="hidden" id="selected_estab_id">
                <div class="input-style has-icon input-style-1 mt-2 input-required">
                    <i class="input-icon fa fa-info font-11"></i>
                    <span>Food Name</span>
                    <em>(required)</em>
                    <input type="name" name="food_name" id="food_name" placeholder="Food Name">
                </div>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-info font-11"></i>
                    <span>Food Price</span>
                    <em>(required)</em>
                    <input type="name" name="food_price" id="food_price" placeholder="Food Price">
                </div>
                <div class="input-style input-style-2 input-required">
                    <span>Food Category</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" name="food_category">
                        <option value="Appetizer">Appetizer</option>
                        <option value="Main Dish">Main Dish</option>
                        <option value="Side Dish">Side Dish</option>
                        <option value="Drink">Drink</option>
                        <option value="Dessert">Dessert</option>
                    </select>
                </div>
                <input style="display:none;" type="text" name="estab_id" id="e_id">
                <a href="#" style="display:none;" data-toast="toast-1" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-blue2-dark float-bottom  mt-5">toast</a>
                <button type="submit" name="edit_food" onclick="food_addr();" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-green1-dark mt-4">Add Food Menu</a>
        </div>
        </form>
    </div>

    <script>
        function food_addr() {
            $("#ff").click();

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



        function initMap() {
            /**
             *Passing the value of variable received from text box
             **/


            var surigao = {
                lat: latitude,
                lng: longitude

            }
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

                styles: [{
                        "featureType": "poi",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [{
                            "visibility": "off"
                        }]

                    }
                ]



            });



            var marker = new google.maps.Marker({

                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: surigao,
                icon: {
                    labelOrigin: new google.maps.Point(9, 45),
                    url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                }


            });


            var marker2 = new google.maps.Marker({

                icon: {
                    labelOrigin: new google.maps.Point(9, 45),
                    url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',


                },

                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                position: surigao2,
                label: {
                    text: 'Mcdo',

                    fontWeight: 'bold'

                }
            });


            google.maps.event.addListener(marker, 'dragend', function(marker) {
                document.getElementById("la").value = this.getPosition().lat();
                document.getElementById("lo").value = this.getPosition().lng();
            });


            google.maps.event.addListener(marker, 'dragend', function(marker) {
                document.getElementById("mylocation1").value = this.getPosition().lat();
                document.getElementById("mylocation2").value = this.getPosition().lng();
            });

            google.maps.event.addListener(marker2, 'dragend', function(marker) {
                document.getElementById("la2").value = this.getPosition().lat();
                document.getElementById("lo2").value = this.getPosition().lng();
            });





        }
    </script>


    <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="menu-main.php" data-menu-active="nav-pages" data-menu-effect="menu-over">
    </div>




    </div>


    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>