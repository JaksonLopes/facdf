<?php

	require '../conexao.php';
	require '../config_inicial.php';
	
	$email = $_REQUEST['email'];
	$senha = $_REQUEST['senha'];
	
	$resultado = autenticar($email, $senha);
	if($resultado) {
		echo "<script>location.href='" . NOME_SISTEMA . "/dashboard.php'</script>";
		$_SESSION['usuario_id'] = $resultado['usuario_id'];	
	} else {
		echo "<script>location.href='" . NOME_SISTEMA . "/index.php'</script>";
	}
	
	function autenticar($email, $senha){
		$conexao = conexao();
		$sql = " SELECT * FROM tb_usuarios WHERE email = '" . $email . "' 
		         AND senha = '" .md5($senha). "'";
		
		$resultado = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_assoc($resultado);
		return $dados;
	}
?>