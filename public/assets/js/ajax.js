// function for addres and prefill data for insurer
function initialize() {
   
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        let check_postal_code =0;
        for (var i = 0; i < place.address_components.length; i++) {
            for (var j = 0; j < place.address_components[i].types.length; j++) {
                if (place.address_components[i].types[j] == "postal_code") {
                    check_postal_code=1;
                    document.getElementById('zipcode').value = place.address_components[i].long_name;
                }
                if(place.address_components[i].types[j]=='country'){
                    document.getElementById('country').value=place.address_components[i].long_name
                }
                if(place.address_components[i].types[j]=='locality' || place.address_components[i].types[j]=='administrative_area_level_3')
                {
                    document.getElementById('city').value = place.address_components[i].long_name;
                }
                if(place.address_components[i].types[j]=='administrative_area_level_1')
                {
                    document.getElementById('state').value = place.address_components[i].long_name;
                }
               
            }
          }
          if(check_postal_code==0){
            document.getElementById('zipcode').value='';
          }
    });
   
  }
//   claim assign method related functionality
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


// get Insurer Detail and show on modal 
function GetInsurerDetail(id)
    {
        $.ajax({
                type: "GET",
                url: '/insurer-detail/'+id,
                success: function (response) {
                    document.getElementById('output').innerHTML= response.view;
                    $('#OpenInsureDetail').modal('show');
                },
               error: function (data) {
                    console.log('Error:', data);
                }
            });
                
    }