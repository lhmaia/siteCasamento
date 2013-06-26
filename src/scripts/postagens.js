function insereMensagem(){
	
	texto = document.getElementById("txtPostagens").value;
	textoPadrao = document.getElementById("txtPostagens").title;
	
	
	if (texto=="" || texto==textoPadrao)
	{
		alert("Não é possível publicar uma mensagem em branco.");
	}
	else
	{
		
		visibilidade = document.getElementById("escolheVisiPost").value;
			
		parametrosGET = "textoPost="+texto+"&fotoPost=\"\"&videoPost=\"\"&visibilidadePost="+visibilidade+"&tipo_processamento=inserir";
		
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
		}
		
		xmlhttp.open("GET","controller/processa_postagem.php?"+parametrosGET,true);
		xmlhttp.send();
				
		//atualizando automaticamente a div contendo a linha do tempo
		exibeLinhaDoTempo();
		
	}
}

function removeMensagem(idPost){
	
	confirmacao = confirm("Você tem certeza de que deseja excluir esta mensagem?");
	
	if (!confirmacao) return;
	
	parametrosGET = "idPost="+idPost+"&tipo_processamento=remover";
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	}
	
	xmlhttp.open("GET","controller/processa_postagem.php?"+parametrosGET,true);
	xmlhttp.send();
	
	//atualizando automaticamente a div contendo a linha do tempo
	exibeLinhaDoTempo();
}

function exibeLinhaDoTempo(){
	xmlUpdate = new XMLHttpRequest();	
	xmlUpdate.onreadystatechange=function(){
	    document.getElementById("div_linhaDoTempo").innerHTML=xmlUpdate.responseText;
	}
	
	xmlUpdate.open("GET","controller/exibe_postagens.php", true);
	xmlUpdate.send();
	
	document.getElementById("txtPostagens").value = document.getElementById("txtPostagens").title;
	document.getElementById("txtPostagens").setAttribute("class", "texto_default_caixa_texto");
	//document.getElementById("txtPostagens").value = "";
	//document.getElementById("txtPostagens").blur;
}
