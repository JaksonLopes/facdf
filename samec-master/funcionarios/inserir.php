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
//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

	
	//INSERÇÃO DOS DADOS DO USUÁRIO NO BANCO 
	$sql = "INSERT INTO tb_usuarios (nome, sobrenome, email, senha, perfil, cpf) 
	VALUES ('".$nome."',
			'".$sobrenome."', 
			'".$email."',
			'".md5($senha)."',
			'".$perfil."',
			'".$cpf."')";
	//echo "$sql";
			
		mysqli_query($conexao, $sqlEndereco);
		echo "<script>location.href='index.php'</script>";

		$resultado = mysqli_query($conexao, $sql);
		mysqli_query($conexao, $sqlEndereco);
		echo "<script>location.href='index.php'</script>";

		if(mysqli_affected_rows($conexao)){
			$_SESSION['msg'] = "<p style='color:green;'>USUÁRIOS SALVO COM SUCESSO</p>";
			header("Location: index.php");
		}else{
			$_SESSION['msg'] = "<p style='color:red;'>USUÁRIO NÃO SALVO</p>";
			header("Location: editar.php?id=$id");
		}
