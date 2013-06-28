<?php
	require_once dirname(__FILE__).'/processa_login.php';
	
	if(!($_SESSION["usuarioSessao"]->eMembro(1))){
		header("Location: ../index.php");
	}

?>

<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>

<div id="formulario_exibicao" class="corpo_formulario" >
	<div id="tabelaUsuarios">
	<table border="1">
		<tr>
		<th>Nome</th>
		<th>E-mail</th>
		<th></th>
		
		</tr>
		<?php 
			$listausuarios = pessoa::listaUsuarios();
			while ($row = mysqli_fetch_array($listausuarios, MYSQLI_ASSOC)) {
				echo "<tr>";
					echo "<td>";
						echo $row['nome'];
					echo "</td>";
					echo "<td>";
						echo $row['email'];
					echo "</td>";
					echo "<td>";
						echo "<a href=\"exibedados_usuarios.php?aprovar=exibir&id_usuario=" . $row['id'] . "\" >Ver detalhes</a>";
					echo "</td>";
				echo "</tr>";
			}
		?>
	
	</table>
	</div>
	<div id="linkInicial">
		<a href="../index.php">Pagina inicial</a>
	</div>
</div>

<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>