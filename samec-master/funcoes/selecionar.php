<?php

	function selecionarcliente(){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios where perfil=0 ";
		$resultado = mysqli_query($conexao, $consulta);
		return $resultado;
	}
	function selecionarfuncionarios(){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios where perfil=1 ";
		$resultado = mysqli_query($conexao, $consulta);
		return $resultado;
	}
	function selecionarprodutos(){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_produto order by nome ";
		$resultado = mysqli_query($conexao, $consulta);
		return $resultado;
	}
	
	function selecionarPorId($id){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios WHERE usuario_id = " . $id;
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_assoc($resultado);
		return $dados;
	}
	function selecionarprodutoPorId($id){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_produto WHERE produto_id = " . $id;
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_assoc($resultado);
		return $dados;
	}
	
	function contarRegistros() {
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios where perfil=0 ";
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_all($resultado);
		return count($dados);
	}
	function contarprodutos() {
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_produto where nome  ";
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_all($resultado);
		return count($dados);
	}
	function selecionarpesquisa(){
    $pesquisa= $_REQUEST['pesquisa'];
    $conexao = conexao();
    $consulta = " SELECT * FROM tb_produto where nome like'$pesquisa%' ";
    $resultado = mysqli_query($conexao, $consulta);
    return $resultado;
    }
    function os_em_abertas() {
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_veiculos where status=1 ";
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_all($resultado);
		return count($dados);
	}
	function os_finalizados() {
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_veiculos where finalizados=1 ";
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_all($resultado);
		return count($dados);
	}
	function lucro_mensal(){
		$conexao = conexao();
		$consulta = "SELECT t1.finalizados, t2.valor, sum(t2.valor) as total from tb_veiculos as t1 INNER JOIN tb_os as t2 on t1.id_veiculos=t2.id_veiculos where t1.finalizados=1";
		$resultado = mysqli_query($conexao, $consulta);
		return $resultado;
	}

	

?>