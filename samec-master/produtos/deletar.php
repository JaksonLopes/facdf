
<?php

require '../conexao.php';

$conexao = conexao();
$id = $_REQUEST['produto_id'];

$sql = "delete from tb_produto where produto_id = " . $id;
$resultado = mysqli_query($conexao, $sql);

echo "<script>location.href='index.php'</script>";

