
<?php

require '../conexao.php';

$conexao = conexao();
$id = $_REQUEST['usuario_id'];

$sql = "delete from tb_usuarios where usuario_id = " . $id;
$resultado = mysqli_query($conexao, $sql);

echo "<script>location.href='index.php'</script>";

if (condition) {
	# code...
}else
?>