<?php
include "dbconfig.php";
$_SESSION['fullname'];
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
  <title>Food Spot</title>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
  <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
  <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
      <a href="#" onclick="nearby()"><i class="fa fa-map"></i><span>Nearby</span></a>
      <a href="notif.php"><i class="fa fa-bell"></i><span>notification</span>
        <div id="noti_number2"></div>
      </a>
      <a href="#" data-menu="menu-main"><i class="fa fa-cog"></i><span>Settings</span></a>

      <script type="text/javascript">
        function nearby() {
          window.location = "nearby/nearby.php";
        }
      </script>
    </div>
    <script type="text/javascript">
      function loadDoc() {


        setInterval(function() {

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("noti_number2").innerHTML = this.responseText;
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
        <h2><a href="index.php?fix=no"><i class="fa fa-arrow-left"></i></a><?php echo $_GET['name']; ?></h2>
        <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>
      </div>


      <?php
      $clean = $_GET['clean'];
      $name = $_GET['name'];
      if ($clean == "no") {



        include "database.php";

        $fullname = $_SESSION['fullname'];

        $sql = "INSERT INTO view (fullname, name, view)
VALUES ('$fullname', '$name', '1')";

        if ($conn->query($sql) === TRUE) {
          echo "New view  successfully added";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();


        echo '<script type="text/javascript">
window.location.replace("review.php?name=' . $name . '&clean=Yes");
</script>
 ';
      }
      ?>



      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from reviews where name_estab='$name' ";
      if ($result = mysqli_query($conn, $sql)) {
        $rowcount2 = mysqli_num_rows($result);
      }

      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from view where name='$name' ";
      if ($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
      }

      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from visit where estab_name='$name' ";
      if ($result = mysqli_query($conn, $sql)) {
        $rowcount3 = mysqli_num_rows($result);
      }

      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT DISTINCT * from my_favorites where estab_name='$name' ";
      if ($result = mysqli_query($conn, $sql)) {
        $rowcount4 = mysqli_num_rows($result);
      }

      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "UPDATE establishment SET view='$rowcount', reviews='$rowcount2', visit='$rowcount3', favorites='$rowcount4' WHERE name='$name'";

      if (mysqli_query($conn, $sql)) {
      } else {
      }


      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "UPDATE establishment SET ratings='1'  WHERE name='$name'";

      if (mysqli_query($conn, $sql)) {
      } else {
      }


      ?>




      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from reviews where name_estab='$name' and ratings = 1 ";
      if ($result = mysqli_query($conn, $sql)) {

        $rate1 = mysqli_num_rows($result);
      }

      ?>



      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from reviews where name_estab='$name' and ratings = 2 ";
      if ($result = mysqli_query($conn, $sql)) {

        $rate2 = mysqli_num_rows($result);
      }

      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from reviews where name_estab='$name' and ratings = 3 ";
      if ($result = mysqli_query($conn, $sql)) {

        $rate3 = mysqli_num_rows($result);
      }

      ?>



      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from reviews where name_estab='$name' and ratings = 4 ";
      if ($result = mysqli_query($conn, $sql)) {

        $rate4 = mysqli_num_rows($result);
      }

      ?>


      <?php
      include "database.php";
      $name = $_GET['name'];
      $sql = "SELECT * from reviews where name_estab='$name' and ratings = 5 ";
      if ($result = mysqli_query($conn, $sql)) {

        $rate5 = mysqli_num_rows($result);
      }

      ?>
      <script type="text/javascript">
        $(document).ready(function() {

          document.getElementById('ate').click();



        });
      </script>
      <div style="display: none;">
        <p>1 STAR &nbsp; <input type="number" name="one" id="one" value="<?php echo  $rate1; ?>"></p>
        <p>2 STARS <input type="number" name="two" id="two" value="<?php echo  $rate2; ?>"></p>
        <p>3 STARS <input type="number" name="three" id="three" value="<?php echo  $rate3; ?>"></p>
        <p>4 STARS <input type="number" name="four" id="four" value="<?php echo  $rate4; ?>"></p>
        <p>5 STARS <input type="number" name="five" id="five" value="<?php echo  $rate5; ?>"></p>
        <button id="ate" onclick="Calculate()">Calculate average</button>
        <button style="display:none;" onclick="Clear()">Reset</button>
        <h2 id="resultTitle">Average Stars: <span style="font-weight:normal"></span></h2>

      </div>








      <?php
      $name = $_GET['name'];
      include "database.php";
      $sql = "SELECT DISTINCT * FROM establishment where name='$name' ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {


          echo '
<script> 

function Calculate(){

  var oneStar = +document.getElementById("one").value;
  var twoStar = +document.getElementById("two").value;
  var threeStar = +document.getElementById("three").value;
  var fourStar = +document.getElementById("four").value;
  var fiveStar = +document.getElementById("five").value;

  var oneTotal = oneStar * 1;
  var twoTotal = twoStar * 2;
  var threeTotal = threeStar *3
  var fourTotal = fourStar * 4;
  var fiveTotal = fiveStar * 5;

  var totalClicks = (oneStar + twoStar + threeStar + fourStar + fiveStar);
  var totalStars = (oneTotal + twoTotal + threeTotal + fourTotal + fiveTotal);
  var avgStars = (totalStars/totalClicks);
  
  avgStars = avgStars.toPrecision(3);
  
  if(avgStars.toString().split(".")[1]==0)
    avgStars = Number(avgStars).toPrecision(1);

  var stars = "&#9733;";
  document.getElementById("resultTitle").style.display = "block";
  document.getElementById("roundp").style.display = "block";
  document.getElementById("avg").innerHTML = avgStars;
  document.getElementById("ratings2").value = avgStars;
  
  for(var i = 0 ;i<(Math.round(avgStars))-1;i++)
  {
    stars=stars+" &#9733;";
  }
  document.getElementById("round").innerHTML = stars;
}

function Clear(){
  document.getElementById("one").value=0;
  document.getElementById("two").value=87;
  document.getElementById("three").value=43;
  document.getElementById("four").value=55;
  document.getElementById("five").value=34;
  document.getElementById("avg").innerHTML = "";
  document.getElementById("round").innerHTML = "";
  document.getElementById("resultTitle").style.display = "none";
  document.getElementById("roundp").style.display = "none";
}


</script>

';

          echo '

<style>
     .bg-' . $row['id'] . '{background-image:url(./images/establishment/' . $row['image'] . ')}
 </style>

            <div class="card card-style">
            <div class="card bg-' . $row['id'] . '" data-card-height="400"   >



                <div class="card-bottom pb-4 pl-3">
                    <h1 class="font-26">' . $row['name'] . '</h1>
                </div>
                
                <div class="card-bottom pb-4 pr-3">
                    <h1 class="font-30 text-right mb-3">₱ ' . $row['average_price'] . '<sup class="font-400 font-17 opacity-50">.00</sup></h1>
                    <span class="badge bg-highlight color-white px-2 py-1 mt-n1 text-uppercase d-block float-right">Average Price</span>
                </div>
                
                <div class="card-overlay bg-gradient-fade rounded-0"></div>
            </div>
            
            <input type="hidden" name="user_id" id="user_id" value="' . $row['id'] . '"  placeholder="id">
            <input type="hidden" name="name_estab" id="name_estab" value="' . $row['name'] . '"  placeholder="id">


            <div class="content mt-n2">
                
                <div class="row">
                    <div class="col-6">
                        <p class="line-height-m color-black font-15">
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
                            <p class="font-12 color-theme font-700">' . $rowcount . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Favorites</p>
                            <p class="font-12 color-theme font-700">' . $rowcount4 . '</p>
                        </div>



                    </div>

                    <div class="col-3">
                        <div>
                            <p class="font-10 mb-n2">Average Price</p>
                            <p class="font-12 color-theme font-700">₱ ' . $row['average_price'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Parking information</p>
                            <p class="font-12 color-theme font-700">' . $row['pi'] . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Visits</p>
                            <p class="font-12 color-theme font-700">' . $rowcount3 . '</p>
                        </div>
                        <div>
                            <p class="font-10 mb-n2">Reviews</p>
                            <p class="font-12 color-theme font-700">' . $rowcount2 . '</p>
                        </div>

                    </div>

                </div>
                
              
                <div class="divider mt-4 mb-2"></div>
                
                <div class="d-flex">
                    <div>
                        <p class="mb-n1 font-10">Ratings</p>
                        <h6 class="float-left" id="avg" > </h6>
                      <input type="hidden" name="total_ratings" id="ratings2">
                      <input type="hidden" name="estab_name" id="ratings3" value="' . $name . '">
                           <p id="roundp"   > &nbsp; <span class="font-20" id="round" style="color:gold;"></span></p>
                    </div>
                    <div class="ml-auto">
                        <a  href="#" data-menu="id_menu" class="icon icon-s mt-2  rounded-m bg-yellow1-light color-white" ><i class="fa fa-utensils"></i></a>
                        <a class="icon  icon-s mt-2  rounded-m bg-red2-dark color-white" href="#"><i class="fa fa-heart"></i></a>
                        <a  onclick="get_direction()" class="icon icon-s mt-2 rounded-m bg-primary color-white" href="#"><i class="fas fa-directions"></i></a>
                    </div>
<script src="nearby/js/main.js"></script>


                    <form style="display:none;" method="get" action="nearby/index.php">
   <input type="text" name="direction" value="' . $row['lat'] . ', ' . $row['lng'] . '"> 

            

               
            
            
               <button   type="submit" onclick="calcRoute();"  name="submit" id="get_directions" class="btn btn-m btn-full rounded-sm shadow-l bg-green1-dark text-uppercase font-900">Get Directions</button>  
          <input  type="text" id="mylocation01"  name="lat" value="14.598253721915198"> <input  type="text"  id="mylocation02"  name="lng" value="121.01262904665623"><br>
            </form>
             
      
<script>
function get_direction() {
  document.getElementById("get_directions").click();
}
</script>

        





    ';
        }
      } else {
        echo "0 results";
      }

      ?>





      <script type="text/javascript">
        window.onload = function() {

          document.getElementById('get_location').click();

        }
      </script>

      <button style="display: none;" id="get_location" onclick="getLocation()">Get my location</button>
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
          document.getElementById("mylocation01").value = position.coords.latitude;
          document.getElementById("mylocation02").value = position.coords.longitude;

        }
      </script>


      <!-- Comment Section start -->
    </div>
    <div class="divider mt-4 mb-2"></div>
    <h3>Reviews</h3>
    <p>
      Sharing feedback from our customers is always makes us happy.
    </p>
  </div>

  <div class="divider divider-margins"></div>




  <!--review section start -->


  <div id="noti_number"></div>





  <!--review section end -->


  <script type="text/javascript">
    function loadDoc() {


      setInterval(function() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("noti_number").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "data.php?name_estab=<?php echo $_GET['name']; ?>", true);
        xhttp.send();

      }, 1000);


    }
    loadDoc();
  </script>




  <div class="content mt-0">

    <div class="row mb-0">
      <div class="col-10">




        <div class="input-style input-style-1 input-required">
          <span>Food</span>
          <em><i class="fa fa-angle-down"></i></em>
          <select class="form-control" id="food" name="food" required>

            <?php
            $name = $_GET['name'];
            include "database.php";
            $sql = "SELECT * FROM food  where estab_name='$name' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo '          
                        <option value="₱' . $row['price'] . ' &nbsp;' . $row['food_name'] . '">  ₱' . $row['price'] . ' &nbsp;' . $row['food_name'] . '</option>

    ';
              }
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>


          </select>
        </div>








        <div class="input-style has-icon input-style-1 input-required">
          <span>Ratings</span>
          <em><i class="fa fa-angle-down"></i></em>
          <select class="form-control" id="ratings" name="ratings" required>

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected>5</option>
          </select>
        </div>

        <div class="input-style has-icon input-style-1  ">
          <i class="input-icon fa fa-user font-11"></i>


          <input type="name" name="review" id="review" placeholder="Write Reviews">
        </div>


      </div>

      <div>
        <button type="submit" id="button" onclick="show()" class="btn bg-success btn-m rounded-sm text-uppercase font-900"> <i class="fa fa-comment "></i></button>
      </div>


    </div>




    <input type="hidden" name="years" id="years" placeholder="years">
    <input type="hidden" name="fullname" id="fullname" value="<?php echo $_SESSION['fullname']; ?>" placeholder="fullname">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']; ?>" placeholder="id">
    <input type="hidden" name="months" id="months" placeholder="months">
    <input type="hidden" name="time" id="time" placeholder="time">
    <input type="hidden" name="date" id="date" placeholder="date">


    <script src="jquery.min.js"></script>


    <script>
      function show() {
        setTimeout(function() {
          document.getElementById("review").value = '';


        }, 10);


      }
    </script>

    <a href="#" style="display:none;" id="toggle" data-toast="snackbar-2">
      <i class="fa font-14 fa-check color-green1-dark"></i>
      <span>success</span>
      <i class="fa fa-angle-right"></i>
    </a>

    <script>
      $(document).ready(function() {
        $("#button").click(function() {


          var user_id = $("#user_id").val();
          var name_estab = $("#name_estab").val();
          var food = $("#food").val();
          var review = $("#review").val();
          var ratings = $("#ratings").val();
          var fullname = $("#fullname").val();
          var years = $("#years").val();
          var months = $("#months").val();
          var time = $("#time").val();
          var date = $("#date").val();


          $.ajax({
            url: 'insert_review.php',
            method: 'POST',
            data: {

              name_estab: name_estab,
              review: review,
              ratings: ratings,
              food: food,
              user_id: user_id,

              fullname: fullname,
              years: years,
              months: months,
              time: time,
              date: date

            },
            success: function(data) {
              document.getElementById("toggle").click();

            }
          });
        });
      });
    </script>




    <script>
      $(document).ready(function() {



        var ratings2 = $("#ratings2").val();
        var ratings3 = $("#ratings3").val();


        $.ajax({
          url: 'insert_ratings.php',
          method: 'POST',
          data: {


            ratings2: ratings2,
            ratings3: ratings3

          },
          success: function(data) {


          }
        });

      });
    </script>





  </div>
  </div>


  <!-- Comment Section end -->













  <div class="card header-card shape-rounded" data-card-height="200">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>

  </div>


















  <!-- footer and footer card-->

  </div>
  <!-- end of page content-->
  <div id="id_menu" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="455" data-menu-effect="menu-over">

    <div class="content">
      <h2 class="mb-4">Food Menu</h2>
      <?php
      $name = $_GET['name'];
      include "database.php";
      $sql = "SELECT * FROM food where estab_name='" . $_GET['name'] . "' ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo '
    




            <div class="d-flex mt-2 mb-2">
                <div class="mr-auto">
                    <img src="images/establishment/' . $row['image'] . '" class="rounded-m shadow-xl" width="100">
                 
                </div>
                <div class="ml-auto w-100 pl-3">
                    <h2 class="  font-800 mb-n1  ">' . $row['food_name'] . '</h2>
                    <p class="  font-600  opacity-80 mt-0 mb-n1">' . $row['food_category'] . ' <br>
                <h1 class="font-24 font-700 "> ₱ ' . $row['price'] . '</h1>   

                    </p>
                    <div class="clearfix"></div>
                    
                </div>
            </div>




         
     
    
    ';
        }
      } else {
        echo "0 results";
      }

      ?>


      <div class="divider mt-3 mb-4"></div>
      <a href="#" class="btn close-menu btn-m btn-full rounded-m shadow-xl mb-3 bg-highlight font-700 text-uppercase bg-highlight">Close</a>
    </div>
  </div>


  <div id="snackbar-2" class="snackbar-toast bg-green1-dark" data-delay="3000" data-autohide="true"><i class="fa fa-check mr-3"></i>We appreciate the time you took to share your feedback</div>

  <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-share.html" data-menu-height="420" data-menu-effect="menu-over">
  </div>


  <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="menu-main.php" data-menu-active="nav-pages" data-menu-effect="menu-over">
  </div>
  <script src="nearby/js/main.js"></script>
  <script src="jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var today = new Date();
      var time = $("#time").val(today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds());
      var time = $("#date").val(today.getDate());

      var currentDate = new Date();
      $("#years").val(currentDate.getFullYear());


      var currentMonth;
      switch (currentDate.getMonth()) {

        case 0:
          currentMonth = "Jan";
          break;

        case 1:
          currentMonth = "Feb";
          break;

        case 2:
          currentMonth = "Mar";
          break;

        case 3:
          currentMonth = "Apr";
          break;

        case 4:
          currentMonth = "May";
          break;

        case 5:
          currentMonth = "Jun";
          break;

        case 6:
          currentMonth = "July";
          break;

        case 7:
          currentMonth = "Aug";
          break;

        case 8:
          currentMonth = "Sep";
          break;

        case 9:
          currentMonth = "Oct";
          break;

        case 10:
          currentMonth = "Nov";
          break;

        case 11:
          currentMonth = "Dec";
          break;

      }



      $("#months").val(currentMonth);

    });
  </script>

  </div>


  <script type="text/javascript" src="scripts/jquery.js"></script>
  <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
  <script type="text/javascript" src="scripts/custom.js"></script>
</body>