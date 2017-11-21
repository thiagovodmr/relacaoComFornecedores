<?php
    include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro da Empresa</title>
<style>
body, html {
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    background-size: cover;
}
    .form-style-10{
        width:450px;
        padding:30px;
        margin:40px auto;
        background: #FFF;
        border-radius: 10px;
        -webkit-border-radius:10px;
        -moz-border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
        -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
        -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    }
    .form-style-10 .inner-wrap{
        padding: 30px;
        background: #F8F8F8;
        border-radius: 6px;
        margin-bottom: 15px;
    }
    .form-style-10 h1{
        background: #2A88AD;
        padding: 20px 30px 15px 30px;
        margin: -30px -30px 30px -30px;
        border-radius: 10px 10px 0 0;
        -webkit-border-radius: 10px 10px 0 0;
        -moz-border-radius: 10px 10px 0 0;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
        font: normal 30px 'Bitter', serif;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        border: 1px solid #257C9E;
    }
    .form-style-10 h1 > span{
        display: block;
        margin-top: 2px;
        font: 13px Arial, Helvetica, sans-serif;
    }
    .form-style-10 label{
        display: block;
        font: 13px Arial, Helvetica, sans-serif;
        color: #888;
        margin-bottom: 15px;
    }
    .form-style-10 input[type="text"],
    .form-style-10 input[type="date"],
    .form-style-10 input[type="tel"],
    .form-style-10 input[type="datetime"],
    .form-style-10 input[type="email"],
    .form-style-10 input[type="number"],
    .form-style-10 input[type="search"],
    .form-style-10 input[type="time"],
    .form-style-10 input[type="url"],
    .form-style-10 input[type="password"],
    .form-style-10 textarea,
    .form-style-10 select {
        display: block;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        padding: 8px;
        border-radius: 6px;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border: 2px solid #fff;
        box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    }

    .form-style-10 .section{
        font: normal 20px 'Bitter', serif;
        color: #2A88AD;
        margin-bottom: 5px;
    }
    .form-style-10 .section span {
        background: #2A88AD;
        padding: 5px 10px 5px 10px;
        position: absolute;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border: 4px solid #fff;
        font-size: 14px;
        margin-left: -45px;
        color: #fff;
        margin-top: -3px;
    }
    .form-style-10 input[type="button"], 
    .form-style-10 input[type="submit"]{
        background: #2A88AD;
        padding: 8px 20px 8px 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
        font: normal 30px 'Bitter', serif;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        border: 1px solid #257C9E;
        font-size: 15px;
    }
    .form-style-10 input[type="button"]:hover, 
    .form-style-10 input[type="submit"]:hover{
        background: #2A6881;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
    }
    .form-style-10 .privacy-policy{
        float: right;
        width: 250px;
        font: 12px Arial, Helvetica, sans-serif;
        color: #4D4D4D;
        margin-top: 10px;
        text-align: right;
    }
      #map {
        height: 400px;
      }
      /* Optional: Makes the sample page fill the window. */
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
      .hide{
        visibility: hide;
      }
      .show{

      }
</style>
<script src="javascript/cadastro.js"></script>
</head>

<body>
<?php
    // session_start();
    if($_SESSION['logado']==True){
        echo "<script> window.location='usuario.php'</script>'";
    }
?>

<div class="form-style-10">
<h1>Cadastre-se Agora!<span>Cadastre-se e aproveite nossos recursos!</span></h1>
<form method="POST" action="bd/cadastrarUsuario.php">
    <div class="section"><span>1</span>Nomes e Endereços</div>
    <div class="inner-wrap">

        <label>Nome do Representante <input type="text" name="nome_do_usuario" required autofocus  maxlength="40"/></label>
        
        <label>Nome da Empresa <input type="text" name="nome_da_empresa" required autofocus  maxlength="100"/></label>
        
        <label>Descrição da Empresa<textarea name="descricao" required autofocus  maxlength="5000"></textarea></label>
        
        <label>CEP <input disabled="true" type="text" name="cep" id="cep" required></label>        

        <label>Logradouro <input type="text" name="logradouro_da_empresa" id="rua" required autofocus  maxlength="45"/></label>

        <label>Bairro <input disabled="true" type="text" name="bairro" id="bairro" required></label>

        <label>Cidade <input disabled="true" type="text" name="cidade_da_empresa" id="cidade" required autofocus  maxlength="25" /></label>
        
        <label>Estado <input disabled="true" type="text" name="estado" id="uf" required></label>

        <input type="text" name="lat" id="latitude" class="hide" />
        <input type="text" name="lng" id="longitude" class="hide" />
        <input type="text" name="complet_address" id="complet" class="hide" />
        
        <label>CNPJ <input disabled="true" type="text" name="cnpj_da_empresa" required autofocus  maxlength="20"/></label>
    </div>

    <div class="section"><span>2</span>Contatos</div>
    <div class="inner-wrap">

        <label>Email <input type="email" name="email_da_empresa" placeholder="ex: you@email.com" 
                required autofocus  maxlength="90" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
       
        <label>Telefone <input type="tel" name="telefone_da_empresa" required autofocus  maxlength="15" placeholder="exemplo: 8199999999" /></label>

    </div>

    <div class="section"><span>3</span>Login e senha</div>
        <div class="inner-wrap">
        <label>Login <input disabled="true" type="text" name="login_da_empresa" placeholder="No máximo 20 caracteres" required autofocus  maxlength="20"></label>

        <label>Senha <input disabled="true" type="password" name="senha_da_empresa" placeholder="No máximo 10 caracteres" required  maxlength="10">
        </label>
        
    </div>
    <div class="section"><span>4</span>Redes sociais (Opcional) </div>
    <div class="inner-wrap">
                <label>Google plus:</label>
                <input type="text" name="google_plus" pattern="https?://.+" title="Inclua o http://" >
                
                <label>Facebook:</label>
                <input type="text" name="facebook" pattern="https?://.+" title="Inclua o http://" >
                
                <label>Twitter:</label>
                <input type="text" name="twitter" pattern="https?://.+" title="Inclua o http://" >
                
                <label>Linkdln:</label>
                <input type="text" name="linkedln" pattern="https?://.+" title="Inclua o http://" >
                
                <label>Github:</label>
                <input type="text" name="github" pattern="https?://.+" title="Inclua o http://">
                
    </div>   

    <div class="button-section">
     <input type="submit" value="Enviar" />
    </div>
</form>
</div>
<script src="javascript/cadastro-lat-lng.js"></script>
</body>
</html>
