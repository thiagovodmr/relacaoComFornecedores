<?php
    include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>SSexpress - Cadastro de Empresas</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro_usuario.css">
    <meta charset="utf-8">
</head>
<body>
    <?php
    // session_start();
    if($_SESSION['logado']==True){
        echo "<script> window.location='usuario.php'</script>'";
    }
    ?>
<div class="container">
        <div class="card card-container">
            <h1>Cadastre-se</h1>
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" action="bd/cadastrarUsuario.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" id="inputEmail" class="form-control" name="nome_do_usuario" placeholder="Nome" 
                required autofocus  maxlength="40">
                <input type="text" id="inputEmail" class="form-control" name="nome_da_empresa" placeholder="Nome da Empresa" 
                required autofocus  maxlength="40">
                <input type="text" id="inputEmail" class="form-control" name="descricao" placeholder="Descrição da Empresa" 
                required autofocus  maxlength="5000">
                <input type="text" id="inputEmail" class="form-control" name="cidade_da_empresa" placeholder="Cidade" 
                required autofocus  maxlength="25">
                <input type="number" id="inputEmail" class="form-control" name="telefone_da_empresa" placeholder="Telefone" required autofocus  maxlength="15"></p>
                <input type="text" id="inputEmail" class="form-control" name="cnpj_da_empresa" placeholder="CNPJ" 
                required autofocus  maxlength="20">
                <input type="text" id="inputEmail" class="form-control" name="logradouro_da_empresa" placeholder="Logradouro" 
                required autofocus  maxlength="45">
                <input type="text" id="inputEmail" class="form-control" name="email_da_empresa" placeholder="E-mail" 
                required autofocus  maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                <input type="text" id="inputEmail" class="form-control" name="login_da_empresa" placeholder="Login" 
                required autofocus  maxlength="20">
                <input type="password" id="inputPassword" class="form-control" name="senha_da_empresa" placeholder="Senha" 
                required  maxlength="10">
                <h3>Opcional</h3>
                <input type="text" id="inputEmail" class="form-control" name="google_plus" pattern="https?://.+" title="Inclua o http://" placeholder="Google Plus">
                <input type="text" id="inputEmail" class="form-control" name="facebook" pattern="https?://.+" title="Inclua o http://" placeholder="Facebook">
                <input type="text" id="inputEmail" class="form-control" name="twitter" pattern="https?://.+" title="Inclua o http://" placeholder="Twitter">
                <input type="text" id="inputEmail" class="form-control" name="linkedln" pattern="https?://.+" title="Inclua o http://" placeholder="Linkedln">
                <input type="text" id="inputEmail" class="form-control" name="github" pattern="https?://.+" title="Inclua o http://" placeholder="Github">
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
