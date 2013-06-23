<?php 

	require_once dirname(__FILE__)."/../modelo/pessoa.php";
	
	if (isset($_POST['cadastrar'])) {
		if (!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['senha'])){
			die("Faltam dados para preenchimento");
		}
		
		$enderecoConfirmacao = "resposta_registro.php";
		
		//testa se ja existe usuario com o mesmo email
		$usuario = new pessoa("","","","","","","","","");
		if ($usuario->recuperarPorEmail($_POST["email"])){
			die("Ja existe um usuario com este email cadastrado.");
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
				$_POST['estado'], $_POST['telefone'], $nome_imagem);
			
		$resultado = $novoUsuario->gravar();
		if ($resultado){
			header("Location: " . $enderecoConfirmacao);
		}
		
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>
	Casamento Luiz e Fernanda
	</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro" >
	<label for='nome' >Nome:</label> <input type="text" name="nome" id="nome" /> <br /><br />
	<label for='email' >Email:</label> <input type="text" name="email" id="email" /> <br /><br />
	<label for='senha' >Senha:</label> <input type='password' name='senha' id='senha' maxlength="15" /> <br /><br />
	<label for='logradouro' >Endereço:</label>  <input type="text" name="logradouro" id="logradouro" /> <br /><br />
	<label for='bairro' >Bairro:</label> <input type="text" name="bairro" id="bairro" /> <br /><br />
	<label for='cidade' >Cidade:</label> <input type="text" name="cidade" id="cidade" /> <br /><br />
	<label for='estado' >Estado:</label> <input type="text" name="estado" id="estado" maxlength="2" /> <br /><br />
	<label for='telefone' >Telefone:</label> <input type="text" name="telefone" id="telefone" /> <br /><br />	
	<label for='foto' >Foto de exibição: <input type="file" name="foto" /><br /><br />
	<input type="submit" name="cadastrar" value="Cadastrar" />
	</form>
</body>

</html>