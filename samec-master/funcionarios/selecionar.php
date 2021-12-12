<?php

	function selecionarcliente(){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios where perfil=4 ";
		$resultado = mysqli_query($conexao, $consulta);
		return $resultado;
	}
	function selecionarfuncionaros(){
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios where perfil=3 ";
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
	
	function contarRegistros() {
		$conexao = conexao();
		$consulta = " SELECT * FROM tb_usuarios order by nome ";
		$resultado = mysqli_query($conexao, $consulta);
		$dados = mysqli_fetch_all($resultado);
		return count($dados);
	}
?>