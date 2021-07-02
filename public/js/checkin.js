$(document).ready(function(){
    $("#control-nationality").change(function() { //if nationality is not malaysian, ask for origin country
        if ($(this).val() == "Malaysian Citizen") {
            $('#controlled-origin-state').show();
            $('#controlled-origin-state select').attr('required','');
            $('#controlled-origin-state select').attr('data-error','This field is required');

            $('#controlled-origin-diocese').show();
            $('#controlled-origin-diocese').attr('required', '');
            $('#controlled-origin-diocese').attr('data-error', 'This field is required.');

            $('#controlled-origin-country').hide();
            $('#controlled-origin-country input').removeAttr('required');
            $('#controlled-origin-country input').removeAttr('data-error');
            $('#controlled-origin-country input').val("");
            $('#controlled-origin-country input').attr("value","");

            $('#controlled-origin-diocese2').hide();
            $('#controlled-origin-diocese2').removeAttr('required');
            $('#controlled-origin-diocese2').removeAttr('data-error');
            $('#controlled-origin-diocese2').val("");

            $('#controlled-origin-diocese-sbh').hide();
            $('#controlled-origin-diocese-sbh').removeAttr('required');
            $('#controlled-origin-diocese-sbh').removeAttr('data-error');
            $('#controlled-origin-diocese-sbh').val("");

            $('#controlled-origin-diocese-swk').hide();
            $('#controlled-origin-diocese-swk').removeAttr('required');
            $('#controlled-origin-diocese-swk').removeAttr('data-error');
            $('#controlled-origin-diocese-swk').val("");

        } else {
            
            $('#controlled-origin-country').show();
            $('#controlled-origin-country input').attr('required', '');
            $('#controlled-origin-country input').attr('data-error', 'This field is required.');

            $('#controlled-origin-diocese2').show();
            $('#controlled-origin-diocese2').attr('required', '');
            $('#controlled-origin-diocese2').attr('data-error', 'This field is required.');

            $('#controlled-origin-state').hide();
            $('#controlled-origin-state select').removeAttr('required');
            $('#controlled-origin-state select').removeAttr('data-error');
            $('#controlled-origin-state select').val("");
            

            $('#controlled-origin-diocese').hide();
            $('#controlled-origin-diocese').removeAttr('required');
            $('#controlled-origin-diocese').removeAttr('data-error');
            $('#controlled-origin-diocese').val("");

            $('#controlled-origin-diocese-sbh').hide();
            $('#controlled-origin-diocese-sbh').removeAttr('required');
            $('#controlled-origin-diocese-sbh').removeAttr('data-error');
            $('#controlled-origin-diocese-sbh').val("");

            $('#controlled-origin-diocese-swk').hide();
            $('#controlled-origin-diocese-swk').removeAttr('required');
            $('#controlled-origin-diocese-swk').removeAttr('data-error');
            $('#controlled-origin-diocese-swk').val("");

            

        }
    });
    $("#control-nationality").trigger("change");
      $("#controlled-origin-state select").change(function(){
            
            switch($(this).val()){
                case "Selangor":
                case "Kuala Lumpur":
                case "Putrajaya":
                case "Negeri Sembilan":
                case "Terengganu":
                case "Pahang": 
                    $('#controlled-origin-diocese').show();
                    $('#controlled-origin-diocese').attr('required', '');
                    $('#controlled-origin-diocese').attr('data-error', 'This field is required.');
                    $('#controlled-origin-diocese').val("Keuskupan Agung Kuala Lumpur"); 
                    $('#controlled-origin-diocese').attr("value","Keuskupan Agung Kuala Lumpur"); 
                    $("#controlled-origin-diocese").trigger("change");

                    $('#controlled-origin-diocese2').hide();
                    $('#controlled-origin-diocese2').removeAttr('required');
                    $('#controlled-origin-diocese2').removeAttr('data-error');
                    $('#controlled-origin-diocese2').val("");
                    
                    $('#controlled-origin-diocese-swk').hide();
                    $('#controlled-origin-diocese-swk').removeAttr('required');
                    $('#controlled-origin-diocese-swk').removeAttr('data-error');
                    $('#controlled-origin-diocese-swk').val("");

                    $('#controlled-origin-diocese-sbh').hide();
                    $('#controlled-origin-diocese-sbh').removeAttr('required');
                    $('#controlled-origin-diocese-sbh').removeAttr('data-error');
                    $('#controlled-origin-diocese-sbh').val("");

                    $("#controlled-origin-diocese").trigger("change");
                    break;

                case "Kelantan":
                case "Pulau Pinang":
                case "Kedah":
                case "Perak":
                case "Perlis": 
                $('#controlled-origin-diocese').show();
                    $('#controlled-origin-diocese').attr('required', '');
                    $('#controlled-origin-diocese').attr('data-error', 'This field is required.');
                    $('#controlled-origin-diocese').val("Keuskupan Pinang"); 
                    $('#controlled-origin-diocese').attr("value","Keuskupan Pinang"); 
                    $("#controlled-origin-diocese").trigger("change");

                    $('#controlled-origin-diocese2').hide();
                    $('#controlled-origin-diocese2').removeAttr('required');
                    $('#controlled-origin-diocese2').removeAttr('data-error');
                    $('#controlled-origin-diocese2').val("");
                    
                    $('#controlled-origin-diocese-swk').hide();
                    $('#controlled-origin-diocese-swk').removeAttr('required');
                    $('#controlled-origin-diocese-swk').removeAttr('data-error');
                    $('#controlled-origin-diocese-swk').val("");

                    $('#controlled-origin-diocese-sbh').hide();
                    $('#controlled-origin-diocese-sbh').removeAttr('required');
                    $('#controlled-origin-diocese-sbh').removeAttr('data-error');
                    $('#controlled-origin-diocese-sbh').val("");

                    $("#controlled-origin-diocese").trigger("change");
                    break;

                case "Melaka":
                case "Johor": 
                    $('#controlled-origin-diocese').show();
                    $('#controlled-origin-diocese').attr('required', '');
                    $('#controlled-origin-diocese').attr('data-error', 'This field is required.');
                    $('#controlled-origin-diocese').val("Keuskupan Melaka Johor"); 
                    $('#controlled-origin-diocese').attr("value","Keuskupan Melaka Johor"); 

                    $('#controlled-origin-diocese2').hide();
                    $('#controlled-origin-diocese2').removeAttr('required');
                    $('#controlled-origin-diocese2').removeAttr('data-error');
                    $('#controlled-origin-diocese2').val("");

                    $('#controlled-origin-diocese-swk').hide();
                    $('#controlled-origin-diocese-swk').removeAttr('required');
                    $('#controlled-origin-diocese-swk').removeAttr('data-error');
                    $('#controlled-origin-diocese-swk').val("");

                    $('#controlled-origin-diocese-sbh').hide();
                    $('#controlled-origin-diocese-sbh').removeAttr('required');
                    $('#controlled-origin-diocese-sbh').removeAttr('data-error');
                    $('#controlled-origin-diocese-sbh').val("");

                    $("#controlled-origin-diocese").trigger("change");
                    break;
                case "Labuan":
                    $('#controlled-origin-diocese').show();
                    $('#controlled-origin-diocese').attr('required', '');
                    $('#controlled-origin-diocese').attr('data-error', 'This field is required.');
                    $('#controlled-origin-diocese').val("Keuskupan Agung Kota Kinabalu"); 
                    $('#controlled-origin-diocese').attr("value","Keuskupan Agung Kota Kinabalu");
    
                    $('#controlled-origin-diocese2').hide();
                    $('#controlled-origin-diocese2').removeAttr('required');
                    $('#controlled-origin-diocese2').removeAttr('data-error');
                    $('#controlled-origin-diocese2').val("");

                    $('#controlled-origin-diocese-swk').hide();
                    $('#controlled-origin-diocese-swk').removeAttr('required');
                    $('#controlled-origin-diocese-swk').removeAttr('data-error');
                    $('#controlled-origin-diocese-swk').val("");

                    $('#controlled-origin-diocese-sbh').hide();
                    $('#controlled-origin-diocese-sbh').removeAttr('required');
                    $('#controlled-origin-diocese-sbh').removeAttr('data-error');
                    $('#controlled-origin-diocese-sbh').val("");

                    $("#controlled-origin-diocese").trigger("change");
                    break;
                case "Sabah":
                    $('#controlled-origin-diocese').hide();
                    $('#controlled-origin-diocese').removeAttr('required');
                    $('#controlled-origin-diocese').removeAttr('data-error');
                    $('#controlled-origin-diocese').val("");

                    $('#controlled-origin-diocese2').hide();
                    $('#controlled-origin-diocese2').removeAttr('required');
                    $('#controlled-origin-diocese2').removeAttr('data-error');
                    $('#controlled-origin-diocese2').val("");

                    $('#controlled-origin-diocese-swk').hide();
                    $('#controlled-origin-diocese-swk').removeAttr('required');
                    $('#controlled-origin-diocese-swk').removeAttr('data-error');
                    $('#controlled-origin-diocese-swk').val("");

                    $('#controlled-origin-diocese-sbh').show();
                    $('#controlled-origin-diocese-sbh').attr('required','');
                    $('#controlled-origin-diocese-sbh').attr('data-error','This field is required');
                    $("#controlled-origin-diocese").trigger("change");
                    break;

                case "Sarawak":
                    $('#controlled-origin-diocese').hide();
                    $('#controlled-origin-diocese').removeAttr('required');
                    $('#controlled-origin-diocese').removeAttr('data-error');
                    $('#controlled-origin-diocese').val("");

                    $('#controlled-origin-diocese2').hide();
                    $('#controlled-origin-diocese2').removeAttr('required');
                    $('#controlled-origin-diocese2').removeAttr('data-error');
                    $('#controlled-origin-diocese2').val("");

                    $('#controlled-origin-diocese-sbh').hide();
                    $('#controlled-origin-diocese-sbh').removeAttr('required');
                    $('#controlled-origin-diocese-sbh').removeAttr('data-error');
                    $('#controlled-origin-diocese-sbh').val("");

                    $('#controlled-origin-diocese-swk').show();
                    $('#controlled-origin-diocese-swk').attr('required','');
                    $('#controlled-origin-diocese-swk').attr('data-error','This field is required');
                    $("#controlled-origin-diocese").trigger("change");
                    break;
          }
      });
      $("#controlled-origin-state select").trigger("change");
    $("#controlled-origin-diocese").change(function() { //if controlled-origin-diocese is KL, ask for select parish
        if ($(this).val() == "Keuskupan Agung Kuala Lumpur") {
            $('#controlled-origin-parish2').hide();
            $('#controlled-origin-parish2').removeAttr('required');
            $('#controlled-origin-parish2').removeAttr('data-error');
            $('#controlled-origin-parish2').val("");
            
            $('#controlled-origin-parish').show();
            $('#controlled-origin-parish').attr('required', '');
            $('#controlled-origin-parish').attr('data-error', 'This field is required.');

        } else {
            
            $('#controlled-origin-parish2').show();
            $('#controlled-origin-parish2').attr('required', '');
            $('#controlled-origin-parish2').attr('data-error', 'This field is required.');

            $('#controlled-origin-parish').hide();
            $('#controlled-origin-parish').removeAttr('required');
            $('#controlled-origin-parish').removeAttr('data-error');
            $('#controlled-origin-parish').val("");

        }
    });
    $("#controlled-origin-diocese").trigger("change");

    $("#control-migrate-country").change(function() { //if migrate country is Malaysia is KL, ask for select state, and diocese
        if ($(this).val() == "Malaysia") {
            
            
            $('#controlled-migrate-diocese').show();
            $('#controlled-migrate-diocese select').attr('required', '');
            $('#controlled-migrate-diocese select').attr('data-error', 'This field is required.');

            $('#controlled-migrate-state').show();
            $('#controlled-migrate-state select').attr('required', '');
            $('#controlled-migrate-state select').attr('data-error', 'This field is required.');

        } else {

            $('#controlled-migrate-diocese').hide();
            $('#controlled-migrate-diocese select').removeAttr('required');
            $('#controlled-migrate-diocese select').removeAttr('data-error');
            $('#controlled-migrate-diocese select').val("");

            $('#controlled-migrate-state').hide();
            $('#controlled-migrate-state input').removeAttr('required');
            $('#controlled-migrate-state input').removeAttr('data-error');
            $('#controlled-migrate-state input').val("");

        }
    });
    $("#control-migrate-country").trigger("change");

    $("#controlled-migrate-state select").change(function(){
            
        switch($(this).val()){
            case "Selangor":
            case "Kuala Lumpur":
            case "Putrajaya":
            case "Negeri Sembilan":
            case "Terengganu":
            case "Pahang": 
                $('#controlled-migrate-diocese input').show();
                $('#controlled-migrate-diocese input').attr('required', '');
                $('#controlled-migrate-diocese input').attr('data-error', 'This field is required.');
                $('#controlled-migrate-diocese input').val("Keuskupan Agung Kuala Lumpur"); 
                $('#controlled-migrate-diocese input').attr("value","Keuskupan Agung Kuala Lumpur"); 
                $("#controlled-migrate-diocese input").trigger("change");
                
                $('#controlled-migrate-diocese-swk').hide();
                $('#controlled-migrate-diocese-swk').removeAttr('required');
                $('#controlled-migrate-diocese-swk').removeAttr('data-error');
                $('#controlled-migrate-diocese-swk').val("");

                $('#controlled-migrate-diocese-sbh').hide();
                $('#controlled-migrate-diocese-sbh').removeAttr('required');
                $('#controlled-migrate-diocese-sbh').removeAttr('data-error');
                $('#controlled-migrate-diocese-sbh').val("");

                $("#controlled-migrate-diocese input").trigger("change");
                break;

            case "Kelantan":
            case "Pulau Pinang":
            case "Kedah":
            case "Perak":
            case "Perlis": 
                $('#controlled-migrate-diocese input').show();
                $('#controlled-migrate-diocese input').attr('required', '');
                $('#controlled-migrate-diocese input').attr('data-error', 'This field is required.');
                $('#controlled-migrate-diocese input').val("Keuskupan Pinang"); 
                $('#controlled-migrate-diocese input').attr("value","Keuskupan Pinang"); 
                $("#controlled-migrate-diocese input").trigger("change");

                $('#controlled-migrate-diocese-swk').hide();
                $('#controlled-migrate-diocese-swk').removeAttr('required');
                $('#controlled-migrate-diocese-swk').removeAttr('data-error');
                $('#controlled-migrate-diocese-swk').val("");

                $('#controlled-migrate-diocese-sbh').hide();
                $('#controlled-migrate-diocese-sbh').removeAttr('required');
                $('#controlled-migrate-diocese-sbh').removeAttr('data-error');
                $('#controlled-migrate-diocese-sbh').val("");

                $("#controlled-migrate-diocese input").trigger("change");
                break;

            case "Melaka":
            case "Johor": 
                $('#controlled-migrate-diocese input').show();
                $('#controlled-migrate-diocese input').attr('required', '');
                $('#controlled-migrate-diocese input').attr('data-error', 'This field is required.');
                $('#controlled-migrate-diocese input').val("Keuskupan Melaka Johor"); 
                $('#controlled-migrate-diocese input').attr("value","Keuskupan Melaka Johor"); 

                $('#controlled-migrate-diocese-swk').hide();
                $('#controlled-migrate-diocese-swk').removeAttr('required');
                $('#controlled-migrate-diocese-swk').removeAttr('data-error');
                $('#controlled-migrate-diocese-swk').val("");

                $('#controlled-migrate-diocese-sbh').hide();
                $('#controlled-migrate-diocese-sbh').removeAttr('required');
                $('#controlled-migrate-diocese-sbh').removeAttr('data-error');
                $('#controlled-migrate-diocese-sbh').val("");

                $("#controlled-migrate-diocese input").trigger("change");
                break;
            
            case "Labuan":
                $('#controlled-migrate-diocese input').show();
                $('#controlled-migrate-diocese input').attr('required', '');
                $('#controlled-migrate-diocese input').attr('data-error', 'This field is required.');
                $('#controlled-migrate-diocese input').val("Keuskupan Agung Kota Kinabalu"); 
                $('#controlled-migrate-diocese input').attr("value","Keuskupan Agung Kota Kinabalu"); 

                $('#controlled-migrate-diocese-swk').hide();
                $('#controlled-migrate-diocese-swk').removeAttr('required');
                $('#controlled-migrate-diocese-swk').removeAttr('data-error');
                $('#controlled-migrate-diocese-swk').val("");

                $('#controlled-migrate-diocese-sbh').hide();
                $('#controlled-migrate-diocese-sbh').removeAttr('required');
                $('#controlled-migrate-diocese-sbh').removeAttr('data-error');
                $('#controlled-migrate-diocese-sbh').val("");

                $("#controlled-migrate-diocese input").trigger("change");
                break;

            case "Sabah":
                $('#controlled-migrate-diocese input').hide();
                $('#controlled-migrate-diocese input').removeAttr('required');
                $('#controlled-migrate-diocese input').removeAttr('data-error');
                $('#controlled-migrate-diocese input').val("");

                $('#controlled-migrate-diocese-swk').hide();
                $('#controlled-migrate-diocese-swk').removeAttr('required');
                $('#controlled-migrate-diocese-swk').removeAttr('data-error');
                $('#controlled-migrate-diocese-swk').val("");

                $('#controlled-migrate-diocese-sbh').show();
                $('#controlled-migrate-diocese-sbh').attr('required','');
                $('#controlled-migrate-diocese-sbh').attr('data-error','This field is required');
                $("#controlled-migrate-diocese").trigger("change");
                break;

            case "Sarawak":
                $('#controlled-migrate-diocese input').hide();
                $('#controlled-migrate-diocese input').removeAttr('required');
                $('#controlled-migrate-diocese input').removeAttr('data-error');
                $('#controlled-migrate-diocese input').val("");

                $('#controlled-migrate-diocese-sbh').hide();
                $('#controlled-migrate-diocese-sbh').removeAttr('required');
                $('#controlled-migrate-diocese-sbh').removeAttr('data-error');
                $('#controlled-migrate-diocese-sbh').val("");

                $('#controlled-migrate-diocese-swk').show();
                $('#controlled-migrate-diocese-swk').attr('required','');
                $('#controlled-migrate-diocese-swk').attr('data-error','This field is required');
                $("#controlled-migrate-diocese input").trigger("change");
                break;
      }
  });
  $("#controlled-migrate-state select").trigger("change");

    $("#control-purpose").change(function() { //if migrate country is Malaysia is KL, ask for select diocese
        if ($(this).val() == "Pembelajaran") {
            
            
            $('#controlled-campus-field').show();
            $('#controlled-campus-field input').each(function(){
                $(this).attr('required', '');
                $(this).attr('data-error', 'This field is required.');
            });

            $('#controlled-organisation-occupation').hide();

            $('#controlled-organisation-occupation input').each(function(){
                $(this).removeAttr('required');
                $(this).removeAttr('data-error');
                $(this).val("");
            });


        } else {

            $('#controlled-organisation-occupation').show();
            $('#controlled-organisation-occupation input').each(function(){
                $(this).attr('required', '');
                $(this).attr('data-error', 'This field is required.');
            });

            $('#controlled-campus-field').hide();
            $('#controlled-campus-field input').each(function(){
                $(this).removeAttr('required');
                $(this).removeAttr('data-error');
                $(this).val("");
            });

        }
    });
    $("#control-purpose").trigger("change");
})