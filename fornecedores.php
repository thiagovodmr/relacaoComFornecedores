<?php
include "cabecalho.php";
include "bd/conexao.php";
include 'security.php';
?>
<!DOCTYPE html>
<head>
  <title>Fornecedores</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <style>
  
  #map {
    float: right;
    width: 80%;
    height: 500px; 
  }
  #rolamento{
    margin-top: -38px;
    overflow: scroll;
    height: 500px;
  }
  .detalhes{
    font-size: 20px;
  }
</style>
</head>

<body>

  <div id="map"></div><br><br>

  <script>
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    var customLabel = {
      interprise: {
        label: iconBase + 'truck.png'
      }
    };

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(-15.77972, -47.92972),
        zoom: 4
      });
      
      var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('resultado.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};

              var marker = new google.maps.Marker({
                title: "Empresa: " + name,
                animation: google.maps.Animation.DROP,
                map: map,
                position: point,
                icon: icon.label,
                size: new google.maps.Size(10, 10)
              });

              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
          var trafficLayer = new google.maps.TrafficLayer();
          trafficLayer.setMap(map);
        }

        function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
        }

        function doNothing() {}
      </script>

      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag&callback=initMap">
    </script>

    <div id="rolamento">
      <label>Filtro por Estado:
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Estados
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="fornecedores.php?estado=AC">Acre</a></li>
            <li><a href="fornecedores.php?estado=AL">Alagoas</a></li>
            <li><a href="fornecedores.php?estado=AP">Amapá</a></li>
            <li><a href="fornecedores.php?estado=AM">Amazonas</a></li>
            <li><a href="fornecedores.php?estado=BA">Bahia</a></li>
            <li><a href="fornecedores.php?estado=CE">Ceará</a></li>
            <li><a href="fornecedores.php?estado=DF">Distrito Federal</a></li>
            <li><a href="fornecedores.php?estado=ES">Espírito Santo</a></li>
            <li><a href="fornecedores.php?estado=GO">Goiás</a></li>
            <li><a href="fornecedores.php?estado=MA">Maranhão</a></li>
            <li><a href="fornecedores.php?estado=MT">Mato Grosso</a></li>
            <li><a href="fornecedores.php?estado=MS">Mato Grosso do Sul</a></li>
            <li><a href="fornecedores.php?estado=MG">Minas Gerais</a></li>
            <li><a href="fornecedores.php?estado=PA">Pará</a></li>
            <li><a href="fornecedores.php?estado=PB">Paraíba</a></li>
            <li><a href="fornecedores.php?estado=PR">Paraná</a></li>
            <li><a href="fornecedores.php?estado=PE">Pernambuco</a></li>
            <li><a href="fornecedores.php?estado=PI">Piauí</a></li>
            <li><a href="fornecedores.php?estado=RJ">Rio de Janeiro</a></li>
            <li><a href="fornecedores.php?estado=RN">Rio Grande do Norte</a></li>
            <li><a href="fornecedores.php?estado=RS">Rio Grande do Sul</a></li>
            <li><a href="fornecedores.php?estado=RO">Rondônia</a></li>
            <li><a href="fornecedores.php?estado=RR">Roraima</a></li>
            <li><a href="fornecedores.php?estado=SC">Santa Catarina</a></li>
            <li><a href="fornecedores.php?estado=SP">São Paulo</a></li>
            <li><a href="fornecedores.php?estado=SE">Sergipe</a></li>
            <li><a href="fornecedores.php?estado=TO">Tocantins</a></li>
          </div>
        </div>
      </label> 
    </div>
    <?php
    if(isset($_GET['estado'])){
      $state = $_GET['estado'];
      $sql = "SELECT * FROM usuarios WHERE USER_ESTADO = '$state'";
      $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
      $r = mysqli_num_rows($resultado); 
      if($r==0){
        echo "<h3>Nenhum Empresa encontrada nesse estado!</h3>";
      }
      while($registro = mysqli_fetch_array($resultado)){
        $empresa = $registro['USER_EMPRESA'];
        $cidade = $registro['USER_CIDADE'];
        $telefone = $registro['USER_TELEFONE'];
        $endereco = $registro['USER_LOGRADOURO'];
        $perfil = $registro['USER_PERFIL'];
        echo "<p class='detalhes'><b>Empresa :</b> <a href='perfil.php?id=$perfil'>". $empresa."</p></a>";
        echo "<p class='detalhes'><b>Cidade :</b>". $cidade."</p>";
        echo "<p class='detalhes'><b>Logradouro :</b>". ucwords($endereco)."</p>";
        echo "<p class='detalhes'><b>Telefone :</b>". $telefone."</p>";
        echo "<hr>";
      }
    }
    ?>  




  </body>
  </html>