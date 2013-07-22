function OpenModelPopup()
{ 
	
	var xCenter = $(window).width() / 2;
	var yCenter = $(window).height() / 2;
	
    //document.getElementById ('ModalPopupDiv').style.visibility='visible';
    //document.getElementById ('ModalPopupDiv').style.display='';
    //document.getElementById ('ModalPopupDiv').style.top= Math.round ((document.documentElement.clientHeight/2)+ document.documentElement.scrollTop)-100 + 'px';
    //document.getElementById ('ModalPopupDiv').style.left='400px';
    
    document.getElementById ('MaskedDiv').style.display='';
    document.getElementById ('MaskedDiv').style.visibility='visible';
    document.getElementById ('MaskedDiv').style.top='0px';
    document.getElementById ('MaskedDiv').style.left= '0px';
    document.getElementById ('MaskedDiv').style.width= '100%';//  document.documentElement.clientWidth + 'px';
    document.getElementById ('MaskedDiv').style.height=$(window).height()+'px';// document.documentElement.clientHeight+ 'px';
    ConfiguraInnerWindow();
}


function ConfiguraInnerWindow()
{
	var xCenter = $(window).width() / 2;
	var yCenter = $(window).height() / 2;
	document.getElementById ('innerWindow').style.visibility='visible';
    document.getElementById ('innerWindow').style.padding='20px';
    //document.getElementById ('innerWindow').style.margin-left='100px';
    document.getElementById ('innerWindow').style.width=  (document.documentElement.clientWidth - 20) + 'px';
    document.getElementById ('innerWindow').style.height= '580px';//(document.documentElement.clientHeight - 20) + 'px';
}