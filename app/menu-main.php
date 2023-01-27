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
<div class="menu-header">
    <style>
        img[alt="www.000webhost.com"] {
            display: none
        }

        ;
    </style>
</div>

<div class="menu-logo text-center">
    <a href="#"><img class="rounded-circle bg-highlight" width="80" src="images/avatars/user.png"></a>

    <?php
    $query = "SELECT * FROM user where id='" . $_SESSION['id'] . "'   ";
    $result = select($query);
    while ($r = mysqli_fetch_array($result)) {
        extract($r);
    ?>
        <h1 class="pt-3 font-800 font-28 "><?= $r[1] ?></h1>
    <?php
    }
    ?>




    <p class="font-11 mt-n2">Enjoy <span class="color-highlight">Food</span> in your life.</p>
</div>

<div class="menu-items">
    <h5 class="text-uppercase opacity-20 font-12 pl-3">Menu</h5>

    <a href="fav.php?fix=no">
        <i class="fa fa-heart  "></i>
        <span>Favorites</span>
        <i class="fa fa-circle"></i>
    </a>
    <a href="#" onclick="recent()">
        <i class="fa fa-clock"></i>
        <span>Previously Visited</span>
        <i class="fa fa-circle"></i>
    </a>
    <a href="profile.php?fix=no">
        <i class="fa fa-address-card"></i>
        <span>My Food Establishment</span>
        <i class="fa fa-circle"></i>
    </a>
    <a href="#">
        <i class="fa fa-info-circle"></i>
        <span>About KainSaan</span>
        <i class="fa fa-circle"></i>
    </a>
    <script type="text/javascript">
        function recent() {
            window.location = "recent_visit.php";
        }
    </script>

    <a id="nav-settings" href="logout.php">
        <i class="fa fa-sign-out-alt color-red1-dark"></i>
        <span>Log out</span>
        <i class="fa fa-circle"></i>
    </a>

</div>

<div class="text-center pt-2">


    <p class="mb-0 pt-3 font-10 opacity-30">Copyright <span class="copyright-year"></span> KainSaan. All rights reserved</p>
</div>