<html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    </head>

    <body>
    <!-- Inicio do formulario -->
      <form method="post" action=".">
        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" disabled="true" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" disabled="true" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" disabled="true" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" disabled="true" /></label><br />
        <label>IBGE:
        <input name="ibge" type="text" id="ibge" size="8" disabled="true" /></label>

        <input name="latitude" type="text" id="latitude" size="8" disabled="true" disabled="true" hidden="true" /></label>
        </label>

        <input name="longitude" type="text" id="longitude" size="8" disabled="true" disabled="true" hidden="true" /></label><br />
        </label>
        <input type="submit" value="Endereçar">
      </form>          

<script>
    $(document).ready(function(){
        $('#cep').on('change', function() {
            var cep = $(this).val();
            cep.replace(/[^0-9]/g, '');
            cep = cep.substring(0, 5) + '-' + cep.substring(5, 8);
            $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address=" + cep + "&key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag", function(result){
                console.log(result);
                $('#latitude').val(result.results[0].geometry.location.lat);
                $('#longitude').val(result.results[0].geometry.location.lng);

            });
        });
            function myTimer() {
                $("#cep").focusout(function(){
                    alert($("#cep").val());
                });
            }
    });
                
                
</script>

<div id="teste"></div>



</body>
</html>