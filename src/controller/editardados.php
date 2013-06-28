<?php 
  require_once dirname(__FILE__).'/processa_login.php';
  
  
  if (isset($_POST['Salvar'])) {
    //testa se ja existe usuario com o mesmo email
    $usuario = new pessoa("","","","","","","","","");
    if ($usuario->recuperarPorEmail($_POST["email"])){
      if ($usuario->getId() != $_SESSION['usuarioSessao']->getId()){
        die("Ja existe um usuario com este email cadastrado.");
      }
    }
    
    if (strcmp($_POST['nome'],"") == 0 || strcmp($_POST['email'],"") == 0){
      die("O nome e o e-mail sao campos obrigatorios");
    }
    
    //$atualizaUsuario = new pessoa($_POST['nome'], $_POST['email'], '',
      //  $_POST['logradouro'], $_POST['bairro'], $_POST['cidade'],
      //  $_POST['estado'], $_POST['telefone'], '');
    
    $_SESSION['usuarioSessao']->setNome($_POST['nome']);
    $_SESSION['usuarioSessao']->setEmail($_POST['email']);
    $_SESSION['usuarioSessao']->setLogradouro($_POST['logradouro']);
    $_SESSION['usuarioSessao']->setBairro($_POST['bairro']);
    $_SESSION['usuarioSessao']->setCidade($_POST['cidade']);
    $_SESSION['usuarioSessao']->setEstado($_POST['estado']);
    $_SESSION['usuarioSessao']->setTelefone($_POST['telefone']);
    
    $resultado = $_SESSION['usuarioSessao']->atualizar();
        
    if ($resultado){

      $paginaDestino = "exibedados.php";
      header("Location: " . $paginaDestino);
    }
  }
?>


<?php require_once dirname(__FILE__)."/tempCabecalho.php"; ?>

<div id="formulario" class="corpo_formulario" >
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset='UTF-8' name="edicao" >
  <label for='nome' >Nome:</label><br /> <input type="text" name="nome" id="nome" value=<?php echo "'".$_SESSION['usuarioSessao']->getNome()."'";?>  /><br />
  <label for='email' >Email:</label><br /> <input type="text" name="email" id="email" value=<?php echo "'".$_SESSION['usuarioSessao']->getEmail()."'";?>  /> <br />
  <label for='logradouro' >Endereço:</label><br />  <input type="text" name="logradouro" id="logradouro" value=<?php echo "'".$_SESSION['usuarioSessao']->getLogradouro()."'";?> /> <br />
  <label for='bairro' >Bairro:</label><br /> <input type="text" name="bairro" id="bairro" value=<?php echo "'".$_SESSION['usuarioSessao']->getBairro()."'";?>  /> <br />
  <label for='cidade' >Cidade:</label><br /> <input type="text" name="cidade" id="cidade" value=<?php echo "'".$_SESSION['usuarioSessao']->getCidade()."'";?>  /> <br />
  <label for='estado' >Estado:</label><br /> <input type="text" name="estado" id="estado" maxlength="2" value=<?php echo "'".$_SESSION['usuarioSessao']->getEstado()."'";?>  /> <br />
  <label for='telefone' >Telefone:</label><br /> <input type="text" name="telefone" id="telefone" value=<?php echo "'".$_SESSION['usuarioSessao']->getTelefone()."'";?>  /> <br />  
  <input type="submit" name="Salvar" value="Salvar" />
  <a href="exibedados.php">Cancelar e voltar</a>
</div>

<?php require_once dirname(__FILE__)."/tempRodape.php"; ?>