<?php
class Liens{
	private $id;
	private $idRub;
	private $nom;
	private $url;
	private $aff_l;
//======== S E T T E R S ===================	
	public function setId($id)
	{
		if(is_int($id) || $id == NULL)
		{
			$this->id = $id;
		} else {
			trigger_error('int required : ' . $id . 'de type : ' . gettype($id));
		}
	}
	public function setIdRub($idRub)
	{
		if(is_int($idRub) || $idRub == NULL)
		{
			$this->idRub = $idRub;
		} else {
			trigger_error('int required : ' . $idRub . 'de type : ' . gettype($idRub));
		}
	}
	
	
	public function setNom($nom)
	{
		if(is_string($nom))
		{
			$this->nom = $nom;
		} else {
			trigger_error('string required : ' . $nom . 'de type : ' . gettype($nom));
		}
	}
	public function setUrl($url)
	{
		if(is_string($url))
		{
			$this->url = $url;
		} else {
			trigger_error('string required : ' . $url . 'de type : ' . gettype($url));
		}
	}
	public function setAffL($affL)
	{
		if(is_string($affL))
		{
			$this->affL = $affL;
		} else {
			trigger_error('string required : ' . $affL . 'de type : ' . gettype($affL));
		}
	}
//======== G E T T E R S ===================
	public function getId()
	{
		return $this->id;
	}
	public function getIdRub()
	{
		return $this->idRub;
	}
	public function getNom()
	{
		return $this->nom;
	}
	public function getUrl()
	{
		return $this->url;
	}
	public function getAffL()
	{
		return $this->affL;
	}
//======== M E T H O D S ===================
	public function save()
	{
		if($this->id)
		{
			// $this->id != NULL -----> UPDATE
			Global $pdo;
			
			$pdo->exec("UPDATE liens SET  idRub = '". $this->idRub. "', nom = '". $this->nom. "', url = '". $this->url. "', affL = '". $this->affL. "'	WHERE id= '".$this->id."'");
		} else {
			// $this->id = NULL ----> INSERT
			Global $pdo;
			
			$pdo->exec("
				INSERT INTO liens (idRub,nom,url)
				VALUES
				('".$this->idRub."',
				'".$this->nom."',
				'".$this->url."')");
			$this->setId(intval($pdo->lastInsertId()));
		}
	}

	public function mdrub()
	{
		$aff="oui";
		Global $pdo;
		$sth = $pdo->query("SELECT * FROM rubriques WHERE aff = '$aff'");
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	
	}
	
	
	

}