<?php 

	require_once dirname(__FILE__)."/../modelo/pessoa.php";
	
	if (isset($_POST['cadastrar'])) {
		if (!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['senha'])){
			die("Faltam dados para preenchimento");
		}
		
		$enderecoConfirmacao = "resposta_registro.php";
		$enderecoUsuarioCadastrado = "resposta_email_repetido.php";
		
		//testa se ja existe usuario com o mesmo email
		$usuario = new pessoa("", "", "", "", "", "", "", "", "", "");
		if ($usuario->recuperarPorEmail($_POST["email"])){
			header("Location: " . $enderecoUsuarioCadastrado);
		}
		
		$foto = $_FILES['foto'];
		
		$nome_imagem = "";
		
		if (!empty($foto['name'])){
			//verifica se arquivo e uma imagem
			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
				die("Arquivo nao e uma imagem.");
			}
			
			//pega a extensao da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			
			// Gera um nome unico para a imagem
			$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			
			$caminho_imagem = dirname(__FILE__)."/../modelo/img/".$nome_imagem;
					
			// Faz o upload da imagem para seu respectivo caminho
			if (!(move_uploaded_file($foto["tmp_name"], $caminho_imagem))){
				die("Nao foi possivel fazer upload da foto");
			}
						
		}
		
		if ($nome_imagem == ""){
			$nome_imagem = "nophoto.jpg";
		}
		
		//criptografando a senha
		$senha = md5($_POST['senha']);
			
		$novoUsuario = new pessoa($_POST['nome'], $_POST['email'], $senha,
				$_POST['logradouro'], $_POST['bairro'], $_POST['cidade'],
				$_POST['estado'], $_POST['telefone'], $nome_imagem, $_POST['lembrete_senha']);
			
		$resultado = $novoUsuario->gravar();
		if ($resultado){
			header("Location: " . $enderecoConfirmacao);
		}
		
	}
?>

	<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>

			
	<div id="formulario" class="corpo_formulario" >
		<p>Participe conosco, faça seu cadastro.</p>
		
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro" onsubmit="return validaRegistro(true)" >
		
		<label for='nome' >Nome: </label><span id="campoObg" class="campoObg">*</span> <br />
		<div id='divErro' class='observacao_campo'><p id='obsErroNome'></p></div>
		<input type="text" name="nome" id="nome" /> <br />
		
		<label for='email' >Email: </label><span id="campoObg" class="campoObg">*</span> <br />
		<div id='divErro' class='observacao_campo'><p id='obsErroEmail'></p></div>
		<input type="text" name="email" id="email" /> <br />
		
		<label for='senha' >Senha: </label><span id="campoObg" class="campoObg">*</span> <br />
		<div id="divObs" class="observacao_campo"><p id="pObservacao" class="observacao_campo">Mínimo de 8 dígitos</p></div>
		<div id='divErro' class='observacao_campo'><p id='obsErroSenha'></p></div>
		<input type='password' name='senha' id='senha' maxlength="15" /> <br />
		
		<label for='senha' >Confirmação da Senha: </label><span id="campoObg" class="campoObg">*</span> <br />
		<input type='password' name='confirmacao_senha' id='confirmacao_senha' maxlength="15" /> <br />
		
   	    <label for='lembrete' >Lembrete de senha: </label> <span id="campoObg" class="campoObg">*</span><br />
   	    <div id="divObs" class="observacao_campo"><p id="pObservacao" class="observacao_campo">Preencha com um lembrete que o ajude a recuperar sua senha em caso de esquecimento. Este campo não deve conter a sua senha.</p></div>
   	    <div id='divErro' class='observacao_campo'><p id='obsErroLembrete'></p></div>
   	    <input type="text" id="lembrete_senha" name="lembrete_senha" /><br />
   	    
		<label for='logradouro' >Endereço:</label>  <br /><input type="text" name="logradouro" id="logradouro" /> <br />
		<label for='bairro' >Bairro:</label> <br /><input type="text" name="bairro" id="bairro" /> <br />
		<label for='cidade' >Cidade:</label> <br /><input type="text" name="cidade" id="cidade" /> <br />
		<label for='estado' >Estado:</label> <br /><input type="text" name="estado" id="estado" maxlength="2" /> <br />
		<label for='telefone' >Telefone:</label> <br /><input type="text" name="telefone" id="telefone" /> <br />
		<label for='foto' >Foto de exibição:</label> <br /><input type="file" name="foto" /><br />

		<input type="submit" name="cadastrar" value="Cadastrar" />
		
		<p id="pObservacao" class="observacao_campo" style="margin-top: 15px;"><span id="campoObg" class="campoObg">*</span> Campos obrigatórios.</p>
		</form>
	</div>
	
	<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>