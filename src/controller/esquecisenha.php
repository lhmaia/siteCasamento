<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>


	<div id="formulario" class="corpo_formulario" >
		<p>Digite os dados abaixo para ver seu lembrete de senha.</p>
		
		<form action="processa_exibe_lembrete.php" method="post" enctype="multipart/form-data" name="cadastro" >
		
		<label for='nome' >Nome: </label><span id="campoObg" class="campoObg">*</span> <br />
		<div id="divObs" class="observacao_campo"><p id="pObservacao" class="observacao_campo">O nome deve ser digitado exatamente como foi no registro.</p></div>
		<div id='divErro' class='observacao_campo'><p id='obsErroNome'></p></div>
		<input type="text" name="nome" id="nome" /> <br />
		
		<label for='email' >Email: </label><span id="campoObg" class="campoObg">*</span> <br />
		<div id='divErro' class='observacao_campo'><p id='obsErroEmail'></p></div>
		<input type="text" name="email" id="email" /> <br />
		
		<input type="submit" name="cadastrar" value="Ver lembrete" />
	
		</form>
	</div>

<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>