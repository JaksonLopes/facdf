<?php  
	//DADOS DE USUÁRIO
	$nome = $_REQUEST['nome'];
	$email = $_REQUEST['email'];
	
	//DADOS DE ENDEREÇO
	$logradouro = $_REQUEST['logradouro'];
	$complemento = $_REQUEST['complemento'];
	$rua = $_REQUEST['rua'];
	$cep = $_REQUEST['cep'];
	
	if($_REQUEST['id_aluno']) {
		$id_aluno = $_REQUEST['id_aluno'];
		$id_endereco = $_REQUEST['id_endereco'];
		editar($nome, $email, $logradouro, $complemento, 
		       $rua, $cep, $id_aluno, $id_endereco);
	} else {
		gravar($nome, $email, $logradouro, $complemento, $rua, $cep);
	}
	
	// REPONSÁVEL POR FAZER A INCLUSÃO NO BANCO DE DADOS	
	function gravar($nome, $email, $logradouro, 
	                $complemento, $rua, $cep) {
		$conexao = conexao();
		$sql = "INSERT into tb_aluno (nome, email) 
	        VALUES ('" . $nome . "','" . $email . "')";
		$resultado = mysqli_query($conexao, $sql);
		$aluno_id = mysqli_insert_id($conexao);
		
		$sqlEndereco = 
		    " INSERT INTO tb_end (end_id, cep, logradouro, bairro, cidade, complemento, usuario_id) VALUES
		
		mysqli_query($conexao, $sqlEndereco);
		echo "<script>location.href='index.php'</script>";
	}
