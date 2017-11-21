$(document).ready(function(){
        $('#rua').on('change', function() {        
            $( "input#cep" ).prop( "disabled", false );
        });
        
        $('#cep').on('change', function() {
            $( "input" ).prop( "disabled", false ); //Disable
            var rua = $('#rua').val();
            var cep = $(this).val();
            cep.replace(/[^0-9]/g, '');
            cep = cep.substring(0, 5) + '-' + cep.substring(5, 8);
            rua = rua.replace(' ','');
            $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+ rua + "," + cep + "&key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag", function(result){
                console.log(result);
                $('#latitude').val(result.results[0].geometry.location.lat);
                $('#longitude').val(result.results[0].geometry.location.lng);
                $('#complet').val(result.results[0].formatted_address);

            });
        });
            function myTimer() {
                $("#cep").focusout(function(){
                    alert($("#cep").val());
                });
            }
    });