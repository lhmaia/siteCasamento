<?php 

  require_once dirname(__FILE__).'/controller/processa_login.php'; 

?>

<!DOCTYPE html>
<html>

<head>
  <title>
    Casamento Luiz e Fernanda
  </title>
  
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/postagens.js"></script>
  <!-- script type="text/javascript" src="scripts/util.js"></script -->
  
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
		  $('input[type="text"]').each(function(){
			    this.value = $(this).attr('title');
			    $(this).addClass('texto_default_caixa_texto');
			 
			    $(this).focus(function(){
			        if(this.value == $(this).attr('title')) {
			            this.value = '';
			            $(this).removeClass('texto_default_caixa_texto');
			        }
			    });
			 
			    $(this).blur(function(){
			        if(this.value == '') {
			            this.value = $(this).attr('title');
			            $(this).addClass('texto_default_caixa_texto');
			        }
			    });
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
    	<hr>
    	<div id="div_frm_postagens">
	  		<form id="frm_postagens">
	  			<input type="text" value="" title="Poste sua mensagem" name="txtPostagens" id="txtPostagens" onkeydown="if (event.keyCode == 13) document.getElementById('btnPost').click()" />
	  			<p>
	  			Quem pode ver esta mensagem:
	  			<select name="escolheVisPost" id="escolheVisiPost">
	  				<option value="todos">Todos</option>
	  				<option value="somentenoivos">Somente os noivs</option> 
	  			</select>
	  			<input type="button" name="btnPost" id="btnPost" value="Publicar" onclick="insereMensagem()" />
	  			</p>
	  		</form>
	  		<hr>
  		</div>
  		<div id="div_linhaDoTempo">
  			<?php include dirname(__FILE__).'/controller/exibe_postagens.php'; ?>
  		</div>
  	</div>
  </div>

</body>

</html>
