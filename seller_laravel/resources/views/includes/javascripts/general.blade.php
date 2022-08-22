<script>
    //Get States of a country
    function getStates(country_id, state_id)
    {
        var country = document.getElementById(country_id).value;
        var select = document.getElementById(state_id);

        KTApp.blockPage({
            state: 'primary',
            size: 'lg',
            message: 'Processing...',
            overlayColor: 'black',
            opacity: 0.5,
        });

        $('#'+state_id+' option:not(:first)').remove();
        $.ajax({
            type: "GET",
            url: '{{ config("app.api_user_manager_url") }}/get-states',
            headers: {
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
            },
            data: {
                'filters':[
                    {
                        'logic':'AND',
                        'column':'country_id',
                        'value':country
                    }
                ],
            },
            success: function (data) {
                for(var i = 0; i < data.data.length; i++) {
                    var state_name = data.data[i].name;
                    var state_id = data.data[i].id;
                    var el = document.createElement("option");
                    el.textContent = state_name;
                    el.value = state_id;
                    select.appendChild(el);
                }
            },
        }).done(function(data){
            KTApp.unblockPage();
        });
    }

    //Get LGAa of a state
    function getLGAs(state_id, lga_id)
    {
        var state = document.getElementById(state_id).value;
        var select = document.getElementById(lga_id);

        KTApp.blockPage({
            state: 'primary',
            size: 'lg',
            message: 'Processing...',
            overlayColor: 'black',
            opacity: 0.5,
        });

        $('#'+lga_id+' option:not(:first)').remove();
        $.ajax({
            type: "GET",
            url: '{{ config("app.api_user_manager_url") }}/get-lgas',
            headers: {
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
            },
            data: {
                'filters':[
                    {
                        'logic':'AND',
                        'column':'state_id',
                        'value':state
                    }
                ],
            },
            success: function (data) {
                for(var i = 0; i < data.data.length; i++) {
                    var lga_name = data.data[i].name;
                    var lga_id = data.data[i].id;
                    var el = document.createElement("option");
                    el.textContent = lga_name;
                    el.value = lga_id;
                    select.appendChild(el);
                }
            },
        }).done(function(data){
            KTApp.unblockPage();
        });
    }

    //Get Wards of a LGA
    function getWards(lga_id, ward_id)
    {
        var lga = document.getElementById(lga_id).value;
        var select = document.getElementById(ward_id);

        KTApp.blockPage({
            state: 'primary',
            size: 'lg',
            message: 'Processing...',
            overlayColor: 'black',
            opacity: 0.5,
        });

        $('#'+ward_id+' option:not(:first)').remove();
        $.ajax({
            type: "GET",
            url: '{{ config("app.api_user_manager_url") }}/get-wards',
            headers: {
                'Accept':'application/json',
                'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
            },
            data: {
                'filters':[
                    {
                        'logic':'AND',
                        'column':'lga_id',
                        'value':lga
                    }
                ],
            },
            success: function (data) {
                for(var i = 0; i < data.data.length; i++) {
                    var ward_name = data.data[i].name;
                    var ward_id = data.data[i].id;
                    var el = document.createElement("option");
                    el.textContent = ward_name;
                    el.value = ward_id;
                    select.appendChild(el);
                }
            },
        }).done(function(data){
            KTApp.unblockPage();
        });
    }

    //COnfirm if phone number exists
    function confirmPhoneNumber(prefix, phone_number)
    {
        var prefix_1 = document.getElementById(prefix).value;
        var phone_number_1 = document.getElementById(phone_number).value;
        document.getElementById("showPhoneNumberErr").style.display = 'none';

        if (phone_number_1 !== ''){
            KTApp.blockPage({
                state: 'primary',
                size: 'lg',
                message: 'Checking if phone number already exist...',
                overlayColor: 'black',
                opacity: 0.5,
            });

            $.ajax({
                type: "POST",
                url: '{{ config("app.api_auth_url") }}/phone-check',
                headers: {
                    'Accept':'application/json',
                    'Client-Id':'{{ \App\Services\TokenService::getClientID() }}',
                },
                data: {
                    'country_prefix':prefix_1,
                    'phone_number':phone_number_1
                },
                success: function (data) {
                    if(data.status && data.status === 200 && data.message === true){
                        toastr.error('Oops! Phone number ('+prefix_1+''+phone_number_1+') already exist!');
                        document.getElementById("showPhoneNumberErr").innerHTML = 'Oops! Phone number ('+prefix_1+''+phone_number_1+') already exist!';
                        document.getElementById("showPhoneNumberErr").style.display = 'block';
                        document.getElementById(phone_number).value = '';
                    }
                },
            }).done(function(data){
                KTApp.unblockPage();
            });
        }

    }

    // Class Initialization
    jQuery(document).ready(function() {
        document.getElementById("showPhoneNumberErr").style.display = 'none';
    });
</script>
