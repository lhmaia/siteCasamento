<?php
  require_once dirname(__FILE__)."/../modelo/pessoa.php";
  session_start();
  
  
  //$enderecoFalha = "http://fernandaeluiz.atwebpages.com/controller/login.php";
  $enderecoFalha = "http://localhost/sitecasamento/controller/login.php";

  
  //verificar se a sessao ja foi iniciada
  if (!isset($_SESSION['username'])){
    //verificar se o usuario ja preencheu a tela de logon
    if (isset($_POST['username']) && isset($_POST['password'])){

      $usuario = new pessoa("","","","","","","","","");
      
      if (!$usuario->recuperarPorEmail($_POST["username"])){
        header("Location: " . $enderecoFalha);
      }
      
      
      if (strcmp($usuario->getSenha(), md5($_POST["password"])) == 0
      		&& $usuario->getAprovado()){
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['usuarioSessao'] = $usuario;
      }
      else{
        header("Location: " . $enderecoFalha);
      }
    }
    else{
      header("Location: " . $enderecoFalha);
    }
  }


?>