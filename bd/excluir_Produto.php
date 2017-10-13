<?php
$host = "localhost";
$usuario = "id2846308_pep1";
$senha = "@lunoifpe";
$bd = "id2846308_projeto1";
$id = $_GET['id'];
$strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
$sql = "DELETE FROM produtos WHERE PRO_ID = '$id'";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
header('location: ../meus_Produtos.php');
?>