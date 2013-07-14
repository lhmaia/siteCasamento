<?php 
	require_once dirname(__FILE__).'/processa_login.php';
	
	if(!($_SESSION["usuarioSessao"]->eMembro(1))){
		header("Location: ../index.php");
	}
	
	$usuario = new pessoa("","","","","","","","","", "");
	
	if (!$usuario->recuperar($_GET['id_usuario'])){
		header("../index.php");
	}
	
	if(strcmp($_GET['aprovar'], "exibir")){
		if (strcmp($_GET['aprovar'], "Aprovar") == 0){
			$usuario->setAprovado(true);
		}
		if (strcmp($_GET['aprovar'], "Desaprovar") == 0){
			$usuario->setAprovado(false);
		}
		$usuario->atualizar();
	}
?>

<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>

<div id="formulario_exibicao" class="corpo_formulario" >
	<div>
		<a href="../index.php">Ir para a página inicial</a> / <a href="lista_usuarios.php">Voltar para a página de aprovação</a>
	</div>
	<div>
		<img alt="foto de perfil" height="200" width="150" src=<?php echo "../modelo/img/".$usuario->getFoto(); ?> >
	</div>
	<div id="nome">
		<label>Nome: </label> <?php echo $usuario->getNome(); ?> 
	</div>
	<div id="email">
		<label>Email: </label> <?php echo $usuario->getEmail(); ?> 
	</div>
	<div id="logradouro">
		<label>Endereço: </label> <?php echo $usuario->getLogradouro(); ?> 
	</div>
	<div id="bairro">
		<label>Bairro: </label> <?php echo $usuario->getBairro(); ?> 
	</div>
	<div id="cidade">
		<label>Cidade: </label> <?php echo $usuario->getCidade(); ?> 
	</div>
	<div id="estado">
		<label>Estado: </label> <?php echo $usuario->getEstado(); ?> 
	</div>
	<div id="telefone">
		<label>Telefone: </label> <?php echo $usuario->getTelefone(); ?> 
	</div>
		<div id="botao_aprovar">
		<form action="<?php echo $_SERVER['PHP_SELF'];
		/*
							if ($usuario->getAprovado()){
								$aprovar = -1;
							}
							else{
								$aprovar = 1;
							}
							$urlAcao =  $_SERVER['PHP_SELF']; 
							$urlAcao = $urlAcao . "?id_usuario=". $usuario->getId() ."&aprovar=" . $aprovar . "\"";
							echo $urlAcao;*/
						?>" method="get" name="aprova" >
		    <input type="hidden" name="id_usuario" value="<?php echo $usuario->getId() ?>" >
			<input type="submit"  
			<?php if ($usuario->getAprovado()){
					echo "name=\"aprovar\" value=\"Desaprovar\"";
				  }
				  else{
			      	echo "name=\"aprovar\" value=\"Aprovar\"";
				  }
			?> 
			/>
		</form>
	</div>
	

</div>

<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>