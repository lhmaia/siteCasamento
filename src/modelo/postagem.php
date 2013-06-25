<?php

class postagem{
	
	private $id = 0;
	private $donoPost = 0;
	private $texto = '';
	private $foto = '';
	private $video = '';
	private $visibilidade = 0;
	private $horario = '';
	
	public function __construct($donoPost, $texto, $foto, $video, $visibilidade){
		$this->donoPost = $donoPost;
		$this->texto = $texto;
		$this->foto = $foto;
		$this->video = $video;
		$this->visibilidade = $visibilidade;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getDonoPost(){
		return $this->donoPost;
	}
	
	public function setDonoPost($donoPost){
		$this->donoPost = $donoPost;
	}
	
	public function getTexto(){
		return $this->texto;
	}
	
	public function setTexto($texto){
		$this->texto = $texto;
	}
	
	public function getFoto(){
		return $this->foto;
	}
	
	public function setFoto($foto){
		$this->foto = $foto;
	}
	
	public function getVideo(){
		return $this->video;
	}
	
	public function setVideo($video){
		$this->video = $video;
	}
	
	public function getVisibilidade(){
		return $this->visibilidade;
	}
	
	public function setVisibilidade($visibilidade){
		$this->visibilidade = $visibilidade;
	}
	
	public function getHorario(){
		return $this->horario;
	}
	
	public function setHorario($horario){
		$this->horario = $horario;
	}
	
	public function gravar(){
		require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
		$conexao = connectionFactory::getInstance();
	
		$strConsulta = sprintf("INSERT INTO postagens (id_pessoa, texto, foto, video, visibilidade, horario)
      VALUES(%s,%s,%s,%s,%s, DATE_SUB(NOW(), INTERVAL 3 HOUR))",
				$conexao->GetSQLValueString($this->donoPost, "text"),
				$conexao->GetSQLValueString($this->texto, "text"),
				$conexao->GetSQLValueString($this->foto, "text"),
				$conexao->GetSQLValueString($this->video, "text"),
				$conexao->GetSQLValueString($this->visibilidade, "text")
		);
	
		$consulta = mysqli_query($conexao->getConnection(), $strConsulta);
	
		if ($consulta){
			return true;
		}
		else{
			return false;
		}
	
	}
	
	public static function listaPostagens(){
		require_once dirname(__FILE__).'/../conexao/connectionFactory.php';
		$conexao = connectionFactory::getInstance();
		$strConsulta = sprintf("select * from postagens order by id desc");
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