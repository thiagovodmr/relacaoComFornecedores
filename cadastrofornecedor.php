<?php
    include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>SSexpress - Cadastro de Fornecedores</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <meta charset="utf-8">
</head>
<body>

<div class="container">
        <div class="card card-container">
            <h1>Cadastre-se</h1>
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" action="" method="POST">
                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" id="inputEmail" class="form-control" name="nome_da_fornecedor" placeholder="Nome" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="cidade_da_fornecedor" placeholder="Cidade" 
                required autofocus>
                <input type="number" id="inputEmail" class="form-control" name="telefone_da_fornecedor" placeholder="Telefone" required autofocus></p>
                <input type="number" id="inputEmail" class="form-control" name="cep_da_fornecedor" placeholder="CEP" 
                required autofocus></p>
                <input type="text" id="inputEmail" class="form-control" name="endereco_da_fornecedor" placeholder="Endereço" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="email_da_fornecedor" placeholder="E-mail" 
                required autofocus>
                <input type="text" id="inputEmail" class="form-control" name="login_da_fornecedor" placeholder="Login" 
                required autofocus>
                <input type="password" id="inputPassword" class="form-control" name="senha_da_fornecedor" placeholder="Senha" 
                required>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
