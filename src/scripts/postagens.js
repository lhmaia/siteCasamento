function insereMensagem(){
	
	texto = document.getElementById("txtPostagens").value
	
	
	if (texto=="")
	{
		alert("Não é possível publicar uma mensagem em branco.")
	}
	else
	{
		
		visibilidade = document.getElementById("escolheVisiPost").value
			
		parametrosGET = "textoPost="+texto+"&fotoPost=\"\"&videoPost=\"\"&visibilidadePost="+visibilidade
		
		alert(parametrosGET);
		xmlhttp=new XMLHttpRequest();

		
		xmlhttp.onreadystatechange=function(){
			
		}
		
		xmlhttp.open("GET","controller/processa_postagem.php?"+parametrosGET,true);
		xmlhttp.send();
		
		exibeLinhaDoTempo();
		
	}
}

function exibeLinhaDoTempo(){
	document.getElementById("div_linhaDoTempo").innerHtml = document.getElementById("div_linhaDoTempo").innerHtml; 
}