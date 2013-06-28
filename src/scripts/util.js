

function editar_caixa_texto(idCaixaTexto, valorPadrao){
	caixa = document.getElementById(idCaixaTexto);
	alert(caixa.value);
	if (caixa.value == valorPadrao){
		caixa.value = "";
		caixa.class = "texto_edicao_caixa_texto";
	}
	else{
		if (caixa.value == ""){
			caixa.value = valorPadrao;
			caixa.class = "texto_default_caixa_texto";
		}
	}
	
}

function setCaretPosition(elemId, caretPos) {
    var elem = document.getElementById(elemId);

    if(elem != null) {
        if(elem.createTextRange) {
            var range = elem.createTextRange();
            range.move('character', caretPos);
            range.select();
        }
        else {
            if(elem.selectionStart) {
                elem.focus();
                elem.setSelectionRange(caretPos, caretPos);
            }
            else
                elem.focus();
        }
    }
}