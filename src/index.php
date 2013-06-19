<?php 

  require_once dirname(__FILE__).'/controller/processa_login.php'; 

?>

<!DOCTYPE html>
<html>

<head>
  <title>
    Casamento Luiz e Fernanda
  </title>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <script>
	  $(document).ready(function(){
		  $("#flip").click(function(){
		    $("#div_convite").hide("slow", function alteraImagem(){
				if ($("#img_convite").attr("src") == "convite/Convite_frente.jpg"){
					$("#img_convite").attr("src","convite/verso_convite.jpg");
				}
				else{
					$("#img_convite").attr("src","convite/Convite_frente.jpg");	
				}
				$("#div_convite").show("slow");
			});//.show("slow");
		  });
		});
  </script>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
  <link rel="stylesheet" type="text/css" href="css/paginaPrincipal.css">
</head>

<body>
  <div id="divCabecalho" class="cabecalho">
    <div id="divLogo">
    <img alt="Casamento Luiz e Fernanda" src="img/logo_topo.png"></img>
    </div>
    <div id="logout" class="menu_topo_direita">
      <a href="controller/logout.php">Sair</a>
    </div>
    <div id="usuario" class="menu_topo_direita">
      <a href="controller/exibedados.php"><?php echo $_SESSION['usuarioSessao']->getNome(); ?></a>
    </div>
  </div>
  
  <div id="idMenuEsquerdo" class="menu_esquerdo">
  	<div>
    <?php
    	//testa se e membro do grupo noivos, o grupo 1 
	   if($_SESSION["usuarioSessao"]->eMembro(1)){
	    echo "<a href=\"controller\lista_usuarios.php\">Aprovar cadastros</a>"."<br \>";  
	   } 
    ?>
    </div>
    <div>Como chegar</div>
    <div>Poste sua foto ou vídeo</div>
    <div>Chá de panela</div>
  </div>
  
  <div id="corpo" class="corpo">
  	<div id="div_convite">
    	<img id="img_convite" src="convite/Convite_frente.jpg" alt="Convite do casamento"></img>
    </div>
    <div id="flip">
		<img id="img_convite" src="convite/inverteImagem.png" alt="Convite do casamento"></img>
    </div>
    <div id="div_postagens">
  		<p>asdfasfdasdfas asdf asdf adsf asdf adf asdf adf adsf adsfasdfasdf adsfasdfa</p>
  	</div>
  </div>

</body>

</html>