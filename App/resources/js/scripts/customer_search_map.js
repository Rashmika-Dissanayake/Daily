
  // initially load map
  function initAutocomplete() {

    getLocation();
   
    //add the current location
   var map = new google.maps.Map(document.getElementById('map'), {
   center: {lat:parseFloat(localStorage.getItem('lat')),lng:parseFloat(localStorage.getItem('lng'))},
   zoom: 10,
   mapTypeId: 'roadmap'
    });
    
   
   // Create the search box and link it to the UI element.
   var input = document.getElementById('pac-input');
   if(input==null){

     input=document.createElement('input');
     input.setAttribute('type','text');
     input.setAttribute('id','pac-input');
     input.setAttribute('class','controls');
     input.setAttribute('placeholder','Search Location');
     input.setAttribute('name','pac-input');

   }

   var searchBox = new google.maps.places.SearchBox(input);

   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

   // Bias the SearchBox results towards current map's viewport.
   map.addListener('bounds_changed', function() {
     searchBox.setBounds(map.getBounds());
   });

   //mark the current location
   var myLatLng={lat:parseFloat(localStorage.getItem('lat')),lng:parseFloat(localStorage.getItem('lng'))};
   var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Your Location',
    animation: google.maps.Animation.BOUNCE,
         });

   var markers = [];
   // Listen for the event fired when the user selects a prediction and retrieve
   // more details for that place.
   searchBox.addListener('places_changed', function() {
     var places = searchBox.getPlaces();

     if (places.length == 0) {
       return;
     }

     // Clear out the old markers.
     markers.forEach(function(marker) {
       marker.setMap(null);
     });

     markers = [];

     // For each place, get the icon, name and location.
     var bounds = new google.maps.LatLngBounds();
     places.forEach(function(place) {
       if (!place.geometry) {
         alert("Returned place contains no geometry");
         return;
       }
       var icon = {
         url: place.icon,
         size: new google.maps.Size(71, 71),
         origin: new google.maps.Point(0, 0),
         anchor: new google.maps.Point(17, 34),
         scaledSize: new google.maps.Size(25, 25)
       };

       // Create a marker for each place.
       markers.push(new google.maps.Marker({
         map: map,
         icon: icon,
         title: place.name,
         position: place.geometry.location
       }));

       if (place.geometry.viewport) {
         // Only geocodes have viewport.
         bounds.union(place.geometry.viewport);
       } else {
         bounds.extend(place.geometry.location);
       }
     });
     map.fitBounds(bounds);
   });
 }

//get nearby locations
function nearBy() {

getLocation();

//get the current location
var myLocation= new google.maps.LatLng(parseFloat(localStorage.getItem('lat')),parseFloat(localStorage.getItem('lng')));

map = new google.maps.Map(document.getElementById('map'), {
center:myLocation,
zoom: 15
});

//mark the current location
var marker = new google.maps.Marker({
    position: myLocation,
    map: map,
    title: 'Your Location',
    animation: google.maps.Animation.BOUNCE,
         });

//get nearby locations 500m
var request = {
location: myLocation,
radius: '500',
type: ['political'],

};

service = new google.maps.places.PlacesService(map);
service.nearbySearch(request, callback);
}

//get results
function callback(results, status) {
if (status == google.maps.places.PlacesServiceStatus.OK) {
for (var i = 0; i < results.length; i+=1) {
var place = results[i];
createMarker(place);
}
}
}

//mark nearby locations
function createMarker(place) {
 var marker = new google.maps.Marker({
   map: map,
   position: place.geometry.location
 });
}


function getLocation(){

if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition);

}

else { 
x.innerHTML = "Geolocation is not supported by this browser.";
}

function showPosition(position) {
//   lat.innerHTML =position.coords.latitude;
//   lng.innerHTML =position.coords.longitude;
localStorage.setItem('lat',position.coords.latitude);
localStorage.setItem('lng',position.coords.longitude);
}


}



function check(){

var checkbox=document.getElementById('myCheck');
if(checkbox.checked==true){
 nearBy();
}

else{
 initAutocomplete();
}

}



