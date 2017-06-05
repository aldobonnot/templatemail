<?php 
class Navigation
{
	private $idRub;
	private $variable;
	public function setIdRub($idRub)
	{
		if(is_int($idRub) || $idRub == NULL)
		{
			$this->idRub = $idRub;
		} else {
			trigger_error('int required : ' . $idRub . 'de type : ' . gettype($idRub));
		}
	}
	
	public function getIdRub()
	{
		return $this->idRub;
	}
	public function setVariable($variable)
	{
		if(is_int($variable) || $variable == NULL)
		{
			$this->variable = $variable;
		} else {
			trigger_error('int required : ' . $variable . 'de type : ' . gettype($variable));
		}
	}
	
	public function getVariable()
	{
		return $this->variable;
	}
	public function cmRub()
	{
		$aff="oui";
		Global $pdo;
		$sth = $pdo->query("SELECT * FROM rubriques WHERE aff ='$aff'");
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;	
	}

	public function cmLien($idRub)
	{
		$aff="Y";
		Global $pdo;
		$resultatL = execute_requete("SELECT * FROM liens WHERE idRub='$idRub' AND affL = '$aff'");
		$nbrL=$resultatL->rowCount();
		if($nbrL>0){
			$resultL = $resultatL->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultL ="";	
			}
		
		return $resultL;
	
	}
	public function listTemplate()
	{
		
		Global $pdo;
		$resultatLt = execute_requete("SELECT * FROM templatemail, domaine, cv WHERE templatemail.iddomaine = domaine.id_dom AND domaine.idcv = cv.id_cv");
		$nbrLt=$resultatLt->rowCount();
		if($nbrLt>0){
			$resultLt = $resultatLt->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultLt ="";	
			}
		
		return $resultLt;
	
	}
        public function nomT($id_temp)
	{
		
		Global $pdo;
		$resultatLt = execute_requete("SELECT *  FROM templatemail, domaine, cv WHERE templatemail.id_temp='$id_temp' AND templatemail.iddomaine = domaine.id_dom AND domaine.idcv = cv.id_cv");
		$resultLt = $resultatLt->fetch(PDO::FETCH_ASSOC);
		return $resultLt;
	
	}
	
}