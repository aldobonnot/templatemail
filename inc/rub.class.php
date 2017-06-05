<?php
class Rubrique{

	private $id;
	private $nom;
	private $aff;

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
	
	public function setNom($nom)
	{
		if(is_string($nom))
		{
			$this->nom = $nom;
		} else {
			trigger_error('string required : ' . $nom . 'de type : ' . gettype($nom));
		}
	}
	
	public function setAff($aff)
	{
		if(is_string($aff))
		{
			$this->aff = $aff;
		} else {
			trigger_error('string required : ' . $aff . 'de type : ' . gettype($aff));
		}
	}

//======== G E T T E R S ===================

	public function getId()
	{
		return $this->id;
	}
	
	public function getNom()
	{
		return $this->nom;
	}
	
	public function getAff()
	{
		return $this->aff;
	}

//======== M E T H O D S ===================

	public function save()
	{
		if($this->id)
		{
			// $this->id != NULL -----> UPDATE

			Global $pdo;
			
			$pdo->exec("UPDATE rubriques SET nom = '".$this->nom. "', aff ='".$this->aff."'	WHERE id= '".$this->id."'");

		} else {

			// $this->id = NULL ----> INSERT

			Global $pdo;			
			$pdo->exec("
				INSERT INTO rubriques (nom)
				VALUES
				('".$this->nom."')");
			$this->setId(intval($pdo->lastInsertId()));
		}
	}

}