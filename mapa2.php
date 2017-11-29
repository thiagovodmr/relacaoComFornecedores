<?php
require_once 'gmaps.class.php';
$gmaps = new gMaps;
$gmaps->addIcon( "kart", "icons/kart.png", "45", "45" );
$gmaps->addMarkerCep( "08615060","500","Conteudo HTML","kart");
// recuperando a string e removendo os caracters [ e ]
$strJson = preg_replace(array('/[/','/]/'),array('',''),$gmaps->getMarkers());

//conexao com banco
$query = mysql_query("insert into markers (str) values ("$strJson");

//recuperando as strings
$query = mysql_query("select * from markers");
//montando a string completa com todos os marcadores do banco
$markers = "[";
while($row = mysql_fecth_object($query))
{
 //concatenando a string com resultados da consulta
 //supondo que armazenou no campo str, a virgula é necessária após cada marcador
 $markers .= "$row->str,";
}
//fechando json
$markers = "]";
//retornando a string montada a partir do banco
echo $markers;
?>