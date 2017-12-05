<?php
include 'cabecalho.php';
include 'bd/conexao.php';
include 'security.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Meu Perfil</title>
  <link rel="stylesheet" type="text/css" href="css/meu_Perfil.css">
</head>
<body>
<?php
$login = $_SESSION['login'];

$sql = "SELECT * FROM usuarios WHERE USER_LOGIN = '$login'";
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
  $latitude = $registro['USER_LATITUDE'];
  $longitude = $registro['USER_LONGITUDE'];

  $google_plus = $registro['USER_GOOGLE_PLUS'];
  $facebook = $registro['USER_FACEBOOK'];
  $twitter = $registro['USER_TWITTER'];
  $linkedln = $registro['USER_LINKEDLN'];
  $github = $registro['USER_GITHUB'];
  $arquivo = $registro["USER_IMAGEM"];

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
                <img class='img-circle img-responsive' alt='' src= '$arquivo' >
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
          echo "<li class='list-group-item'><b>Nome do representante: </b>".ucwords($nome)." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#nomeusuario' id='oi'></i></li>";
          
          echo "<li class='list-group-item'><b>Nome da Empresa: </b>".$empresa." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#nomedaempresa' id='oi'></i></li>";
          
          echo "<li class='list-group-item'><b>Cidade: </b>".$cidade." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#cidade' id='oi'></i></li>";
          
          echo "<li class='list-group-item'><b>Logradouro: </b>".$logradouro." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#logradouro' id='oi'></i></li>";
          
          echo "<li class='list-group-item'><b>CNPJ: </b>".$cnpj." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#cnpj' id='oi'></i></li>";
          
          echo "<li class='list-group-item'><b>Latitude <i class='fa fa-map-marker'></i> :</b> ".$latitude." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#latitude' id='oi'></i></li>";

          echo "<li class='list-group-item'><b>Longitude <i class='fa fa-map-marker'></i> :</b> ".$longitude." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#longitude' id='oi'></i></li>";

          echo "<li class='list-group-item'><b>Telefone <i class='fa fa-phone'></i> :</b> ".$telefone." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#telefone' id='oi'></i></li>";
          
          echo "<li class='list-group-item'><b>E-mail <i class='fa fa-envelope'></i> :</b> ".$email." <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#email' id='oi'></i></li>";
        
        echo "</ul>
            </div>
          </div>
        </div>
      </div>
      <div class='bs-callout bs-callout-danger'>";

      echo "<div><i class='fa fa-pencil-square-o fa-2x' aria-hidden='true' data-toggle='modal' data-target='#descricao' id='oi'></i></div>";
      
        echo "<h4>Descrição</h4>
        <p>";
        echo "$descricao";
        echo "</p>
      </div>
    </div>

  </div>
</div>
    
</div>

</div>";

echo "<!-- Modal -->
<div class='modal fade' id='nomeusuario' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_nome.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar Nome</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='40' required autofocus value='".ucwords($nome)."'/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";

echo "<!-- Modal -->
<div class='modal fade' id='nomedaempresa' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_empresa.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar nome da empresa</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='100' value='".$empresa."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='cidade' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_cidade.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar Cidade</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='25' value='".$cidade."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='logradouro' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_logradouro.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar Logradouro</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='45' value='".$logradouro."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='cnpj' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_cnpj.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar CNPJ</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='20' value='".$cnpj."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='latitude' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_latitude.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar Latitude</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='20' value='".$latitude."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='longitude' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_longitude.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar Longitude</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='20' value='".$longitude."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='telefone' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_telefone.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Alterar Telefone</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='15' value='".$telefone."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='email' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_email.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Altere E-mail</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='90' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' value='".$email."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='descricao' tabindex='-1' role='dialog' 
     aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Modal Header -->
            <div class='modal-header'>
                <button type='button' class='close' 
                   data-dismiss='modal'>
                       <span aria-hidden='true'>&times;</span>
                       <span class='sr-only'>Close</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>
                    <b class='branco'>Editar</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class='modal-body'>
                
                <form role='form' action='bd/update_usuarios/update_descricao.php' method='POST'>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Altere E-mail</label>
                      <input type='text' class='form-control'
                          id='exampleInputPassword1' name='atual' maxlength='90' value='".$descricao."' required autofocus/>
                  </div>

                  <button type='submit' class='btn btn-primary'>Alterar</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary'
                        data-dismiss='modal'>
                            Close
                </button>
            </div>
        </div>
    </div>
</div>";
}
?>
<?php
include 'rodape.php';
?>
</body>
</html>