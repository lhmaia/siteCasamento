function processaItem(idItem){
	
	idcheck = "marcaDar" + idItem;
	tipo_processamento = "";
	if (document.getElementById(idcheck).checked == true){
		tipo_processamento = "marcar";
	}
	else{
		tipo_processamento = "desmarcar";	
	}
	parametrosGET="tipo_processamento=" + tipo_processamento + "&idItem=" + idItem;
	
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	}
	
	xmlhttp.open("GET","processaItemChaPanela.php?"+parametrosGET,true);
	xmlhttp.send();
	
}