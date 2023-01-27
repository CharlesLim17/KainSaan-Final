 <?php
function getDistance($addressFrom, $addressTo, $unit = ''){
    // Google API key
    $apiKey = 'AIzaSyATtRSRV4bWCpLdXQxjkvgALpewmlp2Kjo';
    
    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);
    
    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if(!empty($outputFrom->error_message)){
        return $outputFrom->error_message;
    }
    
    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if(!empty($outputTo->error_message)){
        return $outputTo->error_message;
    }
    
    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;
    
    // Convert unit and return distance
    $unit = strtoupper($unit);
    if($unit == "K"){
        return round($miles * 1.609344, 2);
    }elseif($unit == "M"){
        return round($miles * 1609.344, 2).' meters';
    }else{
        return round($miles, 2).' miles';
    }
}




include "database.php";
include "dbconfig.php";


 $distance_filter = ''.$_GET['filter'].'';
$sql = "SELECT  * FROM establishment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


$distance_filter = ''.$_GET['distance'].'';

$addressFrom= ''.$_GET['lat'].', '.$_GET['lng'].'';
$lati = $_GET['lat'];
$long = $_GET['lng'];
$addressTo = ''.$row['locator'].'';

$id = $row['id'];
$distance  = getDistance($addressFrom, $addressTo, "K");
 

echo '<div style="display:none;" > estab name : '.$row['name'].'   <br>
      distance : '.$distance.' <br>
      estab id : '.$id.' <br>

        
     <script>
            window.location="filter.php?distance='.$distance_filter.'&lat='.$lati.'&lng='.$long.'"
            </script> 
    </div>

   


';

 






$sql = "UPDATE establishment SET distance='".$distance."' WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {

} else {

}



$distance_filter = ''.$_GET['filter'].'';

 



  }
} else {
 
}
 
 







?>





 


 