<?php
include "../connect.php";
$status = $_GET['status'];
$compraid = $_GET['idcompra'][1];


if($status == 0) {
	$status++;
	$sql = "UPDATE compra 
			SET COM_COMPRA ='$compra'
			WHERE id = $compraid";

	if ($conn->query($sql) == true) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}
elseif($status == 1){
	$status++;
	$sql = "UPDATE compra 
			SET COM_COMPRA ='$compra'
			WHERE id = $compraid";

	if ($conn->query($sql) == true) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}
?>