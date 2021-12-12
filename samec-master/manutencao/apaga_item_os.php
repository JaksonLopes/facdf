<?php

require '../conexao.php';
$id = $_REQUEST['id_os'];
$id_veiculos = $_REQUEST['id_veiculos'];


$conexao = conexao();
$sql = "delete from tb_os where id_os =".$id;
$resultado = mysqli_query($conexao, $sql);



echo "<script>location.href='ordem_servico.php?id_veiculos=$id_veiculos'</script>";
 