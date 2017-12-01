<?php
include "../connect.php";
$status = $_GET['status'];
$compraid = $_GET['idcompra'];

if($status == 2) {
	$status++;
	$sql = "UPDATE compra 
			SET COM_STATUS ='$status'
			WHERE COM_ID = $compraid";

	if ($conn->query($sql) == true) {
	    header('location: /minhas_compras.php');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}

?>