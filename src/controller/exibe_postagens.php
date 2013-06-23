<?php

	require_once dirname(__FILE__).'/processa_login.php';
	require_once dirname(__FILE__)."/../modelo/postagem.php";
	
	$enoivo = $_SESSION["usuarioSessao"]->eMembro(1);
	$idUsuSessao = $_SESSION["usuarioSessao"]->getId();
	
	$lista_postagens = postagem::listaPostagens();
	while ($row = mysqli_fetch_array($lista_postagens, MYSQLI_ASSOC)) {
		$usuPost = new pessoa("", "", "", "", "", "", "", "", "");
		if ($enoivo || $row['visibilidade'] == 0 || $row['id_pessoa'] == $idUsuSessao){
			$usuPost->recuperar($row['id_pessoa']);
			
			echo "<div id=\"divPost\">";
			
			//exibe o post na tela
			echo "<div id=\"divFotoDoPost\">";
			echo "<img id=\"imgFotoPost\" alt=\"foto\" src=\"modelo/img/".$usuPost->getFoto()."\">";
			echo "</div>";
			
			echo "<div id=\"divCorpoPost\">";
			echo "<p id=\"NomeDonoPost\">". $usuPost->getNome() ."</p>";
			echo "<p id=\"TextoDoPost\">". $row['texto']."</p>";
			echo "</div>";
			
			echo "</div>";
			echo "<hr>";
		}
		
		$usuPost = null;
	}

?>