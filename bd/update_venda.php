<?php
include "../connect.php";
$status = $_GET['status'];
$compraid = $_GET['idcompra'];

if($status == 0) {
	$status++;
	$sql = "UPDATE compra 
			SET COM_STATUS ='$status'
			WHERE COM_ID = $compraid";

	if ($conn->query($sql) == true) {
	    header('location: /minhas_vendas.php');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}
elseif($status == 1){
	$status++;
	$sql = "UPDATE compra 
			SET COM_STATUS ='$status'
			WHERE COM_ID = $compraid";

	if ($conn->query($sql) == true) {
		header('location: /minhas_vendas.php');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}

?>