<?php
include "dbconfig.php";
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
    <title>Food Spot - Advance Search</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
            <a href="food_spot.php?fix=no" class="active-nav"><i class="fa fa-map-marker-alt"></i><span>Food Spots</span></a>
            <a href="#"><i class="fa fa-map"></i><span>Nearby</span></a>
            <a href="notif.php"><i class="fa fa-bell"></i><span>notification</span>
                <div id="noti_number"></div>
            </a>
            <a href="#" data-menu="menu-main"><i class="fa fa-cog"></i><span>Settings</span></a>

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
        <div class="page-content">

            <div class="page-title page-title-small">
                <h2><a href="index.php?fix=no"><i class="fa fa-arrow-left"></i></a>Food Spot</h2>
                <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
            </div>

            <script>
                function categ() {
                    $("#saved-to-favorites").hide();

                }
            </script>

            <div class="content">
                <button data-menu="menu-signin" onclick="categ()" class="btn btn-3d btn-s btn-full mb-2 rounded-xs text-uppercase font-900 shadow-s  border-blue1-dark bg-blue1-dark"><i class="fa fa-plus"></i> Add Filter</button>
                <div class="search-box bg-theme rounded-m shadow-xl bottom-0">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <i class="fa fa-search"></i>
                    <input type="text" class="border-0" id="control" placeholder="Search By Category, Cuisine, Address, etc." data-search>

                </div>
            </div>

            <script>
                // Bind keyup event on the input
                $('#control').keyup(function() {

                    // If value is not empty
                    if ($(this).val().length == 0) {
                        // Hide the element
                        $('.show_hide').show();
                    } else {
                        // Otherwise show it
                        $('.show_hide').hide();
                    }
                }).keyup(); // Trigger the keyup event, thus running the handler on page load
            </script>
            <div class="search-results  disabled-search-list">
                <!-- search   start!-->

                <?php
                error_reporting(E_ALL ^ E_NOTICE);
                include "database.php";
                $category = $_GET['category'];
                $cuisine = $_GET['cuisine'];
                $price = $_GET['price'];
                $ratings = $_GET['ratings'];

                $sql = "SELECT   * FROM establishment where status = '1' and  category ='$category' or status = '1' and  cuisine_type ='$cuisine' or status = '1' and average_price <= '$price' or ratings <= '$ratings'   ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $data = strtolower($row['tags']);
                        $data2 = strtolower($row['name']);




                        $rate = "";


                        $star = $row['ratings'];



                        if ($star == 1) {


                            $rate = '  <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i> ';
                        }




                        if ($star == 2) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i><i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }



                        if ($star == 3) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                 <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }


                        if ($star == 4) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                 <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }


                        if ($star == 5) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                 <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }







                        echo '



<div class="card card-style"  data-filter-item data-filter-name="' . $data . ' ' . $data2 . '">
            
            <div class="card bg-' . $row['id'] . '" data-card-height="250">
<style>
     .bg-' . $row['id'] . '{background-image:url(./images/establishment/' . $row['image'] . ')}
 </style>


                <div class="card-bottom pb-4 pl-3">
                    <h1 class="font-26">' . $row['name'] . '</h1>
                </div>
                
                <div class="card-bottom pb-4 pr-3">
                    <h1 class="font-30 text-right mb-3">₱ ' . $row['average_price'] . '<sup class="font-400 font-17 opacity-50">.00</sup></h1>
                    <span class="badge bg-highlight color-white px-2 py-1 mt-n1 text-uppercase d-block float-right">Average Price</span>
                </div>
                
                <div class="card-overlay bg-gradient-fade rounded-0"></div>
            </div>
            
            
            <div class="content mt-n2">
                
                <div class="row">
                    <div class="col-6">
                        <p class="line-height-m">
                            ' . $row['establishment_description'] . '
                        </p>
                    </div>
                    <div class="col-3">
                        <div>
                            <p class="font-10 mb-n2">Category</p>
                            <p class="font-12 color-theme font-700">' . $row['category'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Cuisine</p>
                            <p class="font-12 color-theme font-700">' . $row['cuisine_type'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Views</p>
                            <p class="font-12 color-theme font-700">' . $row['view'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Favorites</p>
                            <p class="font-12 color-theme font-700">' . $row['favorites_count'] . '</p>
                        </div>



                    </div>

                    <div class="col-3">
                      
                        <div>
                            <p class="font-10 mb-n2">Parking information</p>
                            <p class="font-12 color-theme font-700">' . $row['pi'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Visits</p>
                            <p class="font-12 color-theme font-700">' . $row['visit'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Reviews</p>
                            <p class="font-12 color-theme font-700">' . $row['reviews'] . '</p>
                        </div>

                    </div>

                </div>
                
                
                <div class="divider mt-4 mb-2"></div>
                
                <div class="d-flex">
                    <div>
                        <p class="mb-n1 font-10">Ratings</p>
                         <h6 class="float-left">' . $row['ratings'] . '</h6>
                         ' . $rate . '
                    </div>
                    <div class="ml-auto">
                        <a id="heart2' . $row['id'] . '" data-toast="saved-to-favorites" class="icon icon-s mt-2 mr-2 rounded-m bg-red2-dark color-white" href="#"><i class="fa fa-heart"></i></a>
                        <a data-menu="menu-share" class="icon icon-s mt-2 rounded-m bg-highlight color-white" href="#"><i class="fa fa-share-alt"></i></a>
            <a  href="review.php?name=' . $row['name'] . '&clean=no" class="icon icon-s   rounded-m bg-highlight color-white" ><i class="fa fa-comment-alt"></i></a>
                    </div>
                </div>
                
                 
            </div>
        </div>




       <input type="hidden" id="user_id' . $_SESSION['id'] . '" name="user_id' . $_SESSION['id'] . '" value="' . $_SESSION['id'] . '">
        <input type="hidden" id="estab_id' . $row['id'] . '" name="estab_id' . $row['id'] . '" value="' . $row['id'] . '">
        <input type="hidden" id="estab_name' . $row['id'] . '" name="estab_name' . $row['id'] . '" value="' . $row['name'] . '">
        <input type="hidden" id="image' . $row['id'] . '"image' . $row['id'] . '" value="' . $row['image'] . '">
        <input type="hidden" id="ratings' . $row['id'] . '"ratings' . $row['id'] . '" value="' . $row['ratings'] . '">
        <input type="hidden" id="address' . $row['id'] . '"address' . $row['id'] . '" value="' . $row['address'] . '">
         
 
 
  
<script>
        $(document).ready(function(){
            $("#heart2' . $row['id'] . '").click(function(){
            $("#saved-to-favorites").show();
           
                var user_id=$("#user_id' . $_SESSION['id'] . '").val();
                var estab_id=$("#estab_id' . $row['id'] . '").val();
                var estab_name=$("#estab_name' . $row['id'] . '").val();
                var image=$("#image' . $row['id'] . '").val();
                var ratings=$("#ratings' . $row['id'] . '").val();
                var address=$("#address' . $row['id'] . '").val();
                

                $.ajax({
                    url:"add_fav.php",
                    method:"POST",
                    data:{
                         
                        address:address,
                        estab_id:estab_id,
                        estab_name:estab_name,
                        ratings:ratings,
                        image:image,
                        user_id:user_id
                        
                    },
                   success:function(data){
                      document.getElementById("success_heart").click();

                   }
                });
            });
        });
    </script>





    ';
                    }
                } else {
                    echo "No Establishment Found";
                }

                ?>





                <!-- end search!-->
            </div>


            <!-- search   start!-->
            <div id="mar" class="show_hide">


                <?php
                include "database.php";
                error_reporting(E_ALL ^ E_NOTICE);

                $category = $_GET['category'];
                $cuisine = $_GET['cuisine'];
                $price = $_GET['price'];
                $distance = $_GET['distance'];

                $sql = "SELECT    * FROM establishment where status = '1' and  category ='$category' or status = '1' and  cuisine_type ='$cuisine' or status = '1' and average_price <= '$price' or ratings <= '$ratings' order by ratings DESC   ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {




                        $rate = "";


                        $star = $row['ratings'];



                        if ($star == 1) {


                            $rate = '  <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i> ';
                        }




                        if ($star == 2) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i><i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }



                        if ($star == 3) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                 <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }


                        if ($star == 4) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                 <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }


                        if ($star == 5) {


                            $rate = '   <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                 <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>
                <i class="float-left color-yellow1-dark pt-1 pl-2 fa fa-star"></i>';
                        }






                        echo '



<div class="card card-style"   >
            
            <div class="card bg-' . $row['id'] . '" data-card-height="250">
<style>
     .bg-' . $row['id'] . '{background-image:url(./images/establishment/' . $row['image'] . ')}
 </style>


                <div class="card-bottom pb-4 pl-3">
                    <h1 class="font-26">' . $row['name'] . '</h1>
                </div>
                
                <div class="card-bottom pb-4 pr-3">
                    <h1 class="font-30 text-right mb-3">₱ ' . $row['average_price'] . '<sup class="font-400 font-17 opacity-50">.00</sup></h1>
                    <span class="badge bg-highlight color-white px-2 py-1 mt-n1 text-uppercase d-block float-right">Average Price</span>
                </div>
                
                <div class="card-overlay bg-gradient-fade rounded-0"></div>
            </div>
            
            
            <div class="content mt-n2">
                
                <div class="row">
                    <div class="col-6">
                        <p class="line-height-m">
                            ' . $row['establishment_description'] . '
                        </p>
                    </div>
                    <div class="col-3">
                        <div>
                            <p class="font-10 mb-n2">Category</p>
                            <p class="font-12 color-theme font-700">' . $row['category'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Cuisine</p>
                            <p class="font-12 color-theme font-700">' . $row['cuisine_type'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Views</p>
                            <p class="font-12 color-theme font-700">' . $row['view'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Favorites</p>
                            <p class="font-12 color-theme font-700">' . $row['favorites_count'] . '</p>
                        </div>



                    </div>

                    <div class="col-3">
                      
                        <div>
                            <p class="font-10 mb-n2">Parking information</p>
                            <p class="font-12 color-theme font-700">' . $row['pi'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Visits</p>
                            <p class="font-12 color-theme font-700">' . $row['visit'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Reviews</p>
                            <p class="font-12 color-theme font-700">' . $row['reviews'] . '</p>
                        </div>

                    </div>

                </div>
                
                
                <div class="divider mt-4 mb-2"></div>
                
                <div class="d-flex">
                    <div>
                        <p class="mb-n1 font-10">Ratings</p>
                        <h6 class="float-left">' . $row['ratings'] . '</h6>
                         ' . $rate . '
                    </div>
                    <div class="ml-auto">
                        <a id="heart' . $row['id'] . '" data-toast="saved-to-favorites" class="icon icon-s mt-2 mr-2 rounded-m bg-red2-dark color-white" href="#"><i class="fa fa-heart"></i></a>
                        <a data-menu="menu-share" class="icon icon-s mt-2 rounded-m bg-highlight color-white" href="#"><i class="fa fa-share-alt"></i></a>
            <a  href="review.php?name=' . $row['name'] . '&clean=no" class="icon icon-s   rounded-m bg-highlight color-white" ><i class="fa fa-comment-alt"></i></a>
                    </div>
                </div>
                
                 
            </div>
        </div>




 
        <input type="hidden" id="user_id' . $_SESSION['id'] . '" name="user_id' . $_SESSION['id'] . '" value="' . $_SESSION['id'] . '">
        <input type="hidden" id="estab_id' . $row['id'] . '" name="estab_id' . $row['id'] . '" value="' . $row['id'] . '">
        <input type="hidden" id="estab_name' . $row['name'] . '" name="estab_name' . $row['name'] . '" value="' . $row['name'] . '">
         <input type="hidden" id="image' . $row['id'] . '"image' . $row['id'] . '" value="' . $row['image'] . '">
         <input type="hidden" id="ratings' . $row['id'] . '"ratings' . $row['id'] . '" value="' . $row['ratings'] . '">
         <input type="hidden" id="address' . $row['id'] . '"address' . $row['id'] . '" value="' . $row['address'] . '">
         
 
 
  
<script>
        $(document).ready(function(){
            $("#heart' . $row['id'] . '").click(function(){
            
           $("#saved-to-favorites").show();
                var user_id=$("#user_id' . $_SESSION['id'] . '").val();
                var estab_id=$("#estab_id' . $row['id'] . '").val();
                var estab_name=$("#estab_name' . $row['id'] . '").val();
                var image=$("#image' . $row['id'] . '").val();
                var ratings=$("#ratings' . $row['id'] . '").val();
                var address=$("#address' . $row['id'] . '").val();

                $.ajax({
                    url:"add_fav.php",
                    method:"POST",
                    data:{
                         
                        estab_id:estab_id,
                        address:address,
                        ratings:ratings,
                        image:image,
                        estab_name:estab_name,
                        user_id:user_id
                        
                    },
                   success:function(data){
                      document.getElementById("success_heart").click();

                   }
                });
            });
        });
    </script>





    ';
                    }
                } else {
                    echo "&nbsp; No Establishment Found";
                }

                ?>

            </div>


            <!-- end search!-->

            <div class="card header-card shape-rounded" data-card-height="200">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>

            </div>



        </div>









        <script>
            function apply() {
                $("#submit").click();

            }
        </script>





        <a id="success_heart" style="display:none;" class="icon icon-s mt-2 mr-2 rounded-m bg-red2-dark color-white" href="#" data-toast="saved-to-favorites"><i class="fa fa-heart"></i></a>




    </div>

    </div>
    <!-- end of page content-->



















    <!------------------>
    <div id="menu-signin" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="420" data-menu-effect="menu-over">
        <div class="content mb-0">
            <h1 class="font-700 mb-0">Category</h1>
            <p class="font-11  mt-n1 mb-2">
                Advance Search by Category
            </p>
            <form method="get" action="food_spot_advance.php">
                <div class="input-style input-style-2 input-required">
                    <span>Category</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" name="category">
                        <option disabled selected>Select Category</option>
                        <option value="Fast Food">Fast Food</option>
                        <option value="Family Style Restaurant">Family Style Restaurant</option>
                        <option value="Food Park">Food Park</option>
                        <option value="Cafe">Cafe</option>
                    </select>
                </div>

                <div class="input-style input-style-2 input-required">
                    <span>Cuisine Type</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" name="cuisine">
                        <option disabled selected>Select Cuisine Type</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Italian">Italian</option>
                        <option value="Korean">Korean</option>
                        <option value="Japanese">Japanese</option>
                    </select>
                </div>

                <div class="input-style input-style-2 input-required">
                    <span>Price Range</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" name='price'>
                        <option disabled selected>Select Price Range</option>
                        <option value="100">1 - 100</option>
                        <option value="500">100 - 500</option>
                        <option value="1000">500 - 1000</option>
                        <option value="2000">1000 - 2000</option>
                        <option value="5000">2000 - 5000</option>
                    </select>
                </div>


                <div class="input-style input-style-2 input-required">
                    <span>Ratings</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select class="form-control" name='ratings'>
                        <option disabled selected>Select Ratings</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <button style="display:none;" type="submit" value="Apply_Changes" name="submit" id="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green1-dark text-uppercase font-900">aaa</button>
                <a href="#" onclick="apply()" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-green1-dark mt-4">Apply Changes</a>
            </form>
        </div>
    </div>





    <!------------------>

    <div id="saved-to-favorites" class="snackbar-toast bg-red2-dark color-white" data-delay="3000" data-autohide="true"><i class="fa fa-heart mr-3"></i>Added to your Favorites</div>
    <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-share.html" data-menu-height="420" data-menu-effect="menu-over">
    </div>


    <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="menu-main.php" data-menu-active="nav-pages" data-menu-effect="menu-over">
    </div>



    </div>


    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>