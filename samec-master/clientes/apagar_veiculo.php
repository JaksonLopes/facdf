<?php
require '../conexao.php';
$usuario_id = $_REQUEST['usuario_id'];
$conexao = conexao();
$id = $_REQUEST['id_veiculos'];

$sql = "delete from tb_veiculos where id_veiculos = " . $id;
$resultado = mysqli_query($conexao, $sql);

echo "<script>location.href='veiculo.php?usuario_id=$usuario_id'</script>";

