<?php
include "database.php";
$name_estab=$_GET['name_estab'];

$sql = "SELECT * FROM reviews where name_estab='$name_estab'   order by id ASC   ";
$result = $conn->query($sql);
 
 
if ($result->num_rows  ) {


    // output data of each row
    while($row = $result->fetch_assoc()) {
         

$currentDateTime = $row["time"];
 
$newDateTime = date('h:i A', strtotime($currentDateTime));


    $star ='';

    $user_ratings = $row["ratings"];

    if($user_ratings == '5'){

        $star =' <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>';
    }


if($user_ratings == '4'){

        $star ='  
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>';
    }


    if($user_ratings == '3'){

        $star ='  
                         
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>';
    }

if($user_ratings == '2'){

        $star ='  
                         
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>';
    }


    if($user_ratings == '1'){

        $star ='  
                         
                        <i class="float-right color-yellow1-dark  fa fa-star"></i>';
    }



     echo  '
    <div class="content mt-0">
            <h1 class="mb-n2 font-15 font-700">' . $row["fullname"]. ' <i class="fa fa-check-circle color-blue1-dark  mr-2"></i></h1>
           
                <h6  class="float-right font-400 font-10 mt-n3 mr-2  font-700">' . $row["food"]. '<br> 


                    '.$star.'
                       
                </h6>


                <p class="mb-0 font-10">' . $row["months"]. ' ' . $row["date"]. ', ' . $row["years"]. ' - '.$newDateTime.'</p>



                <p class="color-black">' . $row["review"]. '</p>
            </div>
            <div class="divider divider-margins"></div>
 


     '

     ;

    }

} else {

    echo "&nbsp; No Review at this moment";
}
 
$conn->close();

?>


 <?php
include "database.php";
 $name=$_GET['name_estab'];
$sql = "SELECT * from reviews where name_estab='$name' ";
if ($result = mysqli_query($conn, $sql)) {
 $rowcount2 = mysqli_num_rows( $result );

}

 ?>

 
  <?php
include "database.php";
 $name=$_GET['name_estab'];
$sql = "SELECT * from view where name='$name' ";
if ($result = mysqli_query($conn, $sql)) {
 $rowcount = mysqli_num_rows( $result );

}
 
 ?>

 



<?php
include "database.php";
$name =$_GET['name_estab'];
$sql = "UPDATE establishment SET view='$rowcount', reviews='$rowcount2' WHERE name='$name'";

if (mysqli_query($conn, $sql)) {
 
} else {
 
}

mysqli_close($conn);
?>