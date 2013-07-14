<?php
	require_once dirname(__FILE__)."/../modelo/pessoa.php";
	
	$valido = false;
	if (isset($_POST['cadastrar'])) {
		if (isset($_POST['nome']) && isset($_POST['email'])){
			//testa se ja existe usuario com o mesmo email
			$usuario = new pessoa("", "", "", "", "", "", "", "", "", "");
			if ($usuario->recuperarPorEmail($_POST["email"])){
				$nomeUsu = $usuario->getNome();
				if (strtoupper($nomeUsu) == strtoupper($_POST['nome'])){
					$valido = true;
					$lembrete = $usuario->getLembrete_senha();
				}
			}
				
		}
	}
?>	
	<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>
	
	<p style="font-family: Arial; font-size: x-large; text-align: center;">
	<?php 
		if ($valido) {
			echo "Seu lembrete de senha é: <span style='font-style: italic; color: blue;'>" . $lembrete . "</span>";
		}
		else{
			echo "Dados inválidos";
		} 
	?>
	</p>
	
	<p style="font-family: Arial; font-size: medium; text-align: center;">
	<a href="../index.php">Página inicial</a>
	</p>	
	
	<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>
	
