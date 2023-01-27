var myLatLng = { lat: 14.598253721915198, lng: 121.01262904665623 };
var mapOptions = {
    center: myLatLng,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
       mapTypeControl: false,
   streetViewControl: false,
   fullscreenControl: false,
   zoomControl: false,
 
    styles: [
      {
        "featureType": "poi",
        "stylers": [
          { "visibility": "off" }
        ]
      },
       {
      "featureType": "transit",
      "stylers":  [
          { "visibility": "off" }
        ]
      
    }
    ]




 
};

 
 


// Hide result box
document.getElementById("output").style.display = "none";

// Create/Init map
var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

// Create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

// Create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

// Bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);


// Define calcRoute function
function calcRoute() {
    //create request
    var request = {
        origin: document.getElementById("location-1").value,
        destination: document.getElementById("location-2").value,
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC
    }

    // Routing
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time  

                $("#output").html(" <button     href='#' class='btn btn-3d btn-xs ml-2 f mt-2 rounded-0 distance   font-900 shadow-s border-blue1-dark bg-blue1-light'><i class='fa fa-road  '></i>  " + result.routes[0].legs[0].distance.text + "</button>  <br>  <button  id='duration'   href='#' class='btn btn-3d btn-xs ml-2 f mt-2 rounded-0  font-900   shadow-s border-blue1-dark bg-blue1-light'><i class='fa fa-clock   '></i> " + result.routes[0].legs[0].duration.text + "</button>  ");
   
            document.getElementById("output").style.display = "block";
              
            //display route
            directionsDisplay.setDirections(result);
        } else {
            //delete route from map
            directionsDisplay.setDirections({ routes: [] });
            //center map in London
            map.setCenter(myLatLng);

            //Show error message           
           
            alert("Can't find road! Please try again!");
            clearRoute();
        }
    });

}

// Clear results

function clearRoute(){
    document.getElementById("output").style.display = "none";
    document.getElementById("location-1").value = "";
    document.getElementById("location-2").value = "";
    directionsDisplay.setDirections({ routes: [] });
    
}


function cad(){
 
    document.getElementById("ca").value = "test";
 
 
 
   
    directionsDisplay.setDirections({ routes: [] });
    
}

// Create autocomplete objects for all inputs

var options = {
    types: ['(cities)']
}


var input1 = document.getElementById("location-1");
var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

var input2 = document.getElementById("location-2");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
