<?php
include '../conexao.php';
session_start();
$login = $_SESSION['login'];
$input = $_POST['atual'];
$result_usuario = "UPDATE usuarios SET USER_CNPJ = '$input' WHERE USER_LOGIN = '$login'";
$resultado_usuario = mysqli_query($strcon, $result_usuario) or die(mysqli_error($strcon));
header('location: ../meu_Perfil.php');
?>