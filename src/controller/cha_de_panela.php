<?php 
	require_once dirname(__FILE__).'/processa_login.php';
	require_once dirname(__FILE__)."/../modelo/chapanela.php";	
?>
<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>

	<div id="conviteChaPanela" class="chapanela">
	<p id="conviteChaPanela" class="chapanela">Olá pessoal!!!</p>
	<p id="conviteChaPanela" class="chapanela">
	Luiz Henrique e eu (Fernanda rsrsr) Queremos fazer dois encontros antes do casório!
	Dois? Dois! Um em Santos Dumont, no dia 03/08/2013. E outro, em Belo Horizonte, no dia 17/08/2013.
	Afinal, a família é grande e está espalhada por esse Brasil a fora!!! Rsrsrs
	Nada mais justo não é mesmo?
	</p>
	
	<p id="conviteChaPanela" class="chapanela">
	Este encontro é o famoso ‘Chá de Panela’, também conhecido por ‘Chá de Cozinha’ ou ‘Chá de Casa Nova’!!! Antigamente era para o ‘Clube da Luluzinha’. Vamos quebrar paradigmas, pois desta vez será para meninos e meninas!!!
	Na verdade é uma justificativa para reunirmos os familiares e amigos!
	</p>
	<p id="conviteChaPanela" class="chapanela">
	Colocamos uma lista com utensílios essenciais para o bom funcionamento de um lar doce lar (banheiro, cozinha, lavanderia). Escolha o que quiserem e fiquem tranquilos que não saberemos quem escolheu o quê. Sabemos que adoram fazer brincadeiras de adivinhação. kkk.
	
	<p id="conviteChaPanela" class="chapanela">
	Ah! Já ia me esquecendo...como somos exímios cozinheiros, contamos com a participação de todos ao levarem uma receita culinária, de preferência, a que mais goste. Isso vale para meninas e meninos!!! Assim montaremos um caderno de culinária com os quitutes!!! 
	</p>
	<p id="conviteChaPanela" class="chapanela">
	Em Santos Dumont será na casa da Tia Zilda e em Belo Horizonte na residência de meus pais, ambos a partir 
	das 17 horas. Quem puder levar um prato de salgado nos avise por mensagem no nosso site para prepararmos o lanche. O refrigerante é totalmente por nossa responsabilidade, combinado???
	</p>
	</div>

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
					echo "<td class=\"linhaTabelaCheck\">";
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