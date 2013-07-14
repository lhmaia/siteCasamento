function validaRegistro(verificasenha){
	
	retorno = true;
	
	nome = document.getElementById("nome");
	if (nome.value == ""){
		retorno = false;
		document.getElementById("obsErroNome").innerHTML = "Você deve preencher o campo nome.";
	}
	else{
		document.getElementById("obsErroNome").innerHTML = "";
	}
	
	
	email = document.getElementById("email");
	if (email.value == ""){
		retorno = false;
		document.getElementById("obsErroEmail").innerHTML = "Você deve preencher o campo e-mail.";
	}
	else{
		field = email.value;
		usuario = field.substring(0, field.indexOf("@"));
		dominio = field.substring(field.indexOf("@")+ 1, field.length);
		 
		if ((usuario.length >=1) &&
		    (dominio.length >=3) &&
		    (usuario.search("@")==-1) &&
		    (dominio.search("@")==-1) &&
		    (usuario.search(" ")==-1) &&
		    (dominio.search(" ")==-1) &&
		    (dominio.search(".")!=-1) &&     
		    (dominio.indexOf(".") >=1)&&
		    (dominio.lastIndexOf(".") < dominio.length - 1)) 
		{
			document.getElementById("obsErroEmail").innerHTML = "";
		}
		else{
			document.getElementById("obsErroEmail").innerHTML = "E-mail inválido.";
			retorno = false;
		}
	}
	
	if (verificasenha){
		senha = document.getElementById("senha");
		if (senha.value.length < 8){
			retorno = false;
			document.getElementById("obsErroSenha").innerHTML = "O campo senha deve ter pelo menos 8 dígitos.";
		}
		else{
			document.getElementById("obsErroSenha").innerHTML = "";
			
			//verifica se senhas coincidem
			senha = document.getElementById("senha");
			confirmacao = document.getElementById("confirmacao_senha");
			if (senha.value != confirmacao.value){
				retorno = false;
				document.getElementById("obsErroSenha").innerHTML = "As senhas digitadas não coincidem";
			}
			else{
				document.getElementById("obsErroSenha").innerHTML = "";
			}
		}
	}
	
	lembrete = document.getElementById("lembrete_senha");
	if (lembrete.value == ""){
		retorno = false;
		document.getElementById("obsErroLembrete").innerHTML = "Você deve preencher o campo lembrete de senha.";
	}
	else{
		document.getElementById("obsErroLembrete").innerHTML = "";
		
		senha = document.getElementById("senha");
		if (senha.value != ""){
			if (lembrete.value.indexOf(senha.value) > -1){
				retorno = false;
				document.getElementById("obsErroLembrete").innerHTML = "O lembrete de senha contém a senha, altere o lembrete.";
			}
			else{
				document.getElementById("obsErroLembrete").innerHTML = "";
			}
		}
		
	}
	return retorno;
}


function validaRegistroEdicao(){
	alterar = document.getElementById("chkAlterarSenha");
	
	if (alterar.checked == true){
		retorno = validaRegistro(true);
		return retorno
	}
	else {
		retorno = validaRegistro(false);
		return retorno;
	}
}