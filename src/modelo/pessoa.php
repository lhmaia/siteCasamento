<?php

class pessoa{
  /*
  public function __construct(){
    
  }
  */
  
  private $id = 0;
  private $nome = '';
  private $email = '';
  private $senha = '';
  private $logradouro = '';
  private $bairro = '';
  private $cidade = '';
  private $estado = '';
  private $telefone = '';
  private $aprovado = false;
  private $quemconvidou = '';
  private $foto = '';
  private $lembrete_senha = '';
  //private $grupos = null;
  
  public function __construct($nome, $email, $senha, $logradouro, $bairro, $cidade,
                      $estado, $telefone, $foto, $lembrete_senha){
    
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->logradouro = $logradouro;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->estado = $estado;
    $this->telefone = $telefone;
    $this->foto = $foto;
	$this->lembrete_senha = $lembrete_senha;
    
  }
    
  //getters and setters
  
  public function getId(){
    return $this->id;
  }
  
  public function getNome(){
    return $this->nome;
  }
  
  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getEmail(){
    return $this->email;
  }
  
  public function setEmail($email){
    $this->email = $email;
  }
    
  public function getSenha(){
    return $this->senha;
  }
  
  public function setSenha($senha){
    $this->senha = $senha;
  }
  
  public function getLogradouro(){
    return $this->logradouro;
  }
  
  public function setLogradouro($logradouro){
    $this->logradouro = $logradouro;
  }
  
  public function getBairro(){
    return $this->bairro;
  }
  
  public function setBairro($bairro){
    $this->bairro = $bairro;
  }
  
  public function getCidade(){
    return $this->cidade;
  }
  
  public function setCidade($cidade){
    $this->cidade = $cidade;
  }  
  
  public function getEstado(){
    return $this->estado;
  }
  
  public function setEstado($estado){
    $this->estado = $estado;
  }
  
  public function getTelefone(){
    return $this->telefone;
  }
  
  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }
  
  public function getFoto(){
    return $this->foto;
  }
  
  public function setFoto($foto){
    $this->foto = $foto;
  }
  
  public function getAprovado(){
    return $this->aprovado;
  }
  
  public function setAprovado($aprovado){
    $this->aprovado = $aprovado;
  }
  
  public function getLembrete_senha (){
	return $this->lembrete_senha;
  }
  
  public function setLembrete_senha ($lembrete_senha){
	$this->lembrete_senha = $lembrete_senha;
  }
  
  
  public function gravar(){
    require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
    $conexao = connectionFactory::getInstance();
      
    //verifica se email ja existe
    $strConsulta = sprintf("select * from pessoa where email = %s", $conexao->GetSQLValueString($this->email,"text"));
    
    $consultaEmail = mysqli_query($conexao->getConnection(), $strConsulta);
    
    if($consultaEmail){
      if (mysqli_num_rows($consultaEmail) > 0){
        //se ja existe usuario com este email retorna falso
        return false;
      }
    }
       
    $strConsulta = sprintf("INSERT INTO pessoa (nome, email, senha, logradouro, bairro, cidade,
                      estado, telefone, foto, aprovado, lembrete_senha)
      VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s, %s)",
        $conexao->GetSQLValueString($this->nome, "text"),
        $conexao->GetSQLValueString($this->email, "text"),
        $conexao->GetSQLValueString($this->senha, "text"),
        $conexao->GetSQLValueString($this->logradouro, "text"),
        $conexao->GetSQLValueString($this->bairro, "text"),
        $conexao->GetSQLValueString($this->cidade, "text"),
        $conexao->GetSQLValueString($this->estado, "text"),
        $conexao->GetSQLValueString($this->telefone, "text"),
        $conexao->GetSQLValueString($this->foto, "text"),
    	$conexao->GetSQLValueString("n", "text"),
		$conexao->GetSQLValueString($this->lembrete_senha, "text")
        );
       
    $consulta = mysqli_query($conexao->getConnection(), $strConsulta);
     
    if ($consulta){
      return true;
    }
    else{
      return false;
    }
    
  }
  
  public function atualizar(){
    require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
    $conexao = connectionFactory::getInstance();
    
    //verifica se email ja existe
    $strConsulta = sprintf("select * from pessoa where email = %s AND id <> %s", $conexao->GetSQLValueString($this->email,"text"), 
                                           $conexao->GetSQLValueString($this->id,"int"));      
    $consultaEmail = mysqli_query($conexao->getConnection(), $strConsulta);
    
    if($consultaEmail){
      if (mysqli_num_rows($consultaEmail) > 0){
        //se ja existe usuario com este email retorna falso
        return false;
      }
    }
    
    $strConsulta = sprintf("UPDATE pessoa set nome = %s, email = %s, 
                      logradouro = %s, bairro = %s, cidade = %s,
                      estado = %s, telefone = %s, foto = %s, 
    					aprovado = %s
                WHERE id = %s ",
        $conexao->GetSQLValueString($this->nome, "text"),
        $conexao->GetSQLValueString($this->email, "text"),
        $conexao->GetSQLValueString($this->logradouro, "text"),
        $conexao->GetSQLValueString($this->bairro, "text"),
        $conexao->GetSQLValueString($this->cidade, "text"),
        $conexao->GetSQLValueString($this->estado, "text"),
        $conexao->GetSQLValueString($this->telefone, "text"),
        $conexao->GetSQLValueString($this->foto, "text"),
    	$conexao->GetSQLValueString($this->aprovado == true ? "s" : "n" , "text"),
        $conexao->GetSQLValueString($this->id, "int")
        );
    $consulta = mysqli_query($conexao->getConnection(), $strConsulta);
    if ($consulta){
      return true;
    }
    else{
      return false;
    }
    
  }
  
  public function carregaGrupos(){
    /*
    require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
    $conexao = connectionFactory::getInstance();
    $strConsulta = sprintf("select * from membros_grupos where id_pessoa = %s", $conexao->GetSQLValueString($this->id, "int"));

    $consulta = mysqli_query($conexao->getConnection(), $strConsulta);
    if ($consulta){
      $this->grupos =  new SplDoublyLinkedList();
      while ($grupo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
        $this->grupos->push($grupo['id_grupo']);
      }  
    }
    */
  }
  
  public function eMembro($id_grupo){
  /*	
    $this->grupos->rewind();
    while ($this->grupos->valid()){
      if ($id_grupo == $this->grupos->current()){
        return true;
      }
      $this->grupos->next();
    }
    return false;
   */
  	require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
  	$conexao = connectionFactory::getInstance();
  	$strConsulta = sprintf("select * from membros_grupos where id_pessoa = %s", $conexao->GetSQLValueString($this->id, "int"));
  	
  	$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
  	if ($consulta){
  		$this->grupos =  new SplDoublyLinkedList();
  		while ($grupo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){		
	  		if ($id_grupo == $grupo['id_grupo']){
	  			return true;
	  		}
  		}
  	}
  	return false;
  }
  
  public function recuperar($id){
    require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
    $conexao = connectionFactory::getInstance();
    $strConsulta = sprintf("select * from pessoa where id = %s", $conexao->GetSQLValueString($id,"int"));
    
    $consulta = mysqli_query($conexao->getConnection(), $strConsulta);
    
    if ($consulta){
      $pessoa = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
      $this->id = $pessoa['id'];
      $this->nome = $pessoa['nome'];
      $this->email = $pessoa['email'];
      $this->senha = $pessoa['senha'];
      $this->logradouro = $pessoa['logradouro'];
      $this->bairro = $pessoa['bairro'];
      $this->cidade = $pessoa['cidade'];
      $this->estado = $pessoa['estado'];
      $this->telefone = $pessoa['telefone'];
      $this->foto = $pessoa['foto'];
      if($pessoa['aprovado'] == 's'){
        $this->aprovado = true;
      }
      else{
        $this->aprovado = false;
      }
      //$this->carregaGrupos();
    
      return true;
    }
    else{
      return false;
    }
  }
  
  public function recuperarPorEmail($email){
    require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
    $conexao = connectionFactory::getInstance();
    $strConsulta = sprintf("select * from pessoa where email = %s", $conexao->GetSQLValueString($email,"text"));
  
    $consulta = mysqli_query($conexao->getConnection(), $strConsulta);
    if($consulta){
      if (mysqli_num_rows($consulta) > 0){
        $pessoa = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
        return $this->recuperar($pessoa['id']);
      }
      return false;
    }
    else{
      return false;
    }
  }
  
  public static function listaUsuarios(){
  	require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
  	$conexao = connectionFactory::getInstance();
  	$strConsulta = sprintf("select * from pessoa");
  	$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
  	if($consulta){
  		return $consulta;
  	}
  	else{
  		return false;
  	}
  }
  
}
?>