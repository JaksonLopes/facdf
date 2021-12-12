<?php


require '../conexao.php';
require '../perfis.php';

$id_status = $_REQUEST['id_status'];
$id_veiculos = $_REQUEST['id_veiculos'];


switch ($id_status) {
case '0':
	$conexao = conexao();
	$usuario_id = $_REQUEST['usuario_id'];
	$sql = "UPDATE tb_veiculos SET status =1 WHERE tb_veiculos.id_veiculos = " . $id_veiculos;
	$resultado = mysqli_query($conexao, $sql);
	echo "<script>location.href='/samec/clientes/veiculo.php?usuario_id=$usuario_id'</script>";
	
	break;
case '1':
	$conexao = conexao();
	$sql = "UPDATE tb_veiculos SET status =0 ,finalizados= 1 WHERE tb_veiculos.id_veiculos = " . $id_veiculos;
	$resultado = mysqli_query($conexao, $sql);
	echo "<script>location.href='/samec/manutencao/servico_em_andamento.php'</script>";
	break;
case '2':
	$conexao = conexao();
	$sql = "UPDATE tb_veiculos SET status =0 WHERE tb_veiculos.id_veiculos = " . $id_veiculos;
	$resultado = mysqli_query($conexao, $sql);
	echo "<script>location.href='/samec/manutencao/servico_finalizados.php'</script>";
	break;
	
	default:
		echo "cail no id nulo";
	break;
}


