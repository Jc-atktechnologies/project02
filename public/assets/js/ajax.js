// $(document).ready(function () {
//     google.maps.event.addEventListener(window, 'load', initialize);
//  });
//  function initialize() {
//     const input = document.getElementById("loss_location");

// const autocomplete = new google.maps.places.Autocomplete(input, options);
   
// }

google.maps.event.addDomListener(window, 'load', function() {
    var places = new google.maps.places.Autocomplete(document
            .getElementById('loss_location'));
    google.maps.event.addListener(places, 'place_changed', function() {
        var place = places.getPlace();
        var address = place.formatted_address;
        var  value = address.split(",");
        console.log(value);
        // count=value.length;
        // country=value[count-1];
        // state=value[count-2];
        // city=value[count-3];
        // var z=state.split(" ");
        // document.getElementById("selCountry").text = country;
        // var i =z.length;
        // document.getElementById("pstate").value = z[1];
        // if(i>2)
        // document.getElementById("pzcode").value = z[2];
        // document.getElementById("pCity").value = city;
        // var latitude = place.geometry.location.lat();
        // var longitude = place.geometry.location.lng();
        // var mesg = address;
        // document.getElementById("txtPlaces").value = mesg;
        // var lati = latitude;
        // document.getElementById("plati").value = lati;
        // var longi = longitude;
        // document.getElementById("plongi").value = longi;            
    });
});

function ToggleAssignTo(val)
{
    let target_area = document.getElementById('assign');
    $.ajax({
        type: "GET",
        url: '/ajax_assign_to/'+val,
        success: function (reponse) {
            console.log(reponse.form_field);
            if(reponse.status==1){
                target_area.style.display='block';
                target_area.innerHTML = reponse.form_field;
            }else{
                target_area.style.display='none';
                target_area.innerHTML = reponse.form_field;
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
