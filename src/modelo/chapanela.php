<?php
	class chapanela{
		public static function listaItens(){
			require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
			$conexao = connectionFactory::getInstance();
			$strConsulta = sprintf("select * from itenschapanela");
			$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
			if($consulta){
				return $consulta;
			}
			else{
				return false;
			}
		}
		
		
		public static function verificaMarcado($idItem){
			require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
			$conexao = connectionFactory::getInstance();
			$strConsulta = sprintf("select * from itenschapanela where id = %s", $conexao->GetSQLValueString($idItem, "int"));
			$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
			
			$item = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
			$quemvaidar = $item['quemvaidar'];
			
			if ($quemvaidar > 0){
				return $quemvaidar;
			}
			else{
				return -1;
			}
			
		}
		
		public static function marcar($idItem, $idPessoa){
			require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
			$conexao = connectionFactory::getInstance();
			$strConsulta = sprintf("update itenschapanela set quemvaidar=%s where id = %s",
					 $conexao->GetSQLValueString($idPessoa, "int"),
					 $conexao->GetSQLValueString($idItem, "int")
					);
			$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
			if($consulta){
				return $consulta;
			}
			else{
				return false;
			}
		}
		
		public static function desmarcar($idItem){
			require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
			$conexao = connectionFactory::getInstance();
			$strConsulta = sprintf("update itenschapanela set quemvaidar=null where id = %s",
					$conexao->GetSQLValueString($idItem, "int")
			);
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