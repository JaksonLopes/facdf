<?php
	
	require '../conexao.php';
	$conexao = mysqli_connect(SERVIDOR, USUARIO, SENHA, BD, PORT);
	
	//DADOS DE USUÁRIO
	$codigo = $_REQUEST['codigo'];
	$nome = $_REQUEST['nome'];
	$quantidade = $_REQUEST['quantidade'];
	$valor = $_REQUEST['valor'];
	
	
	if($_REQUEST['produto_id']) {
		$id_produto = $_REQUEST['produto_id'];
		editar($codigo, $nome, $quantidade, $valor, $id_produto);
	} else {
		gravar($codigo, $nome, $quantidade, $valor);
	}
	
	// REPONSÁVEL POR FAZER A INCLUSÃO NO BANCO DE DADOS	
	function gravar($codigo, $nome, $quantidade, $valor) {
		$conexao = conexao();
		$sql = "INSERT into tb_produto (codigo, nome, quantidade, valor) 
	        VALUES ('" . $codigo . "','" . $nome . "','" . $quantidade . "','" . $valor . "')";
		$resultado = mysqli_query($conexao, $sql);
		
		
		echo "<script>location.href='index.php'</script>";
	}
	
	// RESPONSÁVEL POR EDIÇÃO DO REGISTRO NO BANCO DE DADOS
	function editar($codigo, $nome, $quantidade, $valor, $id_produto) {
		$conexao = conexao();
		$sql = " UPDATE tb_produto 
				 SET codigo = '" . $codigo . "',
				     nome = '" . $nome . "',
				    quantidade = '" . $quantidade . "', 
		            valor = '" . $valor . "' WHERE produto_id = " . $id_produto;
		
		$resultado = mysqli_query($conexao, $sql);
		mysqli_query($conexao, $sqlEndereco);
		echo "<script>location.href='index.php'</script>";
	}
	
	
	
?>