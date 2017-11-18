<?php
include 'cabecalho.php';
$host = "localhost";
$usuario = "id2846308_pep1";
$senha = "@lunoifpe";
$bd = "id2846308_projeto1";
$strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/perfil1.css">
</head>
<body>
<?php
$id = $_GET['id'];
$login = $_SESSION['login'];

$sql = "SELECT * FROM usuarios WHERE USER_PERFIL = '$id'";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
$name = mysqli_query($strcon, "SELECT * FROM usuarios") or die(mysqli_error($strcon));
while($registro = mysqli_fetch_array($resultado)){
  $nome = $registro['USER_NOME'];
  $empresa = $registro['USER_EMPRESA'];
  $cidade = $registro['USER_CIDADE'];
  $logradouro = $registro['USER_LOGRADOURO'];
  $telefone = $registro['USER_TELEFONE'];
  $cnpj = $registro['USER_CNPJ'];
  $email = $registro['USER_EMAIL'];
  $descricao = $registro['USER_DESCRICAO'];

  $google_plus = $registro['USER_GOOGLE_PLUS'];
  $facebook = $registro['USER_FACEBOOK'];
  $twitter = $registro['USER_TWITTER'];
  $linkedln = $registro['USER_LINKEDLN'];
  $github = $registro['USER_GITHUB'];

echo "<div class='container' id='contai'>

<div class='resume'>
    <header class='page-header'>
    <h1 class='page-title'>Perfil</h1>
  </header>
<div class='row'>
  <div class='col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8'>
    <div class='panel panel-default'>
      <div class='panel-heading resume-heading'>
        <div class='row'>
          <div class='col-lg-12'>
            <div class='col-xs-12 col-sm-4'>
              <figure>
                <img class='img-circle img-responsive' alt='' src='http://placehold.it/300x300'>
              </figure>
              
              <div class='row'>
                <div class='col-xs-12 social-btns'>
                  
                    <div class='col-xs-3 col-md-1 col-lg-1 social-btn-holder'>
                      <a href='".$google_plus."' class='btn btn-social btn-block btn-google' target='_blank'>
                        <i class='fa fa-google'></i> </a>
                    </div>
                  
                    <div class='col-xs-3 col-md-1 col-lg-1 social-btn-holder'>
                      <a href='".$facebook."' class='btn btn-social btn-block btn-facebook' target='_blank'>
                        <i class='fa fa-facebook'></i> </a>
                    </div>
                  
                    <div class='col-xs-3 col-md-1 col-lg-1 social-btn-holder'>
                      <a href='".$twitter."' class='btn btn-social btn-block btn-twitter' target='_blank'> 
                        <i class='fa fa-twitter'></i> </a>
                    </div>
                  
                    <div class='col-xs-3 col-md-1 col-lg-1 social-btn-holder'>
                      <a href='".$linkedln."' class='btn btn-social btn-block btn-linkedin' target='_blank'>
                        <i class='fa fa-linkedin'></i> </a>
                    </div>
                  
                    <div class='col-xs-3 col-md-1 col-lg-1 social-btn-holder'>
                      <a href='".$github."' class='btn btn-social btn-block btn-github' target='_blank'>
                        <i class='fa fa-github'></i> </a>
                    </div>
                </div>
              </div>
              
            </div>

            <div class='col-xs-12 col-sm-8'>
              <ul class='list-group'>";
          echo "<li class='list-group-item'><b>Nome do representante: </b>".ucwords($nome)."</li>";
          echo "<li class='list-group-item'><b>Nome da Empresa: </b>".$empresa."</li>";
          echo "<li class='list-group-item'><b>Cidade: </b>".$cidade."</li>";
          echo "<li class='list-group-item'><b>Logradouro: </b>".$logradouro."</li>";
          echo "<li class='list-group-item'><b>CNPJ: </b>".$cnpj."</li>";
          echo "<li class='list-group-item'><b>Telefone <i class='fa fa-phone'></i> :</b>".$telefone."</li>";
          echo "<li class='list-group-item'><b>E-mail <i class='fa fa-envelope'></i> :</b>".$email."</li>";
        echo "</ul>
            </div>
          </div>
        </div>
      </div>
      <div class='bs-callout bs-callout-danger'>
        <h4>Descrição</h4>
        <p>";
         echo "$descricao";
        echo "</p>
      </div>
    </div>

  </div>
</div>
    
</div>

</div>";

$latitude = $registro['USER_LATITUDE'];
$longitude = $registro['USER_LONGITUDE'];

echo "<h2 id='tittlemapa' style='text-align: center;'>Localização <i class='fa fa-map-marker fa-2x' aria-hidden='true'></i></h2>
    <div id='map'></div>
    <script>
      function initMap() {
        var uluru = {lat: $latitude, lng: $longitude};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>";
}
?>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag&callback=initMap">
    </script>

<br>
<?php
include 'rodape.php';
?>
</body>
</html>