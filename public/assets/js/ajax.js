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
// js related to claim
function GetInsuredAddress(){
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        let check_postal_code =0;
        for (var i = 0; i < place.address_components.length; i++) {
            for (var j = 0; j < place.address_components[i].types.length; j++) {
                if (place.address_components[i].types[j] == "postal_code") {
                    check_postal_code=1;
                    document.getElementById('zip_code').value = place.address_components[i].long_name;
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
google.maps.event.addDomListener(window, 'load', GetInsuredAddress);

function GetLossLocation(){
    var input = document.getElementById('loss_location');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        for (var i = 0; i < place.address_components.length; i++) {
            for (var j = 0; j < place.address_components[i].types.length; j++) {

                if(place.address_components[i].types[j]=='country'){
                    document.getElementById('loss_country').value=place.address_components[i].long_name
                }
            }
          }
    });
}

google.maps.event.addDomListener(window,'load',GetLossLocation);
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

// get insurer representative dropdown

function GetInsurerRepresentative(id)
{
    $.ajax({
        type:"GET",
        url:'/ajax-representative-dropdown/'+id,
        success: function(response){
            document.getElementById('representative_id').innerHTML=response.view;
        },
        error:function(error_data) {
            console.log(error_data);
        }
    });
}

// get claim detail information in modal

function GetClaimDetail(id)
{
    if(!id || id==0)
    {
        return alert('please select a claim first');
    }
    $.ajax({
        type:"GET",
        url:'/show-claim-detail/'+id,
        success: function(response){
            console.log(response.view);
            document.getElementById('output').innerHTML=response.view;
            $('#OpenModel').modal('show');
        },
        error:function(error_data) {
            console.log(error_data);
        }
    });
}
