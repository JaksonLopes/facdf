<?php
	
	//require 'config_inicial.php';

	if(!isset($_SESSION['usuario_id'])) {
		echo "<script>location.href='" . NOME_SISTEMA . "/index.php'</script>";
	}

?>