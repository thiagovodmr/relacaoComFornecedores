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
<div class="container">
        <div class="card card-container">
            <h1>Cadastre-se</h1>
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" action="bd/cadastrarEmpresa.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" id="inputEmail" class="form-control" name="nome_da_empresa" placeholder="Nome" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="cidade_da_empresa" placeholder="Cidade" 
                required autofocus>
                <input type="number" id="inputEmail" class="form-control" name="telefone_da_empresa" placeholder="Telefone" required autofocus></p>
                <input type="text" id="inputEmail" class="form-control" name="cnpj_da_empresa" placeholder="CNPJ" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="logradouro_da_empresa" placeholder="Endereço" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="email_da_empresa" placeholder="E-mail" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="login_da_empresa" placeholder="Login" 
                required autofocus>
                <input type="password" id="inputPassword" class="form-control" name="senha_da_empresa" placeholder="Senha" 
                required>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
