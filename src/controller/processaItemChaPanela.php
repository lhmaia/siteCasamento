<?php

	require_once dirname(__FILE__).'/processa_login.php';
	require_once dirname(__FILE__).'/../modelo/chapanela.php';
	
	if ($_GET['tipo_processamento'] == "marcar"){
	
		$idItem = $_GET['idItem'];
		$idPessoa = $_SESSION['usuarioSessao']->getId();
	
		chapanela::marcar($idItem, $idPessoa);
	}
	
	if ($_GET['tipo_processamento'] == "desmarcar"){
	
		$idItem = $_GET['idItem'];
	
		chapanela::desmarcar($idItem);
	}
	

?>