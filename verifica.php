<?php
	include 'banco.php';
	
	$nome = $_POST['nome_adm'];
	$password = $_POST['senha_adm'];
	
	if (empty($nome) or (empty($password))) {
		echo "Preencha os dados corretamente!";
		echo "<a href='index.html'>Voltar</a>";
		die();
	}
	
	$executa = "Select nome, senha, cargo from funcionario where nome='$nome' and senha='$password'";
	$query = $mysqli->query($executa);
	$resultado = $query->fetch_object();
	
	if (isset($resultado)) {
		$cargo = $resultado -> cargo;
		
		session_start();
		$_SESSION['nome'] = $nome;
		$_SESSION['funcao'] = $cargo;
		
		if ($cargo == "Dona" or $cargo == "assistente") {
			header('location: index_adm.php');
		}
	} else {
		echo "Usuario ou senha não existe";
		echo "<a href='index.html'>Voltar</a>";
	}
?>