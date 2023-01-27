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

    <title> Previously Visited</title>

    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">

    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">

    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">

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



                <div id="noti_number"></div>









            </a>

            <a href="#" data-menu="menu-main" class="active-nav"><i class="fa fa-cog"></i><span>Settings</span></a>



        </div>


        <script type="text/javascript">
            function nearby() {
                window.location = "nearby/nearby.php";
            }
        </script>

        <div class="page-content">

            <div class="page-title page-title-small">

                <h2><a href="index.php?fix=no"><i class="fa fa-arrow-left"></i></a>Previously Visited</h2>

                <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/user.png"></a>

            </div>

            <div class="card header-card shape-rounded" data-card-height="150">

                <div class="card-overlay bg-highlight opacity-95"></div>

                <div class="card-overlay dark-mode-tint"></div>

                <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>

            </div>







            <div class="card card-style">

                <div class="content">

                    <h3 class="font-700">Establishment Lists</h3>

                    <p>

                        Previously Visited Establishment

                    </p>

                </div>







                <?php



                $sql = "SELECT * FROM visit where user_id = '" . $_SESSION['id'] . "' ";

                $result = $conn->query($sql);



                if ($result->num_rows > 0) {

                    // output data of each row

                    while ($row = $result->fetch_assoc()) {







                        $currentDateTime2 = $row["time"];

                        $newDateTime2 = date('h:i A', strtotime($currentDateTime2));





                        echo '



 <div class="accordion" id="accordion-' . $row['id'] . '">

                <div class="mb-0  ">

                    <button class="btn accordion-btn border-0 font-15" data-toggle="collapse" data-target="#collapse' . $row['id'] . '">

                        <i class="fa fa-walking color-blue2-dark mr-2"></i>



                        ' . $row['estab_name'] . '

                        <i class="fa fa-arrow-right font-10 accordion-icon"></i>

                    </button>

                    <div id="collapse' . $row['id'] . '" class="collapse" data-parent="#accordion-' . $row['id'] . '">

                        <div class="pt-1 pb-2 pl-3 pr-3">

 

                <div class="divider mt-1 mb-3"></div>

                <div class="row mb-0">

                    <div class="col-4">

                        <p class="color-theme font-700">Date</p>

                    </div>

                    <div class="col-8">

                        <p class="font-400">' . $row['months'] . ' ' . $row['date'] . ', ' . $row['years'] . '</p>

                    </div>

                    

                    

                    

                    <div class="col-4">

                        <p class="color-theme font-700">time</p>

                    </div>

                    <div class="col-8">

                        <p class="font-400">' . $newDateTime2 . '</p>

                    </div>

                </div>

                             







                        </div>

                    </div>

                </div>

            </div>





    ';
                    }
                } else {
                }



                ?>













                <!-- end of page accordion-->







            </div>



















        </div>

        <!-- end of page content-->









        <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="menu-main.php" data-menu-active="nav-features" data-menu-effect="menu-over">

        </div>





    </div>





    <script type="text/javascript" src="scripts/jquery.js"></script>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>

    <script type="text/javascript" src="scripts/custom.js"></script>

</body>