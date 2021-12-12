<?php

	define ("SERVIDOR", 'localhost');
	define ("USUARIO", 'root');
	define ("SENHA", '');
	define ("BD", 'asmec');
	define ("PORT", '3306');

	function conexao() {
	// CRIANDO A CONEXÃO COM O BANCO DE DADOS
		$conexao = mysqli_connect(SERVIDOR, USUARIO, SENHA, BD, PORT);
		// SELECIONANDO O BANCO DE DADOS
		mysqli_select_db($conexao, BD);
		
		return $conexao;
	}
	

 define ("INICIA_MANUTENCAO", '1');
?>