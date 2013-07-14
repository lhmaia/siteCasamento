<?php

	require_once dirname(__FILE__).'/processa_login.php';
	require_once dirname(__FILE__)."/../modelo/postagem.php";
	
	$enoivo = $_SESSION["usuarioSessao"]->eMembro(1);
	$idUsuSessao = $_SESSION["usuarioSessao"]->getId();
	
	$lista_postagens = postagem::listaPostagens();
	while ($row = mysqli_fetch_array($lista_postagens, MYSQLI_ASSOC)) {
		$usuPost = new pessoa("", "", "", "", "", "", "", "", "", "");
		if ($enoivo || $row['visibilidade'] == 0 || $row['id_pessoa'] == $idUsuSessao){
			$usuPost->recuperar($row['id_pessoa']);
			
			//exibir botao remover
			if ($row['id_pessoa'] == $idUsuSessao){
				$botaoremover = "<a onclick=\"removeMensagem('".$row['id']."')\">Remover</a>";
			}
			else {
				$botaoremover = "";
			}
			
			echo "<div id=\"divPost\">";
			
			/*
			//insere form hidden para guardar o id do formulario
			echo "<form>";
			echo "<input type=\"hidden\" name=\"InputIdPost\" id=\"InputIdPost\" value=\"".$row['id']."\">";
			echo "</form>";
			*/
			
			//exibe o post na tela
			echo "<div id=\"divFotoDoPost\">";
			echo "<img id=\"imgFotoPost\" alt=\"foto\" src=\"modelo/img/".$usuPost->getFoto()."\">";
			echo "</div>";
			
			echo "<div id=\"divCorpoPost\">";
			echo "<p id=\"NomeDonoPost\">". $usuPost->getNome() ."</p>";
			echo "<p id=\"DataDoPost\">"." às ".date("H:i", strtotime($row['horario']))." de ".date("d/m/Y", strtotime($row['horario']))."</p>";
			echo "<p id=\"TextoDoPost\">". $row['texto']."</p>";
			echo "<p id=\"BotoesPost\">".$botaoremover."</p>";
			echo "</div>";
			
			echo "</div>";
			echo "<hr>";
		}
		
		$usuPost = null;
	}

?>