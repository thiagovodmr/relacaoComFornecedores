<?php
include "cabecalho.php";
include 'security.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Traçar Rota <code>setPanel()</code></title>
  <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        margin-top: -15px;
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
        15}
        #right-panel {
          height: 90%;
          float: right;
          width: 390px;
          overflow: auto;
        }
        #map {
          margind-nright: 400px;
        }
        #floating-panel {
          background: #fff;
          padding: 5px;
          font-size: 14px;
          font-family: Arial;
          border: 1px solid #ccc;
          box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
          display: none;
        }
        @media print {
          #map {
            height: 500px;
            margin: 0;
          }
          #right-panel {
            float: none;
            width: auto;
          }
        }
      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
    </head>
    <body>
      <div id="floating-panel">
        <strong>Partida: </strong>
        <select id="start" data-live-search="true" class="selectpicker">

          <?php
          include "connect.php";
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM usuarios ORDER BY USER_EMPRESA";

          foreach($conn->query($sql) as $registro):
            $endereco = $registro['USER_COMPLETO'];
            $empresa = $registro['USER_EMPRESA'];
            $iduser = $registro['USER_ID'];
            ?>

            <option <?php if($iduser == $id){ echo "selected"; }?> value="<?= $endereco ?>"><?= $empresa ?></option>
            
          <?php endforeach ?>
        
        </select>
        
        <br>

        <strong>Chegada: </strong>
        
        <select id="end" data-live-search="true" class="selectpicker">
          <?php
          foreach($conn->query($sql) as $registro):
            $endereco = $registro['USER_COMPLETO'];
            $empresa = $registro['USER_EMPRESA'];
            ?>
            <option value="<?= $endereco ?>"><?= $empresa ?></option>
          <?php endforeach ?>
        </select>
      
      </div>
      <div id="right-panel"></div>
      <div id="map"></div>
      <script>
        function initMap() {
          var directionsDisplay = new google.maps.DirectionsRenderer;
          var directionsService = new google.maps.DirectionsService;
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {lat: -8.0475, lng: -34.877}
          });

          var trafficLayer = new google.maps.TrafficLayer();
          trafficLayer.setMap(map);

          directionsDisplay.setMap(map);
          directionsDisplay.setPanel(document.getElementById('right-panel'));

          var control = document.getElementById('floating-panel');
          control.style.display = 'block';
          map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

          var onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsDisplay);
          };
          document.getElementById('start').addEventListener('change', onChangeHandler);
          document.getElementById('end').addEventListener('change', onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
          var start = document.getElementById('start').value;
          var end = document.getElementById('end').value;
          directionsService.route({
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
          }, function(response, status) {
            if (status === 'OK') {
              directionsDisplay.setDirections(response);
            } else {
              window.alert('Directions request failed due to ' + status);
            }
          });
        }
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag&callback=initMap">
    </script>
  </body>
  </html