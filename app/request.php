 <?php 
  
include 'database.php';
 
    $location = "images/establishment/";
    $file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
    $file_name = $_FILES["file"]["name"]; // Get uploaded file name
    $file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
    $file_size = $_FILES["file"]["size"]; // Get uploaded file size

 
        $sql = "INSERT INTO `establishment` (`image`)
                VALUES ('$file_name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($file_temp, $location . $file_name);
            echo '';
      
        } else {
            echo "<script>alert('Try Again! Something wong went.')</script>";
        }
  
 

?>