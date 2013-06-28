<?php 
	require_once dirname(__FILE__).'/processa_login.php';
?>

<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>

<div id="formulario_exibicao" class="corpo_formulario" >
	<div>
		<a href="editardados.php">Editar dados</a> - <a href="../index.php">Pagina inicial</a>
	</div>
	
	<div>
		<img alt="foto de perfil" height="200" width="150" src=<?php echo "../modelo/img/".$_SESSION["usuarioSessao"]->getFoto(); ?> >
	</div>
	<div id="nome">
		<label>Nome: </label> <?php echo $_SESSION['usuarioSessao']->getNome(); ?> 
	</div>
	<div id="email">
		<label>Email: </label> <?php echo $_SESSION['usuarioSessao']->getEmail(); ?> 
	</div>
	<div id="logradouro">
		<label>Endereco: </label> <?php echo $_SESSION['usuarioSessao']->getLogradouro(); ?> 
	</div>
	<div id="bairro">
		<label>Bairro: </label> <?php echo $_SESSION['usuarioSessao']->getBairro(); ?> 
	</div>
	<div id="cidade">
		<label>Cidade: </label> <?php echo $_SESSION['usuarioSessao']->getCidade(); ?> 
	</div>
	<div id="estado">
		<label>Estado: </label> <?php echo $_SESSION['usuarioSessao']->getEstado(); ?> 
	</div>
	<div id="telefone">
		<label>Telefone: </label> <?php echo $_SESSION['usuarioSessao']->getTelefone(); ?> 
	</div>

</div>

<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>