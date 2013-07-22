<?php 
	require_once dirname(__FILE__).'/processa_login.php';
	require_once dirname(__FILE__)."/../modelo/chapanela.php";
?>
<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>


<div id="formulario_exibicao" class="corpo_formulario" >

	<div id="tabelaChaPanela">
	<table border="1">
		<tr>
		<th>Item</th>
		<th>Marcar para presentear</th>		
		</tr>
		<?php 
			$listaitens = chapanela::listaItens();
			while ($row = mysqli_fetch_array($listaitens, MYSQLI_ASSOC)) {
				echo "<tr>";
					echo "<td>";
						echo $row['dsc_item'];
					echo "</td>";
					echo "<td>";
						if (chapanela::verificaMarcado($row['id']) == -1){
							echo "<input type=\"checkbox\" id=\"marcaDar".$row['id']."\" onClick=\"processaItem(".$row['id'].")\" value=".$row['id']."\">";
						}
						if (chapanela::verificaMarcado($row['id']) == $_SESSION['usuarioSessao']->getId()){
							echo "<input type=\"checkbox\" id=\"marcaDar".$row['id']."\" onClick=\"processaItem(".$row['id'].")\" checked value=".$row['id']."\">";
						}
						if (chapanela::verificaMarcado($row['id']) > 0 && chapanela::verificaMarcado($row['id']) != $_SESSION['usuarioSessao']->getId()){
							echo "<input type=\"checkbox\" id=\"marcaDar".$row['id']."\" disabled onClick=\"processaItem(".$row['id'].")\" checked value=".$row['id']."\">";
						}
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