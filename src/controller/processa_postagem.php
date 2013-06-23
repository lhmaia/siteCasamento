<?php
	require_once dirname(__FILE__).'/processa_login.php';
	require_once dirname(__FILE__)."/../modelo/postagem.php";
	
	//$_SESSION["usuarioSessao"]
	
	$visibilidade = $_GET['visibilidadePost'];
	
	if (strcmp($visibilidade,"todos")==0){
		$intVisibilidade = 0;
	}
	else {
		$intVisibilidade = 1;
	}
	
	$novoPost = new postagem($_SESSION['usuarioSessao']->getId(), $_GET['textoPost'], $_GET['fotoPost'], $_GET['videoPost'], $intVisibilidade);
	$resultado = $novoPost->gravar();
	
?>