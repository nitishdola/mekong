function GoogleGeocode() {
  geocoder = new google.maps.Geocoder();
  this.geocode = function(address, callbackFunction) {
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          var result = {};
          result.latitude = results[0].geometry.location.lat();
          result.longitude = results[0].geometry.location.lng();
          callbackFunction(result);
        } else {
          //alert("Geocode was not successful for the following reason: " + status);
          callbackFunction(null);
        }
      });
  };
}

//Process form input
$(function() {
  $("#txtCompanyAddrCountry").change(function(e){
 //alert("sadhana");
    //Stop the form submission
    e.preventDefault();
    //Get the user input and use it
    var userinput = $('#txtCompanyAddrCountry').val();
    if (userinput == "")
      {
       document.getElementById('lati').value="";
		  document.getElementById('longi').value="";
		 document.getElementById('prolati').value="";
		  document.getElementById('prolongi').value=""; 
        return false;
      }
      
      var g = new GoogleGeocode();
      var address = userinput;
      g.geocode(address, function(data) {
        if(data != null) {
          olat = data.latitude;
          olng = data.longitude;
		  document.getElementById('lati').value=olat;
		  document.getElementById('longi').value=olng;

        } else {
          //Unable to geocode
          alert('ERROR! Unable to geocode address');
        }
      });

  });
});