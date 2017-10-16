<?php

class Usuario{

	private $idusuario;
	private $login;
	private $senha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($value){
		return $this->idusuario = $value;
	}
/////////////////////////////////////////////////
	public function getlogin(){
		return $this->login;
	}
	public function setLogin($value){
		return $this->login = $value;
	}
/////////////////////////////////////////////////
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($value){
		return $this->senha = $value;
	}
/////////////////////////////////////////////////
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		return $this->dtcadastro = $value;
	}
/////////////////////////////////////////////////
	public function loadbyId($id){

		$sql = new Sql;

		$results = $sql->select("select * from tbusuario where idusuario = :ID", array(
				":ID"=>$id
		));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}
/////////////////////////////////////////////////
	public static function getList(){

		$sql = new Sql();

		return $sql->select("select*from tbusuario order by login");
	}
/////////////////////////////////////////////////
	public function search($login){

		$sql = new Sql();

		return $sql->select("select * from tbusuario where login like :SEARCH order by login", array(
				':SEARCH'=>"%".$login."%"
		));
	}
/////////////////////////////////////////////////
	public function login($login, $senha){

		$sql = new Sql;

		$results = $sql->select("select * from tbusuario where login = :LOGIN AND senha = :SENHA", array(
				":LOGIN"=>$login,
				":SENHA"=>$senha
		));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}	
		else{
			 throw new Exception("Login e/ou Senha inválidos!");
		}
	}
/////////////////////////////////////////////////
	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>