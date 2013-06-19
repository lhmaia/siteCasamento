<?php

  class connectionFactory {
    private static $instance;
    private static $conn;
    
    public function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
      if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
      }
    
      //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
    
      switch ($theType) {
        case "text":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "long":
        case "int":
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";
          break;
        case "double":
          $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
          break;
        case "date":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "defined":
          $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
          break;
      }
      return $theValue;
    }
    
    private function __construct(){
      /*
      $servidor = "fdb3.awardspace.com";
      $usuario = "792786_sitecasa";
      $senha = "notemaia2007";
      $banco = "792786_sitecasa";
      */
      $servidor = "localhost";
      $usuario = "root";
      $senha = "notemaia2007";
      $banco = "sitecasamento";
      
      self::$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
    }
    
    public static function getInstance(){
      if (!isset(self::$instance)){
        $c = __CLASS__;
        self::$instance = new $c;
      }
      
      return self::$instance;
    }
    
    public function getConnection(){
      return self::$conn;
    }
    
    public function __clone(){
      trigger_error("nao e permitido clonar esta instancia", E_USER_ERROR);
    }
  }
  
  //definindo função GetSQLValueString, utilizada na obtencao do usuario e da senha

?>