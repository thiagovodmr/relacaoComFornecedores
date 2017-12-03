<script type="text/javascript">
	function loginfailed(){
		window.location='index.php';
	}
	</script>
<?php

if($_SESSION['logado'] == false){
	echo "<script>loginfailed()</script>";
}
?>