<?php 
require '../conexao.php';
$id_veiculos= $_REQUEST['id_veiculos'];;
$produto_id = $_REQUEST['produto_id'];
$nome = $_REQUEST['nome'];
$valor = $_REQUEST['valor'];


		$conexao = conexao();
		$sql = "INSERT into tb_os (id_veiculos, nome_produto, valor) 
	        VALUES ('" . $id_veiculos . "','" . $nome . "','" . $valor . "')";
		$resultado = mysqli_query($conexao, $sql);
		
		echo "<script>location.href='../manutencao/ordem_servico.php?id_veiculos=$id_veiculos'</script>";
		
	






  ?>