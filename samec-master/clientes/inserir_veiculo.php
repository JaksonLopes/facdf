<?php 
require '../conexao.php';

$marca= $_REQUEST['marca'];
$modelo= $_REQUEST['modelo'];
$ano= $_REQUEST['ano'];
$id= $_REQUEST['id'];


$conexao = conexao();
$sql = "INSERT into tb_veiculos (usuario_id, marca, modelo, ano_fabricacao) 
VALUES ('" . $id . "','" . $marca . "','" . $modelo . "','" . $ano . "')";
$resultado = mysqli_query($conexao, $sql);

mysqli_query($conexao, $sqlEndereco);
echo "<script>location.href='veiculo.php?usuario_id=$id'</script>";




?>