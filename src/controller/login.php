<!DOCTYPE html>
<html>
<head>
  <title>
    Casamento Luiz e Fernanda
  </title>
  
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   
  <script>
	  $(document).ready(function(){
		  $('input[type="text"],input[type="password"]').each(function(){
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
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

  <div id="boasvindas" class="boasvindas">
  	<p>
  		Olá! Seja bem-vindo ao site do casamento do Luiz e da Fernanda. Caso já tenha se registrado faça seu login, caso contrário registre-se. 
  	</p>
  </div>

  <div id="form_login">
    <form id='login' action='../index.php' method='post' accept-charset='UTF-8'>
    <fieldset class="fieldset-auto-width" >
      
      <input type='hidden' name='submitted' id='submitted' value='1'/>
      
      <table> 
      	  <tr>
      	  	  <td>
		      	  <div>
			      	<!-- label for='username' >Login:</label> -->
			      	<input class="inputtext" value="" title="E-mail" type='text' name='username' id='username'  maxlength="50" />
			      </div>
		      </td>
	      </tr>
	      
	      <tr>
      	  	  <td>
		      	<div>   
			      <!-- label for='password' >Senha:</label> -->
			      <input class="inputtext" type='password' value="" title="Senha" name='password' id='password' maxlength="50" />
			      <input type='submit' name='Submit' value='Entrar' />
			    </div>
		      </td>
	      </tr>
	      
	      <tr>
      	  	  <td>
		  		    	
		      </td>
	      </tr>

	      <tr>
      	  	  <td>
		  		<div>
		  		  <div>
				    <a href="esquecisenha.php">Esqueci minha senha</a>
				  </div>
			      <div>
				    <a href="registro.php">Registrar-se</a>
				  </div>
			    </div>    	
		      </td>
	      </tr>
      </table>
     
    </fieldset>
    </form>
  </div>
  

</body>
</html>