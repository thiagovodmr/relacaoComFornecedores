$(document).ready(function(){
        $('#numero').on('change', function() {
                var numero = $(this).val();
                var rua = $("#rua").val();
                var cidade = $("#cidade").val();
                var uf = $("#uf").val();
                rua = rua.replace(' ','+');
                $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+ rua + "+" 
                    +  numero + "," + cidade + "-"+ uf +"&key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag", function(result){
                $('#latitude').val(result.results[0].geometry.location.lat);
                $('#longitude').val(result.results[0].geometry.location.lng);
                $('#complet').val(result.results[0].formatted_address);

            });
        });
        
        $('#cep').on('change', function() {
            $( "input" ).prop( "disabled", false ); //Disable
        });
});