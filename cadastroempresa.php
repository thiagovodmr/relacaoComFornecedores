<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>SSexpress - Cadastro de Empresas</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <meta charset="utf-8">
</head>
<body>
  
<div id="formulario">
        
    <form action="dados.php" method="POST">
    <fieldset>
    <label for="nomefornecedor">Nome:</label><br>
    <input type="text" name="nomefornecedor"><br>
    <label for="cidade">Cidade:</label><br>
    <input type="text" name="cidade"><br>
    <label for="numero">Telefone:</label><br>
    <input type="number" name="telefone"><br>
    <label for="fname">CNPJ:</label><br>
    <input type="number" name="cep"><br>
    <label for="endereco">Endereço:</label><br>
    <input type="text" name="endereco"><br>
    <label for="login">Login</label><br>
    <input type="text" name="login"><br>
    <label for="senha">Senha:</label><br>
    <input type="password" name="senha"><br>
    </fieldset>
    <input type="submit" valeu="Enviar">
    </form>
</div>
</body>
</html>
