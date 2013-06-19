<?php
  //require_once __DIR__.'/../conexao/connectionFactory.php';
  require_once dirname(__FILE__)."/../modelo/pessoa.php";
  session_start();
  
  //iniciando sessao para restringir o acesso a pagina
  
  $enderecoFalha = "http://localhost/sitecasamento/controller/login.php";

  //$conexao = connectionFactory::getInstance();
  
  //verificar se a sessao ja foi iniciada
  if (!isset($_SESSION['username'])){
    //verificar se o usuario ja preencheu a tela de logon
    if (isset($_POST['username']) && isset($_POST['password'])){

      //$username = $conexao->GetSQLValueString($_POST['username'], "text");
      //$senha = $conexao->GetSQLValueString(md5($_POST['password']), "text");
      $usuario = new pessoa("","","","","","","","","");
      //acessando o banco de dados
      //mysql_select_db($bancodedados, $conexao);
      
      //consulta SQL
      //$strConsulta = sprintf("SELECT email, senha FROM pessoa WHERE aprovado='s' AND email=%s AND senha=%s", $username, $senha);
      //$consulta = mysql_query($strConsulta);
      //obtem e verifica o numero de linhas da consulta
      //$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
      /*
      if (!$consulta){
        header("Location: " . $enderecoFalha);
      }
      $resultado = mysqli_num_rows($consulta);
      */
      
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