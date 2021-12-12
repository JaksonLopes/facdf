<?php

	session_start();
	include_once("conexao.php");
	//DADOS DO USUÁRIOS
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$perfil=1;
	$cpf = $_POST['cpf'];

	//DADOS DE ENDEREÇO

	$cep = $POST['cep'];
	$logradouro = $POST['logradouro'];
	$bairro = $POST['bairro'];
	$cidade = $POST['cidade'];
	$complemento = $POST['complemento'];
	


	
	//INSERÇÃO DOS DADOS DO USUÁRIO NO BANCO 
	$sql = "INSERT INTO tb_usuarios (nome, sobrenome, email, senha, perfil, cpf) 
	VALUES ('".$nome."',
			'".$sobrenome."', 
			'".$email."',
			'".md5($senha)."',
			'".$perfil."',
			'".$cpf."')";
	
			
		mysqli_query($conexao, $sql);
		echo "<script>location.href='index.php'</script>";
		$resultado = mysqli_query($conexao, $sql);
		mysqli_query($conexao, $sql);
		$usuario_id=mysql_insert_id($conexao);



		$sqlEndereco = " INSERT INTO tb_end (end_id, cep, logradouro, bairro, cidade, complemento, usuario_id) VALUES( '".$cep."',
					'".$bairro."', 
					'".$cidade."',
					'".$complemento."',
					'".$usuario_id."')";
		
		mysqli_query($conexao, $sqlEndereco);
		echo "<script>location.href='index.php'</script>";

exit;


		//EXIBINDO SE USUÁRIO FOI INSERIDO COM SUCESSO
		if(mysqli_affected_rows($conexao)){
			$_SESSION['msg'] = "<p style='color:green;'>USUÁRIOS SALVO COM SUCESSO</p>";
			header("Location: index.php");
		}else{
			$_SESSION['msg'] = "<p style='color:red;'>USUÁRIO NÃO SALVO</p>";
			header("Location: editar.php?id=$id");
		}